<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
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
