@extends('layouts.login')

@section('content')

<div id='container'>

  <div class="tweet-wrapper">
  <div class="tweet-wrapper-inside">
   <img class="icon-tweet" src="images/dawn.png">

   <div class="form-group">
   <form action="/post/create" method="post">
  @csrf
<textarea name="newPost" placeholder="何をつぶやこうか…？" style="width:350px; height:70px;" required></textarea>
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
 <th><img class="icon-tweet" src="images/dawn.png"></th>
       <th class="tweet_username">{{ $post -> username }}</th>
       <th class="tweet_time">{{ $post -> created_at }}</th>
 </tr>
 <tr class="tweetgroup">
       <th class="tweet_tweet">{{ $post -> posts }}</th>

       <!-- 編集ボタン -->
@if($post->user_id==$auth->id)
       <th> <a href="" class="modalopen" data-target="modal_01">
       {!! Form::input('hidden','id',$post->user_id, ['required', 'class' => 'form-control']) !!}
        <img class="icon-edit" src="images/edit.png"></a>
        {!! Form::close() !!}
       </th>
       </div>
             <!-- モーダル 中身-->
  <div class="modal_hidden js-modal" id="modal_01">
   <div class="modal-inner">
    <div class="inner-content">
    <div class='container'>
        <h2 class='page-header'>投稿内容の編集</h2>
        {!! Form::open(['url' => 'post/update']) !!}
        <div class="form-group">
        {!! Form::input('hidden','id',$post->user_id, ['required', 'class' => 'form-control']) !!}
            {!! Form::input('text','upPost',$post->posts, ['required', 'class' => 'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">編集</button>
        {!! Form::close() !!}
    </div>
      <a class="send-button modalClose" href="top">Close</a>
    </div>
  </div>

<!-- モーダル中身ここまで -->

<script>
jQuery(function ($) {
  $('.modalopen').on('click', function () {
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});

</script>

<!-- 削除ボタン -->
       <th> <a class="delete-btn" href="post/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除しますか？')"><img class="icon-delete" src="images/trash.png"></a> </th>
       @endif
 </tr>

@endforeach

</table>

</div>


@endsection