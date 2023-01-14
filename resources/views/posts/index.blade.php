@extends('layouts.login')

@section('content')

<div id='container'>

  <div class="tweet-wrapper">
  <div class="tweet-wrapper-inside">
   <img class="icon-tweet" src="storage/images/{{$auth->images}}">

   <div class="form-group">
   <form action="/post/create" method="post">
  @csrf
<textarea name="newPost" placeholder="何をつぶやこうか…？" style="width:350px; height:70px;" required></textarea>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<input type="image" class="icon-sent" src=images/post.png>
</form>


   </div>
  </div>

</div>

<div class="timeline-wrapper">
<table class="timeline-table" >

@foreach($posts as $post)

 <tr class="detailgroup">
 <th><img class="icon-tweet" src="storage/images/{{$post->images}}"></th>
       <th class="tweet_username">{{ $post -> username }}</th>
       <th class="tweet_time">{{ $post -> created_at }}</th>
 </tr>
 <tr class="tweetgroup">
       <th class="tweet_tweet">{{ $post -> posts }}</th>

       <!-- 編集ボタン -->
@if($post->user_id==$auth->id)
       <th> <div class="modalopen" data-target="{{$post->id}}">
        <img class="icon-edit" src="images/edit.png"></div>
       </th>
             <!-- モーダル 中身-->
  <div class="modal_hidden js-modal" id="{{$post->id}}">
    <!-- 黒背景 -->
   <div class="modal-inner">
    <!-- 中の白背景 -->
    <div class='tweet_update_container'>
      <div class=""update-inner>
       <form action="/post/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $post->id }}">
        <input type="textarea" name="upPost" value="{{ $post->posts }}" style="width:350px; height:70px;" required  class="update-inner">

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                 @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                 @endforeach
                </ul>
              </div>
            @endif
      </div>
        <button type="submit">
          <img class="icon-edit2" src="images/edit.png">
        </button>

      </form>
      <div class="modalClosetext">
       <a href="top">× Close</a>
      </div>
    </div>
  </div>
<!-- 削除ボタン -->
       <th> <a class="delete-btn" href="post/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除しますか？')"><img class="icon-delete" src="images/trash.png" onmouseover="this.src='images/trash_h.png'" onmouseout="this.src='images/trash.png'" ></a> </th>
       @endif
 </tr>

@endforeach

</table>

</div>


@endsection