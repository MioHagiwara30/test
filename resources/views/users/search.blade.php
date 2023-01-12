@extends('layouts.login')

@section('content')

<div class="user_search_wrapper">

<form action="/search" method="post">
  @csrf
<input type="text" name="keyword" placeholder="ユーザー名">
<input type="submit" value="検索">
</form>

</div>

<table class="user_list_wrapper">
  @foreach ($users as $user)
    <tr class="userlisttable">
       <th><img src={{asset($user -> images)}}></th>
       <th a class="a_username gray" >{{ $user -> username }}</th>
       <th>

       <!-- $followings=フォロワーに自分のidが入っているもの -->
        @if($followings->contains('follow',$user->id))
        <form action="/follow/delete" class="a_username" method="post">
        @csrf
          <input type="hidden"  name="id" value="{{$user -> id }}">
          <input type="submit" class="a_follow btn3" value="フォローを外す">
        </form>
        @elseif($user->id==$auth->id)

        @else
        <form action="/follow/create" class="a_username" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$user -> id }}">
          <input type="submit" class="a_follow btn2" value="フォローする">
        </form>
        @endif

       </th>

    </tr>
  @endforeach

</table>



@endsection