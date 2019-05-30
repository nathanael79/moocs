@include('toast::messages')
@extends('layouts.front_end.main_layout')

@section('contain_section')
<!-- Start Page Title Area -->
<div class="page-title">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <h3>Login</h3>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Login Area -->
<section class="login-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form id="login-form" action="{{url('/login')}}" method="post">
                    {{ csrf_field() }}
                    <div class="heading">Sign in here</div>
                    <div class="left">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="user_email" class="form-control" placeholder="Your Email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="user_password" class="form-control" placeholder="Your Password">
                        </div>

                        <input type="submit" value="submit" class="btn btn-primary"/>
                    </div>

                    <div class="right">
                        <div class="connect">Register here</div>
                        <a href="{{url('/register')}}" class="facebook">As Student</a>
                        <a href="{{url('/lecturer/register')}}" class="twitter">As Lecturer</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Login Area -->
@endsection
