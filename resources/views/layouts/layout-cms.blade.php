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
    <link href="{{asset('css/cms/sb-admin.css')}}" rel="stylesheet">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" async></script>--}}

    <!-- Include script Drop Zone -->

{{--    <script src="{{asset()}}js/dropzone.js"></script>--}}

    <!-- Include styles Drop Zone -->
    <link rel="stylesheet"  href="{{ asset('css/dropzone.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />

    <!-- For District. -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- MDBootstrap Datatables  -->
    <link href="{{asset('css/cms/datatables.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->

    <!-- Your custom styles (optional) -->
    <link href="{{asset('css/cms/style.css')}}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="{{asset('css/cms/select2.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Include script  -->
    <script  src="{{ asset('js/cms/select2.min.js') }}" ></script>
    <script  src="{{ asset('js/dropzone.js') }}" ></script>

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="{{asset('js/cms/datatables.min.js')}}"></script>
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark static-top navbar-laravel">
        <div class="container-fluid">
            <a class="navbar-brand mr-1" href="{{ url('/') }}">
                {{ __('Announcement') }}
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('สมัครใช้งาน') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-fw fa-user"></i> {{ Auth::user()->firstname }} {{Auth::user()->lastname }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ออกจากระบบ') }}
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
                        <i class="fas fa-fw fa-user"></i>
                        <span>รายชื่อผู้ใช้</span>
                    </a>
                </li>

                @if (Auth::guest() && !route('register'))
                    <script>
                        window.location = "/login";
                        alert("โปรดเข้าสู่ระบบก่อนใช้งาน");
                    </script>
                @elseif(Auth::user()->group_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('OrganizeController@index' )}}">
                            <i class="fas fa-fw fa-building"></i>
                                <span>
                                        หน่วยงาน
                                </span>
                        </a>
                    </li>

                @elseif(Auth::user()->group_id == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('OrganizeController@index' )}}">
                            <i class="fas fa-fw fa-building"></i>
                            <span style="text-align: center">หน่วยงาน</span></a>
                    </li>

                @elseif( Auth::user()->group_id == 3)

                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('NewsController@index') }}">
                            <i class="fa-fw far fa-newspaper"></i>
                            <span>ข่าว</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('NewsTypeController@index') }}">
                            <i class="fas fa-fw fa-layer-group"></i>
                            <span>ประเภทข่าว</span></a>
                    </li>

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
                        <span>Copyright © Website 2019</span>
                    </div>
                </div>
            </footer>
        </div>
    </main>



</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/js/froala_editor.pkgd.min.js"></script>

<!-- MDB core JavaScript -->
{{--<script type="text/javascript" src="{{asset('js/cms/mdb.min.js')}}" async></script>--}}


<!-- Initialize the editor. -->
<script> $(function() { $('textarea').froalaEditor() }); </script>
<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }

    $(document).ready(function () {
        $('.select2').select2();
    })
</script>



</body>
</html>
