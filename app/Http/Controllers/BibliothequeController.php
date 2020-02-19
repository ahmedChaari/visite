<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\Bibliotheque;
use carbon\Carbon;
use App\Models\IdentiteType;
use DB;
use App\Rules\DateFormaBeb;
use App\Mail\SendEmail;

use Session;

use App\Rules\PhoneRule;

class BibliothequeController extends Controller
{
        public function __construct(){
            $this->middleware('auth')->except(['create','store']);
        }
        
    public function index()
    {


    $bibliotheques = Bibliotheque::where('type_visit', '1')->paginate(10);
    return view('visites.bibliotheques.index', ['bibliotheques' => $bibliotheques]);
        
    }

    public function create()
    {
        $identiteTypes = IdentiteType::all();

       
        return view('visites.bibliotheques.create')->with('identiteTypes', IdentiteType::all());
    }

  
    
    public function store(Request $request)
    {  

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
        if ($request->hasFile('select_file_cin')) {
            $files_ce = $request->file('select_file_cin');
            foreach($files_ce as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
                $destinationPath = 'uploads/visits/cin'.'/';
                $file->move($destinationPath, $fileName);
            }
        }

        

$request->validate([
            'nom'            =>'required|string|min:3',
            'prenom'         =>'required|string|min:3',
            'nom_ar'         =>'required|string|min:3',
            'prenom_ar'      =>'required|string|min:3',
            'email'          =>'required|email',
            'tel'            =>'required|numeric|digits_between:10,15',
            'visite_date'    => 'required|date',
            'visite_heure'   => 'required',
            'select_file_ce' => 'required|mimes:jpeg,bmp,png',
            'select_file_cin'=> 'required|mimes:jpeg,bmp,png',
            'domaine_cher'   =>'required',          
        ]);
        
        
        $bibliotheque = Bibliotheque::create([
            'nom'              =>$request->nom,
            'prenom'           =>$request->prenom,
            'nom_ar'           =>$request->nom_ar,
            'prenom_ar'        =>$request->prenom_ar,
            'email'            =>$request->email,
            'tel'              =>$request->tel,
            'type_visit'       =>$request->type_visit,
            'n_cin'            =>$request->n_cin,    
            'select_file_ce'   => 'uploads/visits/ce/' . $files_ce,
            'select_file_cin'  => 'uploads/visits/cin/' . $files,
            'visite_date'      =>$request->visite_date,
            'visite_heure'     =>$request->visite_heure,
            'identite_type_id' =>$request->identite_type_id,
            'domaine_cher'     =>$request->domaine_cher,
            'status'           =>$request->status,
        ]);
      
        toastr()->success('!! لقد تم التسجيل بنجاح ');

     return redirect('visites/succes');
 
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $where = array('id' => $id);
        $bibliotheque = Bibliotheque::where($where)->first();
        return view('visites.bibliotheques.edit')->with('bibliotheque' , $bibliotheque);
    }

 
    public function update(Request $request, $id)
    {
        switch ($request->get('submitbutton')) {

            case '1':
                $bibliotheque = Bibliotheque::where('id', '=', e($id))->first();
                $bibliotheque->status = 1;
                if ($bibliotheque->visite_date == $bibliotheque->visite_date) {     
                    $bibliotheque->save();                 
                }               
                $bibliotheque->visite_date = $request->visite_date;
                return redirect('visites/bibliotheques');
                break;
            case '0':
                $bibliotheque = Bibliotheque::where('id', '=', e($id))->first();
                $bibliotheque->status = 0;
                $bibliotheque->save();
                return redirect('visites/bibliotheques');
                    break;
        }
    }

    
    public function destroy($id)
    {
        //
    }
    
    
    public function biblSearch(Request $request){

            $status      = Input::get ( 'status' );
            $nom_ar      = Input::get ( 'nom_ar' );
            $created_at  = Input::get ( 'created_at' );
            $visite_date = Input::get ( 'visite_date' );
            $n_cin       = Input::get ( 'n_cin' );
            
        $bibliotheques  = Bibliotheque::where( 'status', 'LIKE', "%$status%" )
                                ->where( 'nom_ar', 'LIKE', "%$nom_ar%" )
                                ->whereDate( 'visite_date', 'LIKE', "%$visite_date%" )
                                ->where( 'n_cin', 'LIKE', "%$n_cin%" )
                                ->whereDate( 'created_at', 'LIKE', "%$created_at%" )
                                ->where('type_visit', '=', '1')
                                ->get ();
        if (count ( $bibliotheques ) > 0)
            return view ( 'visites.bibliotheques.biblSearch' )->with(compact('bibliotheques'));
        else
            return view ( 'visites.bibliotheques.biblSearch' )->withMessage ( 'لم يتم العثور على اي معلومات متعلقة بالبحث؛. حاول مرة أخرى٠٠' );
  
    
    }
}
