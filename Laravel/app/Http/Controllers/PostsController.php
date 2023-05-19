<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index(Request $request)
    {
        $list=DB::table('posts')->get();
        return view('posts.index',compact('list'));
    }

    public function createForm(Request $request)
    {
        return view('posts.createForm');
    }

    public function create(Request $request)
    {
        $post=$request->input('newPost');
        $name=$request->input('newName');
        $errormessage="120文字以内で入力してください";
        $emptymessage="入力してください";
        DB::table('posts')->insert([
            'post'=>$post,
            'name'=>$name
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
        $errormessage="120文字以内で入力してください";
        $emptymessage="入力してください";

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