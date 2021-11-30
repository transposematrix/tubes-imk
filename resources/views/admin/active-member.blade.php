@extends('admin_layout.main')
@section('title')
<title>USD | Active Member </title>
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Active Members</h1>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Members</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Active Members</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>NIM</th>
                                            <th>USD Batch</th>
                                            <th>Contact Person</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($member as $mem)
                                        <tr>
                                            <td><img  src="../user/assets/img/members/{{$mem->photo}}" width="50%"></td>
                                            <td>{{$mem->name}}</td>
                                            <td>{{$mem->nim}}</td>
                                            <td>{{$mem->batch}}</td>
                                            <td>{{$mem->phone}}</td>
                                            <td>
                                            <a href="#" data-toggle="modal" data-target="#updateUser{{$mem->id}}" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm delete-confirm" href="/user/hapus/{{$mem->id}}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            </td>
                                        </tr>
                                    <div class="modal fade" id="updateUser{{$mem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="ion-ios-close"></span>
										  </button>
										</div>
										<div class="modal-body p-4 py-5 p-md-5">
											<h3 class="text-center mb-3">Update Member</h3>
											<form action="/user/update/{{$mem->id}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                            {{ csrf_field() }} 
                                            @method('PUT')
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Full Name</label>
													<input type="text" name="name" class="form-control" value="{{$mem->name}}" placeholder="Full Name">
                                                    @error('name')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
												<div class="form-group mb-2">
													<label for="tgl" class="text-secondary">NIM</label>
													<input type="text" name="nim"  placeholder="NIM" value="{{$mem->nim}}" class="form-control">
                                                    @error('nim')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-2">
													<label for="tgl" class="text-secondary">Faculty</label>
													<input type="text" name="faculty"  placeholder="Faculty" value="{{$mem->faculty}}" class="form-control">
                                                    @error('faculty')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
										  <div class="form-group mb-2">
											<label for="batch" class="text-secondary">USD Batch (ex : 2010)</label>
											<input type="text" name="batch" class="form-control" value="{{$mem->batch}}" placeholder="Batch">
                                            @error('batch')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                        <label for="batch" class="text-secondary">Member's Category</label>
                                            <select name="category" class="custom-select">
                                                <option value="" disabled>--Choose Category--</option>
                                                <option value="active" selected>Active</option>
                                                <option value="alumnee">Alumnee</option>
                                        </select>
                                    </div>									
                                        <div class="form-group mb-2">
											<label for="contact" class="text-secondary">Phone Number</label>
											<input type="text" name="phone" class="form-control" value="{{$mem->phone}}" placeholder="Phone Number">
                                            @error('nama')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror

                                        </div>
                                        <input type="text" hidden name="levelUser" value="{{$mem->levelUser}}">
                                        <input type="text" hidden name="levelAdmin" value="{{$mem->levelAdmin}}">
                                        <div class="form-group mb-2">
                                        <label for="photo" class="text-secondary">Member Photo</label>
                                        <input type="file" name="gambar" id="gambar" accept="image/*">
                                        @error('gambar')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                        </span>
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
											<h3 class="text-center mb-3">Add Member</h3>
											<form action="{{route('add_member')}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                                @csrf
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Full Name</label>
													<input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                                    @error('nama')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                    @error('nama')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
												<div class="form-group mb-2">
													<label for="tgl" class="text-secondary">NIM</label>
													<input type="text" name="nim"  placeholder="NIM" class="form-control" required>
                                                    @error('nim')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-2">
													<label for="tgl" class="text-secondary">Faculty</label>
													<input type="text" name="faculty"  placeholder="Faculty" required class="form-control">
                                                    @error('faculty')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
										  <div class="form-group mb-2">
											<label for="batch" class="text-secondary">USD Batch (ex : 2010)</label>
											<input type="text" name="batch" class="form-control" required placeholder="Batch">
                                            @error('batch')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                        <label for="batch" class="text-secondary">Member's Category</label>
                                            <select name="category" class="custom-select">
                                                <option value="" selected disabled>--Choose Category--</option>
                                                <option value="active">Active</option>
                                                <option value="alumnee">Alumnee</option>
                                        </select>
                                    </div>									
                                        <div class="form-group mb-2">
											<label for="contact" class="text-secondary">Phone Number</label>
											<input type="text" name="phone" class="form-control" required placeholder="Phone Number">
                                            @error('nama')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-2">
                                        <label for="photo" class="text-secondary">Member Photo</label>
                                        <input type="file" name="gambar" id="gambar" accept="image/*" required onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                        <img id="output"/>
                                        @error('gambar')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                        </div>

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
@section('aksi')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.delete-confirm').on('click',function(e){
        e.preventDefault();
        const href=$(this).attr('href')

        Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Perubahan tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
        }).then((result) => {
        if (result.value) {
             document.location.href = href;
        }
        })

    })
    </script>
@endsection