@if($message = Session::get('success'))
    <div class="alert alert-default alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Success!</strong> {{$message}}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if($message = Session::get('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Failed!</strong> {{$message}}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@extends('backend.admin.dashboard_layout')
@section('main_content')
    <!--Mask Header-->

    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset('images/users/admin').'/'.$profile->pictures}}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-purple opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    @if(null!=$profile)
                        <h1 class="display-2 text-white">Halo {{$profile->name}}</h1>
                    @else
                        <h1 class="display-2 text-white">Halo Unknown</h1>
                    @endif
                    <p class="text-white mt-0 mb-5">Dapatkan pengalaman belajar lebih dengan MOOC PENS, dapatkan kursus kursus berkualitas disini.</p>
                    {{--  <a href="profile.blade.php#!" class="btn btn-neutral">Edit profile</a>--}}
                </div>
            </div>
        </div>
    </div>
    <!--Mask Header-->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <img src="../../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="{{url('/profile')}}">
                                    <img src="{{asset('../../images/users/admin').'/'.$profile->pictures}}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="profile.blade.php#" class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="profile.blade.php#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Forum</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">Kelas</span>
                                    </div>
                                    <div>
                                        <span class="heading">60</span>
                                        <span class="description">Pencapaian</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="h3">
                                @if(null!=$profile)
                                    {{$profile->name}}
                                @else
                                    Unkown
                                @endif
                            </h5>
                            <div class="h5 font-weight-300">
                                @if(null!=$profile)
                                    <i class="ni location_pin mr-2"></i>{{$profile->nrp_dosen}}
                                @else
                                    <i class="ni location_pin mr-2"></i>Unknown
                                @endif
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Administrator
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>Politeknik Elektronika Negeri Surabaya
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                {{--<div class="row">
                    <div class="col-lg-6">
                        <div class="card bg-gradient-info border-0">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total traffic</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-active-40"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap text-light">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card bg-gradient-danger border-0">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Performance</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-spaceship"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap text-light">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit profile </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/store-profile')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6 class="heading-small text-muted mb-4">Administrator information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group {{$errors->has('user_email') ? 'has-error' : ''}}">
                                            <label class="form-control-label" for="input-email">Email</label>
                                            @if(null!=$user)
                                                <input name="user_email" type="email" id="input-email" class="form-control" value="{{$user->user_email}}">
                                            @else
                                                <input name="user_email" type="email" id="input-email" class="form-control" value="Unknown">
                                            @endif
                                            @if ($errors->has('user_email'))
                                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                            <label class="form-control-label" for="input-first-name">Full Name</label>
                                            @if(null!=$profile)
                                                <input type="text" name="name" id="input-first-name" class="form-control" placeholder="First name" value="{{$profile->name}}">
                                            @else
                                                <input type="text" name="name" id="input-first-name" class="form-control" placeholder="First name" value="Unknown">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Gender</label>
                                            @if(null!=$profile)
                                                <select name="gender" id="gender" value="{{$profile->gender}}">
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                            @else
                                                <select name="gender" id="gender">
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {{$errors->has('address')}}">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            @if(null!=$profile)
                                                <input id="input-address" name="address" class="form-control" placeholder="Home Address" value="{{$profile->address}}" type="text">
                                            @else
                                                <input id="input-address" name="address" class="form-control" placeholder="Home Address" value="Unknown" type="text">
                                            @endif
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('adress') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">
                                            <label class="form-control-label">Image</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label">Upload in here</label>
                                                <input type="file"  class="custom-file-input" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group float-right">
                                            <button type="submit" class="btn btn-primary">Save Information</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="{{url('/admin/store-password')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">Administrator Password</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-old-password">Old Password</label>
                                            @if(null!=$user)
                                                <input name="old_password" type="password" id="input-old-password" class="form-control" disabled placeholder="Old Password" value="{{$user->user_password}}">
                                            @else
                                                <input name="old_password" type="password" id="input-old-password" class="form-control" disabled placeholder="Old Password" value="Unknown">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-new-password">New Password</label>
                                            <input name="new_password" type="password" id="input-new-password" class="form-control" placeholder="New Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group float-right">
                                            <button type="submit" class="btn btn-primary">Save Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
            $('#gender').select2();
        })
    </script>
@endsection
