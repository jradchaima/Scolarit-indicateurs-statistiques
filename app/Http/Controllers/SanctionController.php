<?php

namespace App\Http\Controllers;
use App\DBController;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
