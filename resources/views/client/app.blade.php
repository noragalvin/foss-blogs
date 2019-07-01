<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('client/assets/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('client/assets/img/apple-icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Paper Kit 2 PRO by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{ asset('client/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/assets/css/paper-kit.css?v=2.1.0') }}" rel="stylesheet"/>
    <link href="{{ asset('client/assets/css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('client/assets/css/nucleo-icons.css') }}" rel="stylesheet">

</head>
<body class="full-screen login">
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="200">
    <div class="container">
        <div class="navbar-translate">
            <div class="navbar-header">
                <a class="navbar-brand" href="../presentation.html">Paper Kit 2 PRO</a>
            </div>
            <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html" data-scroll="true" href="javascript:void(0)">Components</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">Sections</a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                        <a class="dropdown-item" href="../sections.html#headers"><i class="nc-icon nc-tile-56"></i>&nbsp; Headers</a>
                        <a class="dropdown-item" href="../sections.html#features"><i class="nc-icon nc-settings"></i>&nbsp; Features</a>
                        <a class="dropdown-item" href="../sections.html#blogs"><i class="nc-icon nc-bullet-list-67"></i>&nbsp; Blogs</a>
                        <a class="dropdown-item" href="../sections.html#teams"><i class="nc-icon nc-single-02"></i>&nbsp; Teams</a>
                        <a class="dropdown-item" href="../sections.html#projects"><i class="nc-icon nc-calendar-60"></i>&nbsp; Projects</a>
                        <a class="dropdown-item" href="../sections.html#pricing"><i class="nc-icon nc-money-coins"></i>&nbsp; Pricing</a>
                        <a class="dropdown-item" href="../sections.html#testimonials"><i class="nc-icon nc-badge"></i>&nbsp; Testimonials</a>
                        <a class="dropdown-item" href="../sections.html#contact-us"><i class="nc-icon nc-mobile"></i>&nbsp; Contacts</a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="javascript:void(0)">Examples</a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                        <a class="dropdown-item" href="about-us.html"><i class="nc-icon nc-bank"></i>&nbsp; About Us</a>
                        <a class="dropdown-item" href="add-product.html"><i class="nc-icon nc-basket"></i>&nbsp; Add Product</a>
                        <a class="dropdown-item" href="blog-post.html"><i class="nc-icon nc-badge"></i>&nbsp; Blog Post</a>
                        <a class="dropdown-item" href="blog-posts.html"><i class="nc-icon nc-bullet-list-67"></i>&nbsp; Blog Posts</a>
                        <a class="dropdown-item" href="contact-us.html"><i class="nc-icon nc-mobile"></i>&nbsp; Contact Us</a>
                        <a class="dropdown-item" href="discover.html"><i class="nc-icon nc-world-2"></i>&nbsp; Discover</a>
                        <a class="dropdown-item" href="ecommerce.html"><i class="nc-icon nc-send"></i>&nbsp; Ecommerce</a>
                        <a class="dropdown-item" href="landing.html"><i class="nc-icon nc-spaceship"></i>&nbsp; Landing</a>
                        <a class="dropdown-item" href="login.html"><i class="nc-icon nc-lock-circle-open"></i>&nbsp; Login</a>
                        <a class="dropdown-item" href="product-page.html"><i class="nc-icon nc-album-2"></i>&nbsp; Product Page</a>
                        <a class="dropdown-item" href="profile.html"><i class="nc-icon nc-single-02"></i>&nbsp; Profile</a>
                        <a class="dropdown-item" href="register.html"><i class="nc-icon nc-bookmark-2"></i>&nbsp; Register</a>
                        <a class="dropdown-item" href="search-with-sidebar.html"><i class="nc-icon nc-zoom-split"></i>&nbsp; Search</a>
                        <a class="dropdown-item" href="settings.html"><i class="nc-icon nc-settings-gear-65"></i>&nbsp; Settings</a>
                        <a class="dropdown-item" href="twitter-redesign.html"><i class="nc-icon nc-tie-bow"></i>&nbsp; Twitter</a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn btn-round btn-danger" href="{{ route('getRegister') }}">
                        <i class="nc-icon nc-cart-simple"></i> Register
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')
<footer class="footer section-dark">
    <div class="container">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                    <li><a href="http://blog.creative-tim.com">Blog</a></li>
                    <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
                </ul>
            </nav>
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

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('client/assets/js/paper-kit.js?v=2.1.0') }}"></script>

</html>
