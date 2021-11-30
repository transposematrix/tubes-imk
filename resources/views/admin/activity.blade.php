@extends('admin_layout.main')
@section('title')
<title>USD | Regular Training</title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Regular Training</h1>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add New Photo</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of All Photor</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($activity as $act)
                                        <tr>
                                            <td>
                                            <img  src="../user/assets/img/regularTraining&Gathering/{{$act->photo}}" height="100" width="100">
                                            </td>
                                            <td>{{$act->title}}</td>
                                            <td>
                                            <a href="" data-toggle="modal" data-target="#updatePhoto{{$act->id}}" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/rg/hapus/{{$act->id}}" class="btn btn-danger btn-sm rounded-0 delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="updatePhoto{{$act->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									        <div class="modal-dialog modal-dialog-centered" role="document">
									          <div class="modal-content">
										        <div class="modal-header">
										            <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
											        <span aria-hidden="true" class="ion-ios-close"></span>
										            </button>
										        </div>
										    <div class="modal-body p-4 py-5 p-md-5">
											    <h3 class="text-center mb-3">Update Photo</h3>
											    <form action="/rg/update/{{$act->id}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                                @csrf
                                                @method('PUT')
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Title</label>
													<input type="text" name="title" accept="image/*" value="{{$act->title}}" class="form-control" placeholder="Title">
                                                    @error('title')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
												<div class="form-group mb-2">
													<label for="tgl" class="text-secondary">Photo</label>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput" onchange="">
                                                        <div id="pratinjauGambar"></div>
                                                    </div>
                                                    <br>
                                                    <input type="file" name="photo" id="gambar" value="{{$act->photo}}" onchange="return validasiFile()">
                                                    @error('photo')
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
											<h3 class="text-center mb-3">Add Photo</h3>
											<form action="{{route('add_rg')}}" method="POST" enctype="multipart/form-data" class="signup-form">
                                                @csrf
												<div class="form-group mb-2">
													<label for="name" class="text-secondary">Title</label>
													<input type="text" name="title" accept="image/*" class="form-control" placeholder="Title">
                                                    @error('title')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
												</div>
												<div class="form-group mb-2">
													<label for="tgl" class="text-secondary">Photo</label>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput" onchange="">
                                                        <div id="pratinjauGambar"></div>
                                                    </div>
                                                    <br>
                                                    <input type="file" name="photo" id="gambar" onchange="return validasiFile()">
                                                    @error('photo')
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