@extends('layouts.public')

@section('content')





<style>

.panel-header{
    background: #f2f2f2;
    padding:20px 40px 20px;
    border-bottom: 1px solid #bbb;
}

.panel{
    background: #eee;
    color: #333;
    padding: 20px 35px 10px;
    border-radius: 0;
}

.close{
    font-weight: 100;
    position:relative;
    top: 1px;
}

/* ////////////////// CSS FOR THE COMPONENT ///////////////// */

.clearfix {
	*zoom:1;
}
.clearfix:before,.clearfix:after {
	display:table;
	content:"";
	line-height:0;
}
.clearfix:after {
	clear:both;
}
.hide-text {
	font:0/0 a;
	color:transparent;
	text-shadow:none;
	background-color:transparent;
	border:0;
}
.input-block-level {
	display:block;
	width:100%;
	min-height:30px;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	box-sizing:border-box;
}
.btn-file {
	overflow:hidden;
	position:relative;
	vertical-align:middle;
}
.btn-file>input {
	position:absolute;
	top:0;
	right:0;
	margin:0;
	opacity:0;
	filter:alpha(opacity=0);
	transform:translate300px,0) scale(4);
	font-size:23px;
	direction:ltr;
	cursor:pointer;
}
.fileupload {
	margin-bottom:9px;
}
.fileupload .uneditable-input {
	display:inline-block;
	margin-bottom:0px;
	vertical-align:middle;
	cursor:text;
}
.fileupload .thumbnail {
	overflow:hidden;
	display:inline-block;
	margin-bottom:5px;
	vertical-align:middle;
	text-align:center;
}
.fileupload .thumbnail>img {
	display:inline-block;
	vertical-align:middle;
	max-height:100%;
}
.fileupload .btn {
	vertical-align:middle;
}
.fileupload-exists .fileupload-new,.fileupload-new .fileupload-exists {
	display:none;
}
.fileupload-inline .fileupload-controls {
	display:inline;
}
.fileupload-new .input-append .btn-file {
	-webkit-border-radius:0 3px 3px 0;
	-moz-border-radius:0 3px 3px 0;
	border-radius:0 3px 3px 0;
}
.thumbnail-borderless .thumbnail {
	border:none;
	padding:0;
	-webkit-border-radius:0;
	-moz-border-radius:0;
	border-radius:0;
	-webkit-box-shadow:none;
	-moz-box-shadow:none;
	box-shadow:none;
}
.fileupload-new.thumbnail-borderless .thumbnail {
	border:1px solid #ddd;
}
.control-group.warning .fileupload .uneditable-input {
	color:#a47e3c;
	border-color:#a47e3c;
}
.control-group.warning .fileupload .fileupload-preview {
	color:#a47e3c;
}
.control-group.warning .fileupload .thumbnail {
	border-color:#a47e3c;
}
.control-group.error .fileupload .uneditable-input {
	color:#b94a48;
	border-color:#b94a48;
}
.control-group.error .fileupload .fileupload-preview {
	color:#b94a48;
}
.control-group.error .fileupload .thumbnail {
	border-color:#b94a48;
}
.control-group.success .fileupload .uneditable-input {
	color:#468847;
	border-color:#468847;
}
.control-group.success .fileupload .fileupload-preview {
	color:#468847;
}

.fileupload .fileupload-preview {
    padding: 0 10px;
}
.control-group.success .fileupload .thumbnail {
	border-color: #468847;
}


</style>

<div class="col-md-3"></div>
<div class="col-md-6">

      

<form action="{{ route('bibliotheques.store') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<input required="required" id="type_visit" name="type_visit" type="hidden" value="1">
<input required="required" id="status" name="status" type="hidden" value="3">


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


<div class="card">
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
        <div class="card-body"> 
        <h2 class="card-title"><span style="float: left;color:blue;">(خاص بالطلبة)</span>
        المرجو ملء الإستمارة أسفله لطلب الولوج لمكتبة المجلس
      </h2>
        


          <div class="form-row">
            
            <div class="form-group col-md-6">
              <label for="inputEmail4" style="float: left;">Prénom</label>
              <input required="required" type="text" name="prenom"
              value="{{ old('prenom')}}"
              style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
               class="form-control majuscule" id="prenom" placeholder="Prénom">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">الإسم الشخصي</label>
              <input required="required" type="text" name="nom_ar" 
              value="{{ old('nom_ar')}}"
              class="form-control input-style" id="nom_ar" placeholder="الإسم">
            </div>
          </div>

          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4" style="float: left;">Nom</label>
              <input required="required" type="text" name="nom"
              value="{{ old('nom')}}"
              style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
               class="form-control majuscule" id="nom" placeholder="Nom">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">الإسم العائلى</label>
              <input required="required" type="text" name="prenom_ar"
              value="{{ old('prenom_ar')}}"
               class="form-control input-style" id="prenom_ar" placeholder="الإسم العائلى">
            </div>
          </div>
                                       <hr>                  
          <div class="form-row">
                
                <div class="form-group col-md-6">     
                    <label for="inputCNI">رقم الهوية</label>
                    <input required="required" type="text" name="n_cin" 
                    value="{{ old('n_cin')}}"
                    style="direction: ltr" onkeyup='this.value=this.value.toUpperCase()'
                    class="form-control input-style" id="n_cin" placeholder="رقم التعريف">
                </div>
                <div class="form-group col-md-6">     
                    <label for="inputCNI">نوع الهوية</label>
                    <select required class="form-control input-style" 
                     name="identite_type_id" id="identiteType">
                            <option value="" selected disabled>نوع الهوية</option>
                              @foreach($identiteTypes as $identiteType)
                            <option value="{{ $identiteType->libelle_ar }}"
                            {{ old('identite_type_id') == $identiteType->libelle_ar  ? 'selected' : '' }} >
                            {{ $identiteType->libelle_ar }}</option>
                              @endforeach
                    </select>  
                </div>
          </div>    
          <div class="form-row">
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
                        <input required type="tel" name="tel" 
                        value="{{ old('tel')}}" 
                        style="direction: ltr" 
                        class="form-control input-style"  
                          placeholder="رقم الهاتف">
                    </div>     
          </div>


          <div class="form-row">
                <div class="form-group col-md-12">
                   
                    <label for="inputRecherche">مجال البحث</label>
                    <input required="required" type="text" name="domaine_cher" 
                    value="{{ old('domaine_cher')}}" 
                    class="form-control input-style" id="domaine_cher" placeholder="مجال البحث">
                </div>
          </div>

          <div class="form-row">
                <div class="form-group col-md-6">  
                    <label for="time-input">على الساعة</label>
                    <input required="required" class="form-control input-style" 
                    value="{{ old('visite_heure')}}" 
                    type ="time"
                    name="visite_heure"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="date-input">أود الحضور يوم</label>
                    <input required="required" 
                   type ="text" id ="date_ar_bibl"
                   value="{{ old('visite_date')}}"
                   class="form-control input-style" name="visite_date"/>

                </div>
                
        </div> 
        <div class="form-row">
           <div class="form-group col-md-6">
                        <label>    
                                <span style="color:blue;"><br>
                                2 بطاقة الطالب أو شهادة التسجيل
                                </span> 
                        </label>
        <div class="panel">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <span class="btn btn-success btn-file btn-lg">
                    
                    <span class="fileupload-new">
                        <span class="glyphicon glyphicon-cloud-upload"></span> تحميل الملف
                    </span>
                    <span class="fileupload-exists">
                        <span class="glyphicon glyphicon-repeat"></span> تغير
                    </span>         
                    <input type="file"
                    value="{{ old('select_file_ce')}}"
                      class="form-control" name="select_file_ce"  id="photo"/>
                </span>
                <span class="fileupload-preview"></span>
                
                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">
                    x
                </a>
            </div>
        </div>       


          </div>
           <div class="form-group col-md-6">
                    <label>
                                -  تحميل الوثائق اللازمة :
                                <span style="color:blue;"><br>
                                  1 الهوية 
                                </span> 
                        </label>
        <div class="panel">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <span class="btn btn-success btn-file btn-lg">
                    
                    <span class="fileupload-new">
                        <span class="glyphicon glyphicon-cloud-upload"></span> تحميل الملف
                    </span>
                    <span class="fileupload-exists">
                        <span class="glyphicon glyphicon-repeat"></span> تغير
                    </span>         
                    <input type="file"
                    value="{{ old('select_file_cin')}}"
                      name="select_file_cin"
                    />
                </span>
                <span class="fileupload-preview"></span>
                
                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">
                    x
                </a>
            </div>
        </div>
</div>
        <div class="col-md-12">
             <center>
                 <input type="submit" value="حفظ الطلب"  class="btn btn-primary btn-lg">
             </center>
        </div>
         

  </div>
  </div>

</div>
  <div class="col-md-3"></div>
</form>

@endsection

