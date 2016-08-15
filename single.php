<?php get_header(); ?>
<div id="content">
  <div class="wrap">
    <div id="main" <?php bzb_layout_main(); ?> role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
      <div class="main-inner">
        <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
        ?>

        <?php 
        global $post;
        $cf = get_post_meta($post->ID);
        $facebook_page_url = '';
        $facebook_page_url = get_option('facebook_page_url');
        $post_cat = '';
        ?>
        <article id="post-<?php the_id(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">

          <header class="post-header">
            <div class="cat-name">
              <span>
                <?php
                $category = get_the_category(); 
                echo $category[0]->cat_name;
                ?>
              </span>
            </div>
            <h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>
            <div class="post-sns">
              <?php bzb_social_buttons();?>
            </div>
          </header>

          <div class="post-meta-area">
            <ul class="post-meta list-inline">
              <li class="date" itemprop="datePublished" datetime="<?php the_time('c');?>"><i class="fa fa-clock-o"></i> <?php the_time('Y.m.d');?></li>
            </ul>
            <ul class="post-meta-comment">
              <li class="author">
                by <?php the_author(); ?>
              </li>
              <li class="comments">
                <i class="fa fa-comments"></i> <span class="count"><?php comments_number('0', '1', '%'); ?></span>
              </li>
            </ul>
          </div>

          <?php if( get_the_post_thumbnail() ) : ?>
            <div class="post-thumbnail post-thumbnail-custom">
              <?php the_post_thumbnail(array(1200, 630, true)); ?>
            </div>
          <?php endif; ?>

          <section class="post-content" itemprop="text">
            <?php the_content(); ?>
            <div id="single-page-adsence">
              <!--広告を記事の下部に表示-->
              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <!-- Google AdSence -->
              <ins class="adsbygoogle"
              style="display:block"
              data-ad-client="ca-pub-5157294493857921"
              data-ad-slot="7938327298"
              data-ad-format="auto"></ins>
              <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
            </div>
          </section>

          <footer class="post-footer">


            <?php echo bzb_social_buttons();?>
            <ul class="post-footer-list">
              <li class="cat"><i class="fa fa-folder"></i> <?php the_category(', ');?></li>
              <?php
              $posttags = get_the_tags();
              if($posttags){ ?>
                <li class="tag"><i class="fa fa-tag"></i> <?php the_tags('');?></li>
                <?php } ?>
              </ul>

              <!--前後記事へのリンク-->
              <p class="article-link">
              <?php previous_post_link('%link', '投稿日時が古い記事へ'); ?>
              <?php next_post_link('%link', '投稿日時が新しい記事へ'); ?>
              </p>
            </footer>

            <?php echo bzb_get_cta($post->ID); ?>

            <?php if( is_active_sidebar('under_post_area') ){ ?>
              <div class="post-share">
                <?php dynamic_sidebar('under_post_area');?>
              </div>
              <?php } ?>

            </article>

            <?php //bzb_show_avatar();?>


            <?php comments_template( '', true ); ?>

            <?php
            endwhile;
            else :
            ?>

            <p>投稿が見つかりません。</p>

          <?php endif; ?>


        </div><!-- /main-inner -->
      </div><!-- /main -->

      <?php get_sidebar(); ?>

    </div><!-- /wrap -->

  </div><!-- /content -->

  <?php get_footer(); ?>


