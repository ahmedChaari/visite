@extends('layouts.admin')
@section('content')


<style>


.schedule{
    font-size: 22px;
    color: #845614;
}
</style>



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


<form action="{{ route('calandriers.store') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}  

<div class="col-md-12">
    <div class="row">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">إضافت موعد جديد</h4>
        </div>

  
    <div class="form-row">
        <div class="col-md-12 form-group schedule">
            <label>الموضوع</label>
            <textarea required="required"  
                class="form-control" name="libelle" 
                rows="3" id="comment">
            </textarea>
        </div>
        <div class="col-md-6 form-group schedule "> 
            <label>اليوم</label>
            <select required class="form-control" 
                name="jour_rep" id="jour_rep">
                <option value="" selected disabled>اليوم</option>
                        @foreach($jourReps as $jourRep)
                <option value="{{ $jourRep->libelle_ar }}">{{ $jourRep->libelle_ar }}</option>
                        @endforeach
            </select> 
        </div> 
        <div class="col-md-6 form-group schedule">
            <label>تكرار</label>
            <select required class="form-control" 
                name="repitition">
                <option value="repitition" selected disabled>نوع التكرار</option>
                    @foreach($repetitions as $repetition)
                <option value="{{ $repetition->libelle_ar }}">{{ $repetition->libelle_ar }}</option>
                    @endforeach
            </select> 
        </div> 
        <div class="col-md-4 form-group schedule">
            <label>الساعة</label>
                <input class="form-control" 
                required="required" type="time"  name="heure_rep">
        </div>
        <div class="col-md-4 form-group schedule">
            <label>تاريخ النهاية</label>
                <input required="required" class="form-control" 
                type ="text" name="end_time"
                id="date_ar_bibl" > 
        </div>
        <div class="col-md-4 form-group schedule">
            <label>تاريخ البدء</label>
                <input required="required" class="form-control" 
                type ="text" name="start_time" 
                id="date_ar" > 
        </div>  
    
</div>
        <center>
        <input type="submit" value="إضافت موعد"  class="btn btn-success" 
        style="margin: 17px 14px;font-size:18px" >
        </center>
        <div class="modal-footer"></div>
      
      </div>
    </div>
  </div>
<div class="col-md-12">  
  <div class="card-header card-header-rose card-header-icon">
     <h4 class="card-title list-title" >إدارة مواعيد الزيارة</h4>
                <button type="button" style="margin: -61px 8px;" class="btn btn-success btn-sm pull-left" data-toggle="modal" 
                    data-target="#myModal"><i class="fa fa-plus-circle" ></i>
                 إضافت موعد
                </button>       
  </div>
</div>
</form>

 <!-- Modal search -->
<div class="col-md-12 search-menu">
    <form action="{{ route('caladSearch') }}" method="post" role="search" >
    <input type="hidden" value="{{ csrf_token() }}" name="_token" />             
                    <div class="form-groupe col-md-2">
                         <label for=""></label>

                         <button class="btn btn-primary form-control search-button" 
                         type="submit" name="submit" value="Search">
                        بحث<i class="fas fa-search"></i></button>               
                    </div>
                    <div class="form-groupe col-md-2">
                        <label for="" >تاريخ النهاية</label>
                        <input type="text" name="end_time" id="date_ar1" class="form-control">
                    </div>  
                    <div class="form-groupe col-md-2">
                        <label for="" >تاريخ البدء</label>
                        <input type="text" name="start_time" id="date_ar2" class="form-control">
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
                    <td>{{ $calandrier ->start_time}}</td>
                    <td>{{ $calandrier ->end_time}}</td>
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
        <div class="pagination" style="float:left">{{ $calandriers->links() }}</div>
        </div>
    </div>   






@endsection




                        