<?php

namespace App\Http\Controllers;
namespace App\Traits;

use Illuminate\Http\Request;
use App\Registration;
use Session;
use Illuminate\Support\Facades\Mail;
Use Exception;
Use Log;

trait RegisterTraits
{
    public function index()
    {
        return view('/welcome');
    }

  
    public function store(Request $request)
    {
        try{
        $data = array('name'=>"Welcome");
        $email = $request->email;
        // Validate the request...
        $this->validate($request,[
            'name' => 'required|string|max:255|unique:registration',
            'email' => 'required|string|email|max:255|unique:registration',
            'pincode' => 'required|regex:/\b\d{6}\b/',
        ]);
      
        $Registration = new Registration;
        $Registration->name = $request->name;
        $Registration->email = $request->email;
        $Registration->pincode = $request->pincode;
        $check = $Registration->save();
        if($check==1){
            Mail::send([], $data, function($message)use ($email) {
                $message->to($email, 'Welcome')->subject
                   ('Welcome Your email has been registered');
                $message->from('bhavsarmana7@gmail.com','Manan Bhavsar');
             });
             Session::flash('message', 'Added Successfully and confirmation mail has been sent'); 
            Session::flash('alert-class','alert-danger'); 
            Log::info('success,EMAIL SENT');
            return response()->json(["Status"=>0,"Email"=>"Sent"],201);
                }
         }catch (Exception $e) {
            Log::error('Unsuccessful,EMAIL NOT SENT');
            return response()->json(["Status"=>1,"Email"=>"Not Sent"],201);
        }
    }
}
