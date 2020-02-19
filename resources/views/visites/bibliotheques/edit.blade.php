@extends('layouts.public')

@section('content')


<div class="col-md-3"></div>
<div class="col-md-6">

      

<form action="{{ route('bibliotheques.update',['id'=> $bibliotheque->id]) }}" method="POST">
<input type="hidden" name="_method" value="put">
{{ csrf_field() }}

<!-- Modal Popup-->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">يمكنك تغيِر تاريخ الحضور</h4>
      </div>
      <div class="modal-body">
      <label for="date-input"> الحضور يوم  </label>
                    <input required="required" 
                    style="direction: ltr" id="date_ar"
                    value="{{ date('d-m-Y', strtotime($bibliotheque->visite_date))}}" 
                    
                   type ="text" id ="datepicker-13"
                   class="form-control" name="visite_date"/>

      </div>
      <div class="modal-footer">
      <button id='submit' class="btn btn-success" 
                    type='submit' name = 'submitbutton' value = '1'>قبول الطلب</button>
      </div>
    </div>
  </div>
</div>

<!-- popup pour modification date -->

<div class="card">
        <div class="col-md-12">
            <ol style=" font-size: 16px;" class="breadcrumb">
                <li>
                    <a  href="{{ url('/') }}">
                            <i class="fas fa-home"></i>
                            الصفحة الرئيسية
                    </a>
                </li>
                <li class="active"><a href="{{ url('visites/bibliotheques') }}">القائمة</a></li>
                <li class="active">إستمارة </li>
            </ol>
        </div>
        <div class="col-md-12">
            <h4>  وضع هذا الطلب : 
            <span style="float: left; color: #ad9300;">
            {{ \Carbon\Carbon::parse($bibliotheque->created_at)->diffForHumans() }}</span></h4>
        </div>
        </div>
    <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12 text-left">
                        @if( $bibliotheque->status == "1" )
                        <i class="badge font-accept badge-success">مقبول</i>
                        @elseif ( $bibliotheque->status == "0" )
                        <i class="badge font-refuse">مرفوض</i>
                        @else ( $bibliotheque->status == "NULL" )
                        <i class="badge font-wait">في الإنتظار</i>
                        @endif 
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4" style="float: left;">Prénom</label>
                    <input required="required" type="text" name="prenom" disabled
                    style="direction: ltr"
                    class="form-control" id="prenom" value="{{ $bibliotheque->prenom }}" >
                </div>       
                <div class="form-group col-md-6">
                    <label for="inputEmail4">الإسم الشخصي</label>
                    <input required="required" type="text" name="nom_ar" disabled
                    class="form-control style_ar" id="nom_ar" value="{{ $bibliotheque->nom_ar }}" >
                </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4" style="float: left;">Nom</label>
                <input required="required" type="text" name="nom"
                style="direction: ltr" value="{{ $bibliotheque->nom }}" 
                disabled
                class="form-control" id="nom">
                </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">الإسم العائلى</label>
                <input required="required" type="text" name="prenom_ar" disabled
                class="form-control style_ar" id="prenom_ar" value="{{ $bibliotheque->prenom_ar }}" >
            </div>
          </div>
              <hr>              
          <div class="form-row">  
                <div class="form-group col-md-6">     
                    <label for="inputCNI">رقم الهوية </label>
                    <input required="required" type="text" name="n_cin" disabled
                    style="direction: ltr"
                    class="form-control" id="n_cin" value="{{ $bibliotheque->n_cin }}" >
                </div>
                <div class="form-group col-md-6">     
                    <label for="inputCNI">نوع الهوية </label>
                    <input type="text" class="form-control style_ar" 
                    disabled
                    value="{{ $bibliotheque->identite_type_id }}" name="">
                </div>
         </div>
          <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">البريد الإلكتروني</label>
                    <input required="required" type="email" name="email" disabled
                    style="direction: ltr"
                    class="form-control" id="email" 
                    value="{{ $bibliotheque->email }}" >
                </div>
                <div class="form-group col-md-6">  
                    <label for="inputEmail4">رقم الهاتف</label>
                    <input required type="tel" name="tel" disabled
                    style="direction: ltr"
                    class="form-control"  
                    value="{{ $bibliotheque->tel }}" >
                </div>     
          </div>
          <div class="form-row">
                <div class="form-group col-md-12">    
                        <label for="inputRecherche">مجال البحث</label>
                    <input required="required" type="text" disabled
                        name="domaine_cher" class="form-control style_ar"  
                        value="{{ $bibliotheque->domaine_cher }}" >
                </div>
                <div class="col-md-12 affiche_date">
                   <h3 value="" name="visite_date">يوم الحضور
                   {{ date('d/m/Y', strtotime($bibliotheque->visite_date))}}
                   على الساعة
                   <td>{{ date( "H:i", strtotime( $bibliotheque->visite_heure)) }}</td>
                   </h3> 
                </div> 
        </div> 
        <div class="col-md-12">
                <center style="margin-bottom: 22px;margin-top: 22px;">
                <a href="" name='submitbutton' class="btn btn-success style_ar" data-toggle="modal" 
                    data-target="#myModal">قبول الطلب</a>
                    <button id='submit' class="btn btn-danger style_ar" 
                    type='submit' name = 'submitbutton' value = '0'>رفض الطلب</button> 
                </center>
        </div>
  </div>
  </div>
</div>
</form>
<div class="col-md-3"></div>

@endsection

