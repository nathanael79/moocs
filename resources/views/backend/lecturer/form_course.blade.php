@extends('backend.lecturer.dashboard_layout')
@section('main_content')
    <div class="header bg-gradient-orange pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-12 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Lecturer Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                             <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                 <li class="breadcrumb-item"><a href="dashboard.blade.php#"><i class="fas fa-home"></i></a></li>
                                 <li class="breadcrumb-item"><a href="dashboard.blade.php#">Your Courses</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Make a new course</li>
                             </ol>
                         </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Make a new course</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('#')}}">
                            {{ csrf_field() }}
                            <h6 class="heading-small text-muted mb-4">Course Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-course-name">Course Name</label>
                                            <input type="text" id="input-course-name" name='course_name' class="form-control" placeholder="Input Course Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-course-description">Course Description</label>
                                            {{--<div class="ql-toolbar ql-snow"></div>--}}
                                            <textarea type="text" id="input-course-description" name="course_desription" class="form-control" rows="10" placeholder="Input your course description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-course-name">Course Picture</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="input-image-course">Upload in here</label>
                                                <input type="file" id="input-image-course" class="custom-file-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="course_category">Course Category</label>
                                            <select id="course_category" name="course_category" class="form-control">
                                                <option value="AL">Alabama</option>
                                                ...
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group float-right">
                                            <button class="btn btn-icon btn-primary" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                                <span class="btn-inner--text">Save Course</span>
                                            </button>
                                            <a href="{{url('/lecturer/courses')}}" class="btn btn-icon btn-danger" type="button">
                                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                <span class="btn-inner--text">Cancel</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center text-lg-left text-muted">
                        &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('js')
    <script type="application/javascript">
        $(document).ready(function () {
          $('#course_category').select2({});
        })
    </script>
@endsection
