@extends('layouts.login')

@section('content')
<div class="profile_up_wrapper">
  <div class="myprofile-wrapper">
   <img class="myprofile1" src="{{asset('images/dawn.png')}}">

    <div class="myprofile-container">
      <table class="pf_table"> 
       <tr>
        <td class="th1 gray">Name</td>
        <td class="th1 gray">{{ $user -> username }}</td>
       </tr>  


       <tr>
        <td class="th1 gray">Bio</td>
        <td class="th1 gray">{{ $user ->bio }}</td>
       </tr>  
      </table>
    </div>

       <!-- フォローボタン-->
       <div class="f_button_prf">
         @if($followings->contains('follow',$user->id))
          <form action="/follow/delete" method="post">
           @csrf
            <input type="hidden"  name="id" value="{{$user -> id }}">
            <input type="submit" class="a_follow btn3" value="フォローを外す">
          </form>
         @else
          <form action="/follow/create" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user -> id }}">
            <input type="submit" class="a_follow btn2" value="フォローする">
          </form>
         @endif
       </div>
  </div>
</div>

<!-- 下つぶやき部分 -->
<div class="profile_bottom_wrapper">
  <table class="timeline-table" >

   @foreach($posts as $post)

    <tr class="detailgroup">
       <th><img class="icon-tweet" src="images/dawn.png"></th>
       <th class="tweet_username">{{ $post -> username }}</th>
       <th class="tweet_time">{{ $post -> created_at }}</th>
    </tr>
    <tr class="tweetgroup">
       <th class="tweet_tweet">{{ $post -> posts }}</th>
    </tr>
   @endforeach
  </table>
</div>

@endsection