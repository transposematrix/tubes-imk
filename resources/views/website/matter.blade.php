@extends('layout/main')

@section('content')
<div class="section-top-border">
	<div class="row">
		<div class="col-lg-12">
			<blockquote class="generic-blockquote">
            <div class="section-tittle text-center mb-80">
            <h2>Matter</h2>
            </div> 
            <form action = "/files" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type = "text" name = "title" placeholder = "title">
                <input type = "text" name = "photo" placeholder = "photo">
                <input type = "text" name = "description" placeholder = "description">
                <input type = "file" name = "file">
                <input type = "submit" value = "Submit">
            </form>
            </blockquote>
		</div>
	</div>
</div>
@endsection