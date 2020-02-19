@extends('layouts.admin')
@section('content')

<html dir="rtl" lang="ar">
<style>
</style>       
<div class="col-md-12">
        <div class="card-header card-header-rose card-header-icon">
            <h4 class="card-title list-title">
                    قائمة طلبات الولوج للمكتبة</h4>
           
    </div>
</div>
<!--form serch-->
<div class="col-md-12 search-menu">
    <form action="{{ route('biblSearch') }}" method="post" role="search" >
    <input type="hidden" value="{{ csrf_token() }}" name="_token" />             
    <div class="form-groupe col-md-2">
                         <label for=""></label>
                        <button class="btn btn-primary form-control search-button" type="submit" name="submit" value="Search">
                        بحث<i class="fas fa-search"></i></button>               
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="">الحالة</label>                                       
                            <select class="form-control" name="status">
                            <option value="id" selected disabled>-----</option>
                                <option value="1">مقبول</option>
                                <option value="0">مرفوض</option>
                                <option value="3">في الإنتظار</option>
                        </select>
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="" >تاريخ الوضع</label>
                        <input type="search" id="date_ar1"
                        value="{{ old('created_at')}}"
                        name="created_at" class="form-control">
                    </div>  
                    <div class="form-groupe col-md-2">
                        <label for="" >تاريخ الحضور</label>
                        <input type="search" id="date_ar"
                        value="{{ old('visite_date')}}"
                        name="visite_date" class="form-control">
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="">رقم التعريف</label>
                        <input type="search" name="n_cin"
                        value="{{ old('n_cin')}}" class="form-control">
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="" >الاسم الكامل</label>
                        <input type="search" name="nom_ar" 
                        value="{{ old('nom_ar')}}" class="form-control">
                    </div>       
    </form>
</div>
<!--end form serch-->
<table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead class="head_cland">
                <tr>
                    <th>وضع الطلب</th>
                    <th>الاسم الكامل</th>
                    <th>مجال البحث</th>
                    <th>الهاتف</th>
                    <th>التاريخ</th>
                    <th> الساعة</th>
                    <th>الحالة</th>
                    <th width="8%"></th>
                </tr>
    </thead>
            <tbody class="font_tbody">
          

            @foreach($bibliotheques as $bibliotheque)
            
                <tr>
                    <td>{{ 
                         date('d/m/Y', strtotime($bibliotheque->created_at))
                         }}
                    </td>
                    <td>{{ $bibliotheque ->nom_ar}}&nbsp;&nbsp;{{ $bibliotheque ->prenom_ar}}</td>
                    <td>{{ $bibliotheque ->domaine_cher}}</td>
                    <td>{{ $bibliotheque ->tel}}</td>
                    <td>
                    {{ 
                         date('d/m/Y', strtotime($bibliotheque->visite_date))
                        }}
                    </td>
                    <td>
                    {{  date( "H:i", strtotime( $bibliotheque->visite_heure)) }}</td>
                    <td class="text-left">
                                @if( $bibliotheque->status == "1" )
                                <i class="badge font-accept badge-success">مقبول</i>
                                @elseif ( $bibliotheque->status == "0" )
                                <i class="badge font-refuse">مرفوض</i>
                                @else ( $bibliotheque->status == "3" )
                                <i class="badge font-wait">في الإنتظار</i>
                                @endif 
                        </td>
                        <td class="text-left">
                            <a
                            href="{{route('bibliotheques.edit',[ $bibliotheque->id])}}"
                            class="btn btn-primary btn-sm" title="عرض الطلب">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                        </td>
                </tr>
                
            @endforeach
               
                
               
            </tbody>
        </table>
        <div class="pagination">{{ $bibliotheques->links() }}</div>
        </div>
      
        </div>
       

@endsection