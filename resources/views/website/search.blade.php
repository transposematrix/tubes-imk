@extends('layout/main')

@section('content')
<div class="section-top-border">
	<div class="row">
		<div class="col-lg-12">
			<blockquote class="generic-blockquote">           
            <main>
        <!--? Blog Area Start-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            @foreach($articles as $article)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="../user/assets/img/blog/{{$article->photo}}" alt="">
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{route('articlePost', $article->id)}}">
                                        <h2 class="blog-head" style="color: #2d2d2d;">{{$article->title}}</h2>
                                    </a>
                                    <p>{{$article->excerpt}}</p>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title" style="color: #2d2d2d;">Another Posts</h3>
                                @foreach($sidebars as $key=>$items)
                                <div class="media post_item">
                                    <img src="../user/assets/img/blog/{{$items->photo}}" width = "110px" alt="post">
                                    <div class="media-body">
                                        <a href="{{route('articlePost', $items->id)}}">
                                            <h3 style="color: #2d2d2d;">{!!$items->sidebar_title!!}</h3>
                                        </a>
                                        <p>{{date('d F Y',strtotime($items->publicate_date))}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
    </main>
            </div>
            </blockquote>
		</div>
	</div>
</div>
@endsection