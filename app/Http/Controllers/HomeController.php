<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
           $usertype=Auth()->user()->usertype;

           if($usertype=='user'){
            return view('companies');
           }
           else if($usertype=='admin'){
            return view('admin.adminhome');
           }
           else {
            return redirect()->back();
           }
        }
    }

    public function post(){
        return view('post');
    }
    
    public function workspace(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
 
            if($usertype=='user'){
             return view('companies');
            }
            else if($usertype=='admin'){
             return view('admin.workspace');
            }
            else {
             return redirect()->back();
            }
         }
    }

    public function edit(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
 
            if($usertype=='user'){
             return view('companies');
            }
            else if($usertype=='admin'){
             return view('admin.edit');
            }
            else {
             return redirect()->back();
            }
         }
    }
    public function edituser(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
 
            if($usertype=='user'){
             return view('companies');
            }
            else if($usertype=='admin'){
             return view('admin.edituser');
            }
            else {
             return redirect()->back();
            }
         }
    }
    public function setting(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
 
            if($usertype=='user'){
             return view('companies');
            }
            else if($usertype=='admin'){
             return view('admin.setting');
            }
            else {
             return redirect()->back();
            }
         }
    }
}
