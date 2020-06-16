<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;
use Cookie;
use Response;
use Event;
use Validator;
use File;
use App\Events\SendMail;
class ATGController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

  
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'imageInput' => 'required|image|mimes:jpg,png|max:2048'
           ]);
           if($validation->passes()){
                if ($files = $request->file('imageInput')) {
                    $files->move(public_path('images'), $request->employeeid); 
                }
                $Registration = new Registration;
                $Registration->employeeid = $request->employeeid;
                $Registration->name = $request->name;
                $Registration->email = $request->email;
                $Registration->dob = $request->dob;
                $Registration->mobile = $request->mobile;
                $Registration->profilephoto = $files->getClientOriginalName();
                $check = $Registration->save();
                return response()->json([
                    'message'   => $validation->errors()->all(),
                    'code'=>"200"
                    ]);
            }
            else
            {
            return response()->json([
            'message'   => $validation->errors()->all(),
            'code'=>"500"
            ]);
            }
            }

    public function login(Request $request)
    {

        $Registration = Registration::where('username',$request->loginUsername)
        ->first();
          if($Registration){
            Cookie::queue('name', $Registration->name);
            Cookie::queue('email', $Registration->email);
            session(['userid' => $Registration->id]);
            if (Hash::check($request->loginpassword, $Registration->password)){
                echo 0;
                
            }else{
                echo 1;
            }
        }else{
            echo 1;
        }
    }

    public function viewstudent()
    {
        $arr_group = Registration::all();
        return view('viewstudent', ['arr_group' => $arr_group]);
    }

    public function editstudent(Request $request)
    {

        $id = $request->postid;
        //Find the employee
        $arr_group = Registration::find($id);
        return response()->json($arr_group);
    }

    public function destroy(Request $request){
        $id = $request->postid;
      $post = Registration::find($id)->delete();

      return response()->json(['success'=>'Employee Deleted successfully']);
    }

    public function update(Request $request)
    {
        $image_path = public_path("images/".$request->id);
        //Retrieve the employee and update
  
        $Registration = Registration::find($request->employeeid);
        $Registration->employeeid = $request->editid;
        $Registration->name = $request->editname;
        $Registration->mobile = $request->editmobileno;
        $Registration->email = $request->editemail;
        $Registration->dob = $request->editdob;
        $Registration->save(); //persist the data
        return response()->json(['code'=>200, 'message'=>'Post Update successfully','data' => $Registration], 200);    
      
    }

    public function piechart(Request $request)
    {
        //Retrieve the employee and update

        $inactive = Registration::where('status',0)
        ->count();
        $active = Registration::where('status',1)
        ->count();
           $countactive = intval($active);
           $countintactive = intval($inactive);
        $inactive = [100,100];
            $rows[]=array("c"=>array("0"=>array("v"=>"Active"),"1"=>array("v"=>$countintactive)));
            $rows[]=array("c"=>array("0"=>array("v"=>"Inactive"),"1"=>array("v"=>$countactive)));
        
       echo $format = '{
	"cols":
	[
	{"label":"Active","type":"string"},
	{"label":"Inactive","type":"number"}
	],
	"rows":'.json_encode($rows).'}';

        
    }


  
}
