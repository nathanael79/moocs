@extends('layouts.dashboard')
@section('main_content')
    <div class="row">
        <div class="col-md-4">
            <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Default</button>
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">Type your modal title</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <center>
                            <video width="320" height="240" controls>
                                <source src="{{asset('../../video/courses/Tutorial Fix 4G Xiaomi Redmo 3 ido (Redmi 3 dan 3pro) Miui 9.x.x Tanpa UBL - YouTube.mkv')}}" >
                            </video>
                            </center>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
