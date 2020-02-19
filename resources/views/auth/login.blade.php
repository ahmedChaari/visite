@extends('layouts.public')

@section('content')

<style>

input{
    text-align: center;
}
.panel-default{
 
    background-image: url('{{ asset('/img/bg_header.png') }}');

}

.user_login{
    width: 36px;
    height: 36px;
    float: right;
}


.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 17px;
  background: #2e6da4;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
  FONT-SIZE: 18px;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}




</style>
    <div class="row">
    
    <div class="col-md-12">
            <div class="col-md-2"></div>
                <div class="col-md-8">
                        <ol style=" font-size: 16px;margin-top: 40px;" class="breadcrumb">
                                <li>
                                    <a  href="{{ url('/') }}">
                                            <i class="fas fa-home"></i>
                                            الصفحة الرئيسية
                                    </a>
                                </li> 
                        
                                <li class="active">تسجيل الدخول</li> 
                        </ol>
                </div>
            <div class="col-md-2"></div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <h5 class="panel-heading"> تسجيل الدخول</h5>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') || $errors->has('username') ? ' has-error' : '' }}">
                                <div class="input-container col-md-6">
                                    <i class="fa fa-user icon"></i>
                                    <input class="input-field" type="text" 
                                    value="{{ old('username') }}" 
                                    placeholder="إسم المستخدم أوالبريد الإلكتروني" name="username" 
                                    required autofocus>
                                </div>
                                <center>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong style="font-size: 17px;color: #f70303;">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="font-size: 17px;color: #f70303;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </center>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">    
                                <div class="input-container col-md-6">
                                      <i class="fa fa-key icon"></i>
                                       <input class="input-field" 
                                       type="password" placeholder="كلمة المرور" 
                                       name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                    <button type="submit" style="font-size: 20px;" class="btn btn-primary btn-block">
                                    تسجيل الدخول
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
