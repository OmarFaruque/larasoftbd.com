<?php 
/*
* Single Project
*/
get_header();
$img_id 	  = ls_option('portfolio_header_background_id');
$overlayer 	= ls_option('portfolio_header_overlayer'); 
$p_slider   = ls_option('show_portfolio_slider');  

if(have_posts()): while(have_posts()): the_post();
	$client 	= get_post_meta( $post->ID, 'client', true );
	$teclg_use 	= get_post_meta( $post->ID, 'teclg_use', true );
	$date 		= date('d F, l Y', strtotime( get_post_meta( $post->ID, 'date', true )));
	$site 		= get_post_meta( $post->ID, 'site', true );
	$terms 		= get_the_terms( $post->ID, 'project-cat' );
	$cats 		= array();
	if($terms):
    	foreach($terms as $t) array_push($cats, $t->name);
   	endif;

?>
    <section class="overlay <?= ($overlayer)?$overlayer:'overlayer-black';  ?> parallax" data-bg-image="<?= ($img_id)?wp_get_attachment_url( $img_id ):get_stylesheet_directory_uri() . '/css/images/bg/bg1.jpg'; ?>" data-stellar-background-ratio="0.5">
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
      <!-- Portfolio Details -->
  	<section class="gallery inner-gallery">
          <div class="container">
              <div class="row clearfix project-description mb30">
              	<?php if($client): ?>
                <div class="col-md-3">
                  <h5><i class="icon icon-User"> </i>Client :</h5>
                  <p><?= $client; ?></p>
                </div>
            	<?php endif; if($teclg_use): ?>
                <div class="col-md-3">
                   <h5><i class="icon icon-Tools"> </i>Technology Used :</h5>
                   <p><?= htmlspecialchars_decode( $teclg_use );  ?></p>
                </div>
                <?php endif; if($date): ?>
                <div class="col-md-3">
                   <h5><i class="icon icon-Agenda"> </i>Date :</h5>
                  <p><em><?= $date;  ?></em></p>
                </div>
                <?php endif; if($site): ?>
                <div class="col-md-3">
                  <h5><i class="icon icon-Notebook"> </i>web site :</h5>
                  <?= htmlspecialchars_decode($site);  ?>
                </div>
            	<?php endif; ?>
              </div>
              <div class="row clearfix">
                <div class="col-md-4">
                  <div class="default-gallery-item">
                      <div class="inner-box">
                          <!--Image Box-->
                          <figure class="image-box ">
                          <?php if(has_post_thumbnail( )){
                          	the_post_thumbnail( 'full', array('class'=>'img-responsive img-fullwidth') );
                          	} ?>
                          </figure>
                          <!--Overlay Box-->
                          <div class="overlay-box">
                              <div class="overlay-inner">
                                  <div class="content">
                                      <a href="images/gallery/h1.jpg" class="lightbox-image image-link" title="Image Caption Here"></a>
                                      <h3><?php the_title(); ?></h3>
                                      <p><?=($cats)?implode(', ', $cats):'Portfolio Category'; ?></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                  <div class="col-md-8">
                    <div class="content-detail">
                      <h3><?php the_title(); ?></h3>
                      <?php the_content(); ?>
                    </div>
                  </div>
              </div>
          </div>
  	</section>
    <?php if($p_slider == 'yes') get_template_part( 'inc_part/sliders/single-portfolio', 'slider' ); ?>

<?php 
endwhile; endif;  wp_reset_query(); wp_reset_postdata();
get_footer(); 
?>