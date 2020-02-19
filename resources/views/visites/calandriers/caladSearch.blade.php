@extends('layouts.admin')
@section('content')


<style>

.schedule{
        font-size: 22px;
        color: #845614;
        }

</style>

<div>
@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}  
	</div><br>
	@endif
	@if(isset($calandriers))



 <!-- Modal search -->
<div class="col-md-12 search-menu">
    <form action="{{ route('caladSearch') }}" method="post" role="search" >
    <input type="hidden" value="{{ csrf_token() }}" name="_token" />             
                    <div class="form-groupe col-md-2">
                         <label for=""></label>
                        <button class="btn btn-primary form-control search-button" type="submit" name="submit" value="Search">
                        بحث<i class="fas fa-search"></i></button>               
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="" >تاريخ النهاية</label>
                        <input type="text" name="date_fin" id="date_ar1" class="form-control">
                    </div>  
                    <div class="form-groupe col-md-2">
                        <label for="" >تاريخ البدء</label>
                        <input type="text" name="date_debut" id="date_ar" class="form-control">
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="">نوع التكرار</label>
                        <input type="text" name="repitition" class="form-control">
                    </div>
                    <div class="form-groupe col-md-4">
                        <label for="" >الموضوع</label>
                        <input type="text" name="libelle" class="form-control">
                    </div>             
    </form>
</div>
<div class="col-md-12"> <h2> نتائج البحث</h2>
    </div>
 <!--End Modal search -->
          <table id="datatables" class="table table-bordered table-hover" >
            <thead class="head_cland">
                <tr>
                    <th width="50%">الموضوع</th>
                    <th>تاريخ البدء</th>
                    <th>تاريخ النهاية</th>
                    <th>نوع التكرار </th>
                    <th>اليوم</th>
                    <th>الساعة</th>
                    <th width="8%"></th>
                </tr>
            <tbody class="font_tbody">
            @foreach($calandriers as $calandrier)
                <tr>
                    <td>{{ $calandrier ->libelle}}</td>
                    <td>{{ $calandrier ->date_debut}}</td>
                    <td>{{ $calandrier ->date_fin}}</td>
                    <td>{{ $calandrier->repitition}}</td>
                    <td>{{ $calandrier ->jour_rep}}</td>
                    <td>{{ date( "H:i", strtotime( $calandrier->heure_rep)) }}</td>
                    <td>      
                        <a  href="{{route('calandriers.edit',[ $calandrier->id])}}" rel="tooltip" 
                        type="button" class="btn btn-warning btn-sm pull-left"  title="عرض الموضوع">
                        <i class="fas fa-edit"></i>          
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
