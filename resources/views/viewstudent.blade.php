<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<section class="content-header" style="padding:10px;">
    <h4>
        Manage Employee
    </h4>
</section>
<section class="content">
    @if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}<a class="close">&times;</a></p>
    <?php Session::forget('message'); ?>
    @endif
    <div class="row">
        <div class="col-md-10">
           
        </div>
        <div class="col-md-2">
            <button class="btn btn-danger"   onclick="location.href='{{ url('addemployee') }}'" type="button" >Add Employee</button>
        </div>
    </div>
    <div class="row" style="padding:15px;">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
              
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div role="grid" class="dataTables_wrapper form-inline" id="example1_wrapper">
                    
                        <form name="frm_category" id="frm_category" action="<?php echo url('/'); ?>/admin/group/list" method="post">
                            {!! csrf_field() !!}
                            <table class="table table-bordered cell-border hover" style="text-align:center;background-color: ghostwhite;" id="example1" aria-describedby="example1_info" style="">
                                <thead>
                                    <tr role="row"  style="text-align:center;background-color:  #92a8d1;">
                                <th align="center">Profile Photo</th>
                                <th align="center">Employee ID</th>
                                <th align="center">Name</th>
                                <th align="center">Email</th>
                                <th align="center">Mobile No</th>
                                <th align="center">DOB</th>
                                <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($arr_group as $row) { ?>
                                        <tr id="row_<?php echo $row["id"];?>">
                                            <td  align="center" ><img src="{{ asset('images/' . $row->employeeid) }}" style="width:100px;hieght:150px;"/></td>
                                            <td  align="center">
                                                <?php echo stripslashes($row['employeeid']); ?> </td>
                                            <td align="center"><?php echo stripslashes($row['name']); ?></td>
                                            <td align="center"> <?php echo $row['email']  ?></td>
                                            <td align="center"> <?php echo $row['mobile']  ?></td>
                                            <td align="center"> <?php echo $row['dob']  ?></td>
                                            <td align="center">
                                            <input type="button" class="btn btn-primary"onclick= "edituser(<?php echo ($row['id']); ?>)" id="btn_tick" name = "btn_tick" title = "Edit Employee" value = 'Edit' /> 
                                             <input type="button" class="btn btn-danger" onclick="deleteuser(<?php echo ($row['id']); ?>);" id="btn_cross" name = "btn_cross" title = "Bad Post" value = 'Delete' style="background-color:red"/> 

                                            </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                               
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
                
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" ">
                    <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Employee ID</label>

                            <div class="col-md-6">
                                <input id="editid" type="text" class="form-control" name="editid"  required autofocus  maxlength="5" disabled >
                                <input id="userid" type="hidden" class="form-control" >

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Employee Name</label>

                            <div class="col-md-6">
                                <input id="editname" type="text" class="form-control txtOnly" name="editname"  required autofocus >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Mobile No</label>
                            <div class="col-md-6">
                                <input id="editmobileno" type="number" class="form-control" name="editmobileno"  required    minlength="9" maxlength="10"  pattern="\d{3}[\-]\d{3}[\-]\d{4}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input id="editemail" type="email" class="form-control" name="editemail" required>
                            </div>
                        </div>
                        <div>
                            <label for="name" class="col-md-4 control-label">DOB</label>
                            <div class="col-md-6">
                            <input id="editdob" type="text" class="datepicker"  name="editdob" required>

                            </div>
                     <!--    </div>
                        <div class="form-group{{ $errors->has('confirmpassword') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Upload Image</label>

                            <div class="col-md-6">
                            <img id="editimage_preview_container" src="{{ asset('public/image/image-preview.png') }}"
                        alt="preview image" style="max-height: 150px;">
                            <input data-preview="#preview" name="editimageInput" type="file" id="editimageInput">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-primary" onclick="update();">
                                    Update
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              
                                    <div class="alert alert-success">
                                      
                                     </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>


</section>
<script>
$(document).ready(function() {

    $( ".txtOnly" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
    $('#example1').DataTable( {
        "scrollY":        "auto",
        "scrollCollapse": true,
        "paging":         true,
        dom: 'Bfrtip',
  buttons: [
   
				{
					extend: "pdf",
					text: "Pdf selected",
					title: "Docket Info" ,
					className: "btn btn-success",
					exportOptions: {
						modifier: {
							selected: true
						},
						columns: [ 0, 1, 2, 3, 4, 5 ]
					}
				},
			
				{
					extend: "excel",
					text: "Excel",
					title: "Employee Info" ,
					className: "btn btn-success",
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4, 5]
					}
				}
  ]
    } );
             $("div.dataTables_wrapper").addClass("form-group");
				$("div.dt-buttons").css({"display":"inline-block","margin-center":"2%"});
				$("div.dataTables_length").css({"float":"center","font-family":"Open Sans","font-size":"14px"});
				$("div.dataTables_filter input").addClass("form-control");
				$("div.dataTables_filter input").attr("placeholder", "Search" );
				$("div.dataTables_filter").css({"color":"transparent","font-size":"1px"});
                $('.datepicker').datetimepicker({
                // dateFormat: 'dd-mm-yy',
                format:'YYYY-MM-DD'
                });
} );
function edituser(postid) {

   
        $.ajax({
        async: false,
        cache:false, 

        method: "get",
        data: { postid : postid,      
                "_token":"{{ csrf_token() }}",
        },
        url:"/editstudent",
        datatype:'json', 
        success: function(response){
            console.log(response);
            if(response) {
            $("#editid").val(response.employeeid);
            $("#editname").val(response.name);
            $("#editemail").val(response.email);
            $("#editdob").val(response.dob);
            $("#userid").val(response.id);
            $("#editmobileno").val(response.mobile);
            if(response.status== 0){
                $("#inactive").prop("checked","true");
            }else{
                $("#active").prop("checked","true");
            }
            $('#ajaxModel').modal('show');
          }
         } 
     });
    }


function deleteuser(postid) {
      $.ajax({
        url:"/deleteuser",
        type: 'DELETE',
        data: {
            postid:postid,
            "_token":"{{ csrf_token() }}",
        },
        success: function(response) {
        alert(response.success);
          $("#row_"+postid).remove();
        }
      });
  }

  function update() {
     var email = $("#editemail").val(); 
     var editid = $("#editid").val(); 
     var name = $("#editname").val(); 
     var editmobileno = $("#editmobileno").val(); 
     var editdob = $("#editdob").val(); 
     var employeeid = $("#userid").val(); 
     if(editmobileno.length!=10){
        
        alert("Required 10 digits Mobile number");
        return;
        } 
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
     var updatedata = new FormData();
     updatedata.append('editid', editid);
     updatedata.append('editname',name);
     updatedata.append('editmobileno', editmobileno);
     updatedata.append('editemail', email);
     updatedata.append('employeeid', employeeid);
     updatedata.append('editdob', editdob);
    // updatedata.append('editimageInput', $("#editimageInput")[0].files[0]);
        $.ajax({
        cache:false, 
        contentType : false,
        processData: false,
                enctype: 'multipart/form-data',
        method: "post",
        data:  updatedata,
        url:"/update",
        success: function(response){
            if(response.code == 200) {
            location.href= "/";
            alert("Succesffully updated")
            $('#ajaxModel').modal('hide');

        }else{
            alert("Unable to update");
        }
        }
     });
    }
</script>