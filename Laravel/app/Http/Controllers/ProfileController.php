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
      // ↑自分以外のユーザーを探す
      ->get();
      if($search==" "){
        $uList=DB::table('users')->get();
      }
    }
    else{
      $uList=DB::table('users')
      ->where('name','!=',$authUser)
      ->get();
    }

    $isFollowing=[];
    if(Auth::user()){
      foreach($uList as $user){
      $isFollowing[$user->id]=DB::table('follows')
      ->where('user_id',Auth::user()->id)
      ->where('followed_user_id',$user->id)
      ->exists();
      }
    }

    return view('search',compact('search','uList','authUser','isFollowing'));
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

    $isFollowing=false;
    if(Auth::user()){
      $isFollowing=DB::table('follows')
      ->where('user_id',Auth::user()->id)
      ->where('followed_user_id',$user_id)
      ->exists();
    }

    return view('profile',compact('user_id','authUser','profile','followCount','followerCount','isFollowing'));
  }

  public function follower(Request $request,$user_id)
  {
    $fId=DB::table('follows')
    ->where('followed_user_id',$user_id)
    ->pluck('user_id')
    ->toArray();
    // ↑followsテーブルのfollowed_user_idと$useridが一致するものを配列に追加
    $followerList=DB::table('users')
    ->whereIn('id',$fId)
    ->get();

    return view('followerList', compact('followerList', 'user_id'));
    // return view('/follower-list/'.$user_id',compact('followerList','user_id'));

  }

  public function follow(Request $request,$user_id)
  {
    $fId=DB::table('follows')
    ->where('user_id',$user_id)
    ->pluck('followed_user_id')
    ->toArray();

    $followList=DB::table('users')
    ->whereIn('id',$fId)
    ->get();

    return view('followList', compact('followList', 'user_id'));
  }

  public function editForm($id)
  {
    $profile=DB::table('users')
    ->where('id',$id)
    ->first();
    return view('edit',compact('profile'));
  }

  public function edit(Request $request)
  {
    $id=$request->input('id');
    $up_name=$request->input('upName');
    $up_profile=$request->input('upProfile');
    DB::table('users')
    ->where('id',$id)
    ->update(['name'=>$up_name,'profile'=>$up_profile]);
    return redirect("/profile/{$id}");
  }
}
