@extends('admin_layout.main')
@section('title')
<title>USD | Organizer </title>
@endsection
@section('css')
<style>
.wrapper{
width:400px;
}
</style>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">USD Organizers</h1>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Organizer</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Organizer</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="15%">Photo</th>
                                            <th width="15%">Name</th>
                                            <th width="15%">Faculty</th>
                                            <th width="10%">USD Batch</th>
                                            <th width="15%">Position</th>
                                            <th width="10%">Period</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($organizer as $mem)
                                        <tr>
                                            <td><img  src="../user/assets/img/members/{{$mem->users->photo}}" width="70%"></td>
                                            <td>{{$mem->users->name}}</td>
                                            <td>{{$mem->users->faculty}}</td>
                                            <td>{{$mem->users->batch}}</td>
                                            <td>{{$mem->positions->position_name}}</td>
                                            <td>{{$mem->period}}</td>
                                        </tr>
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
											<h3 class="text-center mb-3">Add Organizer</h3>
											<form action="{{route('add_organizer')}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                                @csrf
                                                <div class="wrapper">
                                                <label for="batch" class="text-secondary">USD Member</label>
                                                    <select name="user_id" id="" class="form-control custom-select" required onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
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
                                        <div class="wrapper">
                                                <label for="batch" class="text-secondary">USD Position</label>
                                                    <select name="position" id="" class="form-control custom-select" required onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                                    <option value="" selected disabled>--Choose Position--</option>
                                                    @foreach($position as $pos)
                                                    <option value="{{$pos->id}}">{{$pos->position_name}}</option>
                                                    @endforeach
                                            </select>
                                            @error('position')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                        </div>           
                                        <br>
                                        <div class="form-group mb-2">
											<label for="period" class="text-secondary">Period</label>
												<input type="text" name="period" class="form-control" required placeholder="Period Year (ex: 2020)">
                                                @error('period')
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