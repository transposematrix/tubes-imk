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
                    <li><a href="#">2021</a></li>
                    <li><a href="#">2020</a></li>
                </ul>

<ul class="uk-switcher uk-margin">
    <li>
        <h2>NOVED 2021</h2>
        <div class="row justify-content-center">
            @foreach($noved21s as $noved21)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$noved21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$noved21->users->name}}</h3>
                        <p>{{$noved21->users->faculty}}<br>({{$noved21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$noved21->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Aurgumentum Open 2021</h2>
        <div class="row justify-content-center">
            @foreach($aurgumentum_open21s as $aurgumentum_open21)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$aurgumentum_open21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$aurgumentum_open21->users->name}}</h3>
                        <p>{{$aurgumentum_open21->users->faculty}}<br>({{$aurgumentum_open21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$aurgumentum_open21->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>MBPDO 2021</h2>
        <div class="row justify-content-center">
            @foreach($mbpdo21s as $mbpdo21)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$mbpdo21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$mbpdo21->users->name}}</h3>
                        <p>{{$mbpdo21->users->faculty}}<br>({{$mbpdo21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$mbpdo21->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>SAVEDC 2021</h2>
        <div class="row justify-content-center">
            @foreach($savedc21s as $savedc21)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$savedc21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$savedc21->users->name}}</h3>
                        <p>{{$savedc21->users->faculty}}<br>({{$savedc21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$savedc21->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>AEO 2021</h2>
        <div class="row justify-content-center">
            @foreach($aeo21s as $aeo21)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$aeo21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$aeo21->users->name}}</h3>
                        <p>{{$aeo21->users->faculty}}<br>({{$aeo21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$aeo21->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>ProAms 2021</h2>
        <div class="row justify-content-center">
            @foreach($proams21s as $proams21)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$proams21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$proams21->users->name}}</h3>
                        <p>{{$proams21->users->faculty}}<br>({{$proams21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$proams21->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Founder's Trophy 2021</h2>
        <div class="row justify-content-center">
            @foreach($founder_trophy21s as $founder_trophy21)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$founder_trophy21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$founder_trophy21->users->name}}</h3>
                        <p>{{$founder_trophy21->users->faculty}}<br>({{$founder_trophy21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$founder_trophy21->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>IVED 2021</h2>
        <div class="row justify-content-center">
            @foreach($ived21s as $ived21)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$ived21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$ived21->users->name}}</h3>
                        <p>{{$ived21->users->faculty}}<br>({{$ived21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$ived21->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </li>
    <li>
        <h2>IDEA 2020</h2>
        <div class="row justify-content-center">
            @foreach($idea20s as $idea20)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$idea20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$idea20->users->name}}</h3>
                        <p>{{$idea20->users->faculty}}<br>({{$idea20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$idea20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Love Comp 2020</h2>
        <div class="row justify-content-center">
            @foreach($love_comp20s as $love_comp20)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$love_comp20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$love_comp20->users->name}}</h3>
                        <p>{{$love_comp20->users->faculty}}<br>({{$love_comp20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$love_comp20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>JOVED 2020</h2>
        <div class="row justify-content-center">
            @foreach($joved20s as $joved20)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$joved20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$joved20->users->name}}</h3>
                        <p>{{$joved20->users->faculty}}<br>({{$joved20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$joved20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>TACES 2020</h2>
        <div class="row justify-content-center">
            @foreach($taces20s as $taces20)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$taces20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$taces20->users->name}}</h3>
                        <p>{{$taces20->users->faculty}}<br>({{$taces20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$taces20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>ATMA Open 2020</h2>
        <div class="row justify-content-center">
            @foreach($atma_open20s as $atma_open20)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$atma_open20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$atma_open20->users->name}}</h3>
                        <p>{{$atma_open20->users->faculty}}<br>({{$atma_open20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$atma_open20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>UIDO 2020</h2>
        <div class="row justify-content-center">
            @foreach($uido20s as $uido20)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$uido20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$uido20->users->name}}</h3>
                        <p>{{$uido20->users->faculty}}<br>({{$uido20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$uido20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>NEWBIES 2020</h2>
        <div class="row justify-content-center">
            @foreach($newbies20s as $newbies20)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$newbies20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$newbies20->users->name}}</h3>
                        <p>{{$newbies20->users->faculty}}<br>({{$newbies20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$newbies20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Alsa E-Comp UI 2020</h2>
        <div class="row justify-content-center">
            @foreach($alsa20s as $alsa20)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$alsa20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$alsa20->users->name}}</h3>
                        <p>{{$alsa20->users->faculty}}<br>({{$alsa20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$alsa20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Aurgumentum Open 2020</h2>
        <div class="row justify-content-center">
            @foreach($aurgumentum20s as $aurgumentum20)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$aurgumentum20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$aurgumentum20->users->name}}</h3>
                        <p>{{$aurgumentum20->users->faculty}}<br>({{$aurgumentum20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$aurgumentum20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>KDMI 2020</h2>
        <div class="row justify-content-center">
            @foreach($kdmi20s as $kdmi20)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$kdmi20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$kdmi20->users->name}}</h3>
                        <p>{{$kdmi20->users->faculty}}<br>({{$kdmi20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$kdmi20->group_name!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>NUDC 2020</h2>
        <div class="row justify-content-center">
            @foreach($nudc20s as $nudc20)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$nudc20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$nudc20->users->name}}</h3>
                        <p>{{$nudc20->users->faculty}}<br>({{$nudc20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$nudc20->group_name!!}</div>
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