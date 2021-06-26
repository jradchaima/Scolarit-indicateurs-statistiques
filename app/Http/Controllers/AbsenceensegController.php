<?php

namespace App\Http\Controllers;

use App\Absenceenseg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
class AbsenceensegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function rapportetabl(){
        return view('rapabsenceenseg');
    }
    
    public function rapportregional(){
        return view('rapregabsenceenseg');
    }

    public function rapportcentrale(){
        return view('rapabsenscnte');
    }
    
    public function stat(){
        $l =  Auth::user()->region_id;
        $orders = DB::table('absenceensegs')->where('id_region','=',$l)->select(DB::raw('count(*) as order_count, id_etabl'))
        ->groupBy('id_etabl')->orderBy('order_count', 'desc')->get();
      
        
        
        
      
        
        return view('absensegstat')->with('etabliss', $orders);
     
    }
    public function statcentrale(){
        $l =  Auth::user()->centre_id;
        $orders = DB::table('absenceensegs')->where('id_centrale','=',$l)->select(DB::raw('count(*) as order_count, id_region'))
        ->groupBy('id_region')->orderBy('order_count', 'desc')->get();
      
        
        
        
      
        
        return view('absensstatcnte')->with('region', $orders);
     
    }
    
    public function index()
    {
        $j =  Auth::user()->etabliss_id;      
        $absenceenseg = Absenceenseg::all()->where('id_etabl','=',$j);
        return view('absenceenseg')
        ->with('absenceenseg', $absenceenseg)
        ;
    }                           
    public function store(Request $request)
    {
        $j =  Auth::user()->etabliss_id; 
        $j1 =  Auth::user()->region_id;
        $j2 =  Auth::user()->centre_id; 
        $absenceenseg= new Absenceenseg;

        $absenceenseg->nb_abs = $request->input('nb_abs');
        $absenceenseg->nbj_abs = $request->input('nbj_abs');
        $absenceenseg->type_abs= $request->input('type_abs');
        $absenceenseg->id_etabl=$j ;
        $absenceenseg->id_region= $j1;
        $absenceenseg->id_centrale= $j2;
  
        $absenceenseg->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/absenceenseg')->with('status','donnée ajoutée avec succée');


    }
    public function edit($id)
    {
        $absenceenseg= Absenceenseg::findOrFail($id);
       return view('editabsens')
     ->with('absenceenseg', $absenceenseg)
       ;
    }
    public function update(Request $request,$id)
    {
        $absenceenseg= Absenceenseg::findOrFail($id);
        $absenceenseg->nb_abs = $request->input('nb_abs');
        $absenceenseg->nbj_abs = $request->input('nbj_abs');
        $absenceenseg->type_abs= $request->input('type_abs');
       
        $absenceenseg->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/absenceenseg')->with('status','donnée modifiée  avec succé');

    }
    public function delete($id)
    {
        $absenceenseg= Absenceenseg::findOrFail($id);
        $absenceenseg->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/absenceenseg')->with('status','donné supprimée');

    }







    //region ind

    public function indexregion()
    {
        $j =  Auth::user()->region_id;      
        $absenceenseg = Absenceenseg::all()->where('id_region','=',$j);
        return view('indabsensegreg')
        ->with('absenceenseg', $absenceenseg)
        ;
    }                           
    public function storeregion(Request $request)
    {
        $j =  Auth::user()->region_id; 
        $absenceenseg= new Absenceenseg;

        $absenceenseg->nb_abs = $request->input('nb_abs');
        $absenceenseg->nbj_abs = $request->input('nbj_abs');
        $absenceenseg->type_abs= $request->input('type_abs');
        $absenceenseg->id_etabl= $request->input('id_etabl');
        $absenceenseg->id_region= $j;
        $absenceenseg->id_centrale= $request->input('id_centrale');
        $absenceenseg->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/indabsensegreg')->with('status','data add for absence avec success');


    }
    public function editregion($id)
    {
        $absenceenseg= Absenceenseg::findOrFail($id);
       return view('editindabsensegreg')
     ->with('absenceenseg', $absenceenseg)
       ;
    }
    public function updateregion(Request $request,$id)
    {
        $absenceenseg= Absenceenseg::findOrFail($id);
        $absenceenseg->nb_abs = $request->input('nb_abs');
        $absenceenseg->nbj_abs = $request->input('nbj_abs');
        $absenceenseg->type_abs= $request->input('type_abs');
        $absenceenseg->id_etabl= $request->input('id_etabl');
        $absenceenseg->id_centrale= $request->input('id_centrale');
        $absenceenseg->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/indabsensegreg')->with('status','data update  avec success');

    }
    public function deleteregion($id)
    {
        $absenceenseg= Absenceenseg::findOrFail($id);
        $absenceenseg->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/indabsensegreg')->with('status','data update avec success');

    }
}
