<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </head> 
  <body>   
<div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" ">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"  required  value = "{{$edit->firstname}}>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" required>

                                @if ($errors->has('Username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Pasword</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('confirmpassword') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="cpassword" type="password" class="form-control" name= "cpassword" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div >
                            <label for="name" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                            <label class="mt-checkbox">
                                <input type="radio" id="active" name="radio" value="0">Active
                            </label>
                                <label class="mt-checkbox">
                                <input type="radio" id="inactive" name="radio" value="1">InActive
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-primary" onclick="register();">
                                    Register
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                         {{ session()->get('message') }}
                                     </div>
                                 @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>


<script>
 function updatestudent() {
     var email = $("#editemail").val(); 
     var name = $("#editname").val(); 
     var password = $("#editpassword").val(); 
     var active = $("#active").val(); 
     var active = $("#inactive").val(); 
        $.ajax({
        async: false,
        cache:false, 

        method: "post",
        data: { email : email,
            name :  name ,
            password : password,        
            cpassword : cpassword,        
            active : active,        
            username : username,        
                "_token":"{{ csrf_token() }}",
        },
        url:"/registeruser",
        datatype:'json', 
        success: function(){
           alert("Successfully registered");
        }
     });
    }


</script>