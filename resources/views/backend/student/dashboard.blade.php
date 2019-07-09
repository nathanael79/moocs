@extends('backend.student.dashboard_layout')
@section('main_content')
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <!-- Header -->
        <div class="header bg-gradient-info pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Student Dashboard</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--5">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Enrollment Courses</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 mb-5 mb-xl-0">
                        <div class="table-responsive">
                            <table class="table align-items-center" id="myCourses">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Courses</th>
                                    <th scope="col">Joined at</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#myCourses').dataTable({
                'ajax':'{{url('/get-enrollcourse')}}',
                "autoWidth": false,
                "columnDefs": [
                    {
                        class: "text-center",
                        width: 'auto',
                        "targets": [0],
                        "orderable": false,
                        render: function(data, type, row, meta){
                            return meta.row+meta.settings._iDisplayStart+1
                        }
                    },
                    {
                        "targets": [1],
                        "data": "course_name",
                        width: 'auto',
                        "orderable": true,
                    },
                    {
                        class:"text-center",
                        "orderable": true,
                        "targets": [2],
                        width: 'auto',
                        "data":"created_at"
                    },
                    {
                        targets: [3],
                        "sortable": false,
                        "searchable": false,
                        render: function(data, type, row, meta){
                            return "<div class='btn-group'>"+
                                "<a href='{{url("/matter")}}/"+row["id"]+"' class='btn btn-info'><span class=\"btn-inner--icon\"><i class=\"ni ni-books\" title='Details'></i></span></a>"+
                                "<a href='{{url("/delete-enroll")}}/"+row["id"]+"' class='btn btn-danger'><span class=\"btn-inner--icon\"><i class=\"ni ni-fat-remove\" title='Delete'></i></span></a>"+
                                "</div>";
                        }
                    },
                ],
            })
        })
    </script>
@endsection
