<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

   public function __construct(){
   $this->middleware('auth');
  }

  public function search(Request $request)
  {
    $search=$request->input('search');
    $authUser=Auth::user()->name;
    if(!empty($search)){
      $search=str_replace('　',' ',$search);
      $uList=DB::table('users')
      ->where('name','like','%'.$search.'%')
      ->where('name','!=',$authUser)
      ->get();
      if($search==" "){
        $uList=DB::table('users')->get();
      }
    }
    else{
      $uList=DB::table('users')->get();
    }

    return view('search',compact('search','uList','authUser'));
  }
}
