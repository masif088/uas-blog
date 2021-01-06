@extends('layouts.client-master')
@section('content')
    <div class="viral-news-breadcumb-area ">
    </div>



    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="single-welcome-slide">
                    @isset($blogOne)
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-8">
                            <div class="welcome-post">
                                <img src="{{asset('storage/blog/'.$blogOne->thumbnail)}}" alt="">
                                <div class="post-content" data-animation="fadeInUp" data-duration="500ms">
                                    {{--                                    <a href="index.html#" class="tag">Travel</a>--}}
                                    <a href="{{route('blogCategory',$blogOne->tag->tags)}}"
                                       class="tag">{{$blogOne->tag->tags}}</a>
                                    <a href="{{route('blogShow',$blogOne->slug)}}" class="post-title">{{$blogOne->title}}</a>
                                    <p>{{$blogOne->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                        @endisset
                        <div class="col-12 col-lg-4">

                            <div class="welcome-posts--">
                                @foreach($blogTwo as $bt)
                                    <div class="welcome-post style-2">
                                        <img src="{{asset('storage/blog/'.$bt->thumbnail)}}" alt="">
                                        <div class="post-content" data-animation="fadeInUp" data-duration="500ms">
                                            <a href="{{route('blogCategory',$bt->tag->tags)}}"
                                               class="tag">{{$bt->tag->tags}}</a>
                                            <a href="{{route('blogShow',$bt->slug)}}" class="post-title">{{$bt->title}}</a>
                                            <p>{{$bt->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="viral-story-blog-post section-padding-0-50">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-12 col-lg-4">
                                <div class="single-blog-post style-3">

                                    <div class="post-thumb">
                                        <a href="index.html#"><img src="{{asset('storage/blog/'.$blog->thumbnail)}}" alt=""></a>
                                    </div>

                                    <div class="post-data">
                                        <a href="{{route('blogCategory',$blog->tag->tags)}}" class="post-catagory">{{$blog->tag->tags}}</a>
                                        <a href="{{route('blogShow',$blog->slug)}}" class="post-title">
                                            <h6>
                                                {{$blog->title}}
                                            </h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-author">By {{$blog->user->name}}</p>
                                            <p class="post-date">{{$blog->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>

@endsection
