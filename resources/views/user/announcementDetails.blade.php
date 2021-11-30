@extends('layout/main')

@section('content')
      <!--? Blog Area Start -->
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
                  <div class="single-post">
                     <div class="feature-img">
                        <h3 style="font-size:30px;"><b>{{$announcement->title}}</b></h3>  
                        <ul class="blog-info-link mt-3 mb-4">
                           <li><a href="#"><i class="fa fa-calendar"></i>{{date('d F Y',strtotime($announcement->created_at))}}</a></li>
                        </ul>
                     </div>
                     <p><img class="img-fluid" src="../images/{{$announcement->gambar}}" width="30%" alt=""></p>
                     <div class="blog_details">
                           {!!$announcement->content!!}
                     </div>
                  </div>
                  </div>

                  </div>
               </div>
            </div>
      </section>
      <!-- Blog Area End -->
@endsection