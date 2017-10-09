<?php
/*
* Default Template
*/
 get_header();
	if(have_posts()):while(have_posts()):the_post(); global $post;

  $page_header  = get_post_meta( $post->ID, 'page_header', true );
  if($page_header && $page_header == 'yes') get_template_part( 'inc_part/page', 'header' );
  ?>
  <section class="defaultCotnent" style="overflow:hidden;">
	<?php if($post->post_content): ?>
  <?php if( function_exists( 'kc_is_using' ) && kc_is_using() ) : ?>
    <div class="container-fluid"><div class="row">
  <?php else: ?>
    <div class="container">
  <?php endif; ?>
		<?php the_content(); ?>
  </div>
  <?php if( function_exists( 'kc_is_using' ) && kc_is_using() ) : ?>
    </div>
  <?php endif; ?>
	<?php endif; ?>
</section>
<?php
 endwhile; endif; wp_reset_postdata();

 ?>
<!-- End Home Content -->  

 <?php get_footer(); ?>