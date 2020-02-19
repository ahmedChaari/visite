<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;


use Illuminate\Http\Request;
use App\Hemicycle;
use carbon\carbon;
use App\Models\IdentiteType;
use Session;
use App\Models\TypeGroupe;
use App\Calandrier;
use App\Mail\SendEmail;
use DB;



//Ruls de validate

use App\Rules\TypeDemandeurRule;

class HemicycleController extends Controller
{
   
    public function __construct(){
         $this->middleware('auth')->except(['create','store','show','choix','getCompanion']);
       }

    public function index()
    {
       // $calandriers = Calandrier::where('id' , $libelle)->first();
        $calandriers = Calandrier::all();
 
        $hemicycles = Hemicycle::where('type_visit', '2')->paginate(10);
        return view('visites.hemicycles.index', ['hemicycles' => $hemicycles])
        ->with('calandriers', Calandrier::all());
                                             //->with('calandriers', Calandrier::where('id' , $libelle)->first());
    }

   
    
    public function create()
    {
        $calandriers = Calandrier::all();
        $identiteTypes = IdentiteType::all();
        $typeGroupes = TypeGroupe::all();
        return view('visites.hemicycles.create')->with('calandriers', Calandrier::all())
                                                ->with('identiteTypes', IdentiteType::all())
                                                ->with('typeGroupes', TypeGroupe::all());
    }

   
    public function store(Request $request)
    {

        $request->validate([
            'nom'=>'required|string|min:3',
            'prenom'=>'required|string|min:3',
            'nom_ar'=>'required|string|min:3',
            'prenom_ar'=>'required|string|min:3',
            'email'=>'required|email',
            'tel'=>'required|numeric|digits_between:10,15',
            //'visite_date'=>'required|date',
           //'type_demandeur'=>'required|string|min:5',
           // 'nombre_tot'=>'required|numeric|min:2',  
           'libelle' =>'required',
           'status' =>'required',
           
    ]);
    

    $hemicycle = Hemicycle::create([
            'nom'             =>$request->nom,
            'prenom'          =>$request->prenom,
            'nom_ar'          =>$request->nom_ar,
            'prenom_ar'       =>$request->prenom_ar,
            'email'           =>$request->email,
            'tel'             =>$request->tel,
            'nombre_tot'      =>$request->nombre_tot,
            'identite_type_id'=> $request->identite_type_id,
            'type_visit'      =>$request->type_visit,
            'typeGroupe'      =>$request->typeGroupe,  
            'n_cin'           =>$request->n_cin,
            'status'          =>$request->status,
            'provenance'      =>$request->provenance,
            'nombre_tot'      =>$request->nombre_tot,
            'type_demandeur'  =>$request->type_demandeur, 
            'type_groupe'     =>$request->type_groupe,
            'visite_date'     =>$request->visite_date,
            'libelle'         =>$request->libelle,

            
        ]);
      //  \Mail::to($hemicycle)->send(new SendEmail);


    
       return redirect('visites/succes');
        
    }

    

    public function show()
    {
        $calandriers = Calandrier::all();
        $identiteTypes = IdentiteType::all();
        $typeGroupes = TypeGroupe::all();
        return view('visites.hemicycles.show')->with('calandriers', Calandrier::all())
                                              ->with('identiteTypes', IdentiteType::all())
                                              ->with('typeGroupes', TypeGroupe::all());
    }

    public function choix()
    {
       
    return view('visites.hemicycles.choix');

    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $hemicycle = Hemicycle::where($where)->first();
        return view('visites.hemicycles.edit')->with('hemicycle' , $hemicycle);
    }



  
    public function update(Request $request, $id)
    {
        switch ($request->get('submitbutton')) {

            case '1':
                    $hemicycle = Hemicycle::where('id', '=', e($id))->first();
                    $hemicycle->status = 1;              
                    if ($hemicycle->visite_date == $hemicycle->visite_date) {     
                        $hemicycle->save();                 
                }   
                else {
                    $hemicycle->visite_date = $request->visite_date;
                    $hemicycle->save(); 
                      }            
                 
                return redirect('visites/hemicycles')->with('message', 'لقد تم تعديل تاريخ الحضور‎');

                        break;
                    case '0':   
                    $hemicycle = Hemicycle::where('id', '=', e($id))->first();
                    $hemicycle->status = 0;
                    $hemicycle->save();
                    return redirect('visites/hemicycles')->with('message', 'لقد تم رفض الطلب');;
                        break;
        }  
    }

    public function getCompanion()
    {
       
    return view('visites.hemicycles.getCompanion');

    }

    
    public function updateCompanion(Request $request, $id)
    {
    }




    public function search(Request $request){

        $status      = Input::get ( 'status' );
        $nom_ar      = Input::get ( 'nom_ar' );
        $created_at  = Input::get ( 'created_at' );
        $visite_date = Input::get ( 'visite_date' );
        $n_cin       = Input::get ( 'n_cin' );
        
        $hemicycles  = Hemicycle::where( 'status', 'LIKE', "%$status%" )
                                    ->where( 'nom_ar', 'LIKE', "%$nom_ar%" )
                                    ->whereDate( 'visite_date', 'LIKE', "%$visite_date%" )
                                    ->where( 'n_cin', 'LIKE', "%$n_cin%" )
                                    ->whereDate( 'created_at', 'LIKE', "%$created_at%" )
                                    ->where('type_visit', '=', '2')
                                    ->get ();
        if (count ( $hemicycles ) > 0)
            return view ( 'visites.hemicycles.search' )->with(compact('hemicycles'));
        else
            return view ( 'visites.hemicycles.search' )->withMessage ( 'لم يتم العثور على اي معلومات متعلقة بالبحث؛. حاول مرة أخرى٠٠' );
  
    
    }

}

