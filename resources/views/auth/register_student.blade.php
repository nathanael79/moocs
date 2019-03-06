@extends('layouts.register')
@section('title','MOOC PENS')

@section('header')
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7" style="margin-bottom: 0 !important;">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Buat Akunmu Sekarang!</h1>
                        <p class="text-lead text-white">Dapatkan berbagai manfaat dengan bergabung dengan pelajar di seluruh dunia !</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
@endsection

@section('content')
    <form role="form" method="post" action="{{url('\register')}}">
    {{ csrf_field() }}
    <!--<div class="form-group">
                                  <div class="input-group input-group-merge input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                      </div>
                                      <input class="form-control" placeholder="Name" type="text">
                                  </div>
                              </div>-->
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <input class="form-control" placeholder="Email" type="email" name="email">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <input class="form-control" placeholder="Password" type="password" name="password">
            </div>
        </div>
        <!--<div class="row my-4">
            <div class="col-12">
                <div class="custom-control custom-control-alternative custom-checkbox">
                    <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                    <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="register.html#!">Privacy Policy</a></span>
                    </label>
                </div>
            </div>
        </div>-->
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-4">Buat Akun Baru</button>
        </div>
    </form>
@endsection

