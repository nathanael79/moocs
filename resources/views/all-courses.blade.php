@extends('layouts.front_end.main_layout')
@section('contain_section')
<!-- Start Page Title Area -->
<div class="page-title">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <h3>All Courses</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Courses Area -->
<section class="courses-area ptb-100">
    <div class="container">
        <div class="row">
            @foreach($course as $data =>$item)
            <div class="col-lg-4 col-md-6">
                <div class="courses-item">
                    <div class="courses-img">
                        <img src="{!! asset('images/courses/').'/'.$item->pictures !!}" alt="course">
                    </div>

                    <div class="courses-content">
                        <h3><a href="#">{{$item->course_name}}</a></h3>
                        <ul>
                            <li><i class="icofont-star"></i></li>
                            <li><i class="icofont-star"></i></li>
                            <li><i class="icofont-star"></i></li>
                            <li><i class="icofont-star"></i></li>
                            <li><i class="icofont-star"></i></li>
                            <li><span>(15 reviews)</span></li>
                        </ul>

                        <p>{{$item->keterangan}}</p>
                    </div>

                    <div class="courses-content-bottom">
                        <h4 class="price"><span>$140</span> $120</h4>
                        <h4><a href="{{url('/single-course').'/'.$item->id}}" class="btn btn-primary">Read More</a></h4>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <i class="icofont-stylish-left"></i>
                                </a>
                            </li>

                            <li class="page-item active"><a class="page-link" href="#">{{ $course->links() }}</a></li>

                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="icofont-stylish-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End Courses Area -->
@endsection
