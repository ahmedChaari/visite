<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Pavillon;
use DB;
use App\Models\IdentiteType;
use App\Models\TypeGroupe;
use App\Models\NatureGroupe;
use Alert;
use Illuminate\Pagination\Paginator;

//Ruls de validate


use App\Rules\NumberMuRule;
use App\Rules\NumberFeRule;
use App\Rules\NumberTotalRule;
use App\Rules\VideRule;
use App\Rules\ArabPrenomRule;
use App\Rules\ArabNomRule;
use App\Rules\TypeDemandeurRule;


class PavillonController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['create','store']);
    }
    
    public function index()
    {

        $pavillons = Pavillon::where('type_visit', '3')->paginate(8);
        return view('visites.pavillons.index', ['pavillons' => $pavillons]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identiteTypes = IdentiteType::all();
        $typeGroupes = TypeGroupe::all();
        $natureGroupes = NatureGroupe::all();


        return view('visites.pavillons.create')->with('identiteTypes', IdentiteType::all())
                                               ->with('typeGroupes', TypeGroupe::all())
                                               ->with('natureGroupes', NatureGroupe::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'nom'            =>'required|string|min:3',
            'prenom'         =>'required|string|min:3',
            'nom_ar'         =>'required|string|min:3',
            'prenom_ar'      =>'required|string|min:3',
            'email'          =>'required|email',
            'tel'            =>'required|numeric|digits_between:10,15',
            'visite_heure'   =>'required|date_format:H:i',
            'visite_date'    =>'required|date',
            'type_demandeur' =>'required|string|min:5',
            'nombre_feminin' =>'required|numeric|min:0',
           // 'nombre_mineur'=>'required|numeric|min:0',
            'nombre_tot'     =>'required|numeric',
            'nom_groupe'     =>'required|string',  
            'natureGroupe'   =>'required',   
            'status'         =>'required',      
    ]);
        $pavillons = Pavillon::create([
            'nom'             =>$request->nom,
            'prenom'          =>$request->prenom,
            'nom_ar'          =>$request->nom_ar,
            'prenom_ar'       =>$request->prenom_ar,
            'email'           =>$request->email,
            'tel'             =>$request->tel,
            'visite_date'     =>$request->visite_date,
            'visite_heure'    =>$request->visite_heure,
            'type_demandeur'  =>$request->type_demandeur,
            'status'          =>$request->status,
            'type_visit'      =>$request->type_visit,
            'provenance'      =>$request->provenance,
            'nom_groupe'      =>$request->nom_groupe,
            'nombre_tot'      =>$request->nombre_tot,
            'nombre_mineur'   =>$request->nombre_mineur,
            'nombre_feminin'  =>$request->nombre_feminin,
            'natureGroupe'    =>$request->natureGroupe,
            'typeGroupe'      =>$request->typeGroupe,
            'identite_type_id'=>$request->identite_type_id,
            'n_cin'           =>$request->n_cin,
        ]);

        return redirect('visites/succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

 
    public function edit($id)
    {
        $where = array('id' => $id);
        $pavillon = Pavillon::where($where)->first();
        return view('visites.pavillons.edit')->with('pavillon' , $pavillon);
    }

   
    public function update(Request $request, $id)
    {
        switch ($request->get('submitbutton')) {

            case '1':
                    $pavillon = Pavillon::where('id', '=', e($id))->first();
                    $pavillon->status = 1;              
                if ($pavillon->visite_date == $pavillon->visite_date) {     
                    $pavillon->save();                 
                }   
                else {
                    $pavillon->visite_date = $request->visite_date;
                    $pavillon->save(); 
                }            
                return redirect('visites/pavillons')->with('message', 'لقد تم تعديل تاريخ الحضور‎');
                break;
            case '0':   
                    $pavillon = Pavillon::where('id', '=', e($id))->first();
                    $pavillon->status = 0;
                    $pavillon->save();
                    return redirect('visites/pavillons')->with('message', 'لقد تم رفض الطلب');;
                break;
        }
    }
  
    public function destroy($id)
        {
            

        }

    public function getSearch(Request $request){

        $status      = Input::get ( 'status' );
        $nom_ar      = Input::get ( 'nom_ar' );
        $created_at  = Input::get ( 'created_at' );
        $visite_date = Input::get ( 'visite_date' );
        $n_cin       = Input::get ( 'n_cin' );
        
       

        $pavillons   = Pavillon::where('status','LIKE', "%$status%")
                                ->where( 'nom_ar', 'LIKE', "%$nom_ar%" )
                                ->whereDate( 'visite_date', 'LIKE', "%$visite_date%")
                                ->where( 'n_cin', 'LIKE', "%$n_cin%")
                                ->whereDate( 'created_at', 'LIKE', "%$created_at%")
                                ->where('type_visit', '=', '3')
                                ->get ();
        if (count ( $pavillons ) > 0)
            return view ( 'visites.pavillons.getSearch' )->with(compact('pavillons'));
        else
            return view ( 'visites.pavillons.getSearch' )->withMessage ( 'لم يتم العثور على اي معلومات متعلقة بالبحث؛. حاول مرة أخرى٠٠' );
    }
   
}
