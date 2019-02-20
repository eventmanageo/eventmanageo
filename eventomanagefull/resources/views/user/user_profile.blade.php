@extends('layouts.header_u')

@section('content')

 
  	<!-- Custom CSS -->
    <style type="text/css">

    .word-wrap{
      overflow-wrap: break-word;
    }
    .prod-body{
      height:300px;
    }

    .box:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .register-box{
      margin-top:20px;
    }

    </style>



<div class="box box-solid container">
	        			<div class="box-body row">
	        				<div class="col-sm-3">
                         <!--   retrive  image data from database of user-->
	        			<img src="images/p.jpg" style="height:250px; width:200px; padding : 20px 20px;">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row" style="padding:20px 20px;">
	        						<div class="col-sm-3">
                      <table border = 1>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Contact</td>
                                    <td>Address</td>
                                </tr>
                                @foreach ($users as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $Value->email}}</td>
                                    <td>{{ $value->contact }}</td>
                                    <td>{{ $value->address }}</td>
                                </tr>
                                @endforeach
                              </table>
	        						</div>
	        					</div>
	        				</div>  
	        			</div>
	        		</div>


<!-- Edit Profile -->

<div class="modal fade" id="edit" >
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
             
              <h4 class="modal-title"><b>Update Details</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body " style="text-align:right">
              <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="firstname" class="col-sm-3 control-label ml-auto">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-3" >
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
        
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal" style="margin-right:280px"><span aria-hidden="true">&times;</span> Close</button>

              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div></div>



@endsection