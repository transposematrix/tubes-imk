@extends('admin_layout.main')
@section('title')
<title>USD | Article</title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Article</h1>
                    <a href="/tambah_article" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambahkan Article</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of All Articles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%">Thumbnail</th>
                                            <th width="20%">Title</th>
                                            <th width="15%">Excerpt</th>
                                            <th width="15%">Date</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($articles as $art)
                                        <tr>
                                            <td>
                                            <img  src="../user/assets/img/blog/{{$art->photo}}" height="100" width="100">
                                            </td>
                                            <td>{{$art->title}}</td>
                                            <td>{{$art->excerpt}}</td>
                                            <td>{{$art->publicate_date}}</td>
                                            <td>
                                            <a href="#" class="btn btn-primary btn-sm rounded-0">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/article/edit/{{$art->id}}" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm delete-confirm" href="/article/hapus/{{$art->id}}">
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
</script>
@endsection

