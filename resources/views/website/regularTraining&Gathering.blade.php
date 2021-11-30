@extends('layout/main')

@section('content')
<div class="section-top-border">
    <div class="row justify-content-center">
		<div class="col-lg-10 col-md-12">
            <div class="section-tittle text-center mb-80">
            <h2>Regular Training</h2>
            <div class="row">
                @foreach($regulartrainings as $regular)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="../user/assets/img/regularTraining&Gathering/{{$regular->photo}}" witdh = "150px"alt="">
                            
                        </div>
                        <div class="team-caption">
                        <p><b>{{$regular->title}}</b></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <h2>Gathering</h2>
            <div class="row">
                @foreach($gatherings as $gathering)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="../user/assets/img/regularTraining&Gathering/{{$gathering->photo}}" witdh = "150px"alt="">
                        </div>
                        <div class="team-caption">
                            <p><b>{{$gathering->title}}</b></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection