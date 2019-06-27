@extends('layouts.dashboard')
@section('main_content')
    <div class="row">
        <div buiclass="col-md-4">
            @foreach($course as $item)
                <p>ini adalah user </p>
                <br>
                <p>ini adalah student {{$item->lecturer->name}}</p>
            @endforeach

        </div>
    </div>

@endsection
