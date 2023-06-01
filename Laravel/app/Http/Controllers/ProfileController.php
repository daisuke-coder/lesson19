<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Follow;

use App\User;

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

  public function profile(Request $request,$user_id)
  {
    $authUser=Auth::user()->name;
    $profile=DB::table('users')
    ->where('id',$user_id)
    ->first();

    $followCount=DB::table('follows')
    ->where('user_id',$user_id)
    ->count();

    $followerCount=DB::table('follows')
    ->where('followed_user_id',$user_id)
    ->count();

    return view('profile',compact('user_id','authUser','profile','followCount','followerCount'));
  }
}
