@extends('layouts.client-master')
@section('content')

    <div class="viral-news-breadcumb-area ">
    </div>


    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <div class="single-blog-post-details">
                            <div class="post-thumb">
                                <img src="{{asset('storage/blog/'.$blog->thumbnail)}}" alt="">
                                {{--                                <img src="{{asset('client-site/img/bg-img/18.jpg')}}" alt="">--}}
                            </div>

                            <div class="post-data">
                                <a href="{{route('blogCategory',$blog->tag->tags)}}"
                                   class="post-catagory">{{$blog->tag->tags}}</a>
                                <h2 class="post-title">{{$blog->title}}</h2>
                                <div class="post-meta">
                                    <div
                                        class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
                                        <div class="post-authors-date">
                                            <p class="post-author">By {{$blog->user->name}}</p>
                                            <p class="post-date">{{$blog->created_at->diffForHumans()}}</p>
                                        </div>
                                        <div class="view-comments">
                                            <p class="views">{{$blog->views}} Views</p>
                                            <a href="#comments" class="comments">{{$blog->blogComments->count()}}
                                                comments</a>
                                        </div>
                                    </div>
                                    {!! $blog->contents !!}
                                </div>
                            </div>
                        </div>

                        <div class="related-articles-">
                            <h4 class="mb-70">Related Articles</h4>
                            <div class="row">
                                @foreach($relates as $relate)
                                    <div class="col-12">
                                        <div class="single-blog-post style-3 style-5 d-flex align-items-center mb-50">

                                            <div class="post-thumb">
                                                <a href="{{route('blogShow',$relate->slug)}}"><img src="{{asset('storage/blog/'.$relate->thumbnail)}}" alt=""></a>
                                            </div>

                                            <div class="post-data">
                                                <a href="{{route('blogCategory',$relate->tag->tags)}}" class="post-catagory">Finance</a>
                                                <a href="{{route('blogShow',$relate->slug)}}" class="post-title">
                                                    <h6>{{$relate->title}}</h6>
                                                </a>
                                                <div class="post-meta">
                                                    <p class="post-author">By {{$relate->user->name}}</p>
                                                    <p class="post-date">{{$relate->created_at->diffForHumans()}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="comment_area clearfix" id="comments">
                            <h4 class="title mb-70">{{$blog->blogComments->count()}} comment</h4>
                            <ol>

                                {{--                                <li class="single_comment_area">--}}

                                {{--                                    <div class="comment-content d-flex">--}}

                                {{--                                        <div class="comment-author">--}}
                                {{--                                            <img src="img/bg-img/t1.jpg" alt="author">--}}
                                {{--                                        </div>--}}

                                {{--                                        <div class="comment-meta">--}}
                                {{--                                            <a href="single-post.html#" class="post-author">Christian Williams</a>--}}
                                {{--                                            <a href="single-post.html#" class="post-date">April 15, 2018</a>--}}
                                {{--                                            <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <ol class="children">--}}
                                {{--                                        <li class="single_comment_area">--}}

                                {{--                                            <div class="comment-content d-flex">--}}

                                {{--                                                <div class="comment-author">--}}
                                {{--                                                    <img src="img/bg-img/t2.jpg" alt="author">--}}
                                {{--                                                </div>--}}

                                {{--                                                <div class="comment-meta">--}}
                                {{--                                                    <a href="single-post.html#" class="post-author">Sandy Doe</a>--}}
                                {{--                                                    <a href="single-post.html#" class="post-date">April 15, 2018</a>--}}
                                {{--                                                    <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </li>--}}
                                {{--                                    </ol>--}}
                                {{--                                </li>--}}
                                @foreach($blog->blogComments as $bc)
                                    <li class="single_comment_area">

                                        <div class="comment-content d-flex">

                                            <div class="comment-author">
                                                <img src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="author">
                                            </div>

                                            <div class="comment-meta">
                                                <a href=""
                                                   class="post-author">{{isset($bc->user->name)?$bc->user->name:$bc->name}}</a>
                                                <a href="" class="post-date">{{$bc->created_at}}</a>
                                                <p>{{$bc->comment}}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                        <div class="post-a-comment-area">
                            <h4 class="mb-70">Leave a comment</h4>

                            <div class="contact-form-area">
                                <form action="{{route('blogComment',$blog->slug)}}" method="post">
                                    @csrf
                                    <div class="row">
                                        @guest
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" id="name" placeholder="Name*"
                                                       name="name">
                                            </div>
                                        @endguest
                                        <div class="col-12">
                                            <textarea name="comment" class="form-control" id="message" cols="30"
                                                      rows="10" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn viral-btn mt-30" type="submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @include('client-site-component.side-right')
            </div>
        </div>
    </div>

@endsection
