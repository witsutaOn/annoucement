<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('cmsVendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href=" {{asset('cmsVendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
{{--    /cmsVendor/datatables/dataTables.bootstrap4.css"--}}

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

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/resources/views/cms/index.blade.php">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>


    <!-- Navbar -->

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
{{--    </div>--}}

{{--    <ul class="navbar-nav ml-auto ml-md-0">--}}
{{--        <li class="nav-item dropdown no-arrow mx-1">--}}
{{--            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"--}}
{{--               aria-haspopup="true" aria-expanded="false">--}}
{{--                <i class="fas fa-bell fa-fw"></i>--}}
{{--                <span class="badge badge-danger">9+</span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">--}}
{{--                <a class="dropdown-item" href="#">Action</a>--}}
{{--                <a class="dropdown-item" href="#">Another action</a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="#">Something else here</a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown no-arrow mx-1">--}}
{{--            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"--}}
{{--               aria-haspopup="true" aria-expanded="false">--}}
{{--                <i class="fas fa-envelope fa-fw"></i>--}}
{{--                <span class="badge badge-danger">7</span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">--}}
{{--                <a class="dropdown-item" href="#">Action</a>--}}
{{--                <a class="dropdown-item" href="#">Another action</a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="#">Something else here</a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown no-arrow">--}}
{{--            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"--}}
{{--               aria-haspopup="true" aria-expanded="false">--}}
{{--                <i class="fas fa-user-circle fa-fw"></i>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">--}}
{{--                <a class="dropdown-item" href="#">Settings</a>--}}
{{--                <a class="dropdown-item" href="#">Activity Log</a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    </ul>--}}
    </div>
</nav>
<main>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.blade.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Login Screens:</h6>
                    <a class="dropdown-item" href="login.blade.php">Login</a>
                    <a class="dropdown-item" href="register.blade.php">Register</a>
                    <a class="dropdown-item" href="forgot-password.blade.php">Forgot Password</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Other Pages:</h6>
                    <a class="dropdown-item" href="404.blade.php">404 Page</a>
                    <a class="dropdown-item" href="blank.blade.php">Blank Page</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('NewsController@create') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Add New User</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.blade.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>
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

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.blade.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('cmsVendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('cmsVendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('cmsVendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset('cmsVendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('cmsVendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('cmsVendor/datatables/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="/js/cms/sb-admin.js"></script>

<!-- Demo scripts for this page-->
<script src="{{asset('js/cms/demo/datatables-demo.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script> $(function() { $('textarea').froalaEditor() }); </script>
</body>
</html>