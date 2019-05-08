@extends('backend.lecturer.dashboard_layout')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('main_content')
    <!--Mask Header-->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url('../../assets/img/theme/profile-cover.jpg'); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-orange opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">{{$course_profile->course_name}}</h1>
                    <p class="text-white mt-0 mb-5">Course Description</p>
                    {{--  <a href="profile.blade.php#!" class="btn btn-neutral">Edit profile</a>--}}
                </div>
            </div>
        </div>
    </div>
    <!--Mask Header-->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card bg-gradient-info border-0">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Member</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap text-light">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-gradient-danger border-0">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Sub Course</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-spaceship"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap text-light">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Sub Course List</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-form">Add Sub Course</button>
                            </div>
                        </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <table class="table table-hover align-items-center" id="myTable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Sub Course Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-0">

                                        <div class="card bg-secondary border-0 mb-0">
                                            <div class="card-body px-lg-5 py-lg-5">
                                                <div class="text-center text-muted mb-4">
                                                    <small>Insert the sub course name</small>
                                                </div>
                                                <form role="form" method="POST" action="{{url('/lecturer/storeSubCourse')}}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group mb-3 {{ $errors->has('sub_course_name') ? 'has-error' : '' }}">
                                                        <div class="input-group input-group-merge input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-book-bookmark"></i></span>
                                                            </div>
                                                            <input type="hidden" name="course_id" value="{{$course_profile->id}}">
                                                            <input class="form-control" id="sub_course_name" placeholder="Sub Course Name" type="text" name="sub_course_name" value="{{old('sub_course_name')}}">
                                                            @if ($errors->has('sub_course_name'))
                                                                <span class="text-danger">{{ $errors->first('sub_course_name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        {{--<a href="{{url('/lecturer/course_profile')}}" class="btn btn-danger active" role="button" aria-pressed="true">Cancel</a>--}}
                                                        <button type="submit" id="createSubCourse" class="btn btn-primary my-4">Create</button>
                                                    </div>
                                                </form>
                                            </div>
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
            $('#myTable').dataTable({
                'ajax':'{{url('/lecturer/getSubCourses')}}',
                'autoWidth':false,
                'columns':[
                    {'data':'created_at'},
                    {'data':'sub_course_name'},
                    { render: function(data, type, row, meta){
                            return "<div class='btn-group'>"+
                                "<a href='{{url('/lecturer/sub_course_profile')}}/"+row["id"]+"' class='btn btn-info' '><span class=\"btn-inner--icon\"><i class=\"ni ni-bullet-list-67\" title='Details'></i></span></a>"+
                                "<a href='{{url("#")}}/"+row["id"]+"' class='btn btn-danger'><span class=\"btn-inner--icon\"><i class=\"ni ni-fat-remove\" title='Delete'></i></span></a>"+
                                "</div>";
                        }
                    }
                ]
            })
            
        })


    </script>
@endsection
