<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom fonts for this template-->
    <link href="{{asset('cmsVendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href=" {{asset('cmsVendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/cms/sb-admin.css" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>

    <!-- Include script Drop Zone -->
    <script  src="{{ asset('js/dropzone.js') }}" ></script>

    <!-- Include styles Drop Zone -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="app">

<!--    --><?php //dd( Auth::user()->group_id);?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark static-top navbar-laravel">
        <div class="container-fluid">
            <a class="navbar-brand mr-1" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"--}}
{{--                       aria-haspopup="true" aria-expanded="false">--}}
{{--                        <i class="fas fa-fw fa-folder"></i>--}}
{{--                        <span>Pages</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">--}}
{{--                        <h6 class="dropdown-header">Login Screens:</h6>--}}
{{--                        <a class="dropdown-item" href="login.blade.php">Login</a>--}}
{{--                        <a class="dropdown-item" href="register.blade.php">Register</a>--}}
{{--                        <a class="dropdown-item" href="forgot-password.blade.php">Forgot Password</a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <h6 class="dropdown-header">Other Pages:</h6>--}}
{{--                        <a class="dropdown-item" href="404.blade.php">404 Page</a>--}}
{{--                        <a class="dropdown-item" href="blank.blade.php">Blank Page</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
                @if (Auth::guest() && !route('register'))
                    <script>
                        window.location = "/login";
                        alert("Please login");
                    </script>
                @elseif(Auth::user()->group_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('OrganizeController@create' )}}">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Add Organize</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('UserController@create') }}">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Add User</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('createNewsType') }}">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Add News Type</span></a>
                    </li>
                @else
                    @if( Auth::user()->group_id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('OrganizeController@create' )}}">
                                <i class="fas fa-fw fa-chart-area"></i>
                                <span>Add Organize</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('UserController@create') }}">
                                <i class="fas fa-fw fa-chart-area"></i>
                                <span>Add User</span></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('NewsController@create') }}">
                                <i class="fas fa-fw fa-chart-area"></i>
                                <span>Add News</span></a>
                        </li>
                    @endif
               @endif

            </ul>


            <div id="content-wrapper">

                <div class="container-fluid">

                    <!-- Add Page Content-->
                @yield('content')
                <!--/Add Page Content-->

                </div>

            </div>

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2019</span>
                    </div>
                </div>
            </footer>
        </div>
    </main>



{{--    <main class="py-4">--}}
{{--        @yield('content')--}}
{{--    </main>--}}
</div>

<!-- Include external JS libs. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script> $(function() { $('textarea').froalaEditor() }); </script>

</body>
</html>
