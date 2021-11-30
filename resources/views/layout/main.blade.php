<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> USD | USU Society for Debating </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/img/icon-usd2.png') }}">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/progressbar_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/animated-headline.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('user/assets/img/logo/logo-usd-word9.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                    <ul>     
                                        <li><i class="fa fa-mobile"></i> : +62 813-6269-4662 (Fidel)</li>
                                        <li><i class="fa fa-envelope"></i> : debateusu@gmail.com</li>
                                        <li><i i class="fa fa-map-marker" aria-hidden="true"></i> : Pusdiklat LPPM USU</li>
                                    </ul>
                                    <div class="header-social">    
                                        <ul>
                                            <li><a href="https://www.instagram.com/usudebate/"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="https://www.youtube.com/channel/UCmhqXQ4P5h7Pbpe-Z4QKG3A"><i class="fab fa-youtube"></i></a></li>
                                            <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a  href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="header-info-right d-flex align-items-center">
                                    <div class="select-this">
                                        <form action="#">
                                            <div class="select-itms">
                                                <select name="select" id="select1">
                                                    <option value="">English</option>
                                                    <option value="">Bangla</option>
                                                    <option value="">Arabic</option>
                                                    <option value="">Hindi</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="contact-now">     
                                        <li><a href="#">Subscribe Now</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('user/assets/img/logo/logo-usd-word9.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                        <ul id="navigation">                                                                                           
                                                <li><a href="/">Home</a></li>
                                                <li><a href="#">About Us</a>
                                                    <ul class="submenu">
                                                        <li><a href="{{route('organizationStructure')}}">Organization Structure</a></li>
                                                        <li><a href="{{route('registration')}}">How to Join Us?</a></li>
                                                        <li><a href="{{route('FAQ')}}">FAQ</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Gallery</a>
                                                    <ul class="submenu">
                                                        <li><a href="{{route('achievement')}}">Achievement</a></li>
                                                        <li><a href="{{route('afterGlow')}}">After Glow</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="{{route('regularTraining&Gathering')}}">Activities</a></li>
                                                <li><a href="{{route('filesView')}}">Matter</a></li>
                                                <li><a href="{{route('article')}}">Article</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->
                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                    @if(Auth::check())
                                          @if(Auth::user()->levelAdmin == 'master')
                                          <a href="{{route('master-dashboard')}}" class="btn header-btn">Hi, {{Auth::user()->name}}!</a>
                                          @elseif(Auth::user()->levelAdmin == 'sekretaris')
                                          <a href="{{route('sekretaris-dashboard')}}" class="btn header-btn">Hi, {{Auth::user()->name}}!</a>
                                          @else
                                          <a href="{{route('halamanuser')}}" class="btn header-btn">Hi, {{Auth::user()->name}}!</a>
                                          @endif
                                        @else
                                        <a href="{{route('login')}}" class="btn header-btn">Login</a>
                                        @endif                                    
                                    </div>
                                </div>
                            </div> 
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <!-- header end -->
    <main>
    @yield('content')

    </main>
    <footer>
        <div class="footer-wrapper section-bg2" data-background="{{asset('user/assets/img/gallery/footerUSD5.png')}}">
            <!-- Footer Top-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <div class="footer-logo mb-20">
                                        <a href="/"><img src="{{asset('user/assets/img/logo/logo-usd.png')}}" alt="" width="263" height="330"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contact Us</h4>
                                    <ul>
                                        <li>
                                            <p>Address : Jl. Dr. Mansyur, Merdeka, Kec. Medan Baru, Kota Medan, Sumatera Utara 20153 (Pusdiklat LPPM USU)</p>
                                        </li>
                                        <li>Phone : +62 813-6269-4662 (Fidel)</li>
                                        <li>Email : debateusu@gmail.com</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <ul>
                                        <li><a href="{{route('organizationStructure')}}">Organization Structure</a></li>
                                        <li><a href="{{route('registration')}}">How to Join Us?</a></li>
                                        <li><a href="{{route('FAQ')}}">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Newsletter</h4>
                                    <div class="footer-pera footer-pera2">
                                    <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                                </div> -->
                                <!-- Form -->
                                <!-- <div class="footer-form" >
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part">
                                        <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                                class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit"
                                                class="email_icon newsletter-submit button-contactForm"><img src="user/assets/img/gallery/form.png" alt=""></button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom -->
            <div class="footer-bottom-area" data-background="{{asset('user/assets/img/gallery/footerUSD5.png')}}">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-xl-10 col-lg-9 ">
                                <div class="footer-copy-right">
                                    <p>Copyright &copy; 2021 - USD | USU Society for Debating</p>
                                    <!-- <p>Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p> -->
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3">
                                <div class="footer-social f-right">
                                    <a href="https://www.instagram.com/usudebate/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/channel/UCmhqXQ4P5h7Pbpe-Z4QKG3A"><i class="fab fa-youtube"></i></a>
                                    <a href=""><i></i></a>
                                    <a href=""><i></i></a>
                                    <!-- <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a  href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="{{ asset('user/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('user/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('user/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('user/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('user/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('user/assets/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('user/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery.sticky.js') }}"></script>
    <!-- Progress -->
    <script src="{{ asset('user/assets/js/jquery.barfiller.js') }}"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="{{ asset('user/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/hover-direction-snake.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('user/assets/js/contact.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('user/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('user/assets/js/main.js') }}"></script>
    
    </body>
</html>