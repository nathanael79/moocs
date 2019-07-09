@extends('layouts.front_end.main_layout')
@section('contain_section')
<!-- Start Page Title Area -->
<div class="page-title">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <h3>Lecturer Details</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Teacher Details Area -->
<section class="teacher-details-area ptb-100">
    <div class="container">
        <div class="teacher-details">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="teacher-img">
                        <img src="{!! asset('images/users/lecturer').'/'.$lecturer->pictures !!}" alt="teacher">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="teacher-profile">
                        <h3>{{$lecturer->name}}</h3>
                        <span>{{$lecturer->nrp_dosen}}</span>
                    </div>

                   {{-- <div class="teacher-contact-info">
                        <h4>Contact Info:</h4>
                        <ul>
                            <li><i class="icofont-envelope"></i> <a href="#">asdasdasdasdas</a></li>
                            <li><i class="icofont-skype"></i> <a href="#">edustudy_perl</a></li>
                            <li><i class="icofont-phone"></i> <a href="#">+213 241 1265</a></li>
                            <li><i class="icofont-google-map"></i> Lambeth, London SE1 7PB, UK</li>
                        </ul>

                        <ul class="teacher-social">
                            <li><a href="#" class="icofont-facebook"></a></li>
                            <li><a href="#" class="icofont-twitter"></a></li>
                            <li><a href="#" class="icofont-instagram"></a></li>
                            <li><a href="#" class="icofont-linkedin"></a></li>
                        </ul>
                    </div>--}}
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="teacher-contact">
                        <h3>Contact</h3>

                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>

                            <div class="form-group">
                                <textarea name="message" cols="30" rows="3" placeholder="Message" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="single-teacher-about">
                        <h2>Skills</h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <h3 class="progress-title">Accounting</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width:90%;">
                                        <div class="progress-value">90%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <h3 class="progress-title">Writing</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width:90%;">
                                        <div class="progress-value">95%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <h3 class="progress-title">Speaking</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width:90%;">
                                        <div class="progress-value">80%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <h3 class="progress-title">Reading</h3>
                                <div class="progress">
                                    <div class="progress-bar" style="width:90%;">
                                        <div class="progress-value">85%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-desc">
                            <h2>About {{$lecturer->name}}</h2>
                            <p>Aktif mengajar sebagai dosen prodi Multimedia Broadcasting di Politeknik Elektronika Negeri Surabaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="teacher-involved-coures">

        <div class="container">
            <h2>Involved in courses</h2>
            <div class="row">
                @foreach($course as $data => $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single-courses-item">
                        <div class="courses-img">
                            <img src="{!! asset('images/courses').'/'.$item->pictures !!}" alt="course">
                        </div>

                        <div class="courses-content">
                            <h3><a href="#">{{$item->course_name}}</a></h3>
                            <ul>
                                <li><i class="icofont-star"></i></li>
                                <li><i class="icofont-star"></i></li>
                                <li><i class="icofont-star"></i></li>
                                <li><i class="icofont-star"></i></li>
                                <li><i class="icofont-star"></i></li>
                            </ul>
                        </div>

                        <div class="courses-content-bottom">
                            <h4><i class="icofont-ui-user"></i> 120 Students</h4>
                            <h4 class="price">$120</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <div class="col-lg-12 col-md-12">
            <div class="pagination-area">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{ $course->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Teacher Details Area -->
@endsection
