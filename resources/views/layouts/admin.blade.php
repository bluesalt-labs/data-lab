@extends('layouts.base')

@section('base-title') Admin - @yield('page-title') @endsection

@section('base-content')
    <div id="page-container" class="sidebar-active">
        <!-- Admin Navbar -->
        <nav id="main-navbar">
            <button id="btn-nav-toggle" onclick="onNavBtnClick();">
                <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>

            <!-- todo: fix this thing. styling is crap and it shouldn't use bootstrap navbar stuff -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->fullName() }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="    event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </nav>

        <!-- Admin Sidebar -->
        <header id="main-sidebar">
            <ul id="sidebar-links">
            @foreach(Request::get('sidebarRoutes') as $routeName => $routeTitle)
            @if(Route::currentRouteName() === $routeName) <!-- todo: fix this for sub-routes -->
                <li class="active"><span>{{ $routeTitle }}</span></li>
            @else
                <li><a href="{{ route($routeName) }}">{{ $routeTitle }}</a></li>
            @endif
            @endforeach
            </ul>
        </header>
        <div id="page-content">
            @yield('page-content')
        </div><!-- #page-content -->

        <footer id="page-footer">

        </footer>
    </div>
@endsection

@section('base-scripts')
    <script type="text/javascript">
        function onNavBtnClick() {
            var pgDiv = document.getElementById('page-container');
            pgDiv.className = (pgDiv.className === 'sidebar-active') ? '' : 'sidebar-active';
        }

        function checkCloseSidebar() {
            var width = ( (document.body.clientWidth || window.innerWidth) + 15 ) || 0;

            if(width > 0 && width < 768) {
                document.getElementById('page-container').className = '';
            }
        }

        function addEvent(object, type, callback) {
            if (object == null || typeof(object) === 'undefined') return;
            if (object.addEventListener) {
                object.addEventListener(type, callback, false);
            } else if (object.attachEvent) {
                object.attachEvent("on" + type, callback);
            } else {
                object["on"+type] = callback;
            }
        }

        document.addEventListener("DOMContentLoaded", function(){
            addEvent(window, "resize", checkCloseSidebar);
            checkCloseSidebar();
        });
    </script>
@endsection
