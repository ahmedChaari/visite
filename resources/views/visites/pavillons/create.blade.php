@extends('layouts.public')

@section('content')



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
<form action="{{ route('pavillons.store') }}" method="POST">
<input required="required" id="type_visit" name="type_visit" type="hidden" value="3">
<input required="required" id="status" name="status" type="hidden" value="3">
{{ csrf_field() }}
<div class="card">
  <div class="card-body"> 
    <div class="col-md-12">
            <ol style=" font-size: 16px;" class="breadcrumb">
                    <li>
                        <a  href="{{ url('/') }}">
                                <i class="fas fa-home"></i>
                                الصفحة الرئيسية
                        </a>
                    </li> <li class="active">الإستمارة</li>
            </ol>
    </div>
        <div class="col-md-12">
                    <h2 class="form-group"
                    style="padding: 2% 2%;background-color:#d9edf752;">المرجو  ملء الإستمارة أسفله لزيارة مرافق المجلس</h2>
            <hr>
        </div>
</div>
        <div class="form-group col-md-6">
                <label for="date-input">على الساعة</label><br>
                <input required class="form-control input-style" 
                value="{{ old('visite_heure')}}" 
                name="visite_heure" 
                type ="time" id ="">
        </div>                     
        <div class="form-group col-md-6">
                <label for="date-input">نود الحضور يوم</label><br>
                
                <input required class="form-control input-style " 
                name="visite_date" value="{{ old('visite_date')}}" 
                type ="text" id="date_ar">
        </div>
            
        <div class="form-group col-md-6">
                <label for="">المجموعة</label>
                <input type="text" class="form-control input-style" 
                name="nom_groupe" value="{{ old('nom_groupe')}}" 
                placeholder="إسم المجموعة" >
        </div>
        <div class="form-group col-md-6">     
            <label for="inputCNI">طبيعة المجموعة</label>
            <select required class="form-control input-style"
                    name="natureGroupe" id="identiteType">
                    <option value="" selected disabled>طبيعة المجموعة</option>
                        @foreach($natureGroupes as $natureGroupe)
                    <option value="{{ $natureGroupe->libelle_ar }}" 
                         {{ old('natureGroupe') == $natureGroupe->libelle_ar ? 'selected' : '' }} >
                         {{ $natureGroupe->libelle_ar }}
                    </option>
                        @endforeach
            </select>  
        </div>     
        <div class="form-group col-md-6">
            <label>الجهة</label>
            <select required="required" class="form-control input-style"  
                    
                    name="provenance">
                    <option selected disabled>------------</option>
                    <option value="المغرب" {{ old('provenance') == 'المغرب' ? 'selected' : '' }}>المغرب</option>
                    <option value="الخارج" {{ old('provenance') == 'الخارج' ? 'selected' : '' }}>الخارج</option>
            </select>     
        </div> 
        <div class="form-group col-md-6" style="float: right;"> 
        <label for="inputEmail4">صفة صاحب الطلب</label><br>
            <input  type="text" name="type_demandeur" 
            required class="form-control input-style" id="type_demandeur"
            value="{{ old('type_demandeur')}}"
            placeholder="صفة صاحب الطلب">
        </div>
        <div class="col-md-12">
              <h3 style="padding: 2% 25%;background-color: #d9edf752;">إستمارة صاحب الطلب</h3>
        </div>
        <div class="form-group col-md-6">
                <label for="inputEmail4" style="float: left;">Nom</label><br>
                  <input  type="text" name="nom" 
                        style="direction: ltr"
                        value="{{ old('nom')}}" onkeyup='this.value=this.value.toUpperCase()'
                        required
                        class="form-control " id="nom" placeholder="Nom">
              </div>
              <div class="form-group col-md-6">
                  <label for="inputEmail4">الإسم الشخصي</label><br>
                  <input  type="text" name="nom_ar" 
                    required
                    value="{{ old('nom_ar')}}"
                    class="form-control input-style" id="nom_ar" placeholder="الإسم">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4" style="float: left;">Prénom</label><br>
                <input  type="text" name="prenom" 
                    required onkeyup='this.value=this.value.toUpperCase()'
                    style="direction: ltr"
                    value="{{ old('prenom')}}"
                    class="form-control majuscule" id="prenom" placeholder="Prénom">
              </div>
              <div class="form-group col-md-6">
                <label >الإسم العائلى</label><br>
                <input  type="text" name="prenom_ar" 
                    required
                    value="{{ old('prenom_ar')}}"
                    class="form-control input-style" id="prenom_ar"
                    placeholder="الإسم العائلى">
              </div>
                <div class="form-group col-md-6">     
                    <label>رقم التعريف</label><br>
                    <input  type="text" name="n_cin" 
                    required onkeyup='this.value=this.value.toUpperCase()'
                    style="direction: ltr"
                    value="{{ old('n_cin')}}"
                    class="form-control input-style" id="n_cin" placeholder="رقم التعريف">
                </div>
        <div class="form-group col-md-6">     
            <label for="inputCNI">نوع التعريف</label><br>
                <select  class="form-control input-style" 
                    value="{{ old('identite_type_id')}}"
                    required
                    name="identite_type_id" id="identiteType">
                            <option value="" selected disabled>نوع التعريف</option>
                                @foreach($identiteTypes as $identiteType)
                            <option value="{{ $identiteType->libelle_ar }}"
                            {{ old('identite_type_id') == $identiteType->libelle_ar  ? 'selected' : '' }} >
                            {{ $identiteType->libelle_ar }}</option>
                                @endforeach
                </select>  
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">البريد الإلكتروني</label><br>
            <input  type="email" name="email" 
            required
            value="{{ old('email')}}"
            style="direction: ltr"
            class="form-control input-style" id="email" 
            placeholder="البريد الإلكتروني">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">رقم الهاتف</label><br>
            <input  type="tel" name="tel" 
                required
                value="{{ old('tel')}}"
                style="direction: ltr"
                class="form-control input-style"  id="tel" 
                    placeholder="رقم الهاتف">
        </div>     
        <div class="col-md-12">
             <h3 style="padding: 2% 25%;background-color: #d9edf752;">معلومات خاصة بأفراد المجموعة</h3>
        </div>
            <div class="one" style="display: none;">
                <div class="form-group col-md-4" >
                    <label>عدد الأطفال</label><br> 
                    <input  type="number"
                        value="{{ old('nombre_mineur')}}"
                        style="direction: ltr" min="0" max="100"
                        class="form-control input-style" 
                        name="nombre_mineur" id="" placeholder="---">
                </div>
            </div>
        <div class="form-group col-md-4">
            <label for="input">عدد أفراد المجموعة</label><br>
            <input  type="number" 
                value="{{ old('nombre_tot')}}" min="0" max="100"
                style="direction: ltr" required
                class="form-control input-style" name="nombre_tot" id="nombre_tot" placeholder="---">
        </div>
        <div class="form-group col-md-4 pull-right">
            <label for="sel1">طبيعة أفراد المجموعة</label>
                <select required id="count" class="form-control input-style" 
                    name="typeGroupe">
                    <option value="" selected disabled> طبيعة أفراد المجموعة</option>
                        @foreach($typeGroupes as $typeGroupe)
                    <option value="{{ $typeGroupe->libelle_ar }}"
                    {{ old('typeGroupe') == $typeGroupe->libelle_ar  ? 'selected' : '' }} >
                    {{ $typeGroupe->libelle_ar }}</option>
                        @endforeach
                </select>
        </div> 
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="input">عدد الاناث</label><br>
            <input  type="number" 
            value="{{ old('nombre_feminin')}}"
            style="direction: ltr" required min="0" max="100"
            class="form-control input-style" name="nombre_feminin" id="nombre_feminin" placeholder="---">
        </div> 
        <div class="col-md-12" style="margin-bottom: 48px;">
              <center>
                  <input type="submit" value="حفظ الطلب"  class="btn btn-primary btn-lg">
              </center>
        </div>



</div></div>


</div>
</form>
<div class="col-md-3"></div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){

    $('#count').change(function(){

        if($('#count').val()=='أطفال')
        {
            $('.one').show();
           
        }
        else if($('#count').val()=='شباب')
        {
          
            $('.one').hide();
        }
        else if($('#count').val()=='0')
        {
           
            $('.one').hide();
        }
    });
});
</script>


@endsection

