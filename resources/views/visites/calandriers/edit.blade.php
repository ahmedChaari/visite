@extends('layouts.public')

@section('content')

<style>
    input {
        width: 140px !important;
    }
    .schedule{
        font-size: 22px;
        color: #845614;
    }
</style>


<div class="col-md-3">
</div>
<div class="col-md-6">

        <div class="col-md-12">
                <ol style=" font-size: 16px;" class="breadcrumb">
                        <li><a  href="{{ url('/') }}"> <i class="fas fa-home"></i>
                                    الصفحة الرئيسية
                            </a>
                        </li>
                        <li class="active"><a href="{{ url('visites/calandriers') }}">القائمة</a></li>
                        <li class="active">إستمارة </li>
                </ol>
        </div>
<!-- end event-->
 

<form action="{{ route('calandriers.update',['id'=> $calandrier->id]) }}" method="POST">
{{csrf_field()}}
        <input name="_method" type="hidden" value="PUT" />
       

    <div class="form-row">
        <div class="col-md-12 form-group ">
            <label class="schedule">الموضوع</label>
            <textarea  class="form-control" name="libelle" style="font-size: 17px;color: #1b1c1d;"
            rows="3" id="libelle" value="" >{{ $calandrier->libelle }}</textarea>
        </div>
        <div class="col-md-6 form-group schedule "> 
             <label>   كل يوم  <span style="text-decoration: underline;">{{ $calandrier->jour_rep }}</span></label>
        </div> 
        <div class="col-md-6 form-group schedule">
            <label>  تقام الجلسة  <span style="text-decoration: underline;">{{ $calandrier->repitition }}</span></label>
        </div> 
        <div class="col-md-4 form-group ">
            <label>الساعة</label>
            <input type="text" class="form-control" name="heure_rep" 
            value="{{ date( "H:i", strtotime( $calandrier->heure_rep)) }}">
        </div>
        <div class="col-md-4 form-group ">
            <label>تاريخ النهاية</label>
            <input type="text" class="form-control" id="date_ar_bibl" name="date_fin" value="{{ $calandrier->date_fin }}">
        </div>
        <div class="col-md-4 form-group ">
            <label>تاريخ البدء</label>
            <input type="text" class="form-control" id="date_ar1" name="date_debut" value="{{ $calandrier->date_debut }}">
        </div>
        
    </div> 
   

        <center>
            <button type="submit" class="btn btn-warning" style="margin: 17px 14px;font-size:18px" 
            data-dismiss="modal">تحديث الموعد</button>
        </center>
     
      </div> 
    </div>
  </div>
  </form>
<div class="col-md-3"></div>

</div>

@endsection
