<?php 
/*
* Archive
*/ 
get_header();
?>
  <!--Blog Section-->
  <?php 
	$img_id 	    = ls_option('blog_header_background_id');
	$overlayer 	    = ls_option('blog_header_overlayer'); 
	$page_for_posts = get_option( 'page_for_posts' );
	
  if(have_posts()): 
  ?>
  <section class="overlay <?= ($overlayer)?$overlayer:'overlayer-black';  ?> parallax" data-bg-image="<?= ($img_id)?wp_get_attachment_url( $img_id ):get_template_directory_uri() . '/css/images/bg/bg1.jpg'; ?> " data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-title">
            <h2><?= get_the_title( $page_for_posts );   ?></h2>
            <p>Home // <?= get_the_title( $page_for_posts );  ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php get_template_part( 'inc_part/blog', 'loop' ); ?>
<?php endif; wp_reset_query(); ?>
<?php get_footer(); ?>
