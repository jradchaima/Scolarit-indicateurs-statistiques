<?php

namespace App\Http\Controllers;

use App\Dossiermedical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class DossiermedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


  
    public function index()
    {
        $j =  Auth::user()->etabliss_id;      
        $medical = Dossiermedical::all()->where('id_etabl','=',$j);
        return view('dossiermedical')
        ->with('dossiermedical', $medical)
        ;
    }                           
    public function store(Request $request)
    {
        $j =  Auth::user()->etabliss_id;   
        $j1 =  Auth::user()->region_id;   
        $j2 =  Auth::user()->centre_id;   
        $medical= new Dossiermedical;

        $medical->nom_etudient = $request->input('nom_etudient');
        $medical->prenom_etudient = $request->input('prenom_etudient');
        $medical->handicape = $request->input('handicape');
        $medical->maladie_chronique = $request->input('maladie_chronique');
        $medical->autre_maladie = $request->input('autre_maladie');
        $medical->id_etabl= $j;
        
        $medical->id_region= $j;
        $medical->id_centrale= $j;
        $medical->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/dossiermedical')->with('status','donnée ajoutée avec success');


    }
    public function edit($id)
    {
        $medical= Dossiermedical::findOrFail($id);
       return view('editdossier')
     ->with('dossiermedical', $medical)
       ;
    }
    public function update(Request $request,$id)
    {
        $medical= Dossiermedical::findOrFail($id);
        $medical->nom_etudient = $request->input('nom_etudient');
        $medical->prenom_etudient = $request->input('prenom_etudient');
        $medical->handicape = $request->input('handicape');
        $medical->maladie_chronique = $request->input('maladie_chronique');
        $medical->autre_maladie = $request->input('autre_maladie');
       
        $medical->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/dossiermedical')->with('status','donnée modifiée avec success');

    }
    public function delete($id)
    {
        $medical= Dossiermedical::findOrFail($id);
        $medical->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/dossiermedical')->with('status','donnée supprimée avec success');

    }


// indicateur region
     
    public function indexregion()
    {
        $j =  Auth::user()->region_id;      
        $medical = Dossiermedical::all()->where('id_region','=',$j);
        return view('inddossierreg')
        ->with('dossiermedical', $medical)
        ;
    }                           
    public function storeregion(Request $request)
    {
        $j =  Auth::user()->region_id; 
        $medical= new Dossiermedical;

        $medical->nom_etudient = $request->input('nom_etudient');
        $medical->prenom_etudient = $request->input('prenom_etudient');
        $medical->handicape = $request->input('handicape');
        $medical->maladie_chronique = $request->input('maladie_chronique');
        $medical->autre_maladie = $request->input('autre_maladie');
        $medical->id_etabl= $request->input('id_etabl');
        $medical->id_region= $j;
        $medical->id_centrale= $request->input('id_centrale');
        $medical->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/inddossierreg')->with('status','donnée ajoutée avec success');


    }
    public function editregion($id)
    {
        $medical= Dossiermedical::findOrFail($id);
       return view('editinddossierreg')
     ->with('dossiermedical', $medical)
       ;
    }
    public function updateregion(Request $request,$id)
    {
        $medical= Dossiermedical::findOrFail($id);
        $medical->nom_etudient = $request->input('nom_etudient');
        $medical->prenom_etudient = $request->input('prenom_etudient');
        $medical->handicape = $request->input('handicape');
        $medical->maladie_chronique = $request->input('maladie_chronique');
        $medical->autre_maladie = $request->input('autre_maladie');
        $medical->id_etabl = $request->input('id_etabl');
        $medical->id_centrale = $request->input('id_centrale');
        $medical->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/inddossierreg')->with('status','donnée modifiée avec success');

    }
    public function deleteregion($id)
    {
        $medical= Dossiermedical::findOrFail($id);
        $medical->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/inddossierreg')->with('status','donnée supprimée avec success');

    }
}
