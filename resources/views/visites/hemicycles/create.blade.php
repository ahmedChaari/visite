@extends('layouts.public')

@section('content')


<style>
.cadreJ{
    border-radius: 25px;
    border: 2px solid #d9edf7;
}

</style>


<div class="col-md-3">
</div>
<div class="col-md-6">

@if(count($errors))
      <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss='alert'>&times;</button>
            <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
            </ul>
      </div>
@endif


<form action="{{ route('hemicycles.store') }}" method="POST" >

{{ csrf_field() }}

<input id="type_visit" name="type_visit" type="hidden" value="2">
<input id="type_groupe" name="type_groupe" type="hidden" value="1">
<input id="status" name="status" type="hidden" value="3">

<div class="col-md-12">
                <ol style=" font-size: 16px;" class="breadcrumb">
                        <li>
                            <a  href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                    الصفحة الرئيسية
                            </a>
                        </li> 
                        <li><a href="{{ url('visites/hemicycles/choix')  }}">صفة الحضور</a></li>
                        <li class="active">الإستمارة</li> 
                </ol>
</div>
        <div class="col-md-12">
        <h2 class="card-title" 
    style="padding: 2% 2%;background-color:#d9edf752;">المرجو ملء طلب الحضور لقاعة جلسات مجلس النواب
</h2>
        </div>
    
<!-- Ajout un evenement de clandrier -->     

    <div class="col-md-12">
        <center>
            <label for="date-input">أود الحضور ل:</label>
            <button type="button" style="font-size:17px" class="btn btn-link btn-sm button1" 
            data-toggle="modal" data-target="#myModal">إختيار نوع الجلسة</button>
        </center>     
    </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> إختيار نوع الجلسة</h4>
        </div>
        <div class="modal-body">
           <div class="clander">
                                @foreach($calandriers as $calandrier)
                            
                                <h3 style="font-size: 19px;  color: #111548;" 
                                value="{{ $calandrier->libelle }}">{{ $calandrier->libelle }}</h3>
                           
                            <div class="col-md-12 form-group">
                                <div class="col-md-4"> 
                                    <label>
                                            على الساعة
                                        {{ date( "H:i", strtotime( $calandrier->heure_rep)) }}
                                    </label>
                                </div>
                                <div class="col-md-4"><label>  إلى  
                                    {{ $calandrier->date_fin }}</label> 
                                </div>
                                <div class="col-md-4"><label>  من 
                                    {{ $calandrier->date_debut }}</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-8 text-left">
                                    <label>إختيار</label>
                                    <input name="libelle" type="checkbox" 
                                    value="{{ $calandrier->id }}">
                                </div>
                                <div class="col-md-2 cadreJ"> <label>
                                يوم
                                {{ $calandrier->jour_rep }}</label>
                                </div>
                                <div class="col-md-2 cadreJ">
                                    <label>{{ $calandrier->repitition }}</label>
                                </div>
                            </div>
                                    <hr class="separ2">
                                @endforeach
                                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>                  
        </div>
       
      </div>
      
    </div>
  </div>


<!-- end event-->
    
<div class="form-row">
    <div class="col-md-12">
            <h3 style="padding: 2% 25%;background-color: #d9edf752;">إستمارة صاحب الطلب</h3>
      </div>
   
    </div>

    <div class="form-row">
            <div class="form-group col-md-6">
                  <label style="float: left;">Prénom</label>
                  <input required="required" type="text" name="prenom" 
                  style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
                  class="form-control" id="prenom" placeholder="Prénom">
            </div>
            <div class="form-group col-md-6">
              <label>الإسم الشخصي</label>
              <input required="required" type="text" name="nom_ar" 
              class="form-control input-style" id="nom_ar" placeholder="الإسم">
            </div>
          </div>

          <div class="form-row">
          <div class="form-group col-md-6">
                <label style="float: left;">Nom</label>
                  <input required="required"  type="text" name="nom"
                  style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
                  class="form-control " id="nom" placeholder="Nom">
            </div>
            <div class="form-group col-md-6">
                <label >الإسم العائلى</label>
                <input required="required" type="text" name="prenom_ar" 
                class="form-control input-style" id="prenom_ar"
                placeholder="الإسم العائلى">
            </div>
    </div>                       
    <div class="form-row">
                <div class="form-group col-md-6">     
                    <label for="inputCNI">رقم التعريف</label>
                    <input required="required" type="text" 
                    style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
                    name="n_cin" class="form-control input-style" id="n_cin" placeholder="A-------">
                </div>
                <div class="form-group col-md-6">     
                    <label for="inputCNI">نوع التعريف</label>
                    <select required class="form-control input-style" 
                    name="identite_type_id" id="identiteType">
                            <option value="" selected disabled>نوع التعريف</option>

                                 @foreach($identiteTypes as $identiteType)
                               <option value="{{ $identiteType->libelle_ar }}">{{ $identiteType->libelle_ar }}</option>
                                  @endforeach
                    </select>  
                </div>
       
              <div class="form-group col-md-6">
                  <label for="inputEmail4">البريد الإلكتروني</label>
                  <input required="required" type="email" name="email" class="form-control input-style" id="email" 
                  style="direction: ltr"
                  placeholder="البريد الإلكتروني">
              </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">رقم الهاتف</label>
                        <input required="required" type="tel" name="tel" class="form-control input-style"
                        style="direction: ltr"
                          placeholder="رقم الهاتف">                                                            
                    </div>     
    </div>
        <div class="col-md-12" style="margin-bottom: 48px;">
              <center>
                  <input type="submit" value="حفظ الطلب"  class="btn btn-primary btn-lg">
              </center>
        </div>
</form>
</div>
<div class="col-md-3"></div>



@endsection
