@extends('layouts.admin')
@section('content')




  <!--      model searche -->

  <div class="col-md-12">
  
            <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title list-title">قائمة الولوج لزيارة قاعة الجلسات</h4>
                    <a href="{{ url('visites/calandriers') }}" style="margin: -61px 8px;" rel="tooltip" 
                        class="btn btn-info btn-sm pull-left" 
                        >
                        <i class="fa fa-plus-circle" ></i>
                        تنظيم الوقت
                    </a>
            </div>
</div>
<div class="col-md-12 search-menu">
    <form action="{{ route('search') }}" method="post" role="search" >
    <input type="hidden" value="{{ csrf_token() }}" name="_token" />             
                    <div class="form-groupe col-md-2">
                            <label for=""></label>
                        <button class="btn btn-primary form-control search-button" type="submit" name="submit" value="Search">
                        بحث<i class="fas fa-search"></i></button>               
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="">الحالة</label>                                       
                            <select class="form-control" name="status">
                            <option value="id" selected disabled>-------</option>
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
                        <input type="search" 
                        id="date_ar" name="visite_date" class="form-control">
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

  <!--  end  model searche -->
  <div class="col-md-12">    
    <table class="table table-striped table-no-bordered table-hover" 
            cellspacing="0" width="100%" style="width:100%">
            <thead class="head_cland">
            
                <tr>
                        <th>وضع الطلب</th>
                        <th>الاسم الكامل</th>
                        <th>صفة صاحب الطلب</th>
                        <th>الهاتف</th>
                        <th>التاريخ</th>
                        <th>عدد الأشخاص</th>
                        <th></th>
                        <th>الحالة</th>                     
                        <th width="12%"></th>                   
                </tr>
                </thead>
            <tbody class="font_tbody">          
        @foreach($hemicycles as $hemicycle)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($hemicycle->created_at)) }}</td>
                        <td>{{ $hemicycle ->nom_ar}}&nbsp;&nbsp;{{ $hemicycle ->prenom_ar}}</td>
                        <td>{{ $hemicycle ->type_demandeur}}</td>
                        <td>{{ $hemicycle ->tel}}</td>

                     
                        
                        <td>{{ date('d-m-Y', strtotime($hemicycle->visite_date)) }}</td>
                        
                        <td >{{ $hemicycle ->nombre_tot}}</td>                  
                        <td>   
                                @if( $hemicycle->type_groupe == "2" )
                                        <a 
                                        href="{{route('hemicycles.edit',[ $hemicycle->id])}}">
                                        مجموعة
                                        </a>        
                                @else
                                        <a
                                        href="{{route('hemicycles.edit',[ $hemicycle->id])}}">
                                        فردي
                                        </a>   
                                @endif 
                        <!-- status for hemicycle -->                     
                        </td> 
                        <td class="text-left">
                                @if( $hemicycle->status == "1" )
                                    <i class="badge font-accept badge-success">مقبول</i>
                                @elseif ( $hemicycle->status == "0" )
                                    <i class="badge font-refuse">مرفوض</i>
                                @else ( $hemicycle->status == "3" )
                                    <i class="badge font-wait">في الإنتظار</i>
                                @endif 
                        </td>
                        <td class="text-left">
                            <a href="{{route('hemicycles.edit',[ $hemicycle->id])}}" 
                            class="btn btn-primary btn-sm" title="عرض الطلب">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>  
                    </tr>
        @endforeach       
        </tbody>
    </table>
        <div class="pagination" style="float:left">{{ $hemicycles->links() }}</div>
    
</div>
@endsection
