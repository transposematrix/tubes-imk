@extends('layout/main')

@section('content')
    <!--Uikit-->
    <link rel="stylesheet" href="{{asset('uikit/css/uikit.css')}}">
    <link rel="stylesheet" href="{{asset('uikit/css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('uikit/css/uikit-rtl.css')}}">
    <link rel="stylesheet" href="{{asset('uikit/css/uikit-rtl.min.css')}}">
    
<div class="section-top-border">
    <div class="row justify-content-center">
		<div class="col-lg-10 col-md-12">
            <div class="section-tittle text-center mb-80">
                <ul uk-tab>
                    <li><a href="#">2021</a></li>
                    <li><a href="#">2020</a></li>
                    <li><a href="#">2019</a></li>
                    <li><a href="#">2018</a></li>
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
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$noved21->champion_description!!}</div>
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
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$aurgumentum_open21->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Alek Gadang Anak Teknik (AGAT) 2021</h2>
        <div class="row justify-content-center">
            @foreach($agat21s as $agat21)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$agat21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$agat21->users->name}}</h3>
                        <p>{{$agat21->users->faculty}}<br>({{$agat21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$agat21->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>USU Open 2021</h2>
        <div class="row justify-content-center">
            @foreach($usu_open21s as $usu_open21)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$usu_open21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$usu_open21->users->name}}</h3>
                        <p>{{$usu_open21->users->faculty}}<br>({{$usu_open21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$usu_open21->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Purpose UPH 2021</h2>
        <div class="row justify-content-center">
            @foreach($purpose_uph21s as $purpose_uph21)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$purpose_uph21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$purpose_uph21->users->name}}</h3>
                        <p>{{$purpose_uph21->users->faculty}}<br>({{$purpose_uph21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$purpose_uph21->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>AEO 2021</h2>
        <div class="row justify-content-center">
            @foreach($aeo21s as $aeo21)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$aeo21->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$aeo21->users->name}}</h3>
                        <p>{{$aeo21->users->faculty}}<br>({{$aeo21->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$aeo21->champion_description!!}</div>
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
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$ived21->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </li>
    <li>
        <h2>Melbourne Mini 2020</h2>
        <div class="row justify-content-center">
            @foreach($melbourne_mini20s as $melbourne_mini20)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$melbourne_mini20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$melbourne_mini20->users->name}}</h3>
                        <p>{{$melbourne_mini20->users->faculty}}<br>({{$melbourne_mini20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$melbourne_mini20->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>BDRT 2020</h2>
        <div class="row justify-content-center">
            @foreach($bdrt20s as $bdrt20)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$bdrt20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$bdrt20->users->name}}</h3>
                        <p>{{$bdrt20->users->faculty}}<br>({{$bdrt20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$bdrt20->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>IDEA 2020</h2>
        <div class="row justify-content-center">
            @foreach($idea20s as $idea20)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$idea20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$idea20->users->name}}</h3>
                        <p>{{$idea20->users->faculty}}<br>({{$idea20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$idea20->champion_description!!}</div>
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
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$love_comp20->champion_description!!}</div>
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
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$alsa20->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Meme Seger Open 2020</h2>
        <div class="row justify-content-center">
            @foreach($meme20s as $meme20)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$meme20->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$meme20->users->name}}</h3>
                        <p>{{$meme20->users->faculty}}<br>({{$meme20->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$meme20->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </li>
    <li>
        <h2>NUDC 2019</h2>
        <div class="row justify-content-center">
            @foreach($nudc19s as $nudc19)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$nudc19->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$nudc19->users->name}}</h3>
                        <p>{{$nudc19->users->faculty}}<br>({{$nudc19->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$nudc19->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>MBPDO 2019</h2>
        <div class="row justify-content-center">
            @foreach($mbpdo19s as $mbpdo19)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$mbpdo19->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$mbpdo19->users->name}}</h3>
                        <p>{{$mbpdo19->users->faculty}}<br>({{$mbpdo19->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$mbpdo19->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>SEO 2019</h2>
        <div class="row justify-content-center">
            @foreach($seo19s as $seo19)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$seo19->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$seo19->users->name}}</h3>
                        <p>{{$seo19->users->faculty}}<br>({{$seo19->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$seo19->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </li>
    <li>
        <h2>Medan Pro Am Debate Open 2018</h2>
        <div class="row justify-content-center">
            @foreach($pro18s as $pro18)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$pro18->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$pro18->users->name}}</h3>
                        <p>{{$pro18->users->faculty}}<br>({{$pro18->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$pro18->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>National University Debating Competition 2018</h2>
        <div class="row justify-content-center">
            @foreach($nudc18s as $nudc18)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$nudc18->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$nudc18->users->name}}</h3>
                        <p>{{$nudc18->users->faculty}}<br>({{$nudc18->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$nudc18->champion_description!!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <h2>Medan Asian Parliamentary Debate Open 2018</h2>
        <div class="row justify-content-center">
            @foreach($mapdo18s as $mapdo18)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                    <img src="../user/assets/img/members/{{$mapdo18->users->photo}}" witdh = "150px"alt="">
                    </div>
                    <div class="team-caption">
                        <h3>{{$mapdo18->users->name}}</h3>
                        <p>{{$mapdo18->users->faculty}}<br>({{$mapdo18->users->batch}})</p>
                        <div class="badge badge-pill d-flex flex-column text-success bg-info-alt">{!!$mapdo18->champion_description!!}</div>
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