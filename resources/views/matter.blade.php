@extends('layouts.dashboard')
@section('sidenav')
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="nav-brand" href="{{url('/lecturer/courses')}}">
                    <img src="{!! asset('../../images/logo.png') !!}" alt="logo" style="width: 175px;">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <h4 class="navbar-heading p-0">{{$course->course_name}}</h4>
                    <ul class="navbar-nav">
                        @foreach($course->subCourse as $subcourses)
                            @if($subcourses->subCourseDetail->count() == 0)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                            <i class="ni ni-bold-right text-blue"></i>
                                            <span class="nav-link-text">{{$subcourses->sub_course_name}}</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#{{$subcourses->sub_course_name}}" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                                            <i class="ni ni-bold-right text-primary"></i>
                                            <span class="nav-link-text">{{$subcourses->sub_course_name}}</span>
                                        </a>
                                        @foreach($subcourses->subCourseDetail as $detail)
                                       <div class="collapse show" id="{{$subcourses->sub_course_name}}"> <!--menampilkan nama subcourse-->
                                            <ul class="nav nav-sm flex-column">
                                              <li class="nav-item">
                                                    <a href="#" class="nav-link" onclick="myFunction({{$detail->id}})">{{$detail->sub_course_detail_name}}</a>
                                              </li>
                                            </ul>
                                        @endforeach
                                        @foreach($subcourses->assignment as $assignments)
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <input type="hidden" value="" class="value-{{$assignments->id}}">
                                                        <a href="#" class="nav-link" onclick="myQuestion({{$assignments->id}})">{{$subcourses->sub_course_name}} - Question </a>
                                                    </li>
                                                </ul>
                                        @endforeach
                                       </div>
                                    </li>
                                @endif
                        @endforeach
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" onclick="submitData()">
                                <i class="ni ni-send"></i>
                                <span class="nav-link-text">Finish</span>
                            </a>
                        </li>

                    </ul>
                    <hr class="my-3">
                    <!-- Heading -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/forum'.'/'.$course->id)}}" target="_blank">
                                <i class="ni ni-chat-round"></i>
                                <span class="nav-link-text">Forum</span>
                            </a>
                        </li>

                    </ul>
                    <!-- Navigation -->

                </div>
            </div>
        </div>
    </nav>
@endsection
@section('main_content')
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="dashboard.blade.php#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="dashboard.blade.php#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                      <span class="avatar avatar-sm rounded-circle">
                                          @if((session()->get('activeUser')->user_type) == 'lecturer')
                                              <img alt="Image placeholder" src="{{asset('images/users/lecturer').'/'.session()->get('activeProfile')}}">
                                          @elseif((session()->get('activeUser')->user_type) == 'student')
                                              <img alt="Image placeholder" src="{{asset('images/users/student').'/'.session()->get('activeProfile')}}">
                                          @else
                                              <img alt="Image placeholder" src="{{asset('images/users/admin').'/'.session()->get('activeProfile')}}">--}}
                                          @endif
                                      </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{session()->get('activeUser')->user_email}}</span>
                                        {{--<span class="mb-0 text-sm  font-weight-bold">Hai</span>--}}
                                    </div>
                                     {{-- <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg">
                                      </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                                    </div>--}}
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="{{url('/profile')}}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{url('/logout')}}" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page content -->
        <div class="container-fluid mt-4">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="card">
                <div class="card-header">
                   <h2 id="header_content">Selamat Datang</h2>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                                <div class="col-md-12" id="mycontent">
                                    {{--<p class="card-text mb-4" align="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus ut reiciendis voluptates enim impedit veritatis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus ut reiciendis voluptates enim impedit veritatis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus ut reiciendis voluptates enim impedit veritatis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus ut reiciendis voluptates enim impedit veritatis officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus ut reiciendis voluptates enim impedit veritatis officiis.</p>--}}
                                    {{--<video width="100%" controls controlsList="nodownload">
                                        <source src="{{asset('videos/courses/Perang antar saudara - Pdt. Petrus Agung.mp4')}}" type="video/mp4">
                                    </video>--}}
                                    <div class="container-fluid" id="radio_button">
                                    </div>
                                </div>
                                <div class="col-md-12"><p id="question"></p></div>
                                <div class="col-md-12"> <p class="answer"></p></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="course_id" value="{{$course->id}}">
@endsection

@section('js')
    <script>
        function myFunction(id)
        {
            console.log(id);
            $.ajax({
                url:'{{url('/getMatter/')}}',
                type:'post',
                dataType:'json',
                data:
                    {
                        id:id
                    },
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success:function (res) {
                    console.log(res);
                    /*$('#header_content').val(res.sub_course_detail_name);*/
                    document.getElementById('header_content').innerHTML = res.data.sub_course_detail_name;
                    if(res.data.sub_course_detail_type === 'text')
                    {
                        console.log('ini text');
                        $('#mycontent').text(res.data.sub_course_detail_description);

                    }
                    else
                    {
                        $('#mycontent').html("<video width='100%' controls controlsList='nodownload'><source src='/videos/courses/"+res.data.sub_course_detail_file+"' type='video/mp4'></video>")

                    }
                    $("#mycontent").show()
                    $("#question").hide()
                    $(".answer").hide()

                },
                error:function (err) {
                    console.log(err);
                }


            });
        }


        function myQuestion(id)
        {
            /*console.log(id);*/
            $.ajax({
                url:'{{url('/getQuestion/')}}',
                type:'post',
                dataType:'json',
                data:
                    {
                        id:id
                    },
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success:function (res) {
                    $("#mycontent").hide();
                    $("#question").show()
                    $(".answer").show()
                    console.log(res);
                    /*$('#header_content').val(res.sub_course_detail_name);*/
                    /*document.getElementById('question').innerHTML = res.data.assignment_question;*/
                    //document.getElementById('question').innerText = res.data.assignment_question;
                    $('#question').text(res.data.assignment_question);
                    console.log(res.data.assignment_question)
                    var answerData=""
                    for(var i=0;i<res.data.assignment_options.length;i++)
                    {
                        var value=$(".value-"+res.data.id).val()

                        if(value==res.data.assignment_options[i]['assignment_options_name']){
                            answerData+="<div class=\"input-group\">\n" +
                                "                                                                <div class=\"input-group-prepend\">\n" +
                                "                                                                    <div class=\"input-group-text\">\n" +
                                "                                                                        <input type=\"hidden\" name='opsi_huruf' value='"+res.data.assignment_options[i]['id']+"' id='opsi-huruf"+i+"'>\n" +
                                "                                                                        <input type=\"radio\" aria-label=\"Radio button for following text input\" class='opsi-"+res.data.assignment_options[i]['id']+"' onclick='myAnswer("+res.data.assignment_options[i]['id']+','+res.data.id+")' name='opsi_huruf'  value='"+res.data.assignment_options[i]['assignment_options_name']+"' checked>\n" +
                                "                                                                    </div>\n" +
                                "                                                                </div>\n" +
                                "                                                                <input type=\"text\" class=\"form-control opsi-1\" aria-label=\"Text input with radio button\" id=\"options_desc\" name=\"options_desc[]\" value='"+res.data.assignment_options[i]['assignment_options_description']+"'>\n" +
                                "                                                            </div>"
                        }else{
                            answerData+="<div class=\"input-group\">\n" +
                                "                                                                <div class=\"input-group-prepend\">\n" +
                                "                                                                    <div class=\"input-group-text\">\n" +
                                "                                                                        <input type=\"hidden\" name='opsi_huruf' value='"+res.data.assignment_options[i]['id']+"' id='opsi-huruf"+i+"'>\n" +
                                "                                                                        <input type=\"radio\" aria-label=\"Radio button for following text input\" class='opsi-"+res.data.assignment_options[i]['id']+"' onclick='myAnswer("+res.data.assignment_options[i]['id']+','+res.data.id+")' name='opsi_huruf'  value='"+res.data.assignment_options[i]['assignment_options_name']+"'>\n" +
                                "                                                                    </div>\n" +
                                "                                                                </div>\n" +
                                "                                                                <input type=\"text\" class=\"form-control opsi-1\" aria-label=\"Text input with radio button\" id=\"options_desc\" name=\"options_desc[]\" value='"+res.data.assignment_options[i]['assignment_options_description']+"'>\n" +
                                "                                                            </div>"
                        }

                    }

                    $(".answer").html(answerData)




                },
                error:function (err) {
                    console.log(err);
                }

            });
        }
    </script>
    <script>
        function myAnswer(i,x) {
            var data = $(".opsi-"+i).val();
            $(".value-"+x).val(data)
            console.log(data);
        }


        function submitData() {
            var data = new FormData();
            @foreach($assign as $key =>$item)
            data.append('value-{{$item['id']}}', $(".value-{{$item['id']}}").val());
            @endforeach
                data.append('course_id',{{$course->id}})
            modalConfirm("Konfirmasi", "Are you sure to input your assignment?", function () {
                ajaxTransfer("{{url('/submit-assignment/')}}", data, "#modal-output");
            })
        }
    </script>
@endsection
