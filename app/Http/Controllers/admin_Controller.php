<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Input;


//set 'Input' => Illuminate\Support\Facades\Input::class, in config/app.php ->'aliases'

class admin_Controller extends Controller
{
	public function adminIndex(){
		$file = File::allFiles('xml/');

        $array=[];

        foreach($file as $file){

            $xml = simplexml_load_file($file);
            //return $xml->student_id;
            $data = [
            'student_id'=>$xml->student_id,
            'first_name'=>$xml->first_name,
            'last_name'=>$xml->last_name,
            'sex'=>$xml->sex,
            'phone_number'=>$xml->phone_number,
            'address'=>$xml->address,
            'university'=>$xml->university,
            'subject'=>$xml->subject,
            'class'=>$xml->class,
            'year'=>$xml->year,
            ];


            //return $data['student_id'];
            //return view('myTest.readStuData')->with($data);
            $array=array_prepend($array,$data);
            
        }

		return view('admin.adminIndex',array('array'=>$array));
	}

    public function deleteStuData(Request $request){
        //$file = Public\xml::where('s1600000')->delete();
        //if($request->data==""|$request->data==null)
        	//return 'no data';
            //return Redirect::back()->withInput()->withErrors(array('uid' => 'You have not select one student'));
        File::delete('xml/'.$request->data.'.xml');

        foreach($file as $file){

            $xml = simplexml_load_file($file);
            //return $xml->student_id;
            
            $data = [
            'student_id'=>$xml->student_id,
            'first_name'=>$xml->first_name,
            'last_name'=>$xml->last_name,
            'sex'=>$xml->sex,
            'phone_number'=>$xml->phone_number,
            'address'=>$xml->address,
            'university'=>$xml->university,
            'subject'=>$xml->subject,
            'class'=>$xml->class,
            'year'=>$xml->year,
            ];


            //return $data['student_id'];
            //return view('myTest.readStuData')->with($data);
            $array=array_prepend($array,$data);
            
        }

        return response()->json(array('array'=> $array), 200);
    }

    public function updateStuPage(Request $request){
        $xml = simplexml_load_file('xml/'.$request->stuId.'.xml');
           //return $xml->student_id;
            
             $data = [
            'student_id'=>$xml->student_id,
            'first_name'=>$xml->first_name,
            'last_name'=>$xml->last_name,
            'sex'=>$xml->sex,
            'phone_number'=>$xml->phone_number,
            'address'=>$xml->address,
            'university'=>$xml->university,
            'subject'=>$xml->subject,
            'class'=>$xml->class,
            'year'=>$xml->year,
            ];

        return view('admin.updateStuData',array('data'=>$data));
    }

    public function update(Request $request){
        
        $array=[];
        $stuData = [
                        'stu_id' => $request->student_id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'sex' => $request->sex,
                        'phone_num' => $request->phone,
                        'address' => $request->address,
                        'university' => $request->university,
                        'subject' => $request->subject,
                        'class' => $request->class,
                        'year' => $request->yaer,

                    ];

                    $array=array_prepend($array,$stuData);
                    return (new create_Controller)->createStuData($array);
    }

    
}
