// /*準備*/
// // 基準とする画面サイズ
const pc = 1200;
const tablet = 991;
const mobile = 767;
// //jqueryを短縮
$ = jQuery;
// /*準備 end*/

// 画面の幅を取得
var window_w;
var window_h;
$(window).on('load resize', function(){
  window_w = $(window).width();
  change_post_layout(window_w);

  window_h = $(window).height();
});


// 画面の横幅に合わせて記事の表示数を調整
var change_post_layout = function(w){
  if(w <= pc){
    console.info("画面の横幅 : " + w);
    // pc_set();
  }else if(w <= tablet){
    console.info("画面の横幅 : " + w);
    // tablet_set();
  }else if(w <= mobile){
    console.info("画面の横幅 : " + w);
    // mobile_set();
  }
};

// // 記事のオブジェクトを取得
// var g_post = $(".front-loop-cont article");
// var cnt_post = 1;
// var set_section = '<section calass="post_box"></section>';
// // 記事数が0だったら何もしない
// var post_check = function(){
//   if($(g_post).length === 0 ){
//     return false;
//   }
// }
// // PC用の設定 1200以上
// var pc_set = function(){
//   if(post_check() == false){ return; }
//   cnt_post = 1;
//   $(g_post).each(function(i){
//     if((cnt_post % 4) == 0 ){
//       $(g_post[cnt_post]).wrapAll(set_section);
//     }
//     cnt_post = ++cnt_post;
//   })
// };
// // tablet用の設定 991
// var tablet_set = function(){
//
// };
// // mobile用の設定 767
// var mobile_set = function(){
//
// };
