<div class="col-12 col-lg-4">
    <div class="blog-sidebar-area">
        <div class="treading-articles-widget mb-70">
            <h4>Trending Articles</h4>
            @foreach(Home::getTrendingArticle() as $ar)
                <div class="single-blog-post style-4">

                    <div class="post-thumb">
                        <a href="{{route('blogShow',$ar->slug)}}"><img src="{{asset('storage/blog/'.$ar->thumbnail)}}"
                                                                       alt=""></a>
                        <span class="serial-number">0{{$loop->iteration}}.</span>
                    </div>

                    <div class="post-data">
                        <a href="{{route('blogShow',$ar->slug)}}" class="post-title">
                            <h6>{{$ar->title}}</h6>
                        </a>
                        <div class="post-meta">
                            <p class="post-author">By {{$ar->user->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </div>
</div>
