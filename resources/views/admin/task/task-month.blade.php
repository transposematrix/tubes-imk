
@extends('admin_layout.main')
@section('title')
<title>USD | Task</title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Task</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Task List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>USD Batch</th>
                                            <th>Collect Date </th>
                                            <th>Collect Time</th>
                                            <th>Status</td>
                                            <th>File</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($task as $tas)
                                        <tr>
                                            <td>{{$tas->user->name}}</td>
                                            <td>{{$tas->user->nim}}</td>
                                            <td>{{$tas->user->batch}}</td>
                                            @if(($tas->collect_date == NULL) AND ($tas->collect_time == NULL))
                                            <td>?</td>
                                            <td>?</td>
                                            @else
                                            <td>{{$tas->collect_date}}</td>
                                            <td>{{$tas->collect_time}}</td>
                                            @endif
                                            @if($tas->status == NULL)
                                            <td>?</td>
                                            <td>?</td>
                                            @else
                                            <td>{{$tas->status}}</td>
                                            <td><a href="/task/download/{{$tas->task}}" class="btn btn-primary btn-sm rounded-0">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            @endif

                                        </tr>

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
											<h3 class="text-center mb-3">Add New Task</h3>
											<form action="{{route('add_task')}}" method="POST" class="signup-form">
                                            {{ csrf_field() }} 
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Task Title</label>
													<input type="text" name="title" class="form-control" placeholder="Task Detail">
                                                    @error('title')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
                                                <div class="form-group mb-2">
													<label for="name" class="text-secondary">About Task</label>
													<textarea name="about" class="form-control"></textarea>
                                                    @error('about')
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
													<label for="tgl" class="text-secondary">Date</label>
													<input type="date" name="due_date" class="form-control">
                                                    @error('due_date')
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