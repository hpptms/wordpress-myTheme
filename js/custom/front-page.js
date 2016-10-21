/*準備*/
// 基準とする画面サイズ
const pc = 1200;
const tablet = 991;
const mobile = 767;
// //jqueryを短縮
$ = jQuery;
/*準備 end*/

// 画面の幅を取得
var window_w;
/*DOMの読み込み完了後*/
/*
$(document).ready(function(){
  window_w = $(window).width();
  width_check(window_w);
});
*/

/* ページ読み込み後 **************/
$(window).load(function(){
  window_w = $(window).width();
  width_check(window_w);
});

/* ページ表示後  ****************/
var timer = false;
$(window).resize(function() {
  if(timer !== false){
    clearTimeout(timer);
  }
  timer = setTimeout(function() {
    window_w = $(window).width();
    width_check(window_w);
  }, 200);
});


// 画面の横幅に合わせて記事の表示数を調整
var width_check = function(w){
  if(w <= mobile){
    mobile_set();
  }else if(w <= tablet){
    tablet_set();
  }else if(w >= pc){
    pc_set();
  }
};

// PC用の設定 1200以上
var article_height;
var article_num;
var get_article = function(){
  article_height = $('article').outerHeight(true);
  article_num = $('article').length;
}

var pc_set = function(){
  get_article();
  $('.front-loop-cont').css('height', ((article_num / 4 ) * article_height +50 ) + 'px');
  // $("#content").css("height",$(".front-loop-cont").outerHeight(true));
};
// tablet用の設定 991
var tablet_set = function(){
  get_article();
  $('.front-loop-cont').css('height', ((article_num / 3 ) * article_height +50 ) + 'px');
  $('#content').css('height',$('.front-loop-cont').outerHeight(true));
};
// mobile用の設定 767
var mobile_set = function(){
  get_article();
  $('.front-loop-cont').css('height', (article_num * article_height +50 ) + 'px');
  $('#content').css('height',$('.front-loop-cont').outerHeight(true));
};
