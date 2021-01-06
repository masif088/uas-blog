<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>{{config('app.name')}}</title>

    <link rel="icon" href="{{asset('client-site/img/core-img/logo.png')}}">

    <link rel="stylesheet" href="{{asset('client-site/style.css')}}">
</head>
<body>

<header class="header-area">

{{--    <div class="top-header-area">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="top-header-content d-flex align-items-center justify-content-between">--}}

{{--                        <div class="top-breaking-news-area">--}}
{{--                            <div id="breakingNewsTicker" class="ticker">--}}
{{--                                <ul>--}}
{{--                                    <li><a href="single-post.html#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>--}}
{{--                                    <li><a href="single-post.html#">Welcome to Colorlib Family.</a></li>--}}
{{--                                    <li><a href="single-post.html#">Nam eu metus sitsit amet, consec!</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="top-social-info-area">--}}
{{--                            <a href="single-post.html#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>--}}
{{--                            <a href="single-post.html#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>--}}
{{--                            <a href="single-post.html#"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--                            <a href="single-post.html#"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="viral-news-main-menu" id="stickyMenu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">

                <nav class="classy-navbar justify-content-between" id="viralnewsNav">

                    <a class="nav-brand"  href="{{route('blogIndex')}}"><img src="{{asset('client-site/img/core-img/logo.png')}}" alt="Logo" style="max-height: 60px"></a>

                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <div class="classy-menu">

                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="{{route('blogIndex')}}">Beranda</a></li>
                                @foreach(Home::getBestTag() as $t)
                                <li class="active"><a href="{{route('blogCategory',$t->tags)}}">{{$t->tags}}</a></li>
                                @endforeach
                            </ul>

                            <div class="search-btn">
                                <i id="searchbtn" class="fa fa-search" aria-hidden="true"></i>
                            </div>

                            <div class="viral-search-form">
                                <form id="search" action="{{route('blogSearchPost')}}" method="post">
                                    @csrf
                                    <input type="text" name="search_terms" placeholder="Enter your keywords ...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <div class="add-post-button">
                                <a href="{{route('login')}}" class="btn add-post-btn">Login</a>
                            </div>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer class="footer-area">
    <div class="bottom-footer-area">
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">

                    <p>
                        <a href="single-post.html#">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib
                            </a>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{asset('client-site/js/jquery/jquery-2.2.4.min.js')}}"></script>

<script src="{{asset('client-site/js/bootstrap/popper.min.js')}}"></script>

<script src="{{asset('client-site/js/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{asset('client-site/js/plugins/plugins.js')}}"></script>

<script src="{{asset('client-site/js/active.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
