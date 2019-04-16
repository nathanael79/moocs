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
                                <li class="breadcrumb-item active" aria-current="page">Course Name</li>
                                <li class="breadcrumb-item active" aria-current="page">Sub Course Page</li>
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
                                <h3 class="mb-0">Sub Course Name</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('#')}}">
                            {{ csrf_field() }}
                            <h6 class="heading-small text-muted mb-4">Sub Course Content</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-course-name">Content Name</label>
                                            <input type="text" id="input-course-name" name='course_name' class="form-control" placeholder="Input Course Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-inline">
                                            <label class="form-control-label" for="input-course-name">Content Type</label>
                                            <label class="custom-toggle">
                                                <input type="checkbox" checked>
                                                <span class="custom-toggle-slider rounded-circle" id='toggle_content' data-label-off="Text" data-label-on="Video"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" id="sub_course_content">
                                            <textarea type="text" id="input-course-description" style="display: none" name="course_desription" class="form-control" rows="10" placeholder="Input your course description"></textarea>
                                            <div class="dropzone dropzone-single"  data-toggle="dropzone" data-dropzone-url="http://">
                                                <div class="fallback">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="dropzoneBasicUpload">
                                                        <label class="custom-file-label" for="dropzoneBasicUpload">Choose file</label>
                                                    </div>
                                                </div>

                                                <div class="dz-preview dz-preview-single">
                                                    <div class="dz-preview-cover">
                                                        <img class="dz-preview-img" src="..." alt="..." data-dz-thumbnail>
                                                    </div>
                                                </div>
                                            </div>
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
//            $('#sub_course_content').hide();

            $('#toggle_content').click(function () {
                $('#sub_course_content').toggle('0',function () {
                    $('#sub_course_content').hide();
                    $('#input-course-description').show()
                })
            })
        })
    </script>
@endsection