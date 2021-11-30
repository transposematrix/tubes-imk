@extends('admin_layout.main')
@section('title')
<title>USD | Letter Out </title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Letter Out</h1>
                    <a href="/new-letter-out" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">New Letter Out</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of All Letter Out</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="15%">No. Surat</th>
                                            <th width="15%">Destination</th>
                                            <th width="15%">Letter Date</th>
                                            <th width="15%">About</th>
                                            <th width="15%">File</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($letters as $letter)
                                        <tr>
                                            <td>{{$letter->no_surat}}</td>
                                            <td>{{$letter->penerima}}</td>
                                            <td>{{$letter->tanggal_surat}}</td>
                                            <td>{{$letter->perihal}}</td>
                                            <td>
                                            <a href="/letter_out/download/{{$letter->lampiran}}" class="btn btn-primary btn-sm rounded-0">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="/letter_out/edit/{{$letter->id}}" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/letter_out/hapus/{{$letter->id}}" class="btn btn-danger btn-sm rounded-0 delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            </td>
                                        </tr>
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
@endsection