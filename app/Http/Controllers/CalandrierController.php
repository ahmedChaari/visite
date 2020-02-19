<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use DB;
use App\Calandrier;
use App\Models\Repetition;
use App\Models\JourRep;
use carbon\carbon;

class CalandrierController extends Controller
{
   
    public function __construct(){
        $this->middleware('auth');
      }

    public function index()
    {
        $repetitions = Repetition::all();
        $jourReps = JourRep::all();

        $calandriers = Calandrier::select()->paginate(8);
       
        return view('visites.calandriers.index', ['calandriers' => $calandriers])
                     ->with('jourReps', JourRep::all())
                     ->with('repetitions', Repetition::all());
    }

    public function create()
    {
       
    }

    
    public function store(Request $request)
    {
         
        $request->validate([
            'libelle'=>'required|string|max:200',
            'start_time'=>'required|date|after:yesterday',
            'end_time'=>'required|date|after:tomorrow',
            'repitition'=>'required|string',
            'jour_rep'=>'required|string',
           // 'heure_rep'=>'required|between:08,22',
               
    ]);
        $calandriers = Calandrier::create([
            'libelle'=>$request->libelle,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'repitition'=>$request->repitition,
            'jour_rep'=>$request->jour_rep,
            'heure_rep'=>$request->heure_rep,
        ]);
        toastr()->success('!! لقد تم التسجيل بنجاح ');
        return redirect('visites/calandriers');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $where = array('id' => $id);
        $calandrier = Calandrier::where($where)->first();

        return view('visites.calandriers.edit')->with('calandrier' , $calandrier);
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 
            ]);
            $calandrier = Calandrier::find($id);
                $calandrier->libelle    = $request->input('libelle');
                $calandrier->start_time = $request->input('start_time');
                $calandrier->end_time   = $request->input('end_time');
                $calandrier->heure_rep  = $request->input('heure_rep');
            $calandrier-> save();
    return redirect('visites/calandriers');    
    }

   
    public function destroy($id)
    {
        //
    }

    public function caladSearch(Request $request){

        $libelle     = Input::get('libelle');
        $start_time  = Input::get('start_time');
        $end_time    = Input::get( 'end_time');
        $repitition  = Input::get( 'repetition' );
        
        $calandriers  = Calandrier::where('libelle', 'LIKE', "%$libelle%")
                                    ->where('repitition', 'LIKE', "%$repitition%" )
                                    ->whereDate('start_time', 'LIKE', "%$start_time%" )                     
                                    ->whereDate('end_time', 'LIKE', "%$end_time%" )
                                    ->get();
        if (count ( $calandriers ) > 0)
            return view ( 'visites.calandriers.caladSearch' )->with(compact('calandriers'));
        else
            return view ( 'visites.calandriers.caladSearch' )->withMessage ( 'لم يتم العثور على اي معلومات متعلقة بالبحث؛. حاول مرة أخرى٠٠' );
  
    
    }

}
