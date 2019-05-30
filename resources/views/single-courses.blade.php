@extends('layouts.front_end.main_layout')
@section('contain_section')
<!-- Start Page Title Area -->
<div class="page-title">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <h3>Course Details</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Course Details Area -->
<section class="course-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="courses-details">
                    <div class="courses-details-meta">
                        <ul>
                            <li>
                                <div class="teacher-img">
                                    <img src="{!! asset('images/courses').'/'.$params->pictures !!}" alt="teacher">
                                </div>

                                Teacher: Jasika Pearl
                            </li>

                            <li>
                                Category: Design
                            </li>
                        </ul>

                        <div class="apply-btn">
                            <a href="#" class="btn btn-primary">Enroll Now</a>
                        </div>
                    </div>

                    <div class="courses-details-img">
                        <img src="assets/img/courses-details.jpg" alt="courses-details">
                    </div>

                    <h3>Python for Machine Learning</h3>

                    <p>Learn how to use NumPy, Pandas, Seaborn, Matplotlib, Plotly, Scikit-Learn, Machine Learning, Tensorflow, and more!</p>

                    <div class="course-details-tabs">
                        <ul id="tabs">
                            <li class="active" id="tab_1">Description</li>
                            <li class="inactive" id="tab_2">Curriculum</li>
                            <li class="inactive" id="tab_3">Instructors</li>
                            <li class="inactive" id="tab_4">Review</li>
                        </ul>

                        <div class="content show" id="tab_1_content">
                            <h4 class="title">Course Details</h4>

                            <p>Donec lorem leo, gravida ut cursus et, ultrices non tortor. Duis vel venenatis ligula. Etiam hendrerit at urna ac tempus. Integer sagittis luctus tellus, eu molestie magna volutpat quis. Praesent ullamcorper faucibus quam. Nam sed facilisis neque. Etiam dictum dolor et volutpat malesuada. Aliquam molestie felis in justo feugiat semper. In magna arcu, luctus a nisl et, mollis ultricies sem. Etiam cursus mi eget tellus ultrices fermentum. Vestibulum tempor erat ac eros egestas rutrum.</p>

                            <p class="mb-0">Aliquam pulvinar blandit eros, vel tempor tellus eleifend eget. Vestibulum ultricies egestas ante, eu consectetur leo pretium vel. Aliquam mollis dolor libero, ac sagittis velit dignissim at. Nulla a tellus eu enim porta posuere. Sed posuere at lectus ac fringilla.</p>

                            <div class="requirements-list">
                                <h4 class="title">Requirements</h4>

                                <ul>
                                    <li><i class="icofont-double-right"></i> Use Python for Data Science and Machine Learning</li>
                                    <li><i class="icofont-double-right"></i> Use Spark for Big Data Analysis</li>
                                    <li><i class="icofont-double-right"></i> Implement Machine Learning Algorithms</li>
                                    <li><i class="icofont-double-right"></i> Learn to use NumPy for Numerical Data</li>
                                    <li><i class="icofont-double-right"></i> Learn to use Pandas for Data Analysis</li>
                                    <li><i class="icofont-double-right"></i> Learn to use Matplotlib for Python Plotting</li>
                                </ul>
                            </div>

                            <div class="certification">
                                <h4 class="title">Certification</h4>

                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>

                        <div class="content" id="tab_2_content">
                            <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="mb-0">
                                                1. Welcome to the Courses <span><i class="icofont-rounded-down"></i></span>
                                            </h5>
                                        </a>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <h5 class="mb-0">
                                                2. What is Python <span><i class="icofont-rounded-down"></i></span>
                                            </h5>
                                        </a>
                                    </div>

                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-0">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <h5 class="mb-0">
                                                3. Welcome to the Courses <span><i class="icofont-rounded-down"></i></span>
                                            </h5>
                                        </a>
                                    </div>

                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>

                                                <li>
                                                    <i class="icofont-ui-play"></i> Lecture 1.1

                                                    <span><a href="#">What is Python?</a></span>

                                                    <span class="duration"><i class="icofont-clock-time"></i> 50 min</span>

                                                    <a href="#" class="preview">Preview</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content" id="tab_3_content">
                            <div class="course-author">
                                <div class="img">
                                    <img src="assets/img/teacher-one.jpg" alt="teacher">
                                </div>

                                <div class="author-content">
                                    <h4>Jasika Perl</h4>
                                    <span>Professor</span>
                                    <ul>
                                        <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                        <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                        <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                        <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                                    </ul>
                                    <p>Aliquam pulvinar blandit eros, vel tempor tellus eleifend eget. Vestibulum ultricies egestas ante, eu consectetur leo pretium vel. Aliquam mollis dolor libero, ac sagittis velit dignissim at. Nulla a tellus eu enim porta posuere. Sed posuere at lectus ac fringilla.</p>
                                </div>
                            </div>
                        </div>

                        <div class="content" id="tab_4_content">
                            <div class="courses-review">
                                <div class="single-review">
                                    <div class="img">
                                        <img src="assets/img/teacher-one.jpg" alt="client">
                                    </div>

                                    <div class="client-content">
                                        <h4>Luyes Jagu</h4>
                                        <ul>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                        </ul>
                                        <p>Smply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Smply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>

                                <div class="single-review">
                                    <div class="img">
                                        <img src="assets/img/teacher-one.jpg" alt="client">
                                    </div>

                                    <div class="client-content">
                                        <h4>Luyes Jagu</h4>
                                        <ul>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                        </ul>
                                        <p>Smply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Smply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>

                                <div class="single-review">
                                    <div class="img">
                                        <img src="assets/img/teacher-one.jpg" alt="client">
                                    </div>

                                    <div class="client-content">
                                        <h4>Luyes Jagu</h4>
                                        <ul>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                        </ul>
                                        <p>Smply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Smply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>

                                <div class="single-review mb-0">
                                    <div class="img">
                                        <img src="assets/img/teacher-one.jpg" alt="client">
                                    </div>

                                    <div class="client-content">
                                        <h4>Luyes Jagu</h4>
                                        <ul>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                            <li><i class="icofont-star"></i></li>
                                        </ul>
                                        <p>Smply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Smply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="side-bar mb-0">
                    <div class="single-widget features-box">
                        <h3 class="title">Course Features</h3>

                        <ul>
                            <li><i class="icofont-file-fill"></i> Lectures <span>9</span></li>

                            <li><i class="icofont-clock-time"></i> Duration <span>1.5 hours</span></li>

                            <li><i class="icofont-caret-up"></i> Skill level <span>All level</span></li>

                            <li><i class="icofont-read-book"></i> Language <span>English</span></li>

                            <li><i class="icofont-users-social"></i> Students <span>560</span></li>

                            <li><i class="icofont-certificate-alt-1"></i> Certificate <span>Yes</span></li>

                            <li><i class="icofont-checked"></i> Assessments <span>Yes</span></li>

                            <li><i class="icofont-price"></i> Price  <span>$110.99</span></li>
                        </ul>
                    </div>

                    <div class="single-widget share-boxes">
                        <h3 class="title">Share Courses</h3>

                        <ul>
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont-instagram"></i></a></li>
                            <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                        </ul>
                    </div>

                    <div class="single-widget latest-courses">
                        <h3 class="title">All Courses</h3>

                        <div class="single-latest-courses">
                            <div class="img">
                                <a href="#"><img src="assets/img/course-one.jpg" alt="course"></a>
                            </div>

                            <div class="content">
                                <h4><a href="#">Better tools to support dyslexic students</a></h4>

                                <p><span>$199.99</span> $110.99</p>
                            </div>
                        </div>

                        <div class="single-latest-courses">
                            <div class="img">
                                <a href="#"><img src="assets/img/course-two.jpg" alt="course"></a>
                            </div>

                            <div class="content">
                                <h4><a href="#">Better tools to support dyslexic students</a></h4>

                                <p><span>$199.99</span> $110.99</p>
                            </div>
                        </div>

                        <div class="single-latest-courses mb-0">
                            <div class="img">
                                <a href="#"><img src="assets/img/course-three.jpg" alt="course"></a>
                            </div>

                            <div class="content">
                                <h4><a href="#">Better tools to support dyslexic students</a></h4>

                                <p><span>$199.99</span> $110.99</p>
                            </div>
                        </div>
                    </div>

                    <div class="single-widget latest-courses mb-0">
                        <h3 class="title">Latest Courses</h3>

                        <div class="single-latest-courses">
                            <div class="img">
                                <a href="#"><img src="assets/img/course-one.jpg" alt="course"></a>
                            </div>

                            <div class="content">
                                <h4><a href="#">Better tools to support dyslexic students</a></h4>

                                <p><span>$199.99</span> $110.99</p>
                            </div>
                        </div>

                        <div class="single-latest-courses">
                            <div class="img">
                                <a href="#"><img src="assets/img/course-two.jpg" alt="course"></a>
                            </div>

                            <div class="content">
                                <h4><a href="#">Better tools to support dyslexic students</a></h4>

                                <p><span>$199.99</span> $110.99</p>
                            </div>
                        </div>

                        <div class="single-latest-courses mb-0">
                            <div class="img">
                                <a href="#"><img src="assets/img/course-three.jpg" alt="course"></a>
                            </div>

                            <div class="content">
                                <h4><a href="#">Better tools to support dyslexic students</a></h4>

                                <p><span>$199.99</span> $110.99</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="similar-courses">
        <div class="container">
            <h2>Similar Courses</h2>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-courses-item">
                        <div class="courses-img">
                            <img src="assets/img/course-one.jpg" alt="course">
                        </div>

                        <div class="courses-content">
                            <h3><a href="#">Machine Learning</a></h3>
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

                <div class="col-lg-4 col-md-6">
                    <div class="single-courses-item">
                        <div class="courses-img">
                            <img src="assets/img/course-two.jpg" alt="course">
                        </div>

                        <div class="courses-content">
                            <h3><a href="#">Learning Analytics Course</a></h3>
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
                            <h4 class="price"><span>$140</span> $120</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-courses-item">
                        <div class="courses-img">
                            <img src="assets/img/course-three.jpg" alt="course">
                        </div>

                        <div class="courses-content">
                            <h3><a href="#">Consulting Workshop</a></h3>
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
            </div>
        </div>
    </div>
</section>
<!-- End Course Details Area -->
@endsection
