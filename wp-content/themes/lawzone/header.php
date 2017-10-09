<?php 
/*
* Lawzone header
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
</head>
<!--Change Class in body to change color Scheme for Homepages  ie theme-green , theme-green -->

<body <?php body_class( 'theme-green' ); ?>>
<?php 
  do_action('after_body_open_tag');
  global $post; 
  $layout = (!is_404())?get_post_meta( $post->ID, 'layout', true ):''; 
?>
<div class="page-wrapper <?= (@$layout=='box')?'boxed-layout':''; ?>"> 
  
  <!-- start preloader -->
  <div class="preloader"></div>
  <!-- end preloader --> 
  
  <!-- Main Header / Style One-->
  <header class="main-header header-style-one"> 
    <!-- Header Top -->
    <div class="header-top">
      <div class="container clearfix ptn pbn"> 
        <!--Top Left-->
        <div class="top-left pull-left">
          <ul class="info-nav clearfix">
            <li> 
              <!--Social Links-->
              <div class="social-links pull-left"> <span class="text-theme-color">Follow Us</span> : 
              <?php 
                for($i = 1; $i < 5; $i++):
                $url = ls_option('social('.$i.')_url'); 
                $img = ls_option('social('.$i.')_image'); 
                if($img && $url):
              ?>
                <a target="_blank" href="<?= $url; ?>"><span class="<?= $img; ?>"></span></a> 
              <?php endif; endfor; ?>
                <!--<a href="#"><span class="fa fa-twitter"></span></a> 
                <a href="#"><span class="fa fa-google-plus"></span></a> 
                <a href="#"><span class="fa fa-linkedin"></span></a> -->
              </div>
            </li>
            <li><a href="mailto:<?= (ls_option('email'))?ls_option('email'):'yourmail@gmail.com'; ?>"><span class="icon icon-Mail mr10"></span>E-mail Us</a></li>
          </ul>
        </div>
        <!--Top Right-->
        <div class="top-right pull-right clearfix"> 
          <!--Lang Bar-->
          <ul class="info-nav clearfix">
            <li>
              <a href="#"><i class="icon icon-Phone mr10 text-theme-color"></i><span class="ml5">Emergency Line</span> 
              <?= (ls_option('tel'))?ls_option('tel'): '(+123) 2456 987';  ?>
              </a>
            </li>
            <li><a href="#" class="text-uppercase appoinment"><i class="icon icon-Pen mr10 text-theme-color "></i> Make an appoinment</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <!-- Header Top End --> 
    
    <!--Header-Main Box-->
    <div class="header-mainbox">
      <div class="container ptn pbn">
        <div class="clearfix">
          <div class="pull-left">
            <div class="logo"> 
              <a href="index.html">
              <?php $logo = (ls_option('logo'))?ls_option('logo'):  get_template_directory_uri() . '/css/images/logo/logo.png'; ?>
                <img src="<?= $logo;  ?>" alt="Logo" title="Law">
              </a> 
            </div>
          </div>
          <div class="outer-box clearfix"> 
            <!-- Main Menu -->
            <nav class="main-menu logo-outer">
              <div class="navbar-header"> 
                <!-- Toggle Button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="navbar-collapse collapse clearfix">
                 <?php
                  wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 3,
                    'container'         => false,
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'navigation clearfix',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                  );
                  ?>
              </div>
            </nav>
            <!-- Main Menu End--> 
          </div>
        </div>
      </div>
    </div>
    <!--Header Main Box End--> 
  </header>

  <!--End Main Header --> 