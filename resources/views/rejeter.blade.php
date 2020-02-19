<form action="{{ route('calandriers.store') }}" method="POST" enctype="multipart/form-data">

{{ csrf_field() }}

          <div class="form-group">

              <div class="col-md-6">
              <label>ffff</label>
              <input required="required" class="form-control" type="text" name="libelle">
              </div>
              <div class="col-md-6">
              <label>ffff</label>
              <input required="required" type="date" name="date_debut"> 
              </div>
              <div class="col-md-6">
          <label>ffff</label>
          <input required="required" type="date" name="date_fin">
          </div>
          <div class="col-md-6">
          <label>ffff</label>
          <select required name="repitition">
                            <option value="" selected disabled>--</option>
                            <option value="OUI">OUI</option>
                            <option value="NON">NON</option>
                    </select>
          </div>
          <div class="col-md-6">
          <label>ffff</label>
          <input required="required" type="text" name="type_rep" > 
          </div>
          <div class="col-md-6">
          <label>ffff</label>
          <select required name="jour_rep">
                                <option value="" selected disabled>--</option>
                                <option value="LUNDI">LUNDI</option>
                                <option value="MARDI">MARDI</option>
                                <option value="MERCREDI">MERCREDI</option>
                                <option value="JEUDI">JEUDI</option>
                                <option value="VENTREDI">VENTREDI</option>
                                <option value="SAMEDI">SAMEDI</option>
                                <option value="DIMANCHE">DIMANCHE</option>
                        </select>
          </div>
          <div class="col-md-6">
          <label>ffff</label>
          <input required="required" type="time" name="heure_rep">
          </div>

          </div>
              
          <td><input type="submit" value="+" style="width: 36px !important;"
                 class="btn btn-success btn-sm pull-left">
                    
                </td>
                
                <form action=""></form>
                   

                if ($request->hasFile('select_file_cin')) {
                $files = $request->file('select_file_cin');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
                    $destinationPath = 'uploads/visits/cin'.'/';
                    $file->move($destinationPath, $fileName);
                }
            }

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

@if ($errors->has('identiteType'))
                          <span class="text-danger" >{{ $errors->first('identiteType') }}</span>
                      @endif
                
               
$request->validate([
                'nom'=>'required|string',
                'prenom'=>'required|string',
                'nom_ar'=>'required|string',
                'prenom_ar'=>'required|string',
                'cin'=>'required|string',
                'n_cin'=>'required|string',
                'email'=>'required|email',
                'tel'=>'required|string',
                'visite_date'=>'required|date',
                'type_demandeur'=>'required|string',
                'nombre_tot'=>'required|int',
                'nombre_mineur'=>'required|int',
                'nombre_feminin'=>'required|int',
                'type_groupe'=>'required|string',
                'nature_groupe'=>'required|string',
        ]);
        
        
        <form action="{{ route('pavillons.update',['id'=> $pavillon->id]) }}" method="POST">
      <input type="hidden" name="_method" value="put">   
                
        $pavillon->prenom = $request->prenom;
            $pavillon->nom_ar = $request->nom_ar;
            $pavillon->prenom_ar=$request->prenom_ar;
            $pavillon->identite_type_id=$request->identite_type_id;
            $pavillon->n_cin=$request->n_cin;
            $pavillon->email=$request->email;
            $pavillon->tel=$request->tel;
            $pavillon->visite_date=$request->visite_date;
            $pavillon->type_demandeur=$request->type_demandeur;
            $pavillon->nombre_tot=$request->nombre_tot;
            $pavillon->nombre_mineur=$request->nombre_mineur;
            $pavillon->nombre_feminin=$request->nombre_feminin;
            $pavillon->type_groupe=$request->type_groupe;
            $pavillon->typeGroupe=$request->typeGroupe;
            $pavillon->status=$request->status;
                
              <input type="submit" value="+" style="width: 36px !important;"
                 class="btn btn-success btn-sm pull-left">
                    
               
              
            </tr>
</form>       


   
<div class="form-group col-md-6 ">
                   <input required="required" 
                   type ="text" id ="date_ar"
                   class="form-control" name="visite_date"/>
            </div>
            <div class="form-group col-md-6">
                  <label for="date-input">أود الحضور يوم</label>
            </div>



            
                                @foreach($calandriers as $calandrier)
                            <div class="col-md-12 form-group">
                                <p style="font-size: 19px;  color: #111548;" 
                                value="{{ $calandrier->libelle }}">{{ $calandrier->libelle }}</p>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-4">  من 
                                    <label>{{ $calandrier->date_debut }}</label>
                                </div>
                                <div class="col-md-4">  إلى  
                                    <label>{{ $calandrier->date_fin }}</label> 
                                </div>
                                <div class="col-md-4">
                                    <label>{{ date( "H:i", strtotime( $calandrier->heure_rep)) }}</label>
                                    على الساعة
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-4">
                                    <label>{{ $calandrier->repitition }}</label>
                                </div>
                                <div class="col-md-4">
                                    <label>{{ $calandrier->jour_rep }}</label>
                                </div>
                                <div class="col-md-4">
                                    <label><input name="libelle" type="checkbox" 
                                    value="{{ $calandrier->id }}">إختيار</label>
                                </div>
                            </div>
                                @endforeach




                                <style>

.panel-default{
    margin: 20px 150px 100px 119px
}
.panel-heading{
    padding: 16px 4px;
    color: white !important;
    font-size: 23px;
    text-align: center;
    margin: 0px 0px;
    background-image: -webkit-linear-gradient(top, #da932d 0%, #764c10 100%) !important;
}
.user_login{
    width: 36px;
    height: 36px;
    float: right;
}

</style>
    <div class="row">
    
    <div class="col-md-12">
            <div class="col-md-2"></div>
                <div class="col-md-8">
                        <ol style=" font-size: 16px;margin-top: 40px;" class="breadcrumb">
                                <li>
                                    <a  href="{{ url('/') }}">
                                            <i class="fas fa-home"></i>
                                            الصفحة الرئيسية
                                    </a>
                                </li> 
                        
                                <li class="active">تسجيل الدخول</li> 
                        </ol>
                </div>
            <div class="col-md-2"></div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h5 class="panel-heading">
              
                تسجيل الدخول</h5>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="email" class="col-md-6 control-label">
                            <i class="fas fa-user"></i>
                            اسم المستخدم</label>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="password" class="col-md-6 control-label">
                            <i class="fas fa-key"></i>
                            كلمة المرور</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                               
                                    
                                
                               
                                    <button type="submit" class="btn btn-success">
                                    تسجيل الدخول
                                    </button>
                                    <label>
                                        <input type="checkbox" class="text-rieght" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;&nbsp; تذكرني
                                    </label>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  
        <div class="form-group col-md-4 pull-right">
            <label for="sel1">طبيعة أفراد المجموعة</label>
            <select required id="count" class="form-control" 
                name="typeGroupe">
                <option value="" selected disabled> طبيعة أفراد المجموعة</option>
                    @foreach($typeGroupes as $typeGroupe)
                <option value="{{ $typeGroupe->libelle_ar }}">{{ $typeGroupe->libelle_ar }}</option>
                    @endforeach
            </select>  
        </div> 

        



        
  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>






  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
         




        <form action="{{ route('calandriers.update',['id'=> $calandrier->id]) }}" method="POST">
{{ csrf_field() }}
    <div class="form-row">
        <div class="col-md-3 form-group ">
            <label>تكرار</label>
            <label>{{ $calandrier->repitition }}</label>
        </div>
        <div class="col-md-3 form-group">
            <label>تاريخ النهاية</label>
            <label>{{ $calandrier->date_fin }}</label>                 
        </div>
            <div class="col-md-3 form-group">
                    <label>تاريخ البدء</label>
                    <label>{{ $calandrier->date_debut }}</label>
            </div>
        <div class="col-md-3 form-group ">
            <label>الموضوع</label>
            <textarea  class="form-control" name="libelle" 
            rows="3" id="libelle" value="{{ $calandrier->libelle }}" ></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 form-group">
            <label></label>
            <button type="submit" style="font-size: 16px;" class="btn btn-success btn-sm"
                data-target="#myModal"><i class="fa fa-plus-circle" ></i>
                إضافت موعد
            </button>
        </div>  
        <div class="col-md-3 form-group">
            <label>اليوم</label>
            <label>{{ $calandrier->jour_rep }}</label>
        </div>
        <div class="col-md-3 form-group">
            <label>الساعة</label>
            <input class="form-control" 
            type="time" name="heure_rep"
            value="{{ $calandrier->heure_rep }}" >
        </div>    
    </div>     
        


    </form>  
       





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  


  <!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">تعديل مواعيد الجلسات</h4>
        </div>
        <div class="modal-body">
         



<form action="{{ route('calandriers.update',['id'=> $calandrier->id]) }}" method="POST">
{{csrf_field()}}
        <input name="_method" type="hidden" value="PUT">
       

    <div class="form-row">
        <div class="col-md-12 form-group ">
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
        <div class="col-md-4 form-group ">
            <label>الساعة</label>
                <input class="form-control" 
                required="required" type="time" name="heure_rep">
        </div>
        <div class="col-md-4 form-group ">
            <label>تاريخ النهاية</label>
                <input required="required" class="form-control" 
                type ="text" name="date_fin"
                id="datepicker-14" > 
        </div>
        <div class="col-md-4 form-group ">
            <label>تاريخ البدء</label>
                <input required="required" class="form-control" 
                type ="text" name="date_debut"
                id="date_ar" > 
        </div>  
    </div> 
</div>
        <center>
            <button type="submit" class="btn btn-warning" style="margin: 17px 14px;font-size:18px" 
            data-dismiss="modal">تحديث الموعد</button>
        </center>
     
      </div> 
    </div>
  </div>
  </form>