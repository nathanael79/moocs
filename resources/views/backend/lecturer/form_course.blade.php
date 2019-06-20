
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
                        <form method="post" action="{{url('/lecturer/storeCourse')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6 class="heading-small text-muted mb-4">Course Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group {{ $errors->has('course_name') ? 'has-error' : '' }}">
                                            <label class="form-control-label" for="input-course-name">Course Name</label>
                                            <input type="text" id="input-course-name" name='course_name' class="form-control" placeholder="Input Course Name"  value="{{ old('course_name') }}">
                                            @if ($errors->has('course_name'))
                                                <span class="text-danger">{{ $errors->first('course_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group {{ $errors->has('course_description') ? 'has-error' : '' }}">
                                            <label class="form-control-label">Course Description</label>
                                            <textarea type="text" name="course_description" class="form-control" rows="10" placeholder="Input your course description" value="{{old('course_description')}}"></textarea>
                                            @if($errors->has('course_description'))
                                                <span class="text-danger">{{ $errors->first('course_description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group {{$errors->has('course_picture') ? 'has-error' : ''}}">
                                            <label class="form-control-label">Course Picture</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label">Upload in here</label>
                                                <input type="file"  class="custom-file-input" name="course_picture">
                                                @if($errors->has('course_picture'))
                                                    <span class="text-danger">{{ $errors->first('course_picture') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group {{$errors->has('course_category') ? 'has-error' : ''}}">
                                            <label class="form-control-label" for="course_category">Course Category</label>
                                            <input type="hidden" name="course_category_hid" id="course_category_hid">
                                            <select id="course_category" name="course_category" class="form-control"></select>
                                            @if($errors->has('course_category'))
                                                <span class="text-danger">{{ $errors->first('course_category') }}</span>
                                            @endif
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
            $('#course_category').select2({
                ajax:{
                    type:"GET",
                    placeholder:"Choose your category in here",
                    url:"{{url('/coursecategory')}}",
                    dataType:"json",
                    data :function(params){
                        return{
                            key:params.term
                        };
                    },
                    processResults:function(data){
                        return{
                            results:data
                        };
                    },
                    cache:true
                },
            }).on('select2:select',function (evt) {
                var data = $('#course_category option:selected').val();
                $('#course_category_hid').val(data);
            });
        })
    </script>
@endsection
