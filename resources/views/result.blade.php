@extends('layouts.dashboard')
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
            <h1 class="display-3">Your result this {{$course->course_name}}:</h1>
            <center><h1 class="display-2">{{$score->score}}</h1></center>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    {{--<input type="hidden" name="course_id" value="{{$course->id}}">--}}
@endsection
