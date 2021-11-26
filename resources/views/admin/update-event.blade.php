@extends('admin_layout.main')
@section('konten')
 <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add Event</h6>
    </div>
     <div class="card-body">
         <div class="row">
             <div class="card-body">
                        <div class="box">
                         <!-- form start -->
                            <form  action="/event/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                {{ method_field('PUT') }} 
                                <div class="box-body">
                                     <div class="form-group">
                                        <label for="judul">Title</label>
                                             <input type="text" placeholder="Enter Title here" name="judul" id="judul" value="{{$event->title}}" class="form-control">
                                             @error('judul')
                                             <small class="text-danger">{{$message}}</small>
                                             @enderror
                                             </div>
                                    <div class="form-group">
                                        <label for="content">Description</label>
                                         <textarea name="content" id="content_article" rows="10" class="form-control">{{$event->content}}</textarea>
                                         @error('content')
                                         <smal class="text-danger">{{$message}}</small>
                                         @enderror
                                    </div>
                                    </div>
                                        <div class="box-footer">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="box-header with-border">
                                        <label for="created_at">Publish date</label>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input for="created_at" type="text" class="form-control"  value="{{date('Y-m-d H:i:s')}}" disabled>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <label for="thumbnail">Thumbnail</label>
                                        </div>
                                        <div class="card-body">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div id="pratinjauGambar">
                                                </div>
                                                </div>
                                                    <input type="file" name="gambar" id="gambar" onchange="return validasiFile()">
                                                    </span>
                                                    <button type="button" class="btn btn-default fileinput-exists" data-dismiss="fileinput" onclick="hapusGambar()">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </form>
                            <!-- ./row -->
                            </section>
                            <!-- /.content -->
                        
                <!-- /.container-fluid -->
                
@endsection
@section('aksi')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content_article' ) )
        .catch( error => {
            console.error( error );
        } );
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