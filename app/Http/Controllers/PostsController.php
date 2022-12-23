<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;


class PostsController extends Controller
{
    //
    public function index(){
         $posts = DB::table('posts')
         ->join('users','posts.user_id','=','users.id')
         ->select('posts.*','users.username','users.images')
         ->orderBy('posts.created_at', 'DESC')
         ->take(5)
          ->get();
        return view('posts.index',['posts' =>$posts]);
    }

    public function profile(){
        return view('users.profile');
    }


    public function login(){
        return view('layouts.login');
    }





//ツイート部分の機能
public function create(Request $request){
    $request->validate([
        'newPost' => ['required','max:150']
    ]);

$posts = $request->input('newPost');
$user_id = Auth::user()->id;
$created_at = Carbon::now();
DB::table('posts')->insert([
    'posts'=> $posts,
    'user_id'=> $user_id,
    'created_at'=> $created_at,
]);
        return redirect('top');
}


//ホームからツイート内容編集画面へ飛ぶ
public function updateForm($id)
    {
        $posts = DB::table('posts')
        ->where('id',$id)
        ->first();
        return view('posts.updateForm',['posts'=> $posts]);
    }

    //ツイート内容編集画面から編集内容を登録
public function update(Request $request)
{
    $id = $request->input('id');
    $up_post = $request->input('upPost');
    DB::table('posts')
    ->where('id',$id)
    ->update(['posts'=> $up_post]);
    return redirect('top');
}


    //ホームからツイートを削除
public function delete($id)
{
    DB::table('posts')
    ->where('id',$id)
    ->delete();
    return redirect('top');
}


    public function follow(){
        return view('follows.followList');
    }

    public function follower(){
        return view('follows.followerList');
    }

    //ユーザー検索ページへ
    public function searchPage(){
            $users = DB::table('users')
            ->select('users.username','users.images')
             ->get();
           return view('users.search',['users' =>$users]);
       }

    //ユーザー検索
       public function search(Request $request){
        $keyword = $request->input('keyword');
        $users = DB::table('users')
        ->where('username','like',"%{$keyword}%")
        ->get();

        return view('users.search', ['keyword' =>$keyword,'users' =>$users]);
}


//__________________________________________

    public function logout(){
        return view('layouts.logout');
    }


}
