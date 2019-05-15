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
                        <form method="POST" action="{{url('/lecturer/storeContent')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6 class="heading-small text-muted mb-4">Sub Course Content</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group {{$errors->has('content_name') ? 'has-error' : ''}}">
                                            <label class="form-control-label" for="input-course-name">Content Name</label>
                                            <input type="text" id="input-course-name" name='content_name' class="form-control" placeholder="Input Content Name">
                                            @if($errors->has('content_name'))
                                                <span class="text-danger">{{ $errors->first('content_name') }}</span>
                                            @endif
                                            <input name="sub_course_id" type="hidden" value="{{$sub_course->id}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-course-name">Content Details</label>
                                            <select id="select_content" class="form-control form-control-sm" data-toggle="select" title="Select Content" data-live-search="true" data-live-search-placeholder="Search ...">
                                                <option value="video">Video</option>
                                                <option value="text">Text</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" id="sub_course_content">
                                            <textarea type="text" id="content_text" style="display: none"  name="course_description" class="form-control {{$errors->has('course_description') ? 'has-error':''}}" rows="10" placeholder="Input your course description"></textarea>
                                            @if($errors->has('course_description'))
                                                <span class="text-danger">{{ $errors->first('course_description') }}</span>
                                            @endif
                                            <div class="custom-file {{$errors->has('video_file') ? 'has-error':''}}" id="content_video">
                                                <input type="file" class="custom-file-input" id="customFileLang" lang="en" name="video_file">
                                                <label class="custom-file-label" for="customFileLang">Select file</label>
                                                @if($errors->has('video_file'))
                                                    <span class="text-danger">{{ $errors->first('video_file') }}</span>
                                                @endif
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
            $('#select_content').on('select2:select', function (e) {
               var data = e.params.data;
               console.log(data);
               var video = document.getElementById('content_video');
               var text = document.getElementById('content_text');
               if(data.id === 'text')
               {
                   console.log('ini data text');
                   video.style.display = 'none';
                   text.style.display ='block';
               }
               else
               {
                   text.style.display ='none';
                   video.style.display = 'block';
               }
            })



        })
    </script>
@endsection
