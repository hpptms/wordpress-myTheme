<?php get_header(); ?>
<div id="main_visual">
  <!--パーティクル背景に設定-->
  <script src="http://hpptms.dip.jp/wp-content/themes/xeory_extension-child/js/particleground-master/jquery.particleground.min.js"></script><!--ファイルだけ読込-->
  <div id ="main_visual_wrap"class="wrap">
    <h2><?php echo nl2br(get_option('top_catchcopy'));?></h2>
    <p><?php echo nl2br(get_option('top_description'));?></p>
  </div><!-- .wrap -->
</div>

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
              'showposts'=>5,
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
                  <?php the_post_thumbnail(array('300','158')); ?>
                </div>
                <?php } else{ ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/lib/images/noimage.jpg" alt="noimage" width="300" height="158" />
                  <?php } // get_the_post_thumbnail ?>
                  <p class="p_category">
                    <?php $cat = get_the_category(); $cat = $cat[0]; {echo $cat->cat_name;} ?>
                  </p>
                  <h3>
                    <?php the_title(); ?>
                  </h3>
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
          
          
          
          
          
          
          
          
          <div id="popular_post_content" class="front-loop">

            <h2><i class="fa fa-flag"></i> 人気のある記事</h2>
            <div class="wrap">
              <div class="front-loop-cont">
                <?php
                $i = 1;
                if ( have_posts() ) :
        // wp_reset_query();

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
                    'showposts'=>5,
                    'meta_key'=>'views',
                    'orderby'=>'meta_value_num',
                    'order'=>'DESC'
                    );
                query_posts($args);
        // query_posts('showposts=5&meta_key=views&orderby=meta_value_num&order=DESC');
                while ( have_posts() ) : the_post();

                $cf = get_post_meta($post->ID);
                $rank_class = 'popular_post_box rank-'.$i;
        // print_r($cf);
                ?>

                <article id="post-<?php echo the_ID(); ?>" <?php post_class($rank_class); ?>>
                  <a href="<?php the_permalink(); ?>" class="wrap-a">

                    <?php if( get_the_post_thumbnail() ) { ?>
                      <div class="post-thumbnail post-thumbnail-r-custom">
                        <?php the_post_thumbnail('small_thumbnail'); ?>
                      </div>
                      <?php } else{ ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/lib/images/noimage.jpg" alt="noimage" width="300" height="158" />
                        <?php } // get_the_post_thumbnail ?>
                        <p class="p_category"><?php $cat = get_the_category(); $cat = $cat[0]; {
                          echo $cat->cat_name;
                        } ?></p>
                        <h3><?php the_title(); ?></h3>
                        <p class="p_rank">NO.<span><?php echo $i; ?></span></p>
                        
                      </a>
                    </article>

                    <?php
                    $i++;
                    endwhile;
                    endif;
                    ?>

                  </div><!-- /front-loop-cont -->

                </div><!-- /wrap -->
              </div><!-- popular_post_content -->




              <!-- サービス紹介 -->
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
              <div id="front-service" class="front-main-cont">

                <header class="category_title main_title front-cont-header">
                  <div class="cont-icon"><i class="<?php echo $icon;?>"></i></div>
                  <h2 class="cont-title"><?php echo $title;?></h2>
                  <p class="cont-ruby"><?php echo $ruby;?></p>
                  <div class="tri-border"><span></span></div>
                </header>


                <div class="wrap">
                  <div class="front-service-inner">

                    <?php
                    $i = 1;
                    $bzb_service = get_option('bzb_service');
                    if(isset($bzb_service)){
                      foreach((array)$bzb_service as $key => $value){
                        extract(make_info_4top($value));
                        ?>
                        <section id="front-service-1" class="c_box">
                          <div class="c_title">
                            <h3><?php echo $title;?></h3>
                            <p class="c_english"><?php echo $bzb_ruby;?></p>
                          </div>
                          <div class="c_text">
                            <h4><?php echo nl2br($bzb_catch);?></h4>
                            <p><?php echo $service;?></p>

                          </div>
                        </section>
                        <?php
                      }
                    }
                    ?>    
                  </div>
                </div>
              </div><!-- /front-contents -->
              <!-- ブログ以外のコンテンツここまで ----------------------------------------------- -->
            </div><!-- /main-inner -->
          </div><!-- /main -->
        </div><!-- /content -->
        <?php get_footer(); ?>


