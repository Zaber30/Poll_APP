<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class FormController extends Controller
{
    public function showform(){
        return view('from');
    }
    public function submit(Request $request){
       $data= $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);
        //\Log::info('User Data:',$data);
        event(new UserRegistered($data['name'],$data['email']));
        return "Form submitted successfully";
        
    }
}
