@extends('layouts.mail.mail_layout')
@section('link_container')
    <td> <div class="container">
            <center><p>Klik pada link berikut :</p></center>
            <hr>
            <center><p><a href="{{ url('/regis_confirm/'.$email.'/'.$token)}}">Link Konfirmasi</a></p></center>
            <hr>
            <center><p>Telah Disampaikan! <br> Terimakasih telah menghubungi kami!</p></center>
        </div>
    </td>
@endsection
