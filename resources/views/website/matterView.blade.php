@extends('layout/main')

@section('content')
<div class="section-top-border">
	<div class="row">
		<div class="col-lg-12">
			<blockquote class="generic-blockquote">
            <div class="section-tittle text-center mb-80">
            <h2>Matter</h2>
            </div> 
            <div class="section-tittle text-left mb-80">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12">
                    <!-- single-job-content -->
                    @foreach($file as $key=>$data)
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="#"><img src="{{asset('user/assets/img/matter/'. $data->gambar)}}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <h3 style="font-size:30px;"><b>{!!$data->title!!}</b></h3>
                                <p>{!! $data->description !!}</p>
                                <h4>
                                    <a href = "/files/{{$data->id}}">
                                        <p><img src="{{asset('user/assets/img/logo/download.png')}}" width = "30px" height = "30px" alt = ""> Download</p>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <nav class="blog-pagination justify-content-center d-flex">
                {{$file->links("pagination::bootstrap-4")}}
            </nav>
            </blockquote>
		</div>
	</div>
</div>
@endsection
<!-- download
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <table border = "1">
        <tr>
            <th>S1</th>
            <th>Title</th>
            <th>Description</th>
            <th>View</th>
            <th>Download</th>
        </tr>
        @foreach($file as $key=>$data)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$data->title}}</td>
            <td>{{$data->description}}</td>
            <td><a href = "/files/{{$data->id}}">View</a></td>
            <td><a href = "/file/download/{{$data->file}}">Download</a></td>
        </tr>
        @endforeach
    </body>
</html>
-->