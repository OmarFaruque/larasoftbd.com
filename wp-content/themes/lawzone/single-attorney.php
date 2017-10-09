<?php 
/*
* Single Attorney
*/
get_header();
$img_id 	= ls_option('attorney_header_background_id');
$overlayer 	= ls_option('attorney_header_overlayer'); 
?>

<?php 
if(have_posts()): while(have_posts()): the_post(); 
	
	// Meta
	$designation 	= esc_html(get_post_meta( $post->ID, 'designation', true ));
	$dribbble 		= esc_html(get_post_meta( $post->ID, 'dribbble', true ));
	$twitter 		= esc_html(get_post_meta( $post->ID, 'twitter', true ));
	$skype 			= esc_html(get_post_meta( $post->ID, 'skype', true ));
	$single_img 	= esc_html(get_post_meta( $post->ID, 'single_img', true ));
	$experience 	= get_post_meta($post->ID, 'experience', true);

  // Theme Settings
  $activeQuery = ls_option('active_attorney_query');
?>
  <section class="overlay <?= ($overlayer)?$overlayer:'overlayer-black';  ?> parallax" data-bg-image="<?= ($img_id)?wp_get_attachment_url( $img_id ):get_stylesheet_directory_uri() . '/css/images/bg/bg1.jpg'; ?> " data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-title">
            <h2><?php the_title();   ?> PROFILE</h2>
            <p>Home // <?php the_title();  ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- services-details -->
  <section class="services-details">
    <div class="container">
      <div class="section-content">
        <div class="row">
          <div class="col-md-6">
            <img class="img-responsive" src="<?= ($single_img)?wp_get_attachment_url( $single_img ):get_stylesheet_directory_uri() . '/css/images/team/p1.jpg';   ?>" alt="">
          </div>
          <div class="col-md-6">
            <h3><?php the_title(); ?></h3>
            <h6><?= $designation;  ?></h6>
              <div class="attorneys-social">
                <ul class="list-inline">
                 <li><a href="<?= $dribbble; ?>"><span class="fa fa-facebook-f"></span></a></li>
                 <li><a href="<?= $twitter;  ?>"><span class="fa fa-twitter"></span></a></li>
                 <li><a href="skype:<?= $skype;  ?>?action"><span class="fa fa-skype"></span></a></li>
                </ul>
              </div>
         	<?= $experience;  ?>
          </div>
        </div>
        <div class="row">
        	<?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>


<?php if($activeQuery == 'yes') get_template_part( 'inc_part/attorney', 'query' ); ?>
  <!-- Section: Divider -->

<?php endwhile; endif; wp_reset_query(); wp_reset_postdata(); ?>


<?php get_footer(); ?>
