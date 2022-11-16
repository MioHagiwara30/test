<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function profile(){
        return view('users.profile');
    }



    public function login(){
        return view('layouts.login');
    }

    public function logout(){
        return view('layouts.logout');
    }


}
