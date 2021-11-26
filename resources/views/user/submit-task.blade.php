@extends('admin_layout.main')
@section('konten')
 <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Submit Task</h6>
    </div>
     <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <div class="box">
                        <form action="/task_user/update/{{$task->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }} 
                            <div class="col">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm">
                                        <input type="date" class="form-control" value="{{$date_now}}" name="date" placeholder="Nama Pengirim">
                                        @error('date')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror
                                    </div>
                                    <div class="col-sm">
                                        <label for="time" class="col-md-auto col-form-label">Time</label>
                                    </div>
                                    <div class="col-sm">
                                        <input type="time" class="form-control" value="{{$time_now}}" name="time">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="Lampiran" class="col-sm-2 col-form-label"><span class="text-danger">*</span>Task File</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file" name="file" onchange="return validasiFile()">
                                    </div>
                                    <br>
                                    <br>
                                </div>
                                <br>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    <label for="keterangan" class="text-danger"><i>*Only accept pdf file</i> </label>

                                    </div>
                                    <div class="col-sm-0">
                                        <a href="letter_in"  class="btn btn-danger" onclick="Cancel(event);" >Cancel</a>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>               
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
     </div>
</div>
</div>
                         <!-- form start -->



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
function Cancel(event) {
    event.preventDefault();

    Swal.fire({
    title: 'Are you sure?',
    text: "Changes you made won't be saved",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Accept'
    }).then((result) => {
    if (result.value) {
        document.location.href = "/letter_in";
    }else{
        event.preventDefault();
        return false;
    }
    })
}
</script>

<script>
    function validasiFile(){
    var inputFile = document.getElementById('file');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.pdf)$/i;
    if(!ekstensiOk.exec(pathFile)){
      Swal.fire({
      title: 'Hanya menerima file berekstensi pdf!',
      icon: 'warning',
      width: 450,
      padding: '2em',
      backdrop: `
        rgba(0,0,123,0.4)
        center top
        no-repeat
      `
        })
        inputFile.value = '';
        return false;
    }else{
        //Pratinjau gambar
        return true;
    }
}
  
</script>


@endsection