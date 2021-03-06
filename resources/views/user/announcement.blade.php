@extends('admin_layout.main')
@section('title')
<title>USD | Announcement </title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Announcement</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of All Announcement</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%">Thumbnail</th>
                                            <th width="20%">Title</th>
                                            <th width="15%">Publish Date</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($announcement as $an)
                                        <tr>
                                            <td>
                                            <img  src="../images/{{$an->gambar}}" height="100" width="100">
                                            </td>
                                            <td>{{$an->title}}</td>
                                            <td>{{$an->created_at->format('Y-m-d')}}</td>
                                            <td>
                                            <a href="/announcementDetails/{{$an->id}}" class="btn btn-primary btn-sm rounded-0">
                                                <i class="fas fa-eye"></i>
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