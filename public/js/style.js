// モーダル部分
$(function () { //①
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
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

// メニューバー＞部分の動き
$(function(){
  $('.menu-triangle').hover(function(){$(this).toggleClass('active');});
  $('.gnavi-lists ul li a').click(function(){$('.menu-triangle').removeClass('active');})
  });
