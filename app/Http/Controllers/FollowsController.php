<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{
    //自分がフォローしてる人
    public function followList(){
        $auth = Auth::user();
         $follows=DB::table('follows')
         ->join('users','follows.follow','=','users.id')
         ->where('follower',Auth::id())
         ->select('users.username','users.images','users.id','follows.follow')
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

        return view('follows.followList',['auth'=>$auth,'follows' =>$follows,'follower_count'=>$follower_count,'follow_count'=>$follow_count]);
    }

    // 私をフォローしてる人
    public function followerList(){
        $auth = Auth::user();
         $followers=DB::table('follows')
         ->join('users','follows.follower','=','users.id')
         ->where('follow',Auth::id())
         ->select('users.username','users.images','users.id','follows.follower')
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

        return view('follows.followerList',['auth'=>$auth,'followers' =>$followers,'follower_count'=>$follower_count,'follow_count'=>$follow_count]);

    }


    //フォローする
    public function follow(Request $request){
        $my_id = Auth::id();
        $follow_id =$request->id;
        DB::table('follows')->insert([
            'follow'=> $follow_id,
            'follower'=> $my_id,
            'created_at'=> now(),
        ]);
           return back();
        }

        public function unfollow(Request $request){
            $my_id = Auth::id();
            $follow_id =$request->id;
            DB::table('follows')->where([
                'follow'=>$follow_id,
                'follower'=> $my_id,
            ])->delete();
            return back();
        }


}
