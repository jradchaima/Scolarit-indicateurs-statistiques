<?php

namespace App\Http\Controllers;
use App\DBController;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sanction;
use DB;

class SanctionController extends Controller
{

public function etabliss(){
    return view('sanction');
}
public function region(){
    return view('sancregion');
}
public function stat(){
    $l =  Auth::user()->region_id;
    $orders = DB::table('sanctions')->where('region_id','=',$l)->select(DB::raw('count(*) as order_count, etabliss_id'))
    ->groupBy('etabliss_id')->orderBy('order_count', 'desc')->get();
  
    
    
    
  
    
    return view('sancstat')->with('etabliss', $orders);
 
}

public function index()
{
    $j =  Auth::user()->etabliss_id;
    $sanction = Sanction::all()->where('etabliss_id','=',$j);
  
    return view('affichsanction')
    ->with('sanction',$sanction) ;
}

public function store(Request $request)
{
$sanction = new Sanction;

$sanction->sanction_date = $request->date;
$sanction->nombre_jours = $request->nbr_jours;
$sanction->cause_sanction= $request->cause_sanction;
$sanction->type_sanction= $request->type_sanction;
$sanction->etabliss_id = Auth::user()->etabliss_id;
    $sanction->region_id = Auth::user()->region_id;

$sanction->save();
return redirect('/sancaffich')->with('status','données ajoutées  avec success');


}
public function edit($id)
{
 $sanction= Sanction::findOrFail($id);
   return view('editsanction')
 ->with('sanction',$sanction)
   ;
}
public function update(Request $request,$id)
{
    $sanction= Sanction::findOrFail($id);
    $sanction->sanction_date = $request->date;
    $sanction->nombre_jours = $request->nbr_jours;
    $sanction->cause_sanction= $request->cause_sanction;
    $sanction->type_sanction= $request->type_sanction;
    $sanction->etabliss_id = Auth::user()->etabliss_id;
    $sanction->region_id = Auth::user()->region_id;
    $sanction->update();
    

    return redirect('/sancaffich')->with('status','data update  avec success');

}
public function delete($id)
{
    $sanction= Sanction::findOrFail($id);
    $sanction->delete();
    return redirect('/sancaffich')->with('status','données  supprimées avec succéess');

}
}
