<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\login;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Controllers\admin_Controller;
//use App\Http\Controller\admin_Controller;

class loginController extends Controller
{
    //
    public function viewIndexHtml(){
      return view('index');
    }

    public function index(){
    	return view('home.login');
    }

    public function login(Request $request){
        if($request->uid==""||$request->uid==null){
            return Redirect::back()->withInput()->withErrors(array('uid' => 'Please enter user id!'));
        }
        if($request->password==""||$request->password==null){
            return Redirect::back()->withInput()->withErrors(array('password' => 'Please enter user password!'));
        }
        $userData = login::all();
        foreach ($userData as $userData) {
           if($userData->uid==$request->uid){
               if($userData->password==$request->password){


                 if($userData->role==1){
                    Session::set('uid',$userData->uid);
                    Session::set('name',$userData->name);
                 	//return (new admin_Controller)->adminIndex();
                     return Redirect::to('adminIndex');
                 }
                 else{
                    Session::set('uid',$userData->uid);
                    Session::set('name',$userData->name);
                 	return Redirect::to('student');
                 }
               }
               return Redirect::back()->withInput()->withErrors(array('account_error' => 'password error.'));
            }

        }

        return Redirect::back()->withInput()->withErrors(array('account_error' => 'Account is not exists.'));
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }

}
