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
      <form action="{{ route('pavillons.update',['id'=> $pavillon->id]) }}" method="POST">
      <input type="hidden" name="_method" value="put">  
{{ csrf_field() }}




<div class="card">
  <div class="card-body"> 
            <div class="col-md-12">
                <ol style=" font-size: 16px;" class="breadcrumb">
                    <li>
                        <a  href="{{ url('/') }}"><i class="fas fa-home"></i>الصفحة الرئيسية</a>
                    </li>
                    <li class="active"><a href="{{ url('visites/pavillons') }}">القائمة</a></li>
                    <li class="active">إستمارة </li>
                </ol>
            </div>
            <div class="col-md-12">
                <h4>وضع هذا الطلب : <span style="float: left; color: #ad9300;">
                        {{ \Carbon\Carbon::parse($pavillon->created_at)->diffForHumans() }}</span>
                </h4>
            </div>
            <div class="form-group col-md-12 text-left">
                @if( $pavillon->status == "1" )
                <i class="badge font-accept badge-success">مقبول</i>
                @elseif ( $pavillon->status == "0" )
                <i class="badge font-refuse">مرفوض</i>
                @else ( $pavillon->status == "NULL" )
                <i class="badge font-wait">في الإنتظار</i>
                @endif 
        </div> 

        <div class="form-group col-md-6">
                <label for="">المجموعة</label>
                <input type="text" class="form-control style_ar" disabled
                value="{{ $pavillon->nom_groupe }}" 
                name="nom_groupe">
        </div>
        <div class="form-group col-md-6">     
            <label>طبيعة المجموعة</label>
           <input name="natureGroupe" id="" class="form-control style_ar" disabled
           type="text" value="{{ $pavillon->natureGroupe }}">
                        
             
        </div>
    <div class="form-group col-md-6">  
            <label for="date-input">الجهة</label>
            <input disabled
            value="{{ $pavillon->provenance }}" type ="text" 
            class="form-control style_ar" name="provenance"/>
    </div> 
    <div class="form-group col-md-6">
        <label for="inputEmail4">صفة صاحب الطلب</label><br>
        <input  type="text" name="type_demandeur" 
        class="form-control style_ar" disabled
        value="{{ $pavillon->type_demandeur }}"
        required>
    </div>                     
    <div class="form-group col-md-6">
        <label for="inputEmail4" style="float: left;">Nom</label><br>
            <input  type="text" name="nom" 
            style="direction: ltr"
            disabled value="{{ $pavillon->nom }}"
            onkeyup='this.value=this.value.toUpperCase()'
            required
            class="form-control" id="nom" placeholder="Nom">
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4">الإسم الشخصي</label><br>
        <input  type="text" name="nom_ar" 
        required
        disabled value="{{ $pavillon->nom_ar }}"
        class="form-control style_ar" >
    </div>


      
              <div class="form-group col-md-6">
                <label for="inputEmail4" style="float: left;">Prénom</label><br>   
                <input  type="text" name="prenom" 
                required onkeyup='this.value=this.value.toUpperCase()'
                style="direction: ltr"
                disabled value="{{ $pavillon->prenom }}"
                class="form-control majuscule" >
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">الإسم العائلى</label><br>
                <input  type="text" name="prenom_ar" 
                required
                disabled value="{{ $pavillon->prenom_ar }}"
                class="form-control style_ar" >
              </div>
              <div class="form-group col-md-6">     
                    <label>رقم التعريف</label><br>
                    <input  type="text" name="n_cin" 
                    required onkeyup='this.value=this.value.toUpperCase()'
                    style="direction: ltr"
                    disabled value="{{ $pavillon->n_cin }}"
                    class="form-control " >
                </div>
                  <div class="form-group col-md-6">     
                      <label for="inputCNI">نوع التعريف</label><br>
                      <input  type="text" name="identite_type_id" 
                    required onkeyup='this.value=this.value.toUpperCase()'
                    disabled value="{{ $pavillon->identite_type_id }}"
                    class="form-control style_ar" >
                  </div>
         
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">البريد الإلكتروني</label><br>
                      
                      <input  type="email" name="email" 
                      required
                      disabled value="{{ $pavillon->email }}"
                      style="direction: ltr"
                      class="form-control" id="email" 
                      placeholder="البريد الإلكتروني">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">رقم الهاتف</label><br>
                      <input  type="tel" name="tel" 
                      required
                      style="direction: ltr"
                      class="form-control" 
                      disabled value="{{ $pavillon->tel }}">
                  </div>     
        <div class="col-md-12 affiche_date">
                   <h3 value="" name="visite_date">يوم الحضور
                   {{ date('d/m/Y', strtotime($pavillon->visite_date))}}
                   على الساعة
                   <td>{{ date( "H:i", strtotime( $pavillon->visite_heure)) }}</td>
                   </h3> 
        </div> 
<div class="col-md-12">
        <div class="form-group col-md-4">
                        <label>عدد الأطفال</label><br> 
                        <input  type="text"
                        style="direction: ltr" required
                        class="form-control" name="nombre_mineur"  
                        disabled value="{{ $pavillon->nombre_mineur }}">
                </div>
                <div class="form-group col-md-4">
                <label for="input">عدد الإجمالي</label><br>
                <input  type="text" 
                style="direction: ltr" required
                class="form-control" name="nombre_tot" 
                disabled value="{{ $pavillon->nombre_tot }}">
        </div>

        <div class="form-group col-md-4">
                        <label for="sel1">طبيعة أفراد المجموعة</label>
                        <input  type="text" 
                         style="direction: ltr" required
                        class="form-control style_ar" name="typeGroupe" 
                        disabled value="{{ $pavillon->typeGroupe }}">
        </div> 
        

</div>
        

       <div class="col-md-12">
       <div class="form-group col-md-4"></div> 
       <div class="form-group col-md-4"></div> 
                <div class="form-group col-md-4">
                        <label for="input">عدد الاناث</label><br>
                        <input  type="text" 
                        style="direction: ltr" required
                        class="form-control" name="nombre_feminin" 
                        disabled value="{{ $pavillon->nombre_feminin }}">
                </div> 
              
       </div>
        

        <div class="col-md-12">
                <center style="margin-bottom: 22px;margin-top: 22px;">
                <a href=""   name='submitbutton' class="btn btn-success style_ar" data-toggle="modal" 
                    data-target="#myModal">قبول الطلب</a>
                   
                    <button id='submit' class="btn btn-danger style_ar" 
                    type='submit' name = 'submitbutton' value = '0'>رفض الطلب</button> 
                </center>
        </div>
    </div>
</div>


</div>




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
                    style="direction: ltr" 
                    value="{{ date('d-m-Y', strtotime($pavillon->visite_date))}}" 
                    
                   type ="text" id ="datepicker-13"
                   class="form-control" name="visite_date"/>

      </div>
      <div class="modal-footer">
      <button id='submit' class="btn btn-success style_ar" 
                    type='submit' name = 'submitbutton' value = '1'>قبول الطلب</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- popup pour modification date -->






</form>
<div class="col-md-3"></div>



@endsection

