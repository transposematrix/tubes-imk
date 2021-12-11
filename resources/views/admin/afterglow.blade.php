@extends('admin_layout.main')
@section('title')
<title>USD | Afterglow</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Afterglow</h1>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add New Data</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of All Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Faculty</th>
                                            <th>Batch</th>
                                            <th>Photo</th>
                                            <th>Group Name</th>
                                            <th>Competition</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($afterglow as $ag)
                                        <tr>
                                            <td>{{$ag->users->name}}</td>
                                            <td>{{$ag->users->faculty}}</td>
                                            <td>{{$ag->users->batch}}</td>
                                            <td>
                                            <img  src="../user/assets/img/members/{{$ag->users->photo}}" height="100" width="100">
                                            </td>
                                            <td>{{$ag->group_name}}</td>
                                            <td>{{$ag->competitions->competition_name}}</td>
                                            <td>
                                            <a href="" data-toggle="modal" data-target="#updatePhoto{{$ag->id}}" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/ag/hapus/{{$ag->id}}" class="btn btn-danger btn-sm rounded-0 delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="updatePhoto{{$ag->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									        <div class="modal-dialog modal-dialog-centered" role="document">
									          <div class="modal-content">
										        <div class="modal-header">
										            <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
											        <span aria-hidden="true" class="ion-ios-close"></span>
										            </button>
										        </div>
										    <div class="modal-body p-4 py-5 p-md-5">
											    <h3 class="text-center mb-3">Update Data</h3>
											    <form action="/ag/update/{{$ag->id}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="wrapper">
                                                <label for="batch" class="text-secondary">USD Member</label>
                                                    <select name="user_id" id="" class="form-control custom-select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                                    
                                                    @foreach($user as $us)
                                                    <option value="{{$us->id}}" {{ $ag['users_id'] == $us['id'] ? 'selected="selected"' : '' }}>{{$us->name}}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('user')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                        </div>           
                                        <br>                            
                                        <div class="wrapper">
                                                <label for="batch" class="text-secondary">USD Competition</label>
                                                    <select name="competition" id="" class="form-control custom-select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                                    
                                                    @foreach($competition as $com)
                                                    <option value="{{$com->id}}" {{ $ag['competitions_id'] == $com['id'] ? 'selected="selected"' : '' }}>{{$com->competition_name}}</option>
                                                    @endforeach
                                            </select>
                                            @error('competition')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                        </div>           
                                        <br>
                                        <div class="form-group mb-2">
											<label for="group_name" class="text-secondary">Group Name</label>
												<input type="text" name="group_name" value="{{$ag->group_name}}" class="form-control" placeholder="Group Name">
                                                @error('group_name')
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
											<h3 class="text-center mb-3">Add Afterglow</h3>
											<form action="{{route('add_ag')}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                                @csrf
                                                <div class="wrapper">
                                                <label for="batch" class="text-secondary">USD Member</label>
                                                    <select name="user_id" id="" class="form-control custom-select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
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
                                                <label for="batch" class="text-secondary">USD Competition</label>
                                                    <select name="competition" id="" class="form-control custom-select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                                                    <option value="" selected disabled>--Choose Competition--</option>
                                                    @foreach($competition as $com)
                                                    <option value="{{$com->id}}">{{$com->competition_name}}</option>
                                                    @endforeach
                                            </select>
                                            @error('competition')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                        </div>           
                                        <br>
                                        <div class="form-group mb-2">
											<label for="group_name" class="text-secondary">Group Name</label>
												<input type="text" name="group_name" class="form-control" placeholder="Group Name" required>
                                                @error('group_name')
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
@include('sweetalert::alert')
@endsection
@section('aksi')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.delete-confirm').on('click',function(e){
        e.preventDefault();
        const href=$(this).attr('href')

        Swal.fire({
        title: 'Are you sure?',
        text: "The data won't be reverted anymore",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
        }).then((result) => {
        if (result.value) {
             document.location.href = href;
        }
        })

    })
    </script>
<script>
    function validasiFile(){
    var inputFile = document.getElementById('gambar');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!ekstensiOk.exec(pathFile)){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Hanya menerima gambar berekstensi jpg/jpeg/png/gif!',
        })

        inputFile.value = '';
        return false;
    }else{
        //Pratinjau gambar
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('pratinjauGambar').innerHTML = '<img src="'+e.target.result+'" width="200px" height="150px"/>';
            };
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
}

$('#gambar').change(validasFile);
function hapusGambar () {
    $("#pratinjauGambar").empty()
    $("#gambar").val("");
};

</script>

@endsection