@extends('layouts.register')
@section('title','MOOC PENS')

@section('header')
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7" style="margin-bottom: 0 !important;">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Daftar akun Lecturer</h1>
                        <p class="text-lead text-white">Halaman khusus untuk membuat akun baru</p>
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
    <form role="form">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" placeholder="Email" id="emailku" type="email" name="email">
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12">
                <div class="custom-control custom-control-alternative custom-checkbox">
                    <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                    <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="register.html#!">Privacy Policy</a></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="button" id="submit" class="btn btn-primary mt-4">Buat Akun Baru</button>
            {{--<button type="button" id="coba_swal" class="btn btn-primary mt-4">Type your password</button>--}}
        </div>
    </form>
@endsection

@section('js')
<script type="text/javascript">
    //var swal = require('sweetalert';
    function verifyEmail()
    {
        $('#submit').on('click',function(){
            var email = $('#emailku').val();
            //console.log(email);
            $.ajax({
                type:"GET",
                url:"{{url('/lecturer/email_check')}}",
                dataType:"json",
                data:{
                    email:email
                },
                success:function (data) {
                    if(data.status)
                    {
                        swal({
                            content:{
                                element:"input",
                                attributes:{
                                    placeholder:"Masukkan password baru anda :",
                                    type:"password",
                                },
                            },
                        })
                    }
                    else
                    {
                        swal({
                            content:{
                                element:"input",
                                attributes:{
                                    placeholder:"Masukkan password baru anda :",
                                    type:"password",
                                },
                            },
                        });
                    }
                },
                error:function (e) {
                    console.log(e);
                    Swal.fire({
                        type: 'error',
                        title: 'Oops, email tidak ditemukan',
                        text: 'Hubungi administrator untuk mendaftarkan email anda!'
                    })
                }
            });
        });
    }

    $(document).ready(function () {
        verifyEmail(); //verify email
    });

</script>
@endsection
