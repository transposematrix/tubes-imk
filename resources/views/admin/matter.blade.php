@extends('admin_layout.main')
@section('title')
<title>USD | Matter </title>
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Matter</h1>
                    <a href="{{route('addmatter')}}" class="mb-4 btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add New Matter</span>
                            </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of All Matter</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%">Thumbnail</th>
                                            <th width="20%">Title</th>
                                            <th width="15%">Description</th>
                                            <th width="15%">Date</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($matters as $mat)
                                        <tr>
                                            <td>
                                            <img  src="../user/assets/img/matter/{{$mat->gambar}}" height="100" width="100">
                                            </td>
                                            <td>{{$mat->title}}</td>
                                            <td>{{$mat->description}}</td>
                                            <td>{{$mat->created_at}}</td>
                                            <td>
                                            <a href="/download/{{$mat->matter}}" class="btn btn-primary btn-sm rounded-0">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="/matters/edit/{{$mat->id}}" class="btn btn-success btn-sm rounded-0">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/matters/hapus/{{$mat->id}}" class="btn btn-danger btn-sm rounded-0 delete-confirm">
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