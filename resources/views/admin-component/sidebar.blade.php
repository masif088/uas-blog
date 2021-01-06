<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin.dashboard')}}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            {{--            <li class="nav-item dropdown">--}}
            {{--                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>--}}
            {{--                <ul class="dropdown-menu">--}}
            {{--                    <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>--}}
            {{--                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
            <li class="{{(Request::segment(2)=='dashboard')?'active':''}}"><a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fa fa-fire"></i>
                    <span>Dashboard</span></a></li>

            <li class="menu-header">Blogging</li>
            {{--{{)}}--}}
            <li class="{{(Request::segment(2)=='blog')?'active':''}}"><a class="nav-link"
                                                                         href="{{route('admin.blog.index')}}"><i
                        class="fa fa-file"></i> <span>Blog</span></a></li>
            <li class="{{(Request::segment(2)=='tag')?'tag':''}}"><a class="nav-link"
                                                                     href="{{route('admin.tag.index')}}"><i
                        class="fa fa-tags"></i> <span>Tag</span></a></li>
{{--            @if(Auth::user()->role==1)--}}
{{--                <li class="menu-header">User</li>--}}
{{--                <li class="{{(Request::segment(2)=='user')?'active':''}}"><a class="nav-link"--}}
{{--                                                                             href="{{route('admin.blog.index')}}"><i--}}
{{--                            class="fa fa-users"></i> <span>User</span></a></li>--}}
{{--            @endif--}}
        </ul>

    </aside>
</div>
