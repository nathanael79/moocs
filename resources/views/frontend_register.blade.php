@include('toast::messages')
@extends('layouts.front_end.main_layout')
@section('contain_section')
<!-- Start Page Title Area -->
<div class="page-title">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <h3>Register</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Register Area -->
<section class="register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="register-content">
                    <div class="heading">Register</div>
                    <form action="{{url('/register')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button class="btn btn-primary" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <h4>Are you a member? <a href="{{url('/login')}}">Login Now!</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Register Area -->
@endsection
