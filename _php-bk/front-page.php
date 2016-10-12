<?php get_header(); ?>

<?php
function dump($tmp){
  echo "<pre>";
  var_dump($tmp);
  echo "</pre>";
}
/*公開済の記事の数を取得*/
$published_posts = wp_count_posts()->publish;
?>

<div id="content">

<div id="main">
  <div class="main-inner">

<div id="recent_post_content" class="front-loop">

<h2><i class="fa fa-clock-o"></i> 最近の投稿</h2>
<div class="wrap">
  <div class="front-loop-cont">
<?php
      $i = 1;
      wp_reset_query();
      $args=array(
          'meta_query'=>
          array(
            array(  'key'=>'bzb_show_toppage_flag',
                       'compare' => 'NOT EXISTS'
            ),
            array(  'key'=>'bzb_show_toppage_flag',
                      'value'=>'none',
                      'compare'=>'!='
            ),
           'relation'=>'OR'
        ),
          'showposts'=>$published_posts,
          'order'=>'DESC'
        );
      query_posts($args);
      //query_posts('showposts=5&order=DESC');
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

        $cf = get_post_meta($post->ID);
        $recent_class = 'popular_post_box recent-'.$i;
?>

  <article id="post-<?php echo the_ID(); ?>" <?php post_class($recent_class); ?>>
      <a href="<?php the_permalink(); ?>" class="wrap-a"><?php if( get_the_post_thumbnail() ) { ?>
        <div class="post-thumbnail">
          <?php the_post_thumbnail(array('300','158')); ?>
        </div>
        <?php } else{ ?>
          <img src="<?php echo get_template_directory_uri(); ?>/lib/images/noimage.jpg" alt="noimage" width="300" height="158" />
        <?php } // get_the_post_thumbnail ?>
            <p class="p_category"><?php $cat = get_the_category(); $cat = $cat[0]; {
          echo $cat->cat_name;
        } ?></p>
            <h3><?php the_title(); ?></h3>
            <p class="p_date"><span class="date-y"><?php the_time('Y'); ?></span><span class="date-mj"><?php the_time('m/j'); ?></span></p></a>
  </article>

<?php
        $i++;
        endwhile;
      endif;
?>

</div><!-- /front-root-cont -->

</div><!-- /wrap -->
</div><!-- /recent_post_content -->

<!-- カテゴリー紹介 -->
<div id="front-contents" class="front-main-cont">
<?php
  $icon = 'none';
  $titile = '';
  $bzb_ruby = '';
  $bzb_catch = '';
  $title = '';
  $bzb_contents_header_array = get_option('bzb_contents_header');
  if(is_array($bzb_contents_header_array)){
    extract($bzb_contents_header_array) ;
  }
?>

<?php
  $i = 1;
  $bzb_contents = get_option('bzb_contents');
  if(is_array($bzb_contents)){
    $left_right = "";
  foreach((array)$bzb_contents as $key => $value){
    $left_right = ($i % 2 == 1) ? 'left' : 'right';
    extract(make_info_4top($value));
?>
  <section id="front-contents-1" class="c_box c_box_<?php echo $left_right;?>">
    <div class="wrap">
      <div class="c_box_inner">
        <div class="c_title">
          <div></div>
          <p class="c_number"><?php echo $i;?></p>
          <h3><?php echo $title; ?></h3>
          <p class="c_english"><?php echo $bzb_ruby;?></p>
        </div>
        <div class="c_img_box" style="background-image:url(<?php echo $image;?>)"></div>
        <div class="c_text">
          <h4><?php echo nl2br($bzb_catch);?></h4>
          <p><?php echo $content;?></p>
          <?php if($button_url != ''){ ?>
          <p class="c_btn"><a href="<?php echo $button_url;?>" class="btn"><?php echo $button_text;?></a></p>
          <?php }else{ ?>
          <p class="c_btn"><a href="<?php echo $url;?>" class="btn">詳しく見る</a></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
<?php
  $i++;
    }
  }
?>


</div><!-- /front-contents -->

<?php
  $icon = 'none';
  $title = '';
  $bzb_ruby = '';
  $bzb_catch = '';
  $bzb_service_header_array = get_option('bzb_service_header');
  if(is_array($bzb_service_header_array)){
    extract($bzb_service_header_array) ;
  }

?>




  </div><!-- /main-inner -->
</div><!-- /main -->

</div><!-- /content -->
<?php get_footer(); ?>
