<?php

namespace App\Http\Controllers;

use App\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function rapportetabl(){
        return view('rapactivite');
    }
    
    public function rapportregional(){
        return view('rapregactivite');
    }
    public function rapportcentrale(){
        return view('rapactivitecnte');
    }

    public function stat(){
        $l =  Auth::user()->region_id;
        $orders = DB::table('activites')->where('id_region','=',$l)->select(DB::raw('count(*) as order_count, id_etabl'))
        ->groupBy('id_etabl')->orderBy('order_count', 'desc')->get();
      
        
        
        
      
        
        return view('activitestat')->with('etabliss', $orders);
     
    }
    public function statcentrale(){
        $l =  Auth::user()->centre_id;
        $orders = DB::table('activites')->where('id_centrale','=',$l)->select(DB::raw('count(*) as order_count, id_region'))
        ->groupBy('id_region')->orderBy('order_count', 'desc')->get();
      
        
        
        
      
        
        return view('activstatcnte')->with('region', $orders);
     
    }
    public function index()
    {
        $j =  Auth::user()->etabliss_id;      
        $activite = Activite::all()->where('id_etabl','=',$j);   
        return view('activite')
        ->with('activite', $activite)
        ;
    }                           
    public function store(Request $request)
    { $j =  Auth::user()->etabliss_id; 
        $j1 =  Auth::user()->region_id;
        $j2  =  Auth::user()->centre_id; 

        $activite= new Activite;

        $activite->type_activite = $request->input('type_activite');
        $activite->nb_activite = $request->input('nb_activite');
        $activite->nb_eleve= $request->input('nb_eleve');
        $activite->id_etabl= $j;
        $activite->id_region= $j1;
        $activite->id_centrale = $j2;

        $activite->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/activite')->with('status','donnée ajoutée  avec success');


    }
    public function edit($id)
    {
        $activite= Activite::findOrFail($id);
       return view('editactivite')
     ->with('activite', $activite)
       ;
    }
    public function update(Request $request,$id)
    {
        $activite= Activite::findOrFail($id);
        $activite->type_activite= $request->input('type_activite');
        $activite->nb_activite = $request->input('nb_activite');
        $activite->nb_eleve= $request->input('nb_eleve');
    
        $activite->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/activite')->with('status','donnée modifiée  avec success');

    }
    public function delete($id)
    {
        $activite= Activite::findOrFail($id);
        $activite->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/activite')->with('status','data supprimée avec success');

    }

// region indicateur

    public function indexregion()
    {
        $j =  Auth::user()->region_id;      
        $activite = Activite::all()->where('id_region','=',$j);   
        return view('indactreg')
        ->with('activite', $activite)
        ;
    }                           
    public function storeregion(Request $request)
    {$j =  Auth::user()->region_id; 
        $activite= new Activite;

        $activite->type_activite = $request->input('type_activite');
        $activite->nb_activite = $request->input('nb_activite');
        $activite->nb_eleve= $request->input('nb_eleve');
        $activite->id_etabl= $request->input('id_etabl');
        $activite->id_region= $j;
        $activite->id_centrale= $request->input('id_centrale');
        $activite->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/indactreg')->with('status','data add for absence avec success');


    }
    public function editregion($id)
    {
        $activite= Activite::findOrFail($id);
       return view('editindactreg')
     ->with('activite', $activite)
       ;
    }
    public function updateregion(Request $request,$id)
    {
        $activite= Activite::findOrFail($id);
        $activite->type_activite= $request->input('type_activite');
        $activite->nb_activite = $request->input('nb_activite');
        $activite->nb_eleve= $request->input('nb_eleve');
        $activite->id_etabl= $request->input('id_etabl');
        $activite->id_centrale= $request->input('id_centrale');
        $activite->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/indactreg')->with('status','data update  avec success');

    }
    public function deleteregion($id)
    {
        $activite= Activite::findOrFail($id);
        $activite->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/indactreg')->with('status','data update avec success');

    }
}
