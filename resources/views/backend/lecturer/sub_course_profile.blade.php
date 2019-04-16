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
                                <h3 class="mb-0">Sub Course Name</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('#')}}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-9">
                                    <h6 class="heading-small text-muted mb-4">Sub Course Content</h6>
                                </div>
                                <div class="col-lg-3">
                                    <a href="{{url('/lecturer/create_sub_course')}}" class="btn btn-icon btn-primary btn-sm" type="button">
                                        <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                        <span class="btn-inner--text">Add new content</span>
                                    </a>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <div>
                                                <table class="table align-items-center">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="number">No</th>
                                                        <th scope="col" class="sort" data-sort="budget">Sub Course Name</th>
                                                        <th scope="col" class="sort" data-sort="status">Amount of Content</th>
                                                        <th scope="col">Details</th>
                                                        <th scope="col" class="sort" data-sort="completion">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list">

                                                    <tr>
                                                        <td class="number">1</td>
                                                        <td class="budget">
                                                            $2500 USD
                                                        </td>
                                                        <td>
                                                            30 Matter
                                                        </td>
                                                        <td>


                                                            <p>
                                                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                                    Button with data-target
                                                                </button>
                                                            </p>
                                                            <div class="collapse" id="collapseExample">
                                                                <div class="card card-body">
                                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                                                </div>
                                                            </div>


                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                    <a class="dropdown-item" href="#">Edit</a>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{--<div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-course-description">Course Description</label>
                                            --}}{{--<div class="ql-toolbar ql-snow"></div>--}}{{--
                                            <textarea type="text" id="input-course-description" name="course_desription" class="form-control" rows="10" placeholder="Input your course description"></textarea>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-9">
                                <h6 class="heading-small text-muted mb-4">Sub Course Question</h6>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{url('/lecturer/sub_course_question')}}" class="btn btn-icon btn-primary btn-sm" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                    <span class="btn-inner--text">Add new question</span>
                                </a>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <div>
                                            <table class="table align-items-center">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" class="sort" data-sort="number">No</th>
                                                    <th scope="col" class="sort" data-sort="budget">Sub Course Name</th>
                                                    <th scope="col" class="sort" data-sort="status">Amount of Content</th>
                                                    <th scope="col">Details</th>
                                                    <th scope="col" class="sort" data-sort="completion">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="list">

                                                <tr>
                                                    <td class="number">1</td>
                                                    <td class="budget">
                                                        $2500 USD
                                                    </td>
                                                    <td>
                                                        30 Matter
                                                    </td>
                                                    <td>


                                                        <p>
                                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                                Button with data-target
                                                            </button>
                                                        </p>
                                                        <div class="collapse" id="collapseExample">
                                                            <div class="card card-body">
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                                            </div>
                                                        </div>


                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{--<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-course-description">Course Description</label>
                                        --}}{{--<div class="ql-toolbar ql-snow"></div>--}}{{--
                                        <textarea type="text" id="input-course-description" name="course_desription" class="form-control" rows="10" placeholder="Input your course description"></textarea>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
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

