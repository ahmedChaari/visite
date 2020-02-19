@extends('layouts.public')

@section('content')





<div class="col-md-3"></div>
<div class="col-md-6">

      

<form action="{{ route('hemicycles.update',['id'=> $hemicycle->id]) }}" method="POST">
      <input type="hidden" name="_method" value="put">  
{{ csrf_field() }}

<div class="card">
        <div class="col-md-12">
                <ol style=" font-size: 16px;" class="breadcrumb">
                        <li><a  href="{{ url('/') }}"> <i class="fas fa-home"></i>
                                    الصفحة الرئيسية
                            </a>
                        </li>
                        <li class="active"><a href="{{ url('visites/hemicycles') }}">القائمة</a></li>
                        <li class="active">إستمارة </li>
                </ol>
        </div>
        <div class="col-md-12">
                <h4>
       
               وضع هذا الطلب منذ
                               <span style="float: left;
                color: #ad9300;">
                {{ \Carbon\Carbon::parse($hemicycle->created_at)->diffForHumans() }}
                </span>
               
                </h4>
        </div>
        <div class="form-group col-md-12 text-left">
                        @if( $hemicycle->status == "1" )
                             <i class="badge font-accept badge-success">مقبول</i>
                        @elseif ( $hemicycle->status == "0" )
                            <i class="badge font-refuse">مرفوض</i>
                        @else ( $hemicycle->status == "NULL" )
                        <i class="badge font-wait">في الإنتظار</i>
                        @endif 
        </div>

        </div>
        <div class="card-body">

        <input required="required" id="type_visit" name="type_visit" type="hidden" value="1">


          <div class="form-row">
                
                <div class="form-group col-md-6">
                    <label style="float: left;">Prénom</label>
                    <input required="required" type="text" name="prenom" disabled
                    style="direction: ltr"
                    class="form-control" id="prenom" value="{{ $hemicycle->prenom }}" >
                </div>       
                <div class="form-group col-md-6">
                    <label for="inputEmail4">الإسم الشخصي</label>
                    <input required="required" type="text" name="nom_ar" disabled
                    class="form-control style_ar" id="nom_ar" value="{{ $hemicycle->nom_ar }}" >
                </div>
          </div>

          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4" style="float: left;">Nom</label>
              <input required="required" type="text" name="nom"
              style="direction: ltr" value="{{ $hemicycle->nom }}" 
              disabled
               class="form-control" id="nom">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">الإسم العائلى</label>
              <input required="required" type="text" name="prenom_ar" disabled
               class="form-control style_ar" id="prenom_ar" value="{{ $hemicycle->prenom_ar }}" >
            </div>
          </div>
              <hr>           
              <div class="form-row">
                <div class="form-group col-md-6">     
                    <label for="inputCNI">رقم الهوية </label>
                    <input required="required" type="text" name="n_cin" disabled
                    style="direction: ltr"
                    class="form-control" id="n_cin" value="{{ $hemicycle->n_cin }}" >
                </div>
                <div class="form-group col-md-6">     
                    <label for="inputCNI">نوع الهوية </label>
                    <input type="text" class="form-control style_ar" 
                    disabled value="{{ $hemicycle->identite_type_id }}"
                    value="" name="">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputEmail4">البريد الإلكتروني</label>
                  <input required="required" type="email" name="email" disabled
                  style="direction: ltr" value="{{ $hemicycle->email }}"
                   class="form-control" id="email" 
                   value="" >
              </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">رقم الهاتف</label>
                        <input required type="tel" name="tel" disabled
                        style="direction: ltr" value="{{ $hemicycle->tel }}"
                        class="form-control"  
                        value="" >
                    </div>     
            </div>                 
        <div class="col-md-12 affiche_date">
                   <h3 value="" name="visite_date">يوم الحضور
                   {{ date('d/m/Y', strtotime($hemicycle->visite_date))}}</h3>
                  </div>  
        </div> 
        @if( $hemicycle->type_groupe == "2" )
            <div class="col-md-12">
                <div class="col-md-4">
                    <label for="inputEmail4">عدد الأشخاص</label>
                            <input required disabled value="{{ $hemicycle->nombre_tot }}"
                              style="direction: ltr"
                            class="form-control style_ar"  
                            value="" >
                </div>
                <div class="col-md-4">
                    <label for="inputEmail4">طبيعة المجموعة</label>
                            <input required disabled value="{{ $hemicycle->typeGroupe }}"
                            class="form-control style_ar"  
                            value="" >
                    </div>
                <div class="col-md-4">
                    <label for="inputEmail4">الجهة</label>
                            <input required disabled value="{{ $hemicycle->provenance }}"
                            class="form-control style_ar"  
                            value="">
                </div>
            </div>
    @endif            
            <div class="col-md-12">
                <center style="margin-bottom: 22px;margin-top: 22px;">
                    <button id='submit' class="btn btn-success style_ar" 
                        type='submit' name = 'submitbutton' value = '1'>قبول الطلب</button> 
                    <button id='submit' class="btn btn-danger style_ar" 
                        type='submit' name = 'submitbutton' value = '0'>رفض الطلب</button> 
                </center>
            </div>
         

    </div>
  </div>
</div>




<div class="col-md-3"></div>

</form>

@endsection

