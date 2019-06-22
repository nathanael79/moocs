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
                            <h3 class="mb-0">Course Category List</h3>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form"><i class="ni ni-fat-add">Add New Category</i></button>
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
                                            <large>Create new course category</large>
                                        </div>
                                        <form role="form" method="POST" action="{{url('/admin/create-course-category')}}">
                                            {{ csrf_field() }}
                                            <div class="form-group mb-3 {{ $errors->has('course_category_name') ? 'has-error' : '' }}">
                                                <label class="form-control-label">Course Category Name</label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                    </div>
                                                    <input class="form-control" id="course_category_name" placeholder="Name" type="text" name="course_category_name" value="{{old('course_category_name')}}">
                                                    @if ($errors->has('course_category_name'))
                                                        <span class="text-danger">{{ $errors->first('course_category_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary my-4">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 mb-5 mb-xl-0">
                        <div class="table-responsive" >
                            <table class="table table-hover" id="myTable">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Course Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!--Modal Edit -->
            <div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-4">
                                        <large>Edit Course Category</large>
                                    </div>
                                    <form role="form" method="POST" action="{{url('/admin/update-course-category')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group mb-3 {{ $errors->has('course_category_name_edit') ? 'has-error' : '' }}">
                                            <label class="form-control-label">Course Category Name</label>
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                </div>
                                                <input type="hidden" name="course_category_id_edit" id="course_category_id_edit">
                                                <input class="form-control" id="course_category_name_edit" placeholder="Name" type="text" name="course_category_name_edit" value="{{old('course_category_name_edit')}}">
                                                @if ($errors->has('course_category_name_edit'))
                                                    <span class="text-danger">{{ $errors->first('course_category_name_edit') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            {{--<a href="{{url('/lecturer/course_profile')}}" class="btn btn-danger active" role="button" aria-pressed="true">Cancel</a>--}}
                                            <button type="submit" id="createSubCourse" class="btn btn-primary my-4">Update</button>
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
    </div>


@endsection

@section('js')
<script type="application/javascript">
    function myModal(id)
    {
        console.log(id);
        $.ajax({
            url:'{{url('/admin/get-one-coursecategory/')}}',
            type:'post',
            dataType:'json',
            data:
                {
                    id:id
                },
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success:function (res) {
                console.log(res);
                $('#course_category_id_edit').val(res.data.id);
                $('#course_category_name_edit').val(res.data.course_category_name);
                $('#modal-form-edit').modal('show');
            },
            error:function (err) {
                console.log(err);
            }


        });
    }

    $(document).ready(function () {
        $('#myTable').dataTable({
            "ajax":"{{url('/admin/get-course-category')}}",
            "autoWidth": false,
            "columns":
                [
                    {"data":"id"},
                    {"data":"course_category_name"},
                    { render: function(data, type, row, meta){
                            return "<div class='btn-group'>"+
                                '<button type="button" class="btn btn-primary" onclick="myModal(' + row["id"] + ')"><i class="ni ni-ruler-pencil"></i></button>'+
                                "<a href='{{url("/admin/delete-course-category")}}/"+row["id"]+"' class='btn btn-danger'><span class=\"btn-inner--icon\"><i class=\"ni ni-fat-remove\" title='Delete'></i></span></a>"+
                                "</div>";
                        }
                    }
                ],
        })
    })
</script>
@endsection

