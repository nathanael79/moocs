@extends('layouts.dashboard')
@section('sidenav')
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="nav-brand" href="{{url('/student')}}">
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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Following Courses</span>
                            </a>
                            <div class="collapse show" id="navbar-dashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{url('/completed')}}" class="nav-link">Completed Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navbar-multilevel" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">Multi level</a>
                                        <div class="collapse show" id="navbar-multilevel" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#!" class="nav-link ">Third level menu</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#!" class="nav-link ">Just another link</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#!" class="nav-link ">One last link</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/accomplishment')}}"  role="button" aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-ungroup text-orange"></i>
                                <span class="nav-link-text">Accomplishment</span>
                            </a>
                        </li>

                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->

                    <!-- Navigation -->

                </div>
            </div>
        </div>
    </nav>
@endsection
