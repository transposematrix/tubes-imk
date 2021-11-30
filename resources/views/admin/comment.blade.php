@extends('admin_layout.main')
@section('title')
<title>USD | Comment</title>
@endsection
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Comment</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of All Comments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%">Name</th>
                                            <th width="20%">Email</th>
                                            <th width="15%">Comment</th>
                                            <th width="15%">Article</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($comments as $art)
                                        <tr>
                                            <td>
                                                {{$art->name}}
                                            </td>
                                            <td>{{$art->email}}</td>
                                            <td>{{$art->comment}}</td>
                                            <td>{{$art->blogs->title}}</td>
                                            <td>
                                            <a href="/articleDetails/{{$art->blog_id}}" class="btn btn-primary btn-sm rounded-0">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm delete-confirm" href="/comment/hapus/{{$art->id}}">
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

