<?php

namespace App\Http\Controllers;

use App\Absenceeleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
class AbsenceeleveController extends Controller
{
    public function rapportetabl(){
        return view('rapabsenceeleve');
    }
    
    public function rapportregional(){
        return view('rapregabsenceeleve');
    }
    
  public function rapportcentrale(){
        return view('rapabselevecent');
    }
    
    public function stat(){
        $l =  Auth::user()->region_id;
        $orders = DB::table('absenceeleves')->where('id_region','=',$l)->select(DB::raw('count(*) as order_count, id_etabl'))
        ->groupBy('id_etabl')->orderBy('order_count', 'desc')->get();
      
        
        
        
      
        
        return view('abselevestat')->with('etabliss', $orders);
     
    }
    public function statcentrale(){
        $l =  Auth::user()->centre_id;
        $orders = DB::table('absenceeleves')->where('id_centrale','=',$l)->select(DB::raw('count(*) as order_count, id_region'))
        ->groupBy('id_region')->orderBy('order_count', 'desc')->get();
      
        
        
        
      
        
        return view('abselevestatcente')->with('region', $orders);
     
    }

    public function index()
    {
              
        $j =  Auth::user()->etabliss_id;      
       $absenceeleve = Absenceeleve::all()->where('id_etabl','=',$j) ;
        return view('absenceeleve')
        ->with('absenceeleve',$absenceeleve)
        ;
    }                           
    public function store(Request $request)
    {
        $j =  Auth::user()->etabliss_id;
        $j1 = Auth::user()->region_id;
        $j2 = Auth::user()->centre_id;
        $absenceeleve = new Absenceeleve;

        $absenceeleve->nb_abs = $request->input('nb_abs');
        $absenceeleve->nbj_abs = $request->input('nbj_abs');
        $absenceeleve->type_abs= $request->input('type_abs');
        $absenceeleve->niveau= $request->input('niveau');
        $absenceeleve->id_etabl= $j;
        $absenceeleve->id_region= $j1;
        $absenceeleve->id_centrale= $j2;
   
        $absenceeleve->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/absenceeleve')->with('status','donnée ajoutée avec succée');


    }
    public function edit($id)
    {
        $absenceeleve= Absenceeleve::findOrFail($id);
       return view('editabsel')
     ->with('absenceeleve',$absenceeleve)
       ;
    }
    public function update(Request $request,$id)
    {
        $absenceeleve= Absenceeleve::findOrFail($id);
        $absenceeleve->nb_abs = $request->input('nb_abs');
        $absenceeleve->nbj_abs = $request->input('nbj_abs');
        $absenceeleve->type_abs= $request->input('type_abs');
        $absenceeleve->niveau= $request->input('niveau');
     
        $absenceeleve->update();
        

        Session::flash('statuscode','info');
        return redirect('/layouts/absenceeleve')->with('status','donée modifiée avec sucée');

    }
    public function delete($id)
    {
        $absenceeleve= Absenceeleve::findOrFail($id);
        $absenceeleve->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/absenceeleve')->with('status','donné supprimée avec success');

    }


//region indicateur

    public function indexregion()
    {
              
        $j =  Auth::user()->region_id;      
       $absenceeleve = Absenceeleve::all()->where('id_region','=',$j) ;
        return view('indabselreg')
        ->with('absenceeleve',$absenceeleve)
        ;
    }                           
    public function storeregion(Request $request)
    {
        $j =  Auth::user()->region_id; 
        $absenceeleve = new Absenceeleve;

        $absenceeleve->nb_abs = $request->input('nb_abs');
        $absenceeleve->nbj_abs = $request->input('nbj_abs');
        $absenceeleve->type_abs= $request->input('type_abs');
        $absenceeleve->niveau= $request->input('niveau');
        $absenceeleve->id_etabl= $request->input('id_etabl');
        $absenceeleve->id_region=$j ;
        $absenceeleve->id_centrale= $request->input('id_centrale');
        $absenceeleve->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/indabselreg')->with('status','data add for absence avec success');


    }
    public function editregion($id)
    {
        $absenceeleve= Absenceeleve::findOrFail($id);
       return view('editindabselreg')
     ->with('absenceeleve',$absenceeleve)
       ;
    }
    public function updateregion(Request $request,$id)
    {
        $absenceeleve= Absenceeleve::findOrFail($id);
        $absenceeleve->nb_abs = $request->input('nb_abs');
        $absenceeleve->nbj_abs = $request->input('nbj_abs');
        $absenceeleve->type_abs= $request->input('type_abs');
        $absenceeleve->niveau= $request->input('niveau');
        $absenceeleve->id_etabl= $request->input('id_etabl');
        $absenceeleve->id_centrale= $request->input('id_centrale');
      
        $absenceeleve->update();
        

        Session::flash('statuscode','info');
        return redirect('/layouts/indabselreg')->with('status','donné modifié  avec success');

    }
    public function deleteregion($id)
    {
        $absenceeleve= Absenceeleve::findOrFail($id);
        $absenceeleve->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/indabselreg')->with('status','donné supprimée avec success');

    }
  
}
