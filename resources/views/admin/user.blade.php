@extends('admin_layout.main')
@section('title')
<title>USD | User </title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Administrators</h1>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Administrators</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of All Administrators</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($administrator as $admin)
                                        <tr>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->phone}}</td>
                                            <td>{{$admin->levelAdmin}}</td>
                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#updateAdmin{{$admin->id}}" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="updateAdmin{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="ion-ios-close"></span>
										  </button>
										</div>
										<div class="modal-body p-4 py-5 p-md-5">
											<h3 class="text-center mb-3">Update Administrator</h3>
											<form action="/admin/update/{{$admin->id}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                            {{ csrf_field() }} 
                                            @method('PUT')
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Full Name</label>
													<input type="text" name="name" disabled class="form-control" value="{{$admin->name}}" placeholder="Full Name">
                                                    @error('name')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
                                        <div class="form-group mb-2">
                                        <label for="batch" class="text-secondary">Level </label>
                                            <select name="level" class="custom-select">
                                                @if($admin->levelAdmin == 'master')
                                                <option value="master" selected>Master</option>
                                                <option value="sekretaris">Sekretaris</option>
                                                <option value="user">User</option>
                                                @elseif($admin->levelAdmin == 'sekretaris')
                                                <option value="master" >Master</option>
                                                <option value="sekretaris" selected>Sekretaris</option>
                                                <option value="user">User</option>
                                                @else
                                                <option value="master" >Master</option>
                                                <option value="sekretaris">Sekretaris</option>
                                                <option value="user" selected>User</option>
                                                @endif
                                        </select>
                                    </div>									
										<br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit"  class="btn btn-primary">Update</button>
                                        </div>
										</form>
										</div>
									  </div>
									</div>
								  </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="ion-ios-close"></span>
										  </button>
										</div>
										<div class="modal-body p-4 py-5 p-md-5">
											<h3 class="text-center mb-3">Add Administrator</h3>
											<form action="{{route('add_admin')}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                                @csrf
                                                <div class="wrapper">
                                                <label for="batch" class="text-secondary">USD Member</label>
                                                    <select name="user_id" id="" class="form-control custom-select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                                    <option value="" selected disabled>--Choose Member--</option>
                                                    @foreach($user as $us)
                                                    <option value="{{$us->id}}">{{$us->name}}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('user')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                        </div>           
                                        <br>                            
                                        <label for="batch" class="text-secondary">Level </label>
                                            <select name="level" class="custom-select">
                                                <option value="master">Master</option>
                                                <option value="sekretaris">Sekretaris</option>
                                                <option value="user" selected>User</option>
                                        </select>
                              			<br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit"  class="btn btn-primary">Save</button>
                                        </div>
										</form>
										</div>
									  </div>
									</div>
								  </div>
     <!-- /.container-fluid -->
                @include('sweetalert::alert')
@endsection