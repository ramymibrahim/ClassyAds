<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{__('index.dir')}}">

<head>
    <title>{{__('index.classyads')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/rangeslider.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @if(__('index.dir')=='rtl')
    <link rel="stylesheet" href="{{asset('css/rtl.css')}}" >
    @endif
    
</head>

<body>
    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <header class="site-navbar container py-0 bg-white" role="banner">

            <!-- <div class="container"> -->
            <div class="row align-items-center">

                <div class="col-6 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="{{url('/')}}" class="text-black mb-0">Classy<span class="text-primary">Ads</span> </a></h1>
                </div>
                @php
                if(!isset($page)){
                    $page='home';
                }
                @endphp
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="{{$page=='home'?'active':''}}"><a href="{{url('/')}}">{{__('index.home')}}</a></li>
                            <li><a href="{{url('/items/all')}}">{{__('index.ads')}}</a></li>
                            <li class="has-children">
                                <a href="{{'/about'}}">{{__('index.about')}}</a>
                                <ul class="dropdown">
                                    <li><a href="{{'/about'}}#Company">{{__('index.company')}}</a></li>                                    
                                    <li><a href="{{'/about'}}#Philosophy">{{__('index.philosophy')}}</a></li>                                    
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li class="{{$page=='contact'?'active':''}}"><a href="{{url('/contact')}}">Contact</a></li>
                            @guest
                            <li class="ml-xl-3 login"><a href="{{url('login')}}"><span class="border-left pl-xl-4"></span>Log In</a></li>
                            <li><a href="{{url('register')}}">Register</a></li>
                            @else
                            <li class="ml-xl-3 login">Welcome {{auth()->user()->name}}</li>
                            <li>
                                <a href="#" onclick="document.getElementById('logout_form').submit();">Logout</a>
                                <form action="{{url('logout')}}" method="POST" id="logout_form">
                                    {{csrf_field()}}
                                </form>
                            </li>
                            @endguest
                            <li><a href="#" class="cta"><span class="bg-primary text-white rounded">+ Post an Ad</span></a></li>
                            @if(app()->getLocale()=='en')
                            <li><a href="{{url('lang/ar')}}">ع</a></li>
                            @else
                            <li><a href="{{url('lang/en')}}">En</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>

            </div>
            <!-- </div> -->

        </header>
        @yield('content')



        <div class="newsletter bg-primary py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2>Newsletter</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-md-6">

                        <form class="d-flex">
                            <input type="text" class="form-control" placeholder="Email">
                            <input type="submit" value="Subscribe" class="btn btn-white">
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="footer-heading mb-4">About</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident rerum unde possimus molestias dolorem fuga, illo quis fugiat!</p>
                            </div>

                            <div class="col-md-3">
                                <h2 class="footer-heading mb-4">Navigations</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h2 class="footer-heading mb-4">Follow Us</h2>
                                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form action="#" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Search products..." aria-label="Enter Email" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/rangeslider.min.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>
    @yield('scripts')
</body>

</html>