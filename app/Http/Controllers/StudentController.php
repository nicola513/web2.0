<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Enrollment;
use App\Course;
use App\Class_schedule;
use Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class StudentController extends Controller
{


    public function studentMainPage(){
      $uid = Session::get('uid');
      $timetable = Enrollment::where('uid', $uid)
                  ->join('course', 'enrollment.ccode', '=', 'course.ccode')
                  ->join('class_schedule', 'enrollment.ccode', '=', 'class_schedule.ccode')
                  ->get();

        return view('student.studentMainPage', array ('timetable'  =>  $timetable ));

    }

    public function studentProfile(Request $request){

          $stuId = Session::get('uid');
          $xml = simplexml_load_file('xml/'.$stuId.'.xml');

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

      return view('student.studentProfile',array('data'=>$data));
    }

    public function viewAllCourses(Request $request){
      $courseList = Course::All();
      $type = $request->input('type');
      $pre_req = $request -> input('pre_req');
      $year = $request -> input('year');

      if (Input::only('year', 'type', 'pre_req')) {
        if ($year !='*' && $type=='*' && $pre_req=='no') {
              $courseList = Course::where([['year', $year], ['pre_req', 'NA']])
                ->get();
            }else if ($year !='*' && $type=='*' && $pre_req=='yes') {
              $courseList = Course::where([['year', $year], ['pre_req','<>', 'NA']])
                ->get();
            }else if ($year !='*' && $type=='*' && $pre_req=='*'){
              $courseList = Course::where([['year', $year]])
              ->get();
            }else if ($year !='*' && $type!=='*' && $pre_req=='*'){
              $courseList = Course::where([['year', $year], ['type', $type]])
              ->get();
            }else if ($year !='*' && $type!=='*' && $pre_req=='no'){
              $courseList = Course::where([['year', $year], ['type', $type], ['pre_req', 'NA']])
              ->get();
            }else if ($year !='*' && $type!=='*' && $pre_req=='yes'){
              $courseList = Course::where([['year', $year], ['type', $type], ['pre_req','<>', 'NA']])
              ->get();
            }else if ($year =='*' && $type=='*' && $pre_req=='no') {
              $courseList = Course::where([['pre_req', 'NA']])
                ->get();
            }else if ($year =='*' && $type=='*' && $pre_req=='yes') {
              $courseList = Course::where([['pre_req','<>', 'NA']])
                ->get();
            }else if ($year =='*' && $type=='*' && $pre_req=='*'){
              $courseList = Course::All();
            }else if ($year =='*' && $type!=='*' && $pre_req=='*'){
              $courseList = Course::where([['type', $type]])
              ->get();
            }else if ($year =='*' && $type!=='*' && $pre_req=='no'){
              $courseList = Course::where([['type', $type], ['pre_req', 'NA']])
              ->get();
            }else if ($year =='*' && $type!=='*' && $pre_req=='yes'){
              $courseList = Course::where([['type', $type], ['pre_req','<>', 'NA']])
              ->get();
            }else{
    		      $courseList = Course::All();
    		    }
      }

      return view('student.studentViewAllCourses', array ('courseList'  =>  $courseList ));
    }

    public function viewCoursesAvailable(Request $request){

      $year = 1;
      $uid = Session::get('uid');
      $remain_credit = 10;
      $max_credit = 15;
      $courseList = Course::where('year', $year)
                  ->join('class_schedule', 'course.ccode', '=', 'class_schedule.ccode')
                  ->get();
      $type = $request->input('type');
      $pre_req = $request -> input('pre_req');

      $timetable = Enrollment::where('uid', $uid)
                  ->join('course', 'enrollment.ccode', '=', 'course.ccode')
                  ->join('class_schedule', 'enrollment.ccode', '=', 'class_schedule.ccode')
                  ->get();

      if (Input::only('type', 'pre_req')) {
      	if ($type=='*' && $pre_req=='no') {
      		$courseList = Course::where([['year', $year], ['pre_req', 'NA']])
          ->join('class_schedule', 'course.ccode', '=', 'class_schedule.ccode')
      			->get();
      	}else if ($type=='*' && $pre_req=='yes') {
      		$courseList = Course::where([['year', $year],  ['pre_req','<>', 'NA']])
          ->join('class_schedule', 'course.ccode', '=', 'class_schedule.ccode')
      			->get();
      	}else if ( $type=='*' && $pre_req=='*'){
      		$courseList = Course::where('year', $year)
          ->join('class_schedule', 'course.ccode', '=', 'class_schedule.ccode')
      		->get();
      	}else if ( $type!=='*' && $pre_req=='*'){
      		$courseList = Course::where([['year', $year], ['type', $type]])
          ->join('class_schedule', 'course.ccode', '=', 'class_schedule.ccode')
      		->get();
      	}else if ( $type!=='*' && $pre_req=='no'){
      		$courseList = Course::where([['year', $year], ['type', $type], ['pre_req', 'NA']])
          ->join('class_schedule', 'course.ccode', '=', 'class_schedule.ccode')
      		->get();
      	}else if ( $type!=='*' && $pre_req=='yes'){
      		$courseList = Course::where([['year', $year], ['type', $type], ['pre_req','<>', 'NA']])
          ->join('class_schedule', 'course.ccode', '=', 'class_schedule.ccode')
      		->get();
      	}else {
         	$courseList = Course::where('year', $year)
          ->join('class_schedule', 'course.ccode', '=', 'class_schedule.ccode')
         	->get();
        }
      }

      return view('student.studentViewCoursesAvailable', array ('courseList'  =>  $courseList, 'timetable'  =>  $timetable, 'remain_credit'=>$remain_credit, 'max_credit'=>$max_credit ));
    }

    public function updatePage(){
      return redirect('viewCoursesAvailable');
    }

    public function  getQuota(Request $request){

      $uid = Session::get('uid');
      $ccode = $request->data;
      $course = Class_schedule::where('ccode', $ccode)
              ->first();
      $quota_value = $course->quota;

      $hour = 15;
      $userData = Enrollment::where('uid',$uid)->get();
        foreach($userData as $userData){
            switch ($userData->ccode) {
              case 'GE001':
                break;
              case 'DET405':
                $hour = $hour - 6 ;
                break;
              default:
                $hour = $hour - 3;
                break;
            }
        }

      return response()->json(array('quota_value'=>$quota_value,'hour' => $hour),200);
    }

    public function getCourseHour(Request $request){
      $credit_hour = Course::where('ccode', $request->data)->value('credit_hour');
      return response()->json(array('credit_hour'=>$credit_hour),200);
    }

    public function timeHasClass(Request $request){
      $uid = Session::get('uid');
      $hasClass = Enrollment::where('uid', $uid)
                  ->where('enrollment.ccode',$request->data)
                  ->first();
      return response()->json(array('hasClass'=>$hasClass),200);
    }

    public function addCourse(Request $request){
      $uid = Session::get('uid');
      $year = '2016/17';
      $semester = '1';

      $ccode =  $request->data;
      $class_value = Class_schedule::where('ccode', $ccode)->value('class');

      $enrollment_data = array(
        'uid' => $uid,
        'year' => $year,
        'semester' => $semester,
        'ccode' => $ccode,
        'class' => $class_value,
      );

        $enroll = new Enrollment;
        $enroll->insert($enrollment_data);
        $enroll->save();

        $getQuota = Class_schedule::where('ccode', $ccode)
                    ->value('quota');

        $updateQuota = Class_schedule::where('ccode', $ccode)
                    ->update(['quota' => $getQuota-1]);


      return response()->json(array('isSuccess'=>true),200);;
    }

    public function getStuHour(Request $request){
          $uid = Session::get('uid');
          $hour = 15;
          $userData = Enrollment::where('uid',$uid)->get();
            foreach($userData as $userData){
                switch ($userData->ccode) {
                  case 'GE001':
                    break;
                  case 'DET405':
                    $hour = $hour - 6 ;
                    break;
                  default:
                    $hour = $hour - 3;
                    break;
                }
              }
          return response()->json(array('hour'=>$hour),200);
        }

    public function dropCourse(){
      $uid = Session::get('uid');
      $ccode = $_GET['ccode'];
      $drop_data = Enrollment::where([['uid', $uid], ['ccode', $ccode]])
              ->delete();
      $getQuota = Class_schedule::where('ccode', $ccode)
              ->value('quota');

      $updateQuota = Class_schedule::where('ccode', $ccode)
              ->update(['quota' => $getQuota+1]);

      return redirect('viewCoursesAvailable');
    }
}
