@extends('layouts.login')

@section('content')


<div class="myprofile-wrapper">
<img class="myprofile1" src="{{asset('images/dawn.png')}}">

<div class="myprofile-container">
<form method="post" action="/post/pf-update" enctype = multipart/form-data>
  @csrf
<table class="pf_table"> 
    <tr>
        <td class="th1">UserName</td>
        <td class="th1"><input type="text" value="{{ Auth::user()->username }}" name="username"></td>
        </tr>  

        <tr>
        <td class="th1">Mail Adress</td>
        <td class="th1"><input type="email" value="{{ Auth::user()->mail }}" name="mail"></td>
        </tr>  

        <tr>
        <td class="th1">Password</td>
        <td class="th1"><input type="text" value="{{ Auth::user()->password }}"readonly="readonly"></td>
        </tr> 

        <tr>
        <td class="th1">new Password</td>
        <td class="th1">
            <input type="text" name="newpassword" placeholder="新パスワード"></td> 
        </tr> 

        <tr>
        <td class="th1">Bio</td>
        <td class="th1"><input type="textarea" name="bio" placeholder="自己紹介文" value="{{ Auth::user()->bio }}" ></td>
        </tr>  

        <tr>
        <td class="th1">Icon Image</td>
        <td class="th1"><input type="file" name="iconimage" ></td>  
    </tr>
</table>
<br>
<br>
<input type="submit" class="newprofile" value="更新">

</form>

</div>

</div>


@endsection