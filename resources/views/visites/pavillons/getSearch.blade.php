@extends('layouts.admin')
@section('content')

<style>
.badge.badge-success {
    float: left;
}
     </style>


<div>
	@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}  
	</div><br>
	@endif
	@if(isset($pavillons))


<div class="col-md-12">  
  <div class="card-header card-header-rose card-header-icon">
        <h4 class="card-title list-title">
      
        قائمة طلبات الولوج مرافق البرلمان</h4>
          <a href="{{ url('visites/calandriers') }}" style="margin: -61px 8px;" rel="tooltip" 
              class="btn btn-info btn-sm pull-left" >
              <i class="fa fa-plus-circle" ></i>
              تنظيم الوقت
          </a>
  </div>
</div>

<!--form serch-->
<div class="col-md-12 search-menu">
    <form action="{{ route('getSearch') }}" method="post" role="search" >
    <input type="hidden" value="{{ csrf_token() }}" name="_token" />             
    <div class="form-groupe col-md-2">
                         <label for=""></label>
                        <button class="btn btn-primary form-control search-button" type="submit" name="submit" value="Search">
                        بحث<i class="fas fa-search"></i></button>               
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="">الحالة</label>                                       
                            <select class="form-control" name="status">
                            <option value="id" selected disabled>الحالة</option>
                                <option value="1">مقبول</option>
                                <option value="0">مرفوض</option>
                                <option value="3">في الإنتظار</option>
                        </select>
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="" >تاريخ الوضع</label>
                        <input type="search" id="date_ar1" name="created_at" class="form-control">
                    </div>  
                    <div class="form-groupe col-md-2">
                        <label for="" >تاريخ الحضور</label>
                        <input type="search" id="date_ar" name="visite_date" class="form-control">
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="">رقم التعريف</label>
                        <input type="search" name="n_cin" class="form-control">
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="" >الاسم الكامل</label>
                        <input type="search" name="nom_ar" class="form-control">
                    </div>       
    </form>
</div>
    <div class="col-md-12"> <h2> نتائج البحث</h2>
    </div>
<!--end form serch-->
           <table id="datatables" class="table table-striped table-no-bordered table-hover" 
           cellspacing="0" width="100%" style="width:100%">
            <thead class="head_cland">
                <tr>
                    <th>وضع الطلب</th>
                    <th>الاسم الكامل</th>
                    <th>صفة صاحب الطلب</th>
                    <th>عدد الإجمالي</th>
                    <th>نوعية المجموعة</th>
                    <th>رقم الهاتف</th>
                    <th>يوم الحضور </th>
                    <th>الحالة</th>
                    <th width="8%"></th>
                </tr>
            </thead>
            <tbody class="font_tbody">      
            @foreach($pavillons as $pavillon)
            <tr>
                <td>{{ date('d-m-Y', strtotime($pavillon->created_at)) }}</td>
                <td>{{ $pavillon ->nom_ar}}&nbsp;&nbsp;{{ $pavillon ->prenom_ar}}</td>
                <td>{{ $pavillon ->type_demandeur}}</td>
                <td>{{ $pavillon ->nombre_tot}}</td>
                <td>{{ $pavillon ->typeGroupe}}</td>
                <td>{{ $pavillon ->tel}}</td>
                <td>{{ date('d-m-Y', strtotime($pavillon->visite_date)) }}</td>  
                <td class="text-left">  
                       @if( $pavillon->status == "1" )
                       <i class="badge font-accept badge-success">مقبول</i>
                       @elseif ( $pavillon->status == "0" )
                       <i class="badge font-refuse">مرفوض</i>
                       @else ( $pavillon->status == "3" )
                       <i class="badge font-wait">في الإنتظار</i>
                       @endif 
               </td>
               <td class="text-left">
                    <a href="{{route('pavillons.edit',[ $pavillon->id])}}" class="btn btn-primary btn-sm" title="عرض الطلب">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
               </td>
            </tr> 
        @endforeach  
        </tbody>
    </table>


   
	@elseif(isset($message))
	<p>{{ $message }}</p>
	@endif
</div>
    
@endsection