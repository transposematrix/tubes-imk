
@extends('admin_layout.main')
@section('title')
<title>USD | Attendance </title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Absensi</h1>


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
                                            <th>Activity</th>
                                            <th>Date</td>
                                            <th>Start</td>
                                            <th>Due Time</td>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($absensi as $abs)
                                        <tr>
                                            <td>{{$abs->detail}}
                                            <td>{{$abs->date}}</td>
                                            <td>{{$abs->start_time}}</td>
                                            <td>{{$abs->time_due}}</td>
                                            @if($abs->status == NULL)
                                            <td>    
                                                @if(($abs->date == $date_now) AND ($time_now >= $abs->start_time) AND ($time_now <= $abs->time_due))                                       
                                                 <a href="#"  data-toggle="modal" data-target="#isiAbsen{{$abs->id}}">Submit Attendance</a></td>
                                                 @else
                                                 ?</td>
                                                 @endif
                                            @else
                                            <td>{{$abs->status}}
                                            @endif
                                        </tr>
                                        <div class="modal fade" id="isiAbsen{{$abs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="ion-ios-close"></span>
										  </button>
										</div>
										<div class="modal-body p-4 py-5 p-md-5">
											<h3 class="text-center mb-3">Submit Attendance</h3>
											<form action="/absensi/updateUser/{{$abs->id}}" method="POST" class="signup-form">
                                            {{ csrf_field() }} 
                                            @method('PUT')
                                        <div class="form-group mb-2">
                                            <input hidden type="time" name="attend_time" value="{{$time_now}}"> 
                                        <label for="batch" class="text-secondary">Attendance Status</label>
                                            <select name="status" class="custom-select">
                                                <option value="" selected disabled>--Choose Status--</option>
                                                <option value="absent">Absent</option>
                                                <option value="present">Present</option>
                                                <option value="late">Late</option>

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