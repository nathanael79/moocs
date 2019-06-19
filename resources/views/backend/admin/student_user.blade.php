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
                            <h3 class="mb-0">Students List</h3>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form"><i class="ni ni-fat-add">Add New Student</i></button>
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
                                            <large>Create new account for student</large>
                                        </div>
                                        <form role="form" method="POST" action="{{url('/admin/create-student')}}">
                                            {{ csrf_field() }}
                                            <div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label class="form-control-label">Name</label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                    </div>
                                                    <input class="form-control" id="name" placeholder="Name" type="text" name="name" value="{{old('name')}}">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                                                <label class="form-control-label">Email</label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                    </div>
                                                    <input class="form-control" id="email" placeholder="Email" type="email" name="email" value="{{old('email')}}">
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-password">Password</label>
                                                <input name="password" type="password" id="input-password" class="form-control" placeholder="Password">
                                            </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">Gender</label>
                                                            <select name="gender" id="gender">
                                                                <option value="Pria">Pria</option>
                                                                <option value="Wanita">Wanita</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group {{$errors->has('address')}}">
                                                        <label class="form-control-label" for="input-address">Address</label>
                                                        <textarea type="text" id="address" name="address" class="form-control" rows="4" placeholder="Address"></textarea>
                                                        @if ($errors->has('address'))
                                                            <span class="text-danger">{{ $errors->first('adress') }}</span>
                                                        @endif
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
                <!--Modal Edit -->
                <div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card bg-secondary border-0 mb-0">
                                    <div class="card-body px-lg-5 py-lg-5">
                                        <div class="text-center text-muted mb-4">
                                            <large>Lecturer Profile</large>
                                        </div>
                                        <form role="form" method="POST" action="{{url('/admin/update-student')}}">
                                            {{ csrf_field() }}
                                            <div class="form-group mb-3 {{ $errors->has('modal-name') ? 'has-error' : '' }}">
                                                <label class="form-control-label">Name</label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                    </div>
                                                    <input type="hidden" name="student_id" id="student_id">
                                                    <input class="form-control" id="modal-name" placeholder="Name" type="text" name="modal_name" value="">
                                                    @if ($errors->has('modal-name'))
                                                        <span class="text-danger">{{ $errors->first('modal-name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 {{ $errors->has('modal-email') ? 'has-error' : '' }}">
                                                <label class="form-control-label" >Email</label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                    </div>
                                                    <input class="form-control" id="modal-email" placeholder="Email" type="email" name="modal_email" value="">
                                                    @if ($errors->has('modal-email'))
                                                        <span class="text-danger">{{ $errors->first('modal-email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-password">Password</label>
                                                        <input name="password" type="password" id="password" class="form-control" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-address">Gender</label>
                                                        <select name="gender" id="gender-edit">
                                                            <option value="Pria">Pria</option>
                                                            <option value="Wanita">Wanita</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-address">Address</label>
                                                        {{--<div class="ql-toolbar ql-snow"></div>--}}
                                                        <textarea type="text" id="address" name="address" class="form-control" rows="4" placeholder="Address"></textarea>
                                                        {{--<div data-toggle="quill" data-quill-placeholder="Quill WYSIWYG" id="address"></div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group" id="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                {{--<a href="{{url('/lecturer/course_profile')}}" class="btn btn-danger active" role="button" aria-pressed="true">Cancel</a>--}}
                                                <button type="submit" class="btn btn-primary my-4">Update</button>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Registered at</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                            </table>

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
                url:'{{url('/admin/get-student-one/')}}',
                type:'post',
                dataType:'json',
                data:
                    {
                        id:id
                    },
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success:function (res) {
                    console.log(res.data[0].nrp_dosen);
                    $('#student_id').val(res.data[0].user_id);
                    $('#modal-name').val(res.data[0].name);
                    $('#modal-email').val(res.data[0].user_email);
                    $('#gender-edit').val(res.data[0].gender);
                    $('#address').val(res.data[0].address);
                    $('#image').html("<center><img src='{{ asset("../../images/users/student/") }}/"+res.data[0].pictures+"' style='width:200px'></center>")
                    $('#modal-form-edit').modal('show');
                },
                error:function (err) {
                    console.log(err);
                }


            });
        }

        $(document).ready(function () {
            $('#myTable').dataTable({
                "ajax":"{{url('/admin/getStudent')}}",
                "autoWidth": false,
                "columns":
                    [
                        {"data":"name"},
                        {"data":"user_email"},
                        {"data":"gender"},
                        {"data":"created_at"},
                        { render: function(data, type, row, meta){
                                return "<div class='btn-group'>"+
                                    '<button type="button" class="btn btn-primary" onclick="myModal(' + row["user_id"] + ')"><i class="ni ni-ruler-pencil"></i></button>'+
                                    "<a href='{{url("/admin/delete-student")}}/"+row["user_id"]+"' class='btn btn-danger'><span class=\"btn-inner--icon\"><i class=\"ni ni-fat-remove\" title='Delete'></i></span></a>"+
                                    "</div>";
                            }
                        }
                    ],
            })
        })


    </script>

    <script>
        $('#gender').select2({
            dropdownParent: $('#modal-form')
        })

        $('#gender-edit').select2({
            dropdownParent: $('#modal-form-edit')
        })
    </script>
@endsection
