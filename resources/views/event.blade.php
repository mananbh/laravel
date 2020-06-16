<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

   </head> 
  <body>   
  <section class="content-header">
<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="/"></a>
        <ol class="breadcrumb">
            <li><a href="/">Dashboard</a></li>
            <li><a href="/viewstudent">View Student</a></li>
            <li><a href="/event">Add Events</a></li>
        </ol>
    </div>
</div>
                    <form class="form-horizontal" method="post" ">
                        <div class="col-md-4">
                            <div class="form-group>
                                <label for="name" class="Control-label">Event Name</label>
                                    <input id="event_name" type="text" class="form-control" name="event_name"  required autofocus>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location" class="control-label">location</label>
                                <input id="location" type="text" class="form-control" name="location"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="username" class="control-label">Event Date</label>
                                <input id="event_date" type="text" class="form-control" name="event_date"  data-date-format="DD-MM-YYYY HH:mm:ss" required>
                             </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="register();">
                                    Register
                                </button>
                     </div>
                </form>
              
<script>
    $(document).ready(function(){
        var dateFormat = $(this).attr("data-vat-rate");
		$("#event_date").datetimepicker({
			showClose: true,
			format: dateFormat
		});
    });

 function register() {
     var event_name = $("#event_name").val(); 
     var location = $("#location").val(); 
     var event_date = $("#event_date").val(); 
        $.ajax({
        async: false,
        cache:false, 

        method: "post",
        data: { event_name : event_name,
            location :  location ,
            event_date : event_date,        
            "_token":"{{ csrf_token() }}",
        },
        url:"/addevent",
        datatype:'json', 
        success: function(){
           alert("Successfully event created");
        }
     });
    }


</script>