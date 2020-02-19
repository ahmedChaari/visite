@extends('layouts.public')

@section('content')
<style>

.choix{
    background-image: url('{{ asset('/img/img122.jpg') }}');
    COLOR: white;
    padding: 115px 20px 115px 20px;
}

</style>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">


                        


<div class="col-md-12">
        <ol style=" font-size: 16px;" class="breadcrumb">
                <li>
                    <a  href="{{ url('/') }}">
							<i class="fas fa-home"></i>
							الصفحة الرئيسية
                    </a>
                </li>
                <li class="active">صفة الحضور</li>
        

        </ol>
</div>

<div class="col-md-12" style="margin-bottom: 80px;">

        <div class="panel-heading">          
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                طلب ولوج قاعة جلسات مجلس النواب

        </div>
            
        <div class="d-flex w-100 justify-content-between choix">         
            <h5 class="linkChoix"> هل تودون الحضور لقاعة الجلسات بصفة ؟</h5>
        </div>
            <center>
                <div style="height: 80px;" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="col-md-6">
                                    <a href="{{ url('visites/hemicycles/show') }}" >   
                                            <button class="btn btn-warning btn-lg btn-block">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            جماعية
                                        </button>
                                       
                                    </a>
                        </div>
                        <div class="col-md-6">
                                <a href="{{ url('visites/hemicycles/create') }}" >
                                    <button class="btn btn-warning btn-lg btn-block">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        فردية
                                    </button>
                                    
                                </a>
                        </div>
                </div>  
                </center>  
                </div>       
</div>

<div class="col-md-3"></div>
</div>
@endsection
