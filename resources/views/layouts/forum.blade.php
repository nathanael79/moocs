@extends('layouts.dashboard')
@section('topnav')
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-info border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </form>
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
                        <a class="nav-link" href="dashboard.html#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-bell-55"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                                <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                            </div>
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                <a href="dashboard.html#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>2 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="dashboard.html#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>3 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="dashboard.html#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>5 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="dashboard.html#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>2 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="dashboard.html#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="../../assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>3 hrs ago</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- View all -->
                            <a href="dashboard.html#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-ungroup"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                            <div class="row shortcuts px-4">
                                <a href="dashboard.html#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                                    <small>Calendar</small>
                                </a>
                                <a href="dashboard.html#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                                    <small>Email</small>
                                </a>
                                <a href="dashboard.html#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                                    <small>Payments</small>
                                </a>
                                <a href="dashboard.html#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                                    <small>Reports</small>
                                </a>
                                <a href="dashboard.html#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                                    <small>Maps</small>
                                </a>
                                <a href="dashboard.html#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                                    <small>Shop</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                      {{--@if((session()->get('activeUser')->user_type) == 'lecturer')
                          <img alt="Image placeholder" src="{{asset('images/users/lecturer').'/'.session()->get('activeProfile')}}">
                      @elseif((session()->get('activeUser')->user_type) == 'student')
                          <img alt="Image placeholder" src="{{asset('images/users/student').'/'.session()->get('activeProfile')}}">
                      @else
                          <img alt="Image placeholder" src="{{asset('images/users/admin').'/'.session()->get('activeProfile')}}">--}}
                      {{--@endif--}}
                  </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    {{--<span class="mb-0 text-sm  font-weight-bold">{{session()->get('activeUser')->user_email}}</span>--}}
                                    <span class="mb-0 text-sm  font-weight-bold">Hai</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="{{url('/profile')}}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My Profile</span>
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
@endsection
@section('main_content')
    <div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-5">
    <div class="card">
        <div class="card-header">
            <h5 class="h3 mb-0">Activity feed</h5>
        </div>
        <div class="card-header d-flex align-items-center">
            <div class="d-flex align-items-center">
                <a href="#">
                    <img src="../../assets/img/theme/team-1.jpg" class="avatar">
                </a>
                <div class="mx-3">
                    <a href="#" class="text-dark font-weight-600 text-sm">John Snow</a>
                    <small class="d-block text-muted">3 days ago</small>
                </div>
            </div>
            <div class="text-right ml-auto">
                <button type="button" class="btn btn-sm btn-primary btn-icon">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Follow</span>
                </button>
            </div>
        </div>
        <div class="card-body">
            <p class="mb-4">
                Personal profiles are the perfect way for you to grab their attention and persuade recruiters to continue reading your CV because you’re telling them from the off exactly why they should hire you.
            </p>
            <img alt="Image placeholder" src="../../assets/img/theme/img-1-1000x600.jpg" class="img-fluid rounded">
            <div class="row align-items-center my-3 pb-3 border-bottom">
                <div class="col-sm-6">
                    <div class="icon-actions">
                        <a href="#" class="like active">
                            <i class="ni ni-like-2"></i>
                            <span class="text-muted">150</span>
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
                <div class="media media-comment">
                    <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="../../assets/img/theme/team-1.jpg">
                    <div class="media-body">
                        <div class="media-comment-text">
                            <h6 class="h5 mt-0">Michael Lewis</h6>
                            <p class="text-sm lh-160">Cras sit amet nibh libero nulla vel metus scelerisque ante sollicitudin. Cras purus odio vestibulum in vulputate viverra turpis.</p>
                            <div class="icon-actions">
                                <a href="#" class="like active">
                                    <i class="ni ni-like-2"></i>
                                    <span class="text-muted">3 likes</span>
                                </a>
                                <a href="#">
                                    <i class="ni ni-curved-next"></i>
                                    <span class="text-muted">2 shares</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="media media-comment">
                    <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="../../assets/img/theme/team-2.jpg">
                    <div class="media-body">
                        <div class="media-comment-text">
                            <h6 class="h5 mt-0">Jessica Stones</h6>
                            <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                            <div class="icon-actions">
                                <a href="#" class="like active">
                                    <i class="ni ni-like-2"></i>
                                    <span class="text-muted">10 likes</span>
                                </a>
                                <a href="#">
                                    <i class="ni ni-curved-next"></i>
                                    <span class="text-muted">1 share</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="media align-items-center">
                    <img alt="Image placeholder" class="avatar avatar-lg rounded-circle mr-4" src="../../assets/img/theme/team-3.jpg">
                    <div class="media-body">
                        <form>
                            <textarea class="form-control" placeholder="Write your comment" rows="1"></textarea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    </div>
@endsection
