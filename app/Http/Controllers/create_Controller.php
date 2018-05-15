<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Input;
use File;
use Log;

class create_Controller extends Controller
{
    //

    public function index(){
    	return view('admin.registration');
    }

    public function getStuData(Request $request){
    	$array=[];
    	
    	if($request->upload=='file'){
    		 if($request->file==""||$request->file==null){
            return Redirect::back()->withInput()->withErrors(array('file_error' => 'Please select file'));
        }
    		$file = Input::file('file');
	    	$data = File::get($file);
	        $allTextLines = preg_split('/\r\n|\n/', $data);

	        
	       
	        foreach($allTextLines as $allTextLines){


	        	if(count(preg_split('/,/', $allTextLines))>1){

	        		$text = preg_split('/\"/', $allTextLines);
	            	$point1 = preg_split('/,/', $text[0]);
	            	$point2 = $text[1];
	            	$point3 = preg_split('/,/', $text[2]);

	            	$stuData = [
	            		'stu_id' => $point1[0],
	            		'first_name' => $point1[1],
	            		'last_name' => $point1[2],
	            		'sex' => $point1[3],
	            		'phone_num' => $point1[4],
	            		'address' => $point2,
	            		'university' => $point3[1],
	            		'subject' => $point3[2],
	            		'class' => $point3[3],
	            		'year' => $point3[4],
	            	];

	            	$array=array_prepend($array,$stuData);
	            	
	            
	        	}
	        }
    	}
    	else{
			 if($request->student_id==""||$request->student_id==null){
			            return Redirect::back()->withInput()->withErrors(array('sid_error' => 'Please enter student ID.'));
			        }
			if($request->first_name==""||$request->first_name==null){
			            return Redirect::back()->withInput()->withErrors(array('first_error' => 'Please enter first name.'));
			        }
			if($request->last_name==""||$request->last_name==null){
			            return Redirect::back()->withInput()->withErrors(array('last_error' => 'Please enter last name.'));
			        }
			if($request->phone==""||$request->phone==null){
			            return Redirect::back()->withInput()->withErrors(array('phone_error' => 'Please enter phone number.'));
			        }
			if($request->address==""||$request->address==null){
			            return Redirect::back()->withInput()->withErrors(array('address_error' => 'Please enter student address.'));
			        }
			if($request->university==""||$request->university==null){
			            return Redirect::back()->withInput()->withErrors(array('university_error' => 'Please enter university name.'));
			        }
			if($request->subject==""||$request->subject==null){
			            return Redirect::back()->withInput()->withErrors(array('subject_error' => 'Please enter subject name.'));
			        }
			if($request->class==""||$request->class==null){
			            return Redirect::back()->withInput()->withErrors(array('class_error' => 'Please enter class name.'));
			        }
			if($request->yaer==""||$request->yaer==null){
			            return Redirect::back()->withInput()->withErrors(array('year_error' => 'Please enter year.'));
			        }

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
	        }

    	return $this->createStuData($array);
    	
    }

    public function createStuData($array){
    	//return 'I am here';
    	//Log::info('This is some useful information.');
	    foreach ($array as $stuData) {
	    	$doc = new \DomDocument();
	    	$doc -> formatOutput = true;

	    	$root = $doc->createElement('student');
	    	$root = $doc->appendChild($root);

		    $student_id = $doc->createElement('student_id');
		    $student_id = $root->appendChild($student_id);
		    $value1 = $doc->createTextNode($stuData['stu_id']);
		    $value1 = $student_id->appendChild($value1);

		    $first_name = $doc->createElement('first_name');
		    $first_name = $root->appendChild($first_name);
		    $value2 = $doc->createTextNode($stuData['first_name']);
		    $value2 = $first_name->appendChild($value2);

		    $last_name = $doc->createElement('last_name');
		    $last_name = $root->appendChild($last_name);
		    $value3 = $doc->createTextNode($stuData['last_name']);
		    $value3 = $last_name->appendChild($value3);

		    $sex = $doc->createElement('sex');
		    $sex = $root->appendChild($sex);
		    $value4 = $doc->createTextNode($stuData['sex']);
		    $value4 = $sex->appendChild($value4);

		    $phone_number = $doc->createElement('phone_number');
		    $phone_number = $root->appendChild($phone_number);
		    $value5 = $doc->createTextNode($stuData['phone_num']);
		    $value5 = $phone_number->appendChild($value5);

		    $address = $doc->createElement('address');
		    $address = $root->appendChild($address);
		    $value6 = $doc->createTextNode($stuData['address']);
		    $value6 = $address->appendChild($value6);

		    $university = $doc->createElement('university');
		    $university = $root->appendChild($university);
		    $value7 = $doc->createTextNode($stuData['university']);
		    $value7 = $university->appendChild($value7);

		    $subject = $doc->createElement('subject');
		    $subject = $root->appendChild($subject);
		    $value8 = $doc->createTextNode($stuData['subject']);
		    $value8 = $subject->appendChild($value8);

		    $class = $doc->createElement('class');
		    $class = $root->appendChild($class);
		    $value9 = $doc->createTextNode($stuData['class']);
		    $value9 = $class->appendChild($value9);

		    $year = $doc->createElement('year');
		    $year = $root->appendChild($year);
		    $value10 = $doc->createTextNode($stuData['year']);
		    $value10 = $year->appendChild($value10);

		    $strxml = $doc->saveXML();


		    $handle = fopen('xml/'.$stuData['stu_id'].".xml", "w");
		    fwrite($handle,$strxml);
		    fclose($handle);
		   // return 'success';
		}


		 return Redirect::to('adminIndex');
    }
}
