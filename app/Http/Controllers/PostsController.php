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
        ->join('users','follows.follower','=','users.id')
        ->where('follow',Auth::id())
        ->select('users.username','users.images','users.id','follows.follower')
        ->count();
        $follow_count=DB::table('follows')
        ->join('users','follows.follow','=','users.id')
        ->where('follower',Auth::id())
        ->select('users.username','users.images','users.id','follows.follow')
        ->count();

        return view('posts.index',['posts' =>$posts,'auth' =>$auth,'follower_count'=>$follower_count,'follow_count'=>$follow_count]);
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
// public function updateForm($id)
//     {
//         $posts = DB::table('posts')
//         ->where('id',$id)
//         ->first();
//         return view('posts.updateForm',['posts'=> $posts]);
//     }

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



    //ユーザー検索ページへ
    public function searchPage(){
            $auth = Auth::user();
            $users = DB::table('users')
            ->select('users.username','users.images','users.id')
             ->get();
             $followings=DB::table('follows')
             ->where('follower',Auth::id())
             ->get();

             $follower_count=DB::table('follows')
             ->join('users','follows.follower','=','users.id')
             ->where('follow',Auth::id())
             ->select('users.username','users.images','users.id','follows.follower')
             ->count();
             $follow_count=DB::table('follows')
             ->join('users','follows.follow','=','users.id')
             ->where('follower',Auth::id())
             ->select('users.username','users.images','users.id','follows.follow')
             ->count();

           return view('users.search',['auth'=>$auth,'users' =>$users,'followings' =>$followings,'follower_count'=>$follower_count,'follow_count'=>$follow_count]);
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

        $follower_count=DB::table('follows')
        ->join('users','follows.follower','=','users.id')
        ->where('follow',Auth::id())
        ->select('users.username','users.images','users.id','follows.follower')
        ->count();
        $follow_count=DB::table('follows')
        ->join('users','follows.follow','=','users.id')
        ->where('follower',Auth::id())
        ->select('users.username','users.images','users.id','follows.follow')
        ->count();

        return view('users.search', ['keyword' =>$keyword,'users' =>$users,'followings' =>$followings,'follower_count'=>$follower_count,'follow_count'=>$follow_count]);
}

    //他人のユーザープロフィールへ
    public function profile($id){

        $user =DB::table('users')
        ->where('id',$id)
        ->first();

        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('posts.user_id',$id)
        ->select('posts.*','users.username','users.images')
        ->orderBy('posts.created_at', 'DESC')
        ->take(5)
         ->get();

         $followings=DB::table('follows')
         ->where('follower',Auth::id())
         ->get();

         $followings=DB::table('follows')
         ->where('follower',Auth::id())
         ->get();

         $follower_count=DB::table('follows')
         ->join('users','follows.follower','=','users.id')
         ->where('follow',Auth::id())
         ->select('users.username','users.images','users.id','follows.follower')
         ->count();
         $follow_count=DB::table('follows')
         ->join('users','follows.follow','=','users.id')
         ->where('follower',Auth::id())
         ->select('users.username','users.images','users.id','follows.follow')
         ->count();

       return view('users.profile',['user'=>$user,'posts'=>$posts,'followings' =>$followings,'follower_count'=>$follower_count,'follow_count'=>$follow_count]);
   }


   //自分のプロフィール画面
   public function myProfile(){
    $auths = Auth::user();

    $follower_count=DB::table('follows')
    ->join('users','follows.follower','=','users.id')
    ->where('follow',Auth::id())
    ->select('users.username','users.images','users.id','follows.follower')
    ->count();
    $follow_count=DB::table('follows')
    ->join('users','follows.follow','=','users.id')
    ->where('follower',Auth::id())
    ->select('users.username','users.images','users.id','follows.follow')
    ->count();

    return view('users.myprofile',['follower_count'=>$follower_count,'follow_count'=>$follow_count]);
}


   //自分のプロフィール画面から編集内容を登録
   public function pfUpdateForm(Request $request)
   {
    $auth = Auth::user();
    $username=$request->username;
    $mail=$request->mail;
    $bio=$request->bio;
    if(request('newpassword')){
        $newpassword= bcrypt($request->newpassword);
    }else{
        $newpassword=DB::table('users')
        ->where('id',Auth::id())
        ->value('password');
    }
    if(request('iconimage')){
        $imagename=$request->iconimage->getClientOriginalName();
        $request->iconimage->storeAs('public/images',$imagename);
    }else{

    }

    DB::table('users')
    ->where('id',Auth::id())
    ->update([
        'username'=>$username,
        'mail'=>$mail,
        'newpassword'=>$newpassword,
        'bio'=>$bio,
        'images'=>$imagename,
    ]);

       return redirect('top');
   }


//__________________________________________

    public function logout(){
        $user_id = Auth::user()->id;


        return view('layouts.logout');
    }


}
