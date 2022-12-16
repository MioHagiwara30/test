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
          ->get();
        return view('posts.index',['posts' =>$posts]);
    }

    public function profile(){
        return view('users.profile');
    }


    public function login(){
        return view('layouts.login');
    }



protected function validator(array $data)
{
    return Validator::make($data, [
        'tweet' => ['required','string','min:1','max:280'],
    ],
[
    'tweet.required' => '必須項目です',
    'tweet.max' => '140文字以下で入力してください',
])->validate();
}


   //タイムライン部分
   public function showTimeLine(){
    $posts = DB::table('posts')
    ->join('users','posts.user_id','=','user_id')
    ->select('posts.*')
     ->get();
   return view('posts.app',['posts' =>$posts]);
}



//ツイート部分の機能
public function create(Request $request){
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

//ホームからツイート内容作成画面へ飛ぶ
public function createForm()
    {
        return view('posts.app');
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

//__________________________________________

    public function logout(){
        return view('layouts.logout');
    }


}
