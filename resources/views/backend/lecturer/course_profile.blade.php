@extends('backend.lecturer.dashboard_layout')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('main_content')
    <!--Mask Header-->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('../../images/courses/'.$course_profile->pictures)}}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-orange opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">{{$course_profile->course_name}}</h1>
                    <p class="text-white mt-0 mb-5">{{$course_profile->keterangan}}</p>
                    {{--  <a href="profile.blade.php#!" class="btn btn-neutral">Edit profile</a>--}}
                </div>
                <div class="col-lg-7 col-md-10">

                    <p class="text-white mt-0 mb-5">Category: {{$course_profile->course_category}}</p>
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
                <!--COURSE INFORMATION-->
                <div class="card">
                        <div class="card-body">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Sub Course List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Course Information</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                            <div class="table-responsive">
                                                <div>
                                                    <table class="table table-hover align-items-center table-dark" id="myTable">
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
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                            <form action="{{url('/lecturer/update-course'.'/'.$course_profile->id)}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group {{ $errors->has('course_name') ? 'has-error' : '' }}">
                                                                <label class="form-control-label" for="input-course-name">Course Name</label>
                                                                <input type="text" id="input-course-name" name='course_name' class="form-control" value="{{ $course_profile->course_name }}">
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
                                                                <textarea type="text" name="course_description" class="form-control" rows="3">{{$course_profile->keterangan}}</textarea>
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
                                                                    <span class="btn-inner--text">Save Informations</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="application/javascript">
        $(document).ready(function () {
            $('#myTable').dataTable({
                dom: 'Bfrtip',
                ajax:'{{url('/lecturer/getSubCourses/'.$course_profile->id)}}',
                autoWidth:false,
                columns:[
                    {'data':'created_at'},
                    {'data':'sub_course_name'},
                    { render: function(data, type, row, meta){
                            return "<div class='btn-group'>"+
                                "<a href='{{url('/lecturer/sub_course_profile')}}/"+row["id"]+"' class='btn btn-info' '><span class=\"btn-inner--icon\"><i class=\"ni ni-bullet-list-67\" title='Details'></i></span></a>"+
                                "<a href='{{url("#")}}/"+row["id"]+"' class='btn btn-danger'><span class=\"btn-inner--icon\"><i class=\"ni ni-fat-remove\" title='Delete'></i></span></a>"+
                                "</div>";
                        }
                    }
                ],
                buttons: [
                    {
                        text: 'Add new Sub Course',
                        action: function ( e, dt, node, config ) {
                            $('#modal-form').modal('show')
                        }
                    }
                ]
            });

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
