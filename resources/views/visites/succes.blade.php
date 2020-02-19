@extends('layouts.public')

@section('content')

<style>

.panel-body {
    padding: 131px !important;
}
.panel-default{
    background-image: url('{{ asset('/img/bg_header.png') }}');
}

a {
    color: #ffffff !important;
}
</style>

<div class="row">
@include('sweet::alert')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        الرجوع إلى القائمة
                    </a>
                </div>
                <div class="panel-body">
                    <h3 class="succes iconResolved">
                        <i class="fa fa-check" aria-hidden="true"></i>    
                        لقد تم التسجيل بنجاح سوف يتم إرسال لك رسال على بريدك الإلكتروني
                    </h3>     
                </div>
            </div>
        </div>
    </div>
@endsection
