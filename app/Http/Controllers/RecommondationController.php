<?php

namespace App\Http\Controllers;
use Session;
use App\Recommondation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RecommondationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {
        $j =  Auth::user()->etabliss_id;      
        $recommondation = Recommondation::all()->where('id_etabl','=',$j);
        return view('recommondation')
        ->with('recondation', $recommondation)
        ;
    }                           
    public function store(Request $request)
    {
        $j =  Auth::user()->etabliss_id;
        $j1 =  Auth::user()->region_id;
        $j2 =  Auth::user()->centre_id;

        $recommondation= new Recommondation;

        $recommondation->recom = $request->input('recom');
        $recommondation->id_etabl=$j;
        $recommondation->id_region= $j1;
        $recommondation->id_centrale= $j2;
        $recommondation->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/recommondation')->with('status','donnée ajoutée avec sucée');


    }
    public function edit($id)
    {
        $recommondation= Recommondation::findOrFail($id);
       return view('editrecomm')
     ->with('recommondation', $recommondation)
       ;
    }
    public function update(Request $request,$id)
    {
        $recommondation= Recommondation::findOrFail($id);
        $recommondation->recom = $request->input('recom');
       

        $recommondation->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/recommondation')->with('status','data modifiée avec success');

    }
    public function delete($id)
    {
        $recommondation= Recommondation::findOrFail($id);
        $recommondation->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/recommondation')->with('status','data supprimée avec success');

    }


    //indicateur region
    public function indexregion()
    {
        $j =  Auth::user()->region_id;      
        $recommondation = Recommondation::all()->where('id_region','=',$j);
        return view('indrecomreg')
        ->with('recondation', $recommondation)
        ;
    }                           
    public function storeregion(Request $request)
    {
        $j =  Auth::user()->region_id; 
        $j2 =  Auth::user()->centre_id;
        $recommondation= new Recommondation;

        $recommondation->recom = $request->input('recom');
        $recommondation->id_etabl = 0;
        $recommondation->id_region= $j;
        $recommondation->id_centrale= $j2;
        $recommondation->save();
        Session::flash('statuscode','success');
    return redirect('/layouts/indrecomreg')->with('status','data add for absence avec success');


    }
    public function editregion($id)
    {
        $recommondation= Recommondation::findOrFail($id);
       return view('editindrecomreg')
     ->with('recommondation', $recommondation)
       ;
    }
    public function updateregion(Request $request,$id)
    {
        $recommondation= Recommondation::findOrFail($id);
        $recommondation->recom = $request->input('recom');

        $recommondation->update();
        
        Session::flash('statuscode','info');
        return redirect('/layouts/indrecomreg')->with('status','data update  avec success');

    }
    public function deleteregion($id)
    {
        $recommondation= Recommondation::findOrFail($id);
        $recommondation->delete();
        Session::flash('statuscode','error');
        return redirect('/layouts/indrecomreg')->with('status','data update avec success');

    }
    public function indexcentrale()
    {
        $j =  Auth::user()->centre_id;      
        $recommondation = Recommondation::all()->where('id_centrale','=',$j);
        return view('recomcentrale')
        ->with('recondation', $recommondation)
        ;
    }   
    

}
