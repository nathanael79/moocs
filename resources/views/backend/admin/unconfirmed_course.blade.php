@extends('backend.admin.dashboard_layout')
@section('main_content')
    <div class="main-content" id="panel">
        <!-- Header -->
        <div class="header bg-gradient-purple pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Admin Dashboard</h6>
                        </div>
                    </div>
                    <!-- Card stats -->
                    <div class="row">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Unconfirmed Courses List</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 mb-5 mb-xl-0">
                        <div class="table-responsive" >
                            <table class="table table-hover" id="myTable">
                                <thead class="thead-light">
                                <tr>
                                    {{--<th scope="col">Created At</th>--}}
                                    <th scope="col">Courses</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Lecturer</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{url('/admin/update-course')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group {{ $errors->has('course_name') ? 'has-error' : '' }}">
                                                    <label class="form-control-label" for="course-name">Course Name</label>
                                                    <input type="hidden" id="course_id" name="course_id">
                                                    <input type="text" id="course_name" name='course_name' class="form-control" placeholder="Input Course Name"  value="{{ old('course_name') }}">
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
                                                    <textarea type="text" id="course_description" name="course_description" class="form-control" rows="10" placeholder="Input your course description" value="{{old('course_description')}}"></textarea>
                                                    @if($errors->has('course_description'))
                                                        <span class="text-danger">{{ $errors->first('course_description') }}</span>
                                                    @endif
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
                                                <div class="form-group {{$errors->has('course_status') ? 'has-error' : ''}}">
                                                    <label class="form-control-label" for="course_category">Course Status</label>
                                                    <input type="hidden" name="course_status_hid" id="course_status_hid">
                                                    <select id="course_status" name="course_status" class="form-control">
                                                        <option value="pending">Pending</option>
                                                        <option value="approved">Approved</option>
                                                        <option value="rejected">Rejected</option>
                                                    </select>
                                                    @if($errors->has('course_category'))
                                                        <span class="text-danger">{{ $errors->first('course_category') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group" id="image">
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
@endsection

@section('js')
    <script type="application/javascript">
        function myModal(id)
        {
            $.ajax({
                url:'{{url('/admin/get-one-course/')}}',
                type:'post',
                dataType:'json',
                data:
                    {
                        id:id
                    },
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success:function (res) {
                    $('#course_id').val(res.data.id);
                    $('#course_name').val(res.data.course_name);
                    $('#course_description').val(res.data.keterangan);
                    $('#course_category').val(res.data.course_category_name);
                    $('#image').html("<center><img src='{{ asset("../../images/courses/") }}/"+res.data.pictures+"' style='width:200px'></center>")
                    $('#modal-form-edit').modal('show');
                },
                error:function (err) {
                    console.log(err);
                }


            });
        }


        $(document).ready(function () {
            $('#course_category').select2({
                dropdownParent: $('#modal-form-edit'),
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

            $('#course_status').select2({
                dropdownParent: $('#modal-form-edit'),
            }).on('select2:select',function (evt) {
                var data = $('#course_status option:selected').val();
                $('#course_status_hid').val(data);
            });


            $('#myTable').dataTable({
                "ajax":"{{url('/admin/unconfirmed-course')}}",
                "autoWidth": false,
                "columns":
                    [
                        //{"data":"created_at"},
                        {"data":"course_name"},
                        {"data":"keterangan"},
                        {"data":"name"},
                        {"data":"created_at"},
                        {"data":"status"},
                        { render: function(data, type, row, meta){
                                return "<div class='btn-group'>"+
                                    '<button type="button" class="btn btn-primary" onclick="myModal(' + row["id"] + ')"><i class="ni ni-ruler-pencil"></i></button>'+
                                    '<a href="{{url('#')}}/'+row["id"]+'" class="btn btn-danger"><span class="btn-inner--icon"><i class="ni ni-fat-remove" title="Delete"></i></span></a>'+
                                    '</div>';
                            }
                        }
                    ],
            })
        })
    </script>
@endsection
