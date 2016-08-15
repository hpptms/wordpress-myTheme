<footer id="footer">
  <div class="footer-01">
    <div class="wrap">
      <div id="footer-content-area" class="row">
        <div id="footer-list-area" class="gr6">
          <div class="row">

            <?php if( has_nav_menu( 'footer_nav' ) ){
        //bzb_get_nav_menu_name();
              echo '<div id="footer-cont-about" class="gr4">';
              echo "<h4>" . get_option('footer_menu_title') . "</h4>";
              wp_nav_menu(
                array(
                  'theme_location'  => 'footer_nav',
                  'menu_class'      => '',
                  'menu_id'         => 'fnav',
                  'container'       => 'nav',
                  'items_wrap'      => '<ul id="footer-nav" class="%2$s">%3$s</ul>'
                  )
                );
              echo '</div>';
        } //if footer_nav
        ?>
        
        <?php if( has_nav_menu( 'global_nav' ) ) ?>
        <div id="footer-cont-sns" class="gr4">
          <?php footer_social_buttons();?>
        </div>
      </div>
    </div>
    <div class="gr6">
      <div class="row">
        <?php
        $facebook_page_url = get_option('facebook_page_url');
        if(isset($facebook_page_url) && $facebook_page_url !== ''){
          ?>
          <div id="footer-facebook" class="gr12 text-right">
            <div class="fb-page" data-href="<?php echo $facebook_page_url;?>" data-width="500" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $facebook_page_url;?>"><a href="<?php echo $facebook_page_url;?>"><?php echo get_option('site_name');?></a></blockquote></div></div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

  </div><!-- /wrap -->
</div><!-- /footer-01 -->
<div class="footer-02">
  <div class="wrap">
    <p class="footer-copy">
      © 2016.<?php echo get_bloginfo('name'); ?>.
    </p>
  </div><!-- /wrap -->
</div><!-- /footer-02 -->
<?php
    // }
?>
</footer>

<a href="#" class="pagetop"><span><i class="fa fa-angle-up"></i></span></a>
<?php wp_footer(); ?>
</body>
</html>