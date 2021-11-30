@extends('layout/main')

@section('content')
<div class="section-top-border">
    <div class="row justify-content-center">
		<div class="col-lg-9 col-md-12">
			<blockquote class="generic-blockquote">
            <div class="section-tittle text-center mb-80">
            <h2>Frequently Asked Questions</h2>
            </div>
            <div class="section-tittle mb-35">
            @foreach($faq as $faq)
                <h3 style="color:#09cc7f"><i>{{$faq->question}}</i></h3>
                <p>{{$faq->answer}}</p>
            @endforeach
            </div>
            </blockquote>
		</div>
	</div>
</div>
@endsection