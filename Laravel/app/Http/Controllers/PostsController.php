<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(Request $request)
    {
        $authUser=Auth::user()->name;
        // 自分の投稿を判断するため
        $authUserId=Auth::user()->id;
        // ログインユーザーのIDを取得
        $followId=DB::table('follows')
        ->where('user_id',$authUserId)
        ->pluck('followed_user_id')
        ->toArray();

        $list=DB::table('posts')
        ->whereIn('user_id',array_merge($followId,[$authUserId]))
        ->orderby('updated_at','desc')
        ->get();
        //新しい投稿が上から並ぶようにする。
        // array_mergeで配列内にauthUserIdも追加する（ログインユーザーの投稿も表示する）

        return view('posts.index',compact('list','authUser'));
    }

    public function createForm(Request $request)
    {
        return view('posts.createForm');
    }

    public function create(Request $request)
    {
        $rules=['newPost'=>'required|max:150'];
        $validator=Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect('/create-form')
            ->withErrors($validator->errors())
            ->withInput();
        }

        $userId=Auth::id();
        $post=$request->input('newPost');
        $name=$request->input('newName');
        DB::table('posts')->insert([
            'post'=>$post,
            'name'=>$name,
            'user_id'=>$userId
        ]);
        return redirect('/index');

    }

    public function updateForm($id)
    {
        $post=DB::table('posts')
        ->where('id',$id)
        ->first();
        return view('posts.updateForm',compact('post'));
    }

    public function update(Request $request)
    {
        $id=$request->input('id');
        $up_post=$request->input('upPost');
        $rules=['upPost'=>'required|max:150'];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect('/post/'.$id.'/update-form')
            ->withErrors($validator->errors())
            ->withInput();
        }

        DB::table('posts')
        ->where('id',$id)
        ->update(['post'=>$up_post]);

        return redirect('/index');
    }

    public function __construct(){
        $this->middleware('auth');
    }

    public function delete($id)
    {
        DB::table('posts')
        ->where('id',$id)
        ->delete();

        return redirect('/index');
    }
}
