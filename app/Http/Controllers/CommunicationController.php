<?php

namespace App\Http\Controllers;

use App\Communication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *                                                   
     * @return \Illuminate\Http\Response
     */


    public function rapportetabl(){
        return view('rapcommunication');
    }
    
    public function rapportregional(){
        return view('rapregcommunication');
    }
    public function rapportcentrale(){
        return view('rapcomuncnte');
    }

    public function stat(){
        $l =  Auth::user()->region_id;
        $orders = DB::table('communications')->where('id_region','=',$l)->select(DB::raw('count(*) as order_count, id_etabl'))
        ->groupBy('id_etabl')->orderBy('order_count', 'desc')->get();
      
        
        
        
      
        
        return view('communicationstat')->with('etabliss', $orders);
     
    }
     public function statcentrale(){
        $l =  Auth::user()->centre_id;
        $orders = DB::table('communications')->where('id_centrale','=',$l)->select(DB::raw('count(*) as order_count, id_region'))
        ->groupBy('id_region')->orderBy('order_count', 'desc')->get();
      
        
        
        
      
        
        return view('comunstatcnte')->with('region', $orders);
     
    }
    public function index()
    {
        $j =  Auth::user()->etabliss_id;      
        $communication = Communication::all()->where('id_etabl','=',$j); 
        return view('communication')
        ->with('communication', $communication)
        ;
    }                           
    public function store(Request $request)
    {
        $j =  Auth::user()->etabliss_id; 
        $j1 =  Auth::user()->region_id; 
        $j2=  Auth::user()->centre_id; 
        $communication= new Communication;

        $communication->type_comun = $request->input('type_comun');
        $communication->nb_comun = $request->input('nb_comun');
        $communication->responsable= $request->input('responsable');
        $communication->id_etabl=$j;
        $communication->id_region= $j1;
        $communication->id_centrale= $j2;
        $communication->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/communication')->with('status','donnée ajoutée avec success');


    }
    public function edit($id)
    {
        $communication= Communication::findOrFail($id);
       return view('editcomun')
     ->with('communication', $communication)
       ;
    }
    public function update(Request $request,$id)
    {
        $communication= Communication::findOrFail($id);
        $communication->type_comun = $request->input('type_comun');
        $communication->nb_comun = $request->input('nb_comun');
        $communication->responsable= $request->input('responsable');
        

        $communication->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/communication')->with('status','donnée modifiée   avec success');

    }
    public function delete($id)
    {
        $communication= Communication::findOrFail($id);
        $communication->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/communication')->with('status','donnée supprimée avec success');

    }



    //indicateur region

    public function indexregion()
    {
        $j =  Auth::user()->region_id;      
        $communication = Communication::all()->where('id_region','=',$j); 
        return view('indcomunreg')
        ->with('communication', $communication)
        ;
    }                           
    public function storeregion(Request $request)
    {
        $j =  Auth::user()->region_id;  
        $communication= new Communication;

        $communication->type_comun = $request->input('type_comun');
        $communication->nb_comun = $request->input('nb_comun');
        $communication->responsable= $request->input('responsable');
        $communication->id_etabl= $request->input('id_etabl');
        $communication->id_region=  $j;
        $communication->id_centrale= $request->input('id_centrale');
        $communication->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/indcomunreg')->with('status','donnée ajoutée  avec succée');


    }
    public function editregion($id)
    {
        $communication= Communication::findOrFail($id);
       return view('editindcomunreg')
     ->with('communication', $communication)
       ;
    }
    public function updateregion(Request $request,$id)
    {
        $communication= Communication::findOrFail($id);
        $communication->type_comun = $request->input('type_comun');
        $communication->nb_comun = $request->input('nb_comun');
        $communication->responsable= $request->input('responsable');
        $communication->id_etabl= $request->input('id_etabl');
        $communication->id_centrale= $request->input('id_centrale');
        $communication->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/indcomunreg')->with('status','donnée modifiée  avec success');

    }
    public function deleteregion($id)
    {
        $communication= Communication::findOrFail($id);
        $communication->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/indcomunreg')->with('status','donnée supprimée avec success');

    }
}
