@extends('layout/main')

@section('content')
      <!--? Blog Area Start -->
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 posts-list">
                  <div class="single-post">
                     <div class="feature-img">
                        <p><img class="img-fluid" src="../user/assets/img/blog/{{$articles->photo}}" alt=""></p>
                        <h3 style="font-size:30px;"><b>{{$articles->title}}</b></h3>  
                        <ul class="blog-info-link mt-3 mb-4">
                           <li><a href="#"><i class="fa fa-calendar"></i>{{date('d F Y',strtotime($articles->publicate_date))}}</a></li>
                        </ul>
                     </div>
                     <div class="blog_details">
                           {!!$articles->article!!}
                     </div>
                  </div>
                  </div>
                  <div class="col-lg-4">
                  <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <form action="{{route('search')}}">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder='Search Article...' method="GET" id ="search" name="search"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Search Article...'">
                                            <div class="input-group-append">
                                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                            </aside>
                           <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title" style="color: #2d2d2d;">Another Posts</h3>
                                @foreach($sidebars as $sidebars)
                                <div class="media post_item">
                                    <img src="../user/assets/img/blog/{{$sidebars->photo}}" width = "110px" alt="post">
                                    <div class="media-body">
                                        <a href="{{route('articlePost', $sidebars->id)}}">
                                            <h3 style="color: #2d2d2d;">{!!$sidebars->sidebar_title!!}</h3>
                                        </a>
                                        <p>{{date('d F Y',strtotime($sidebars->publicate_date))}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </aside>
                  </div>
               </div>
                  </div>
                  <div class="comments-area">
                     <h4>Comments</h4>
                     <div class="comment-list">
                        @foreach($articles->comment()->get() as $comment)
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="{{asset('user/assets/img/blog/user.png')}}" alt="">
                              </div>
                              <div class="desc">
                                 <p class="comment">
                                 {{$comment->comment}}
                                 </p>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <a href="#">{{$comment->name}}</a>
                                       </h5>
                                       <p class="date">{{$comment->created_at}}</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
                        @endforeach
                     </div>
                  </div>
                  <div class="col-lg-8 posts-list">
                  <div class="comment-form">
                     <h4>Leave a Reply</h4>
                     <form class="form-contact comment_form" action="{{route('article.comment.store', $articles)}}" method="POST" id="commentForm">
                     {{ csrf_field() }} 
                     <input type="hidden" name="blog_id" id="blog_id" value="{{ $articles->id }}" />
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                    placeholder="Write Comment"></textarea>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="name" id="name" type="text" placeholder="Name" required>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="email" id="email" type="email" placeholder="Email" required>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" value = "Post Comment" class="button button-contactForm btn_1 boxed-btn">Post Comment</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Blog Area End -->
@endsection