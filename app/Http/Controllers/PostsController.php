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
        $auth = Auth::user();
        $follower_count=DB::table('follows')
        ->where('follower', $auth)
        ->count('follower');
        $follow_count=DB::table('follows')
        ->where('follower', $auth)
        ->count('follow');
        return view('posts.index',['posts' =>$posts,'auth' =>$auth,'follower_count'=>$follower_count,'follow_count'=>$follow_count]);
    }


    public function getTweetCount(Int $user_id)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        return $this->where('user_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        $login_user = auth()->user();
        $is_followed = $login_user->isFollowed($user->id);
        return $this->where('followed_id', $user_id)->count();
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


    public function followlist(){
        return view('follows.followList');
    }

    public function followerlist(){
        return view('follows.followerList');
    }


    //ユーザー検索ページへ
    public function searchPage(){
            $auth = Auth::user();
            $users = DB::table('users')
            ->select('users.username','users.images','users.id')
             ->get();
             $followings=DB::table('follows')
             ->where('follower',Auth::id())
             ->get();
           return view('users.search',['auth'=>$auth,'users' =>$users,'followings' =>$followings]);
       }

    //ユーザー検索実行
       public function search(Request $request){
        $keyword = $request->input('keyword');
        $users = DB::table('users')
        ->where('username','like',"%{$keyword}%")
        ->get();
        $followings=DB::table('follows')
        ->where('follower',Auth::id())
        ->get();

        return view('users.search', ['keyword' =>$keyword,'users' =>$users,'followings' =>$followings]);
}

    //ユーザープロフィールへ
    public function profile($id){
        $posts = DB::table('posts')
        ->where('id',$id)
        ->select('posts.posts')
        ->orderBy('posts.created_at', 'DESC')
        ->take(5)
        ->get();

        $users = DB::table('users')
        ->where('users.id',$id)
        ->join('posts','users.id','=','posts.user_id')
        ->select('users.username','users.images','users.bio')
         ->get();

       return view('users.profile',['users' =>$users,'posts'=> $posts]);
   }



   public function myProfile(){
    $auths = Auth::user();
    return view('users.myprofile');
}




//__________________________________________

    public function logout(){
        $user_id = Auth::user()->id;


        return view('layouts.logout');
    }


}
