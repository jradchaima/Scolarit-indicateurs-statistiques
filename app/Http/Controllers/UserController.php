<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
     
        return view('users');
    }
    
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
            return view('etablisscreate');
     

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validationRules());
        $etablissuser = new User;

    
        $etablissuser->name = "mourouj 1";
        $etablissuser->representant = "non connue";
        $etablissuser->email = $request->email;
        $etablissuser->password = Hash::make($request->password);
        $etablissuser->admin = 0;
        $etablissuser->region = 0;
        $etablissuser->etablissement = 1;
        $etablissuser->etabliss_id = $request->meal;
      

        $etablissuser->save();

        return redirect()->route('etablissuser', $etablissuser->id)->with('Modification', 'Utilisateur établissement est modifié');
        //Mail::to(Auth::user()->email)->send(new NewBooking($booking));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etabliss = User::find($id);
        return view('etablissedit', compact('etabliss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $validatedData = $request->validate($this->validationRules());

         $etablissuser = User::find($id);

      
         $etablissuser->email = $request->email;
         $etablissuser->password = Hash::make($request->password);
         $etablissuser->admin = 0;
         $etablissuser->region = 0;
         $etablissuser->etabliss_id = $request->meal;
  
         $etablissuser->etablissement = 1;
 
       
 
         $etablissuser->save();

        return redirect()->route('etablissuser', $etablissuser->id)->with('Modification', 'Utilisateur établissement est modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etabliss = User::find($id);
        $etabliss->delete();
        return redirect()->route('etablissuser', $etabliss->id)->with('Suppression', 'Utilisateur établissement est supprimé');
        
   
    }
    public function etabliss()
    {
        
           
        $etablissuser = User::where('etablissement', true)->get();
       
        return view('etablissuser', compact('etablissuser'));
    }
    public function region()
    {
           
        $regionuser = User::where('region', true)->get();
       
        return view('regionuser', compact('regionuser'));
    }
    public function central()
    {
           
        $centraluser = User::where([
            ['etablissement',false],
            ['admin',false],
            ['region',false],
        ])->get();
        return view('centraluser', compact('centraluser'));
    }
    private function validationRules()
    {
        return [
           
            'email' => 'required|string|email|max:50',
    
        ];
    }
}
