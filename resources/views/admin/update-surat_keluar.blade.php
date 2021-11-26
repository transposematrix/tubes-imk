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
                        <form action="/letter_out/update/{{$letter->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }} 
                            <div class="col">
                                <div class="form-group row">
                                    <label for="Nomor_surat" class="col-sm-2 col-form-label">Nomor</label>
                                    <div class="col-sm">
                                      <input type="text" class="form-control" name="nomor" placeholder="Nomor Surat" value="{{$letter->no_surat}}">
                                      @error('nomor')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror
                                    </div>
                                    <div class="col-sm">
                                        <label for="Tanggal" class="col-md-auto col-form-label">Tanggal Surat</label>
                                    </div>
                                    <div class="col-sm">
                                        <input type="date" class="form-control" value="{{$letter->tanggal_surat}}" name="tgl_surat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Pengirim" class="col-sm-2 col-form-label">Penerima</label>
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="penerima" value="{{$letter->penerima}}" placeholder="Nama Penerima">
                                        @error('penerima')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="klasifikasi" class="col-sm-2 col-form-label">Klasifikasi Surat</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="klasifikasi">
                                            @if($letter->klasifikasi == 'Pribadi')
                                            <option value="" disabled>--Klasifikasi Surat--</option>
                                            <option value="Pribadi" selected>Pribadi</option>
                                            <option value="Umum">Umum</option>
                                            @elseif($letter->klasifikasi =='Umum')
                                            <option value="" disabled>--Klasifikasi Surat--</option>
                                            <option value="Pribadi">Pribadi</option>
                                            <option value="Umum" selected>Umum</option>
                                            @else
                                            <option value="" selected disabled>--Klasifikasi Surat--</option>
                                            <option value="Pribadi">Pribadi</option>
                                            <option value="Umum" >Umum</option>
                                            @endif
                                        </select>
                                        @error('klasifikasi')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Perihal" class="col-sm-2 col-form-label">Perihal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="perihal" value="{{$letter->perihal}}" placeholder="Perihal Surat">
                                        @error('perihal')
                                        <small class="text-danger">{{$message}}</small>
                                       @enderror
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <label for="Lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file" name="file" onchange="return validasiFile()">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-10"></div>
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