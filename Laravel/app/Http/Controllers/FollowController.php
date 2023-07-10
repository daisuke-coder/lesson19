<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Follow;

use App\User;

class FollowController extends Controller
{

   public function __construct(){
   $this->middleware('auth');
  }
    //フォロー機能
    public function Follow($id)
    {
        $authUser = Auth::user()->id;
        $follow_check = DB::table('follows')
            ->where('user_id', $authUser)
            ->where('followed_user_id', $id)
            ->exists();

        //自分自身をフォローできないようにする
        if ($authUser == $id) {
            return redirect('/search');

            //すでにフォローしている場合もフォローできない
        } elseif ($follow_check) {
            return redirect('/search');

            //フォローリストにいないときはフォローする
        } else {
            DB::table('follows')->insert([
                'user_id' => $authUser,
                'followed_user_id' => $id,
            ]);
            return redirect('/search');
        }
    }

    //フォロー解除
    public function unFollow($id)
    {
        $authUser = Auth::user()->id;
        DB::table('follows')
            ->where('user_id', $authUser)
            ->where('followed_user_id', $id)
            ->delete();
        return redirect('/search');
    }

        public function unFollowList($id)
    {
        $authUser = Auth::user()->id;
        $fId=DB::table('follows')
        ->where('followed_user_id',$authUser)
        ->pluck('user_id')
        ->toArray();
        $followList=DB::table('users')
        ->whereIn('id',$fId)
        ->get();
        DB::table('follows')
        ->where('user_id', $authUser)
        ->where('followed_user_id', $id)
        ->delete();
        return redirect('/follow-list/'.$authUser)->with(compact('followList','authUser'));
    }


}
