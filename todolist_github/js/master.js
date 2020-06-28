$(function() {
    //最初のinputにfocusしてあげる気が利く系処理
    $('input[type=text]:first').focus();
    $('input').bind("keydown", function(e) {
        var n = $("input").length;
        //13=エンターkeyです
        if (e.which == 13)
        {
            e.preventDefault();
            var nextIndex = $('input').index(this) + 1;
            if(nextIndex < n) {
                //次のやつにfocus
                $('input')[nextIndex].focus();
            } else {
                //最後のやつなので#login-btnをクリック
                $('input')[nextIndex-1].blur();
                $('#login-btn').click();
            }
        }
    });
});


//コンテンツボックスをクリックすると拡大表示される
$(function() {
  $('.list-box').click(function(){

    var $act = $(this).find('.list-content');
    var $left = $(this).offset().left;
    if ($left < 100) {
      $per = '2%';
    } else if ($left > $('.wrapper').width() /2) {
      $per = '45%';
    } else {
      $per = '25%';
    }
    var $top = $(this).offset().top;
    var $hi = $('body').height();

    if($act.hasClass('list-action')){
      $act.removeClass('list-action');
      $(this).css({
        'width': '29%',
        'position': 'relative',
        'left': 'auto',
        'top': 'auto',
        'z-index': '1'
      });
      $(this).next().remove();
      $('.dark').css('height', '');
    } else {
      $cln = $(this).clone();
      $cln.insertAfter(this);
      $cln.css('z-index', '-1');
      $act.addClass('list-action');
      $(this).css({
        'width': '50%',
        'position': 'absolute',
        'left': $per,
        'top': $top+'px',
        'z-index': '100'
      });
      $('.dark').css('height', $hi);
    }
  });

  $('.dark').click(function(){
    $('.list-box').each(function(){
      if ($(this).css('z-index') == 100) {
        var $act = $(this).find('.list-content');
        $act.removeClass('list-action');
        $(this).css({
          'width': '29%',
          'position': 'relative',
          'left': 'auto',
          'top': 'auto',
          'z-index': '1'
        });
        $(this).next().remove();
        $('.dark').css('height', '');
      }
    });
  });
});

//ページナンバーdivを最後にも表示
$(function(){
  var $page = $('.page-box').html();
  $('.list-content-range').after($page);
  $('.list-content-range').next().addClass('page-after');
});
