<?php

namespace App\Http\Controllers;
use App\DBController;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Violence;
use DB;

class ViolenceController extends Controller
{

public function etabliss(){
    return view('violence');
}
public function region(){
    return view('violregion');
}
public function stat(){
    $l =  Auth::user()->region_id;
    $orders = DB::table('violences')->where('region_id','=',$l)->select(DB::raw('count(*) as order_count, etabliss_id'))
    ->groupBy('etabliss_id')->orderBy('order_count', 'desc')->get();
  
    
    
    
  
    
    return view('violencestat')->with('etabliss', $orders);
 
}

public function index()
{
    $j =  Auth::user()->etabliss_id;
    $violence = Violence::all()->where('etabliss_id','=',$j);
  
    return view('affichviolence')
    ->with('violence',$violence) ;
}

public function store(Request $request)
{
$violence = new Violence;

$violence->violence_date = $request->date;
$violence->cause_violence= $request->cause_violence;
$violence->type_violence= $request->type_violence;
$violence->etabliss_id = Auth::user()->etabliss_id;
    $violence->region_id = Auth::user()->region_id;
    $violence->centre_id = Auth::user()->centre_id;

$violence->save();
return redirect('/violence')->with('status','données ajoutées  avec success');


}
public function edit($id)
{
 $violence= Violence::findOrFail($id);
   return view('editviolence')
 ->with('violence',$violence)
   ;
}
public function update(Request $request,$id)
{
    $violence= Violence::findOrFail($id);
    $violence->violence_date = $request->date;
    $violence->cause_violence= $request->cause_violence;
    $violence->type_violence= $request->type_violence;

    $violence->update();
    

    return redirect('/violence')->with('status','data update  avec success');

}
public function delete($id)
{
    $violence= Violence::findOrFail($id);
    $violence->delete();
    return redirect('/violence')->with('status','données  supprimées avec succéess');

}
}
