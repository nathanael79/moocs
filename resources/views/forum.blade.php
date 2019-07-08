@extends('layouts.forum')
@section('main_content')
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Success!</strong> {{$message}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Failed!</strong>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <!-- Header -->
        <div class="header bg-gradient-info pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Course Forum</h6>

                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <button class="btn btn-gradient-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Ask Question
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="collapse" id="collapseExample">
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Create new forum</h3>
                        <small>You can ask for this course in here!</small>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Form groups used in grid -->
                        <form method="POST" action="{{url('/create-forum')}}">
                            {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols1Input">Your Question Title</label>
                                    <input type="hidden" value="{{$course->id}}" name="course_id">
                                    <input type="text" class="form-control" name="question" id="question" placeholder="Input Your Question Here">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="example3cols1Input">Tell us more about your problem</label>
                                    <textarea type="text" class="form-control" name="question_desc" id="question_desc" rows="3"></textarea>
                                    <script>
                                        CKEDITOR.replace( 'question_desc' );
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning">Submit!</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="container-fluid">
            @if(!empty($result))
                <div class="row col-12">
                     @foreach($result as $key => $item)
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="h3 mb-0">{{$item['data']->forum_questions}}</h5>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <a href="#">
                                        <img src="../../assets/img/theme/team-1.jpg" class="avatar">
                                    </a>
                                    <div class="mx-3">
                                        <a href="#" class="text-dark font-weight-600 text-sm">{{$item['user']->name}}</a>
                                        <small class="d-block text-muted">3 days ago</small>
                                    </div>
                                </div>
                            </div>
                            <div  id="collapseOne" class="collapse show" >
                                <div class="card-body">
                                <input type="hidden" name="forum_id" id="forum_id" value="{{$item['data']->id}}">
                                <p class="mb-4">
                                  {!! $item['data']->forum_descriptions !!}
                                </p>
                            {{--    <img alt="Image placeholder" src="../../assets/img/theme/img-1-1000x600.jpg" class="img-fluid rounded">--}}
                                <div class="row align-items-center my-3 pb-3 border-bottom">
                                    <div class="col-sm-6">
                                        <div class="icon-actions">
                                            <a href="{{url('/create-forum-like/'.$item['data']->id)}}" class="like active">
                                                <i class="ni ni-like-2"></i>
                                                @if($item['data']->forum_like == null)
                                                    <span class="text-muted">0</span>
                                                @endif
                                                <span class="text-muted">{{$item['data']->forum_like}}</span>
                                            </a>
                                            <a href="#">
                                                <i class="ni ni-chat-round"></i>
                                                <span class="text-muted">36</span>
                                            </a>
                                            <a href="#">
                                                <i class="ni ni-curved-next"></i>
                                                <span class="text-muted">12</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 d-none d-sm-block">
                                        <div class="d-flex align-items-center justify-content-sm-end">
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Jessica Rowland">
                                                    <img alt="Image placeholder" src="../../assets/img/theme/team-1.jpg" class="">
                                                </a>
                                                <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Audrey Love">
                                                    <img alt="Image placeholder" src="../../assets/img/theme/team-2.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Michael Lewis">
                                                    <img alt="Image placeholder" src="../../assets/img/theme/team-3.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                            <small class="pl-2 font-weight-bold">and 30+ more</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comments -->
                                <div class="mb-1">
                                    @if($item['reply']->count() > 0)
                                        @foreach($item['reply'] as $hasil)
                                        <div class="media media-comment">
                                            <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="../../assets/img/theme/team-1.jpg">
                                            <div class="media-body">
                                                <div class="media-comment-text">
                                                    <h6 class="h5 mt-0"></h6>
                                                    <p class="text-sm lh-160">{{$hasil->forum_reply_description}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <p>Comment is not available</p>
                                    @endif

                                    <hr />
                                    <div class="media align-items-center">
                                        <img alt="Image placeholder" class="avatar avatar-lg rounded-circle mr-4" src="../../assets/img/theme/team-3.jpg">
                                        <div class="media-body">
                                            <form method="POST" action="{{url('/create-reply')}}">
                                                {{csrf_field()}}
                                                <!-- wajib menambahkan value pada bagian user_id menggunakan session-->
                                                <input type="hidden" id="forum_com_id" name="forum_com_id" value="{{$item['data']->id}}">
                                                <input type="hidden" id="user_id" name="user_id">
                                                <textarea class="form-control comment" name="comment" id="comment" placeholder="Write your comment" rows="2" required></textarea>
                                                <button type="submit" class="btn btn-primary"><span class="ni ni-send">Send</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
            @endforeach
                </div>
            @else
                <div class="row col-12 text-center">
                    <h1>There is no forum available yet.</h1>
                </div>
            @endif
        </div>


    </div>



    <!-- Footer -->
           {{-- <footer class="footer pt-0">
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

@endsection
