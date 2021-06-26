<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        
     
        return view('users');
    }
    public function indexregion()
    {
        $regionale =  User::where('region', true)->get();
      
        return view('regionuse')
        ->with('regionuser',$regionale)
        ;
    }
    public function storeregion(Request $request)
    {
       $request->validate($this->validationRules());
        $regionale = new User;
          $reg = $request->input('name');
          $cent = $request->input('name_centre');
   
          $cent1 = DB::table('centres')->where('nom_centre','=',$cent)->get();
          $reg2 = DB::table('users')->get();
          foreach ($reg2 as $n){
            $l = $n->name;
      
          if($reg == $l){
              
        return redirect()->route('regionuser')->with('regex', 'direction régionale existe déja');
          }
        }
      
       
        $reg1 = DB::table('regions')->where('nom_region','=',$reg)->get();
             foreach ($reg1 as $n){
                 $l = $n->id;
              
           
        $regionale->region_id = $l;
       
             }
             foreach ($cent1 as $n){
                $l = $n->id;
             
          
       $regionale->centre_id = $l;
      
            }
             $regionale->name = $reg;
        $regionale-> email= $request->input('email');
       $regionale_etabliss_id = 0;
        $regionale->password = Hash::make($request->password);
        $regionale->admin = 0;
        $regionale->etablissement = 0;
        $regionale->region =1;
   
        $regionale->save();


        Session::flash('statuscode','success');
        return redirect('/layouts/regionuser')->with('status','ajout avec sucée');
    }
    
 
    public function editregion($id)
    {
     $regionale= User::findOrFail($id);
       return view('editregionale')
       ->with('regionuser',$regionale)
       ;
    }
    public function updateregion(Request $request,$id)
    {
      $request->validate($this->validationRules2());
        $regionale= User::findOrFail($id);
   
        $regionale->email = $request->input('email');
        $regionale->password = Hash::make($request->password);
       
        $regionale->update();


        Session::flash('statuscode','info');
        return redirect('/layouts/regionuser')->with('status','modification avec succé');
        

 

    }
    public function deleteregion($id)
    {
        $regionale= User::findOrFail($id);
        $regionale->delete();


        Session::flash('statuscode','error');
       return redirect('/layouts/regionuser')->with('status','suppression avec succée');
       

    }








    public function indexcentral()
    {
        $centrale = User::where([
            ['etablissement',false],
            ['admin',false],
            ['region',false],
        ])->get();
      
        return view('centraluser')
        ->with('centraluser',$centrale)
        ;
    }
    public function storecentral(Request $request)

    {
        $request->validate($this->validationRules());
        $centrale = new User;

        $cent = $request->input('name');
        $centrale->email= $request->input('email');
        $centrale->etablissement = 0;
        $centrale->region= 0;
        $centrale->admin = 0;
        $cent2 = DB::table('users')->get();
        foreach ($cent2 as $n){
          $l = $n->name;
    
        if($cent == $l){
            
      return redirect()->route('centrauser')->with('centex', 'direction centrale existe déja');
        }
      }
    

        $cent1 = DB::table('centres')->where('nom_centre','=',$cent)->get();
    
        foreach ($cent1 as $n){
            $l = $n->id;
    
      
   $centrale->centre_id = $l;
  
        }
        $centrale-> name = $cent;
        $centrale->password = Hash::make($request->password);
  
        $centrale->etabliss_id = 0;
        $centrale->region_id= 0;

        $centrale->save();
        Session::flash('statuscode','success');
        return redirect('/layouts/centraluser')->with('status','data add for centrale avec success');
    
    }


 



    public function editcentral($id)
    {
        $centrale= User::findOrFail($id);
       return view('layouts.editcentral')
       ->with('centraluser',$centrale)
       ;
    }
    public function updatecentral(Request $request,$id)
    {
       $request->validate($this->validationRules2());
        $centrale= User::findOrFail($id);
   
        $centrale->email = $request->input('email');

    
  
        $centrale->update();
        Session::flash('statuscode','info');
        return redirect('/layouts/centraluser')->with('status','donnée modifiée avec succé');
        

 

    }
    public function deletecentral($id)
    {
        $centrale= User::findOrFail($id);
        $centrale->delete();
        Session::flash('statuscode','error');
       return redirect('/layouts/centraluser')->with('status','donné supprimée avec succée');
       

    }










    public function etabliss()
    {
        
           
        $etablissuser = User::where('etablissement', true)->get();
       
        return view('etablissuser', compact('etablissuser'));
    }
    public function storeetabliss(Request $request)
 {
    $request->validate($this->validationRules());
    $etablissement = new User;
    $et = $request->input('name');
      $reg = $request->input('name_region');
      $cent = $request->input('name_centre');
      
      $cent1 = DB::table('centres')->where('nom_centre','=',$cent)->get();
   
       $et1 = DB::table('etablissements')->where('nom','=',$et)->get();
   
    $reg1 = DB::table('regions')->where('nom_region','=',$reg)->get();
    foreach ($et1 as $n){
        $l = $n->id;
     
  
$etablissement->etabliss_id = $l;

    }
         foreach ($reg1 as $n){
             $l = $n->id;
          
       
    $etablissement->region_id = $l;
   
         }
         foreach ($cent1 as $n){
            $l = $n->id;
         
      
   $etablissement->centre_id = $l;
  
        }
         $etablissement->name = $et;
    $etablissement-> email= $request->input('email');

    $etablissement->password = Hash::make($request->password);
    $etablissement->admin = 0;
    $etablissement->etablissement = 1;
    $etablissement->region =0;

    $etablissement->save();


    Session::flash('statuscode','success');
    return redirect('etablissuser')->with('status','ajout avec sucée');
 }
 public function editetabliss($id)
    {
     $etablissement= User::findOrFail($id);
       return view('etablissedit')
       ->with('etablissuser',$etablissement)
       ;
    }
    public function updateetabliss(Request $request,$id)
    {
      $request->validate($this->validationRules2());
        $etablissement= User::findOrFail($id);
   
        $etablissement->email = $request->input('email');
        $etablissement->password = Hash::make($request->password);
       
        $etablissement->update();


        Session::flash('statuscode','info');
        return redirect('etablissuser')->with('status','modification avec succé');
        

 

    }
    public function deleteetabliss($id)
    {
        $etablissement= User::findOrFail($id);
        $etablissement->delete();


        Session::flash('statuscode','error');
       return redirect('etablissuser')->with('status','suppression avec succée');
       

    }
    private function validationRules()
    {
        return [
            'name' => 'required|string|min:1',
            'password' => 'required|string|min:6',
            'email' => 'required|string|email|unique:users',
    
        ];
    }
    private function validationRules2()
    {
        return [
     
            
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
    
        ];
    }
}
