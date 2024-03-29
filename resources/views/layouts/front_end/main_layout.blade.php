@include('toast::messages')
<!doctype html>
<html lang="zxx">

<!-- Mirrored from envytheme.com/tf-demo/edufield/index-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 18:45:26 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/bootstrap.min.css') !!}">
    <!-- IcoFont Min CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/icofont.min.css') !!}">
    <!-- Classy Nav CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/classy-nav.min.css') !!}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/animate.css') !!}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/owl.carousel.css') !!}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/magnific-popup.css') !!}">
    <!-- Owl Theme Default CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/owl.theme.default.min.css') !!}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/style.css') !!}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{!! asset('../../edufield/assets/css/responsive.css') !!}">

    <title>MOOC PENS - Get Your Free & High Quality Education Here !</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>
<body>
<!-- Start Preloader Area -->
<div class="preloader-area">
    <div class="loader">
        <div class="dots">
            <i class="dots-item dots-item-move-down"></i>
            <i class="dots-item dots-item-move-left"></i>
            <i class="dots-item dots-item-move-left"></i>
            <i class="dots-item dots-item-move-left"></i>
            <i class="dots-item dots-item-move-left"></i>
            <i class="dots-item dots-item-move-down"></i>
            <i class="dots-item dots-item-move-right"></i>
            <i class="dots-item dots-item-move-right"></i>
            <i class="dots-item dots-item-move-down"></i>
            <i class="dots-item dots-item-move-up"></i>
            <i class="dots-item dots-item-move-down"></i>
            <i class="dots-item dots-item-move-up"></i>

            <i class="dots-item"></i>

            <i class="dots-item dots-item-move-down"></i>
            <i class="dots-item dots-item-move-up"></i>
            <i class="dots-item dots-item-move-down"></i>
            <i class="dots-item dots-item-move-up"></i>
            <i class="dots-item dots-item-move-left"></i>
            <i class="dots-item dots-item-move-left"></i>
            <i class="dots-item dots-item-move-up"></i>
            <i class="dots-item dots-item-move-right"></i>
            <i class="dots-item dots-item-move-right"></i>
            <i class="dots-item dots-item-move-right"></i>
            <i class="dots-item dots-item-move-right"></i>
            <i class="dots-item dots-item-move-up"></i>
        </div>
    </div>
</div>
<!-- End Preloader Area -->

<!-- Start Main Menu Area -->
<div class="main-header-area header-sticky">
    <div class="container">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="EduStudyNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{url('/')}}"><img src="{!! asset('../../images/logo.png') !!}" alt="logo" style="width: 300px;"></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
{{--
                            <li><a href="#" class="active">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index-default.html">Home Demo One</a></li>
                                    <li><a href="index-two.html">Home Demo Two</a></li>
                                    <li class="active"><a href="index-three.html">Home Demo Three</a></li>
                                    <li><a href="index-four.html">Home Demo Four</a></li>
                                </ul>
                            </li>
--}}


{{--                            <li><a href="#">Courses</a>
                                <ul class="dropdown">
                                    <li><a href="courses-style-one.html">Courses Style One</a></li>
                                    <li><a href="courses-style-two.html">Courses Style Two</a></li>
                                    <li><a href="single-courses.html">Courses Details</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Teacher</a>
                                <ul class="dropdown">
                                    <li><a href="teacher-style-one.html">Teacher Style One</a></li>
                                    <li><a href="teacher-style-two.html">Teacher Style Two</a></li>
                                    <li><a href="single-teacher.html">Teacher Details</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog-style-one.html">Blog Style One</a></li>
                                            <li><a href="blog-style-two.html">Blog Style Two</a></li>
                                            <li><a href="blog-style-three.html">Blog Style Three</a></li>
                                            <li><a href="single-blog.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Courses</a>
                                        <ul class="dropdown">
                                            <li><a href="courses-style-one.html">Courses Style One</a></li>
                                            <li><a href="courses-style-two.html">Courses Style Two</a></li>
                                            <li><a href="single-courses.html">Courses Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Contact</a>
                                        <ul class="dropdown">
                                            <li><a href="contact-style-one.html">Contact Style One</a></li>
                                            <li><a href="contact-style-two.html">Contact Style Two</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="admission.html">Admission</a></li>
                                    <li><a href="error.html">404 Error</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li><a href="#">About Us</a>
                                <ul class="dropdown">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="admission.html">Admission</a></li>
                                    <li><a href="teacher-style-one.html">Teacher Style One</a></li>
                                    <li><a href="teacher-style-two.html">Teacher Style Two</a></li>
                                    <li><a href="single-teacher.html">Teacher Details</a></li>
                                </ul>
                            </li>--}}
                            <li><a href="#">Register/Sign In</a>
                                <ul class="dropdown">
                                    <li><a href="{{url('/login')}}">Login</a></li>
                                    <li><a href="{{url('/register')}}">Register</a></li>
                                </ul>
                            </li>

                            <li><a href="#search" class="search-btn"><i class="icofont-search-2"></i></a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Main Menu Area -->

<!-- Start Search Popup Area -->
<div id="search-area">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="Search Kewword(s)">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<!-- End Search Popup Area -->

@yield('contain_section')

<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-footer">
                    <a class="nav-brand" href="{{url('/')}}"><img src="{!! asset('../../images/logo.png') !!}" alt="logo" style="width: 300px;"></a>
                    <h3>About MOOC PENS</h3>

                    <ul class="footer-contact-info">
                        <li>Jl. Raya ITS - Kampus PENS Sukolilo.</li>
                        <li><a href="#">Surabaya 60111, Indonesia</a></li>
                        <li><a href="#">+62 (31) 594 7280</a></li>
                        <li><a href="#">+62 (31) 594 6114</a></li>
                        <li><a href="#">humas@pens.ac.id</a></li>
                    </ul>

                    <ul class="social">
                        <li><a href="#"><i class="icofont-facebook"></i></a></li>
                        <li><a href="#"><i class="icofont-twitter"></i></a></li>
                        <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                        <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                        <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>

         {{--   <div class="col-lg-3 col-md-6">
                <div class="single-footer">
                    <h3>Courses</h3>

                    <ul class="list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Notice</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Scholarship</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer">
                    <h3>Research</h3>

                    <ul class="list">
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Documenation</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer">
                    <h3>Support</h3>

                    <ul class="list">
                        <li><a href="#">Language Packs</a></li>
                        <li><a href="#">Relase Status</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Become A Teacher</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">LearnPress</a></li>
                    </ul>
                </div>
            </div>--}}
        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <p>Copyright <i class="icofont-copyright"></i> 2018 EduField Template by EnvyTheme. All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->

<!-- Back to top -->
<a class="scrolltop" href="#top"><i class="icofont-hand-drawn-up"></i></a>
<!-- End Back to top -->

<!-- jQuery Min JS -->
<script src="{!! asset('../../edufield/assets/js/jquery.min.js') !!}"></script>
<!-- Prpper JS -->
<script src="{!! asset('../../edufield/assets/js/popper.min.js') !!}"></script>
<!-- Bootstrap Min JS -->
<script src="{!! asset('../../edufield/assets/js/bootstrap.min.js') !!}"></script>
<!-- Classy Nav Min Js -->
<script src="{!! asset('../../edufield/assets/js/classy-nav.min.js') !!}"></script>
<!-- Owl Carousel Min Js -->
<script src="{!! asset('../../edufield/assets/js/owl.carousel.min.js') !!}"></script>
<!-- Magnific Popup JS -->
<script src="{!! asset('../../edufield/assets/js/jquery.magnific-popup.min.js') !!}"></script>
<!-- CounterUp JS -->
<script src="{!! asset('../../edufield/assets/js/jquery.counterup.min.js') !!}"></script>
<!-- Waypoints JS -->
<script src="{!! asset('../../edufield/assets/js/waypoints.min.js') !!}"></script>
<!-- Form Validator Min JS -->
<script src="{!! asset('../../edufield/assets/js/form-validator.min.js') !!}"></script>
<!-- Contact Form Min JS -->
<script src="{!! asset('../../edufield/assets/js/contact-form-script.js') !!}"></script>
<!-- Main JS -->
<script src="{!! asset('../../edufield/assets/js/main.js') !!}"></script>
@yield('js')
</body>

<!-- Mirrored from envytheme.com/tf-demo/edufield/index-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 18:45:34 GMT -->
</html>
