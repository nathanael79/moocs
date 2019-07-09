@include('toast::messages')
@extends('layouts.front_end.main_layout')
@section('contain_section')
    <!-- Start Main Banner Area -->
    <div class="main-banner-two">
        <div class="container">
            <div class="home-slides-two">
                <div class="hero-slides-content item-bg-one">
                    <h1>Welcome to <span>MOOC PENS</span></h1>
                    <a href="{{url('/login')}}" class="btn btn-primary">Sign in Now</a>
                </div>

                <div class="hero-slides-content item-bg-two">
                    <h1>Are you ready to <span>Learn ?</span></h1>
                    <a href="{{url('/login')}}" class="btn btn-primary">Sign in Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->
<!-- Start Popular Courses Area -->
<section class="popular-courses-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Available Courses</h3>
            <p>There are so many courses that available special for you. Teach by PENS Lecturer, you will get high quality of higher education matter. </p>
        </div>

        <div class="row">
            @foreach($course as $data => $item)
            <div class="col-lg-4 col-md-6">
                <div class="single-courses-item">
                    <div class="courses-img text-center">
                        <img src="{!! asset('images/courses/').'/'.$item->pictures !!}" alt="course" style="height: 240px !important;">
                    </div>

                    <div class="courses-content">
                        <h3><a href="{{url('/single-course'.'/'.$item->id)}}">{{$item->course_name}}</a></h3>
                        {{--<ul>
                            <li><i class="icofont-star"></i></li>
                            <li><i class="icofont-star"></i></li>
                            <li><i class="icofont-star"></i></li>
                            <li><i class="icofont-star"></i></li>
                            <li><i class="icofont-star"></i></li>
                        </ul>--}}
                    </div>

                    <div class="courses-content-bottom text-center">
                        @if($item->status == 'approved')
                            <button type="button" class="btn btn-outline-success">{{$item->status}}</button>
                        @elseif($item->status == 'pending')
                            <button type="button" class="btn btn-outline-warning">{{$item->status}}</button>
                        @endif
                       {{-- <h4><i class="icofont-ui-user"></i> 120 Students</h4>
                        <h4 class="price">$120</h4>--}}
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-lg-12 col-md-12">
                <div class="view-all text-center">
                    <a href="{{url('/all-course')}}" class="btn btn-primary">View All Courses <i class="icofont-rounded-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Popular Courses Area -->

<!-- Start Why Choose Us Area CSS -->
<section class="why-choose-us">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="image"></div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="why-choose ptb-100">
                    <h3>Why Choose Us</h3>

                    <div class="single-choose">
                        <div class="icon">
                            <i class="icofont-book-alt"></i>
                        </div>

                        <div class="content">
                            <h4>High Quality Courses</h4>
                            <p>Best quality in their section, have a high accreditation for National Polytechnic Curicullum</p>
                        </div>
                    </div>

                    <div class="single-choose">
                        <div class="icon">
                            <i class="icofont-teacher"></i>
                        </div>

                        <div class="content">
                            <h4>Qualified Teachers</h4>
                            <p>Most of the lecturer is professor and skilled in their section.</p>
                        </div>
                    </div>

                    <div class="single-choose mb-0">
                        <div class="icon">
                            <i class="icofont-support"></i>
                        </div>

                        <div class="content">
                            <h4>24/7 Online Support</h4>
                            <p>Get your online support for teacher and student in here!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why Choose Us Area CSS -->

<!-- Start Teacher Area -->
<section class="teacher-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Our Teacher</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco . </p>
        </div>

        <div class="row">
            @foreach($lecturer as $data => $item)
            <div class="col-lg-4 col-md-6">
                <div class="teacher-box">
                    <div class="pic text-center">
                        <img src="{!! asset('../../images/users/lecturer/'.'/'.$item->pictures) !!}" alt="teacher" style="height: 228px !important">
                        <a href="{{url('/lecturer-profile').'/'.$item->id}}" class="view-profile">View Profile</a>
                    </div>

                    <div class="teacher-content">
                        <h3 class="title"><a href="{{url('/lecturer-profile').'/'.$item->id}}">{{$item->name}}</a></h3>
                        <span class="post">{{$item->nrp_dosen}}</span>

                        <ul>
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                            <li><a href="#"><i class="icofont-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Teacher Area -->

<!-- Start Fun Facts Area -->
<section class="fun-facts-area facts-bg ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="fun-fact">
                    <div class="icon bg-1">
                        <img src="{!! asset('../../edufield/assets/img/icon1.png') !!}" alt="icon">
                    </div>

                    <h3><span class="count">2500</span>+</h3>
                    <h5>Students</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="fun-fact">
                    <div class="icon bg-2">
                        <img src="{!! asset('../../edufield/assets/img/icon2.png') !!}" alt="icon">
                    </div>

                    <h3><span class="count">100</span>+</h3>
                    <h5>Teachers</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="fun-fact">
                    <div class="icon bg-3">
                        <img src="{!! asset('../../edufield/assets/img/icon3.png') !!}" alt="icon">
                    </div>

                    <h3><span class="count">55</span>+</h3>
                    <h5>Winnings Awards</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="fun-fact">
                    <div class="icon bg-4">
                        <img src="{!! asset('../../edufield/assets/img/icon4.png') !!}" alt="icon">
                    </div>

                    <h3><span class="count">1236</span>+</h3>
                    <h5>Certified Students</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Fun Facts Area -->

<!-- Start Testimonials Area -->
<section class="testimonials-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Testimonials</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco . </p>
        </div>
    </div>

    <div class="row m-0">
        <div class="testimonials-slider">
            <div class="col-lg-12 col-md-12">
                <div class="single-feedback">
                    <img src="{!! asset('../../edufield/assets/img/client1.jpg') !!}" alt="client">

                    <div class="feedback-content">
                        <i class="icofont-quote-left"></i>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                        <h3>Jason Stamtham</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="single-feedback">
                    <img src="{!! asset('../../edufield/assets/img/client2.jpg') !!}" alt="client">

                    <div class="feedback-content">
                        <i class="icofont-quote-left"></i>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.</p>

                        <h3>John Doe</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="single-feedback">
                    <img src="{{ asset('../../edufield/assets/img/client3.jpg') }}" alt="client">

                    <div class="feedback-content">
                        <i class="icofont-quote-left"></i>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                        <h3>Steven Smith</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonials Area -->
@endsection
