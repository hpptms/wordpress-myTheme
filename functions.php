<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}

/*
参考：http://www.will-hp.com/wpblog/wordpress/191/
//絶対パス→相対パス
function make_href_root_relative($input) {
return preg_replace('!http(s)?://' . $_SERVER['SERVER_NAME'] . '/!', '/', $input);
}

//パーマリンク絶対パス→相対パス
function root_relative_permalinks($input) {
return make_href_root_relative($input);
}
add_filter( 'the_permalink', 'root_relative_permalinks' );

*/
