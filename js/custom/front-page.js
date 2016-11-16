/*準備*/
$ = jQuery;
/*準備 end*/

// 画面の幅を取得
var window_h;

$(window).load(function(){
  height_check(window_h);
});

// ページ表示後
var timer = false;
$(window).resize(function() {
  if(timer !== false){
    clearTimeout(timer);
  }
  timer = setTimeout(function() {
    height_check(window_h);
  }, 200);
});


// 画面の横幅に合わせて記事の表示数を調整
var height_check = function(w){
  window_h = $('#posts').outerHeight(true);
  height_set();
};

var height_set = function(){
  $('#posts').css('height', window_h +150 + 'px');
  $("#content").css("height",$(".front-loop-cont").outerHeight(true));
};
