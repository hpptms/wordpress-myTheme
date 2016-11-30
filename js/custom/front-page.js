/*準備*/
// 基準とする画面サイズ
//const pc = 1200;
const tablet = 1199;
const mobile = 767;
$ = jQuery;
/*準備 end*/

// 画面の幅を取得
var window_h;
var window_w;

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
    console.log('resized');
  }, 200);
});

// 画面の横幅に合わせて記事の表示数を調整
var width_check = function(w){
  if(w < mobile){
    mobile_set();
  }else if(w < tablet){
    tablet_set();
  }else{
    pc_set();
  }
};

//サイズを調べる
var article_height;
var article_num;
var Advertising;
var get_article = function(){
  article_height = $('article').outerHeight(true);
  article_num = $('article').length;
  Advertising = $('.adsbygoogle').outerHeight(true);
}

// PC用の設定 1200以上
var pc_set = function(){
  get_article();
  $('#posts').css('height', ((article_num / 4 ) * article_height + Advertising + 100 ) + 'px');
   $("#content").css("height",$("#posts").outerHeight(true));
};
// tablet用の設定 991
var tablet_set = function(){
  get_article();
  $('#posts').css('height', ((article_num / 3 ) * article_height + Advertising + 100 ) + 'px');
  $('#content').css('height',$('#posts').outerHeight(true));
};
// mobile用の設定 767
var mobile_set = function(){
  get_article();
  $('#posts').css('height', (article_num * article_height + Advertising + 100 ) + 'px');
  $('#content').css('height',$('#posts').outerHeight(true));
};
