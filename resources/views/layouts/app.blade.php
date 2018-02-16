@extends('layouts.base')

@section('base-content')
    <div id="page-container" class="sidebar-active">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg" id="main-navbar">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
            <a id="btn-nav-toggle" class="nav-item mr-auto" onclick="onNavBtnClick();">
                <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
            </a>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->fullName() }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a href="{{ route('dashboard') }}"
                               class="dropdown-item">Dashboard</a>
                            <a href="{{ route('logout') }}"
                               class="dropdown-item"
                               onclick="    event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>

        <header id="main-sidebar">

        </header>
        <!-- Sidebar -->
        <header id="main-sidebar">
            <ul id="sidebar-links">
            @foreach(Request::get('sidebarRoutes') as $routeName => $routeTitle)
                @if(Route::currentRouteName() === $routeName) <!-- todo: fix this for sub-routes -->
                    <li class="active"><span>{{ $routeTitle }}</span></li>
                    @else
                        <li><a href="{{ route($routeName) }}">{!! $routeTitle !!}</a></li>
                    @endif
                @endforeach
            </ul>
        </header>

        <!-- Page Content -->
        <div id="page-content">
            @yield('page-content')
        </div><!-- #page-content -->

        <footer id="page-footer">
            @yield('page-footer')
        </footer><!-- #page-footer -->
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
