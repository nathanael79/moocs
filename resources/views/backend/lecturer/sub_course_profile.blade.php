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
                                <h3 class="mb-0">{{$sub_course_profile->sub_course_name}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form-edit"><i class="ni ni-ruler-pencil">Edit Informations</i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>{{$sub_course_profile->sub_course_name}} Content</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>{{$sub_course_profile->sub_course_name}} Question</a>
                                </li>
                            </ul>

                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="row">
                                                <div class="col-lg-9">
                                                    <h6 class="heading-small text-muted mb-4">{{$sub_course_profile->sub_course_name}} Content</h6>
                                                </div>
                                                <div class="col-lg-3 text-right">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form-content"><i class="ni ni-fat-add">Add New Content</i></button>
                                                </div>
                                            </div>
                                        <div class="table-responsive">
                                                            <div>
                                                                <table class="table align-items-center" id="table-content">
                                                                    <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col" class="sort" data-sort="status">No.</th>
                                                                        <th scope="col" class="sort" data-sort="budget">Content Name</th>
                                                                        <th scope="col" class="sort" data-sort="status">Content File</th>
                                                                        <th scope="col" class="sort" data-sort="status">Content Description</th>
                                                                        <th scope="col" class="sort" data-sort="status">View</th>
                                                                        <th scope="col" class="sort" data-sort="completion">Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <h6 class="heading-small text-muted mb-4">{{$sub_course_profile->sub_course_name}} Question</h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form-question"><i class="ni ni-fat-add">Add New Question</i></button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <div>
                                                <table class="table align-items-center" id="myQuestionTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Question</th>
                                                        <th scope="col">True Answer</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="list"></tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{$sub_course_profile->sub_course_name}} Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{url('/lecturer/update-subcourse')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{--<h6 class="heading-small text-muted mb-4">Sub Course Content</h6>--}}
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group {{$errors->has('sub_course_name') ? 'has-error' : ''}}">
                                                            <label class="form-control-label" for="sub_course_name">Content Name</label>
                                                            <input type="text" id="sub_course_name" name='sub_course_name' class="form-control" placeholder="Input Sub Course Name" value="{{$sub_course_profile->sub_course_name}}">
                                                            @if($errors->has('sub_course_name'))
                                                                <span class="text-danger">{{ $errors->first('sub_course_name') }}</span>
                                                            @endif
                                                            <input name="sub_course_id" type="hidden" value="{{$sub_course_profile->id}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group float-right">
                                                            <button class="btn btn-icon btn-primary custom-control-inline" type="submit">
                                                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                                                <span class="btn-inner--text">Update Sub Course</span>
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
                        <!-- Modal -->
                        <div class="modal fade" id="modal-form-content" tabindex="-1" role="dialog" aria-labelledby="modal-form-content" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Insert {{$sub_course_profile->sub_course_name}} content</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{url('/lecturer/storeContent')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{--<h6 class="heading-small text-muted mb-4">Sub Course Content</h6>--}}
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group {{$errors->has('content_name') ? 'has-error' : ''}}">
                                                            <label class="form-control-label" for="input-course-name">Content Name</label>
                                                            <input type="text" id="input-course-name" name='content_name' class="form-control" placeholder="Input Content Name">
                                                            @if($errors->has('content_name'))
                                                                <span class="text-danger">{{ $errors->first('content_name') }}</span>
                                                            @endif
                                                            <input name="sub_course_id" type="hidden" value="{{$sub_course_profile->id}}">
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
                                                            <label class="form-control-label" for="input-course-name">Content Input</label>
                                                            <textarea type="text" id="content_text" style="display: none"  name="course_description" class="form-control {{$errors->has('course_description') ? 'has-error':''}}" rows="10" placeholder="Input your course description"></textarea>
                                                            @if($errors->has('course_description'))
                                                                <span class="text-danger">{{ $errors->first('course_description') }}</span>
                                                            @endif
                                                            <div class="custom-file {{$errors->has('video_file') ? 'has-er/ror':''}}" id="content_video">
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
                                                            <button class="btn btn-icon btn-primary custom-control-inline" type="submit">
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
                        <!-- Modal -->
                        <div class="modal fade" id="modal-form-question" tabindex="-1" role="dialog" aria-labelledby="modal-form-question" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Insert {{$sub_course_profile->sub_course_name}} question</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{url('/lecturer/create-question')}}" id="myForm">
                                            {{ csrf_field() }}
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <input type="hidden" name="sub_course_id_q" value="{{$sub_course_profile->id}}">
                                                            <label class="form-control-label" for="input-question">Question</label>
                                                            <textarea type="text" id="input-question" name="question" class="form-control" rows="10" placeholder="Input your question here"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12" id="answer_section">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-course-name">Answer</label>
                                                            <p>Please choose the right answer using radio button below</p>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <input type="hidden" name="opsi_huruf" id="opsi_huruf">
                                                                        <input type="radio" aria-label="Radio button for following text input" onclick="myAnswer(1)" id='options' name="options[]">
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control opsi-1" aria-label="Text input with radio button" id="options_desc" name="options_desc[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <button type="button" id="add_button" class="btn btn-primary btn-lg btn-block">Add answer option</button>
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
            var i=0;
            $('#add_button').on('click',function () {
                ++i
                $('#answer_section').append('<div class="form-group">\n' +
                    '    <div class="input-group">\n' +
                    '        <div class="input-group-prepend">\n' +
                    '            <div class="input-group-text">\n' +
                    '                <input type="radio" aria-label="Radio button for following text input" onclick="myAnswer('+(i+1)+')" id="options" name="options[]">\n' +
                    '            </div>\n' +
                    '        </div>\n' +
                    '        <input type="text" class="form-control opsi-'+(i+1)+'" aria-label="Text input with radio button" id="options_desc" name="options_desc[]">\n' +
                    '    </div>\n' +
                    '</div>');
            });
        })
    </script>

    <script type="application/javascript">

        function myAnswer(i) {
            var data = $(".opsi-"+i).val();
            console.log(data);
            $('#opsi_huruf').val(data);
        }


        function myContent(content)
        {
            console.log(content);
            var video = document.getElementById('content_video');
            var text = document.getElementById('content_text');
            if(content === 'text')
            {
                //console.log('ini data text');
                video.style.display = 'none';
                text.style.display ='block';
            }
            else
            {
                text.style.display ='none';
                video.style.display = 'block';
            }
        }


        $(document).ready(function () {
            $('#select_content').select2({
                dropdownParent: $('#modal-form-content')
            }).on('select2:select',function (evt) {
                var content = $('#select_content option:selected').val();
                myContent(content);
            });


        })
    </script>

    <script type="application/javascript">
        $(document).ready(function () {
            $('#table-content').dataTable({
                "ajax":"{{url('/lecturer/sub-course-detail/'.$sub_course_profile->id)}}",
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
                        "data": "sub_course_detail_name",
                        width: 90,
                        "orderable": true,
                    },
                    {
                        class:"text-center",
                        "orderable": false,
                        "targets": [2],
                        width:25,
                        "data":"sub_course_detail_file",
                        "render": function ( data, type, full, meta ) {
                            return ' <center><video width="160" height="120" controls>\n' +
                                ' <source src="{{asset('videos/courses/')}}/'+data+'">\n' +
                                ' </video></center>';
                                }
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [3],
                        "data": "sub_course_detail_description"
                    },
                    {
                        class: "text-center",
                        "orderable": false,
                        "targets": [4],
                        "data": "view"
                    },
                    {
                        targets: [5],
                        "sortable": false,
                        "searchable": false,
                        render: function(data, type, row, meta){
                            return "<div class='btn-group'>"+
                                "<a href='{{url('#')}}/"+row["id"]+"' class='btn btn-info' '><span class=\"btn-inner--icon\"><i class=\"ni ni-bullet-list-67\" title='Details'></i></span></a>"+
                                "<a href='{{url("/lecturer/delete-subcourse-detail")}}/"+row["id"]+"' class='btn btn-danger'><span class=\"btn-inner--icon\"><i class=\"ni ni-fat-remove\" title='Delete'></i></span></a>"+
                                "</div>";
                        }
                    },
                ],

            });
        })
    </script>

    <script type="application/javascript">
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "{{url('/lecturer/assignment-details/'.$sub_course_profile->id)}}",
                cache:false,
                success:function (res) {
                    console.log(res.data.assignment_question);
                },
                error:function (e) {
                    console.log(e);
                }

            })
        })
    </script>


@endsection

