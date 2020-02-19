@extends('layouts.public')

@section('content')


<style>

</style>

<div class="col-md-3"></div>
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

<form action="{{ route('hemicycles.store') }}" method="POST" enctype="multipart/form-data">

<input id="type_groupe" name="type_groupe" type="hidden" value="2">
<input id="type_visit" name="type_visit" type="hidden" value="2">
<input id="status" name="status" type="hidden" value="3">


{{ csrf_field() }}


     

      <div class="form-row">
            <div class="col-md-12">
                  <ol style=" font-size: 16px;" class="breadcrumb">
                        <li><a href="{{ url('/') }}">
                              <i class="fas fa-home"></i>الصفحة الرئيسية</a>
                        </li> 
                        <li><a href="{{ url('visites/hemicycles/choix')  }}">صفةالحضور</a></li>
                        <li class="active">الإستمارة</li>
                  </ol>
            </div>
            <div class="col-md-12">
                   <h2 class="form-group"
                    style="padding: 2% 2%;background-color:#d9edf752;">المرجو ملء طلب الحضور لقاعة جلسات مجلس النواب</h2>
                  <hr>
            </div>
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
                            <div class="col-md-4"> <label>
                                    على الساعة
                                   {{ date( "H:i", strtotime( $calandrier->heure_rep)) }}</label>
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
                                <div class="col-md-2"> <label>
                                يوم
                                   {{ $calandrier->jour_rep }}</label>
                                </div>
                                <div class="col-md-2">
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
 
      <div class="form-row">
             <div class="form-group col-md-6">
              <label for="inputEmail4" style="float: left;">Prénom</label>
              <input required="required" type="text" name="prenom" 
              value="{{ old('prenom')}}"
              style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
              class="form-control input-style" id="prenom" placeholder="Prénom">
            </div>  
          
            <div class="form-group col-md-6">
              <label for="inputEmail4">الإسم الشخصي</label>
              <input required="required" type="text" name="nom_ar" 
              value="{{ old('nom_ar')}}"
              class="form-control input-style" id="nom_ar" placeholder="الإسم">
            </div>
 
            <div class="form-group col-md-6">
                  <label for="inputEmail4" style="float: left;">Nom</label>
                  <input required="required"  type="text" name="nom" 
                  value="{{ old('nom')}}"
                  style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
                  class="form-control" id="nom" placeholder="Nom">
            </div>
            <div class="form-group col-md-6">
                  <label for="inputEmail4">الإسم العائلى</label>
                  <input required="required" type="text" name="prenom_ar" 
                  value="{{ old('prenom_ar')}}"
                  class="form-control input-style" id="prenom_ar"
                  placeholder="الإسم العائلى">
            </div>
            
            <div class="form-group col-md-6"></div>
            <div class="form-group col-md-6">
                  <label for="inputEmail4">صفة صاحب الطلب</label>
                  <input type="text" name="type_demandeur" 
                  value="{{ old('type_demandeur')}}"
                  class="form-control input-style" id="type_demandeur"
                  placeholder="صفة صاحب الطلب">
            </div>
            <hr class="separ">
            <div class="form-group col-md-6">     
                    <label for="inputCNI">رقم التعريف</label>
                    <input required="required" type="text" 
                    style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
                    value="{{ old('n_cin')}}"
                    name="n_cin" class="form-control input-style" id="n_cin" placeholder="A-------">
            </div>
            <div class="form-group col-md-6">     
                    <label for="inputCNI">نوع التعريف</label>
                    <select required class="form-control input-style" 
                        name="identite_type_id" value="{{ old('identiteType')}}" id="identiteType">
                        <option value="" selected disabled>نوع التعريف</option>
                              @foreach($identiteTypes as $identiteType)
                        <option value="{{ $identiteType->libelle_ar }}">{{ $identiteType->libelle_ar }}</option>
                              @endforeach
                    </select>  
            </div>
            <div class="form-group col-md-6">
                  <label for="inputEmail4">البريد الإلكتروني</label>
                  <input required="required" type="email" name="email" 
                  value="{{ old('email')}}"
                  style="direction: ltr"
                  class="form-control input-style" id="email" 
                  placeholder="البريد الإلكتروني">
            </div>
            <div class="form-group col-md-6">
                        <label for="inputEmail4">رقم الهاتف</label>
                  <input required="required" type="tel" name="tel" 
                  value="{{ old('tel')}}"
                  style="direction: ltr"
                  class="form-control input-style"
                  placeholder="رقم الهاتف">
            </div>     
      </div>

      <hr class="separ">

      <div class="form-row">
            <div class="form-group col-md-6">
                        <label for="sel1">طبيعة المجموعة</label>
                        <select required class="form-control input-style" 
                           
                            name="typeGroupe">
                            <option value="" selected disabled> طبيعة المجموعة</option>
                              @foreach($typeGroupes as $typeGroupe)
                            <option  value="{{ $typeGroupe->libelle_ar }}">{{ $typeGroupe->libelle_ar }}</option>
                              @endforeach
                        </select>  
            </div>        
            <div class="form-group col-md-6">
                  <label for="sel1">عدد الأشخاص</label>
                  <input required="required" type="number" name="nombre_tot" 
                  value="{{ old('nombre_tot')}}"
                  style="direction: ltr" min="0" max="100"
                  class="form-control" placeholder="عدد الأشخاص">
            </div> 
            <div class="form-group col-md-6">
                  
            </div>        
            <div class="form-group col-md-6">
                  <label>الجهة</label>
                        <select required="required" class="form-control input-style"  
                        value="{{ old('provenance')}}" 
                        name="provenance">
                              <option selected disabled>------------</option>
                              <option value="المغرب">المغرب</option>
                              <option value="الخارج">الخارج</option>
                        </select>
                        
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
