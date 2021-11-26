@extends('admin_layout.main')
@section('konten')
 <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add New</h6>
    </div>
     <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <div class="box">
                        <form action="/report/update/{{$report->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }} 
                            <div class="col">
                                <div class="form-group row">
                                    <label for="Creator" class="col-sm-2 col-form-label">Creator</label>
                                    <div class="col-sm">
                                      <input type="text" class="form-control" name="creator" value="{{$report->creator}}" placeholder="Creator's Name">
                                      @error('creator')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror
                                    </div>
                                    <div class="col-sm">
                                        <label for="Tanggal" class="col-md-auto col-form-label">Report's Date</label>
                                    </div>
                                    <div class="col-sm">
                                        <input type="date" class="form-control" name="tgl_laporan" value="{{$report->tgl_laporan}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="event" class="col-sm-2 col-form-label">Event</label>
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="event" value="{{$report->event}}" placeholder="Event's Name">
                                        @error('event')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror
                                    </div>
                                    <div class="col-sm">
                                        <label for="Tanggal_Surat" class="col-md-auto col-form-label">Legalization Date </label>
                                    </div>
                                    <div class="col-sm">
                                        <input type="date" class="form-control" value="{{$report->tgl_pengesahan}}" name="tgl_pengesahan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Perihal" class="col-sm-2 col-form-label">About</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="perihal" value="{{$report->perihal}}" placeholder="About the report">
                                        @error('perihal')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <label for="Lampiran" class="col-sm-2 col-form-label">Report's File</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file" name="file" onchange="return validasiFile()">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-0">
                                        <a href="reports"  class="btn btn-danger" onclick="Cancel(event);" >Cancel</a>
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