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
                                 <li class="breadcrumb-item"><a href="dashboard.blade.php#">Kursus buatan anda</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Buat kursus baru</li>
                             </ol>
                         </nav>
                    </div>
                    {{--<div class="col-lg-6 col-5 text-right">
                        <a href="dashboard.blade.php#" class="btn btn-sm btn-neutral">New</a>
                        <a href="dashboard.blade.php#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>--}}
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
                                <h3 class="mb-0">Buat kursus baru</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('')}}">
                            {{ csrf_field() }}
                            <h6 class="heading-small text-muted mb-4">Course Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-course-name">Course Name</label>
                                            <input type="text" id="input-course-name" name='course_name' class="form-control" placeholder="Masukkan nama kursus">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-image-course">Course Picture</label>
                                            <input type="file" id="input-image-course" class="form-control-file" placeholder="Unggah disini">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="course_category">Course Category</label>
                                            <select id="course_category" name="course_category" class="form-control-sm">
                                                <option value="AL">Alabama</option>
                                                ...
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Sub Course</h6>
                            <div class="pl-lg-4 add_course_section">
                               {{--<div class="row">
                                    <div class="col-lg-1">
                                        <center><h3>2</h3></center>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label class="form-control-label" for="input-content-name">Sub Course Name</label>
                                                <input type="text" id="input-content-name" name='content_name' class="form-control" placeholder="Enter content name">
                                            </div>
                                        </div>
                                        <div class="row content_section_row">
                                            <div class="col-lg-2 justify-content-lg-center">
                                                <h4 style="padding-top:50%;padding-bottom:50%;text-align:center">2.1</h4>
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="form-control-label" for="input-content-name">Content Name</label>
                                                <input type="text" id="input-content-name" name='content_name' class="form-control" placeholder="Enter content name">
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="form-control-label" for="input-image-course">Content File</label>
                                                <input type="file" id="input-image-course" class="form-control-file" placeholder="Upload in here">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="button" class="btn bg-gradient-purple btn-lg btn-block course_content_add">Add new content of section</button>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                            <div class="pl-lg-4">
                                <button type="button" class="btn bg-gradient-orange btn-lg btn-block course_section_add" >Add new section of Sub Courses</button>
                            </div>
                            <hr class="my-4" />
                            <!-- Description -->
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

            });

            var counter = 1;
            $('.course_section_add').on('click',function () {
                $('.add_course_section').append("<div class=\"row\">\n" +
                    "                                    <div class=\"col-lg-1\">\n" +
                    "                                        <center><h3>2</h3></center>\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"col-lg-10\">\n" +
                    "                                        <div class=\"row\">\n" +
                    "                                            <div class=\"col-lg-12\">\n" +
                    "                                                <label class=\"form-control-label\" for=\"input-content-name\">Sub Course Name</label>\n" +
                    "                                                <input type=\"text\" id=\"input-content-name\" name='content_name' class=\"form-control\" placeholder=\"Enter content name\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "                                        <div class=\"row content_section_row\">\n" +
                    "                                            <div class=\"col-lg-2 justify-content-lg-center\">\n" +
                    "                                                <h4 style=\"padding-top:50%;padding-bottom:50%;text-align:center\">2.1</h4>\n" +
                    "                                            </div>\n" +
                    "                                            <div class=\"col-lg-5\">\n" +
                    "                                                <label class=\"form-control-label\" for=\"input-content-name\">Content Name</label>\n" +
                    "                                                <input type=\"text\" id=\"input-content-name\" name='content_name' class=\"form-control\" placeholder=\"Enter content name\">\n" +
                    "                                            </div>\n" +
                    "                                            <div class=\"col-lg-5\">\n" +
                    "                                                <label class=\"form-control-label\" for=\"input-image-course\">Content File</label>\n" +
                    "                                                <input type=\"file\" id=\"input-image-course\" class=\"form-control-file\" placeholder=\"Upload in here\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "                                        <div class=\"row\">\n" +
                    "                                            <button type=\"button\" class=\"btn bg-gradient-purple btn-lg btn-block course_content_add\">Add new content of section</button>\n" +
                    "                                        </div>\n" +
                    "                                    </div>\n" +
                    "                                </div>")
                counter++;
                $('.course_content_add').on('click',function () {
                    $('.content_section_row').append("<div class=\"col-lg-2 justify-content-lg-center\">\n" +
                        "                                                <h4 style=\"padding-top:50%;padding-bottom:50%;text-align:center\">2.1</h4>\n" +
                        "                                            </div>\n" +
                        "                                            <div class=\"col-lg-5\">\n" +
                        "                                                <label class=\"form-control-label\" for=\"input-content-name\">Content Name</label>\n" +
                        "                                                <input type=\"text\" id=\"input-content-name\" name='content_name' class=\"form-control\" placeholder=\"Enter content name\">\n" +
                        "                                            </div>\n" +
                        "                                            <div class=\"col-lg-5\">\n" +
                        "                                                <label class=\"form-control-label\" for=\"input-image-course\">Content File</label>\n" +
                        "                                                <input type=\"file\" id=\"input-image-course\" class=\"form-control-file\" placeholder=\"Upload in here\">\n" +
                        "                                            </div>")

                });
            })


        })
    </script>
@endsection
