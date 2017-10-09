<?php 
/*
* Single Practice
*/
get_header();
$img_id   = ls_option('practice_header_background_id');
$overlayer  = ls_option('practice_header_overlayer'); 
global $post;
$banner   = get_post_meta( $post->ID, 'banner', true );
$banneralt  = get_post_meta( $banner, '_wp_attachment_image_alt', true);

$sidebar_id     = ls_option('practice_sidebar');
$sidebar_post   = get_post( $sidebar_id, OBJECT, 'raw' );
$sidebar_slug   = $sidebar_post->post_name;
$layout         = ls_option('practice_layout_style');
?>
  <!-- inner Section -->
<?php if(have_posts()): while(have_posts()): the_post() ?>
  <section class="overlay <?= ($overlayer)?$overlayer:'overlayer-black';  ?> parallax" data-bg-image="<?= ($img_id)?wp_get_attachment_url( $img_id ):get_stylesheet_directory_uri() . '/css/images/bg/bg1.jpg'; ?> " data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-title">
            <h2><?php the_title();   ?></h2>
            <p>Home // <?php the_title();  ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Blog Section-->
  <section class="blog">
    <div class="container">
      <div class="section-content">
        <div class="row">
            <?php if($layout != 'no' && $layout == 'left'): ?>
              <div class="col-md-3">
                 <div class="sidebar">
                   <?php 
                     if($sidebar_id && is_dynamic_sidebar( $sidebar_slug )){
                          dynamic_sidebar( $sidebar_slug );
                      }
                   ?>
                 </div>
              </div>
            <?php endif; ?> 
          <div class="col-md-<?= ($layout == 'no')?'12':'9'; ?>">
            <div class="parctise_details_page_content"> 
            <?php if($banner){ ?>
              <img src="<?= wp_get_attachment_url( $banner ); ?>" alt="<?= ($banneralt)?$banneralt:'';  ?>" class="img-responsive">   
            <?php }else{ ?>
              <img src="<?= get_stylesheet_directory_uri();  ?>/css/images/blog/b1.jpg" alt="Practice" class="img-responsive">
            <?php } ?>

              <div class="title">
                <h3><?php the_title();  ?></h3>
              </div>
              <!--  /title -->
              
              <div class="text">
                <?php the_content(); ?>
              </div>
              <!-- /text -->
              <!-- /consult -->
            </div>
          </div>
          <?php if($layout != 'no' && $layout == 'right'): ?>
              <div class="col-md-3">
                 <div class="sidebar">
                   <?php 
                     if($sidebar_id && is_dynamic_sidebar( $sidebar_slug )){
                          dynamic_sidebar( $sidebar_slug );
                      }
                   ?>
                 </div>
              </div>
            <?php endif; ?> 
        </div>
      </div>
    </div>
  </section>
<?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>
<?php get_footer(); ?>
