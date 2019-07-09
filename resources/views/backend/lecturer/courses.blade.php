@extends('backend.lecturer.dashboard_layout')
@section('main_content')
    <div class="main-content" id="panel">
        <!-- Header -->
        <div class="header bg-gradient-orange pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Lecturer Dashboard</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{url('/lecturer')}}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{url('/lecturer/courses')}}">Your Courses</a></li>
                                    {{--                     <li class="breadcrumb-item active" aria-current="page">Default</li>--}}
                                </ol>
                            </nav>
                        </div>
                        {{--                        <div class="col-lg-6 col-5 text-right">
                                                    <a href="dashboard.blade.php#" class="btn btn-sm btn-neutral">New</a>
                                                    <a href="dashboard.blade.php#" class="btn btn-sm btn-neutral">Filters</a>
                                                </div>--}}
                    </div>
                    <!-- Card stats -->
                    {{--<div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                            <span class="h2 font-weight-bold mb-0">350,897</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-active-40"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                            <span class="h2 font-weight-bold mb-0">2,356</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="ni ni-chart-pie-35"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                            <span class="h2 font-weight-bold mb-0">924</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="ni ni-money-coins"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                            <span class="h2 font-weight-bold mb-0">49,65%</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">

            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Course List</h3>
                        </div>
                        <div class="col-lg-3 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form"><i class="ni ni-fat-add">Add New Course</i></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 mb-5 mb-xl-0">
                        <div class="table-responsive" >
                            <table class="table table-hover" id="myTable">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Courses</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{url('/lecturer/storeCourse')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
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
            {{--<footer class="footer pt-0">
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
            </footer>--}}
        </div>
    </div>
@endsection

@section('js')

    <script type="application/javascript">
        $(document).ready(function () {
            $('#course_category').select2({
                dropdownParent: $('#modal-form'),
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

    <script type="application/javascript">
        $(document).ready(function () {
            $('#myTable').dataTable({
                "ajax":"{{url('/lecturer/getCourses')}}",
                "autoWidth": false,
                "columns":
                    [
                        {"data":"created_at"},
                        {"data":"course_name"},
                        {"data":"status"},
                        { render: function(data, type, row, meta){
                                return "<div class='btn-group'>"+
                                    "<a href='{{url('/lecturer/course_profile')}}/"+row["id"]+"' class='btn btn-info' '><span class=\"btn-inner--icon\"><i class=\"ni ni-bullet-list-67\" title='Details'></i></span></a>"+
                                    "<a href='{{url("/lecturer/delete_course")}}/"+row["id"]+"' class='btn btn-danger'><span class=\"btn-inner--icon\"><i class=\"ni ni-fat-remove\" title='Delete'></i></span></a>"+
                                    "</div>";
                            }
                        }
                    ],

            })
        })
    </script>
@endsection
