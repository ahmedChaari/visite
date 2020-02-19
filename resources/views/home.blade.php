@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 34px;">الدخول</div>

                <div class="panel-body" style="font-size: 28px;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    لقد سجلت الدخول!
                </div>
            </div>
        </div>
    </div>

@endsection
