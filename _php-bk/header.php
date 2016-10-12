<!DOCTYPE HTML>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<title><?php bzb_title(); ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
  <?php wp_head(); ?>
  <!--解析用-->
  <?php echo get_option('analytics_tracking_code');?>
  <?php echo get_option('webmaster_tool');?>
</head>

<body <?php body_class();?> itemschope="itemscope" itemtype="http://schema.org/WebPage">
  <?php bzb_show_facebook_block(); ?>
  <?php if( is_singular('lp') ) { ?>

    <div class="lp-wrap">

      <header id="lp-header">
        <h1 class="lp-title"><?php wp_title(''); ?></h1>
      </header>

      <?php }else{ ?>
        <header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
          <div class="wrap clearfix">
            <?php
            $logo_text = get_option('logo_text');
            $logo_inner = get_bloginfo('name');
            $logo_inner_desc = '<p class="header-description">'.get_bloginfo('description').'</p>';
            $logo_wrap = ( is_front_page() || is_home() ) ? 'h1' : 'p' ;
            ?>
            <<?php echo $logo_wrap; ?> id="logo" itemprop="headline">
            <a href="<?php echo home_url(); ?>"><?php echo $logo_inner; ?></a><br />
            </<?php echo $logo_wrap; ?>>
            <!-- start global nav  -->

            <div id="header-right" class="clearfix">

              <?php if( has_nav_menu( 'footer_nav' ) ){ ?>

                <div id="header-fnav-area">
                  <p id="header-fnav-btn"><a href="#"><?php echo get_option('footer_menu_title'); ?><br /><i class="fa fa-angle-down"></i></a></p>
                  <nav id="header-fnav" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
                    <?php
                    wp_nav_menu(
                      array(
                        'theme_location'  => 'footer_nav',
                        'menu_class'      => 'clearfix',
                        'menu_id'         => 'fnav-h-ul',
                        'container'       => 'div',
                        'container_id'    => 'fnav-h-container',
                        'container_class' => 'fnav-h-container'
                        )
                      );?>
                  </nav>
                </div>

                <?php } // if footer_nav ?>
              </div><!-- /header-right -->
            </div>
          </header>
          <?php } // if is_singular('lp') ?>

          <?php if( !(is_home() || is_front_page() || is_singular('lp') ) ){ ?>

            <div class="breadcrumb-area">

            </div>

            <?php } ?>