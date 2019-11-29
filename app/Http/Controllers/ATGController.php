<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Session;

class ATGController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

  
    public function store(Request $request)
    {

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
      //  $request->session()->flash('alert-success', 'User was successful added!');
        $check = $Registration->save();
        if($check==1){
            Session::flash('message', 'Added Successfully'); 
            Session::flash('alert-class','alert-danger'); 

        }else{
            Session::flash('message', 'Data Not Added'); 
            Session::flash('alert-danger'); 

        }
        return redirect()->back();

    }
}
