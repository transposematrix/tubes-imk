
@extends('admin_layout.main')
@section('title')
<title>USD | Task</title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Absensi</h1>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add New Absensi</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Absensi List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>USD Batch</th>
                                            <th>Date</td>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($absensi as $abs)
                                        <tr>
                                            <td>{{$abs->user->name}}</td>
                                            <td>{{$abs->user->nim}}</td>
                                            <td>{{$abs->user->batch}}</td>
                                            <td>{{$abs->date}}</td>
                                            @if($abs->status == NULL)
                                            <td>?</td>
                                            @else
                                            <td>{{$abs->status}}
                                            @endif
                                            <td>
                                            <a href="#"  data-toggle="modal" data-target="#updateAbsen{{$abs->id}}" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="updateAbsen{{$abs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="ion-ios-close"></span>
										  </button>
										</div>
										<div class="modal-body p-4 py-5 p-md-5">
											<h3 class="text-center mb-3">Update Attendance</h3>
											<form action="/absensi/update/{{$abs->id}}" method="POST" class="signup-form">
                                            {{ csrf_field() }} 
                                            @method('PUT')
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Full Name</label>
													<input type="text" name="name" class="form-control" value="{{$abs->user->name}}" disabled placeholder="Full Name">
                                                    @error('name')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
												<div class="form-group mb-2">
													<label for="tgl" class="text-secondary">NIM</label>
													<input type="text" name="nim"  placeholder="NIM" value="{{$abs->user->nim}}" disabled class="form-control">
                                                    @error('nim')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
										  <div class="form-group mb-2">
											<label for="batch" class="text-secondary">USD Batch (ex : 2010)</label>
											<input type="text" name="batch" class="form-control" value="{{$abs->user->batch}}" disabled  placeholder="Batch">
                                            @error('batch')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                        <label for="batch" class="text-secondary">Attendance Status</label>
                                            <select name="status" class="custom-select">
                                                <option value="" disabled>--Choose Status--</option>
                                                <option value="present" selected>Present</option>
                                                <option value="absent">Absent</option>
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
											<h3 class="text-center mb-3">Add New Attendance</h3>
											<form action="{{route('add_absen')}}" method="POST" class="signup-form">
                                            {{ csrf_field() }} 
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Attendance Detail</label>
													<input type="text" name="detail" class="form-control" placeholder="Attendance Detail">
                                                    @error('detail')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
												<div class="form-group mb-2">
													<label for="tgl" class="text-secondary">Date</label>
													<input type="date" name="date" class="form-control">
                                                    @error('date')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
										  <div class="form-group mb-2">
											<label for="batch" class="text-secondary">Time Start</label>
											<input type="time" name="start_time" class="form-control" placeholder="Batch">
                                            @error('start_time')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
										</div>
                                        <div class="form-group mb-2">
                                        <label for="batch" class="text-secondary">Time Due</label>
                                        <input type="time" name="time_due" class="form-control" placeholder="Batch">
                                        @error('time_due')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
										<br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="add" class="btn btn-primary">Save</button>
                                        </div>
										</form>
										</div>
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