<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('client/assets/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('client/assets/img/apple-icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Blogs</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{ asset('client/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/css/paper-kit.css?v=2.1.0') }}" rel="stylesheet"/>
    <link href="{{ asset('client/assets/css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('client/assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />


</head>
<body class="full-screen login">
<nav class="navbar navbar-expand-lg fixed-top bg-danger nav-down">
    <div class="container">
        <div class="navbar-translate">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">Homepage</a>
            </div>
            <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <form class="form-inline">
                    @csrf
                    <input name="search" class="form-control mr-sm-2 no-border" type="text" placeholder="Search">
                    <button type="submit" class="btn btn-warning btn-just-icon btn-round"><i class="nc-icon nc-zoom-split"></i></button>
                </form>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="javascript:void(0)">Categories</a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                        @foreach($categories as $key => $category)
                            <a class="dropdown-item" href="{{ route('postsByCategory', $category->id) }}">&nbsp; {{ $category->name }}</a>
                        @endforeach

                    </ul>
                </li>
                    @if(Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="javascript:void(0)">{{ Auth::user()->fullName }}</a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                            <a class="dropdown-item" href="{{ route('getProfile', Auth::user()->id) }}"><i class="nc-icon nc-single-02"></i>&nbsp; Profile</a>
                            <a class="dropdown-item" href="{{ route('getUserPosts', Auth::user()->id) }}"><i class="nc-icon nc-bullet-list-67"></i>&nbsp; My Posts</a>
                            <a class="dropdown-item" href="{{ route('getLogout') }}"><i class="nc-icon nc-bookmark-2"></i>&nbsp; Logout</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-round btn-danger" href="{{ route('addPost') }}">
                            <i class="nc-icon nc-world-2"></i> Add Post
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-round btn-danger" href="{{ route('getRegister') }}">
                            <i class="nc-icon nc-cart-simple"></i> Register
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-round btn-danger" href="{{ route('getLogin') }}">
                            <i class="nc-icon nc-lock-circle-open"></i> Login
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')
<footer class="footer section-dark">
    <div class="container">
        <div class="row">

            <div class="credits ml-auto">
					<span class="copyright">
						© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
					</span>
            </div>
        </div>
    </div>
</footer>

</body>

<!-- Core JS Files -->
<script src="{{ asset('client/assets/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('client/assets/js/jquery-ui-1.12.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('client/assets/js/popper.js') }}" type="text/javascript"></script>
<script src="{{ asset('client/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  for fileupload -->
<script src="{{ asset('client/assets/js/jasny-bootstrap.min.js') }}"></script>

<!--  Plugins for Tags -->
<script src="{{ asset('client/assets/js/bootstrap-tagsinput.js') }}"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('client/assets/js/paper-kit.js?v=2.1.0') }}"></script>
@stack('scripts')
</html>
