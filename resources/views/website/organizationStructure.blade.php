@extends('layout/main')

@section('content')
    <!--Uikit-->
    <link rel="stylesheet" href="{{asset('uikit/css/uikit.css')}}">
    <link rel="stylesheet" href="{{asset('uikit/css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('uikit/css/uikit-rtl.css')}}">
    <link rel="stylesheet" href="{{asset('uikit/css/uikit-rtl.min.css')}}">
    
<div class="section-top-border">
    <div class="row justify-content-center">
		<div class="col-lg-9 col-md-12">
            <div class="section-tittle text-center mb-80">
                <ul uk-tab>
                    <li><a href="#">2021-2022</a></li>
                    <li><a href="#">2020-2021</a></li>
                    <li><a href="#">2019-2020</a></li>
                </ul>

<ul class="uk-switcher uk-margin">
    <li>
        <h2>Organizers</h2>
        <div class="row justify-content-center">
            @foreach($tahun21s as $tahun21)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$tahun21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$tahun21->users->name}}</h3>
                        <p>{{$tahun21->users->faculty}}<br>({{$tahun21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$tahun21->positions->position_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </li>
    <li>
        <h2>Organizers</h2>
        <div class="row justify-content-center">
            @foreach($tahun20s as $tahun20)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$tahun20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$tahun20->users->name}}</h3>
                        <p>{{$tahun20->users->faculty}}<br>({{$tahun20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$tahun20->positions->position_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </li>
    <li>
        <h2>Organizers</h2>
        <div class="row justify-content-center">
            @foreach($tahun19s as $tahun19)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$tahun19->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$tahun19->users->name}}</h3>
                        <p>{{$tahun19->users->faculty}}<br>({{$tahun19->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$tahun19->positions->position_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </li>
</ul>
            </div>
		</div>
	</div>
</div>

    <!--uikit-->
    <script src="{{asset('uikit/js/uikit.js')}}"></script>
    <script src="{{asset('uikit/js/uikit.min.js')}}"></script>
    <script src="{{asset('uikit/js/uikit-icons.js')}}"></script>
    <script src="{{asset('uikit/js/uikit-icons.min.js')}}"></script>
@endsection