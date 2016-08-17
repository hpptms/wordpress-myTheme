<?php get_header(); ?></div>

<?php
function dump($tmp){
  echo "<pre>";
  var_dump($tmp);
  echo "</pre>";
}
/*公開済の記事の数を取得*/
$published_posts = wp_count_posts()->publish;


?>

<div id="content" style="padding: 0; height:100%;">
  <div id="main" style="height:100%;">
    <div class="main-inner" style="height:100%;">
      <div id="recent_post_content" class="front-loop" style="height:100%;">
        <h2 style="padding: 1% 0;"><i class="fa fa-clock-o"></i> 最近の投稿</h2>
        <div class="wrap" style="margin: 0; height:100%; width:100%">
          <div class="front-loop-cont" style="padding : 0 5%; height:100%; width:100%">
            <?php
            $i = 1;
            wp_reset_query();
            //パラメータ指定
            $args =
            array(
              'meta_query'=>
              array(
                array('key'=>'bzb_show_toppage_flag',
                  'compare' => 'NOT EXISTS'
                  ),
                array('key'=>'bzb_show_toppage_flag',
                  'value'=>'none',
                  'compare'=>'!='
                  ),
                'relation'=>'OR'
                ),
                //記事の数
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
                <div class="post-thumbnail post-thumbnail-r-custom">
                  <?php the_post_thumbnail(array('300','158')); 
                  ?>
                </div>
                <?php } else{ ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/lib/images/noimage.jpg" alt="noimage" width="300" height="158" />
                  <?php } // get_the_post_thumbnail ?>
                  <p class="p_category"><?php $cat = get_the_category(); $cat = $cat[0]; {echo $cat->cat_name;} ?></p>
                  <h3 class="h3_title" style="margin-bottom:0;font-size : 0.5em;"><?php the_title(); ?></h3>
                  <p class="p_date"><span class="date-y"><?php the_time('Y'); ?></span><span class="date-mj"><?php the_time('m/j'); ?></span></p></a>
                </article>
                
                <?php
                $i++;
                endwhile;
                endif;
                ?>
                
                <div>
                <?php
                
                ?>
                </div>

          </div><!-- /front-root-cont -->
        </div><!-- /wrap -->
      </div><!-- /recent_post_content -->
    </div><!-- /main-inner -->
  </div><!-- /main -->
</div><!-- /content -->

<script src="http://hpptms.dip.jp/wp-content/themes/xeory_extension-child/js/plugin/footerFixed.js"></script>
<!--
<script src='/../../../js/plugin/footerFixed.js'></script>
<script src='js/plugin/footerFixed.js'></script>
-->

<?php get_footer(); ?>


