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
                                            <a href="#" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm rounded-0">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            </td>
                                        </tr>
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
											<h3 class="text-center mb-3">Add User</h3>
											<form action="#" class="signup-form">
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Full Name</label>
													<input type="text" name="name" class="form-control" placeholder="Full Name">
												</div>
												<div class="form-group mb-2">
													<label for="tgl" class="text-secondary">Email</label>
													<input type="text" name="email"  placeholder="Email" class="form-control">
												</div>
										  <div class="form-group mb-2">
											<label for="password" class="text-secondary">Password</label>
											<input type="text" name="password" class="form-control" placeholder="Password">
										</div>

                                        <div class="form-group mb-2">
											<label for="contact" class="text-secondary">Phone Number</label>
											<input type="text" name="phone" class="form-control" placeholder="Phone Number">
										</div>
                                        <div class="form-group mb-2">
											<label for="level" class="text-secondary">Level</label>
											<input type="text" name="level" class="form-control" value="Admin">
										</div>
										<br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button type="button" name="add" class="btn btn-primary">Save</button>
                                        </div>
										</form>
										</div>
									  </div>
									</div>
								  </div>
                <!-- /.container-fluid -->
@endsection