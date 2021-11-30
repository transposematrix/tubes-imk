@extends('layout/main')

@section('content')
<div class="section-top-border">
    <div class="row justify-content-center">
		<div class="col-lg-9 col-md-12">
			<blockquote class="generic-blockquote">
            <div class="section-tittle mb-35">
            <h2 align = "center">How to Join Us?</h2>
            <p align = "justify">Holla!</p>
            <p align = "justify">Unfortunately, this year's registration has closed. But don't worry because we will be opening USD registrations in the near future. Moreover, We will spill some info so that you can prepare yourself for the next registration.</p>
            @foreach($registrations as $registration)
            <h3 style="color:#09cc7f"><i>{{$registration->title}}</i></h3>
            <p align = "justify">{!!$registration->content!!}</p>
            @endforeach
            <p align = "justify">For further details regarding the recruitment process, please refer to the information updated on our social media (Instagram: @usudebate and YouTube: USU Society for Debating) or you can simply get in touch with our contact person.</p>
            <p align = "justify"><b>SEE U, FUTURE DEBATERS! </b></p>
            </div>
            </blockquote>
		</div>
	</div>
</div>
@endsection