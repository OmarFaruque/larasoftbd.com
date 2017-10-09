<?php 
/*
* Single Page Portfolio Slider 
*/
global $post;
$s_item   = ls_option('portfolio_slider_visiable_item');  
	/**
	 * The WordPress Query class.
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 *
	 */
	$args = array(
		'post__not_in' => array($post->ID),
		//Type & Status Parameter
		'post_type'   => 'project',
		'post_status' => 'publish',
		//Pagination Parameters
		'posts_per_page'         => -1
	);

$query = new WP_Query( $args );
if($query->have_posts()):

?>
 <!--Gallery Style One-->
  <section class="gallery-one">
      <div class="container-fluid pbn ptn">
          <div class="row clearfix">
              <div class="carousel-col-<?= ($s_item)?$s_item:'5'; ?>	">

              <?php 
              while($query->have_posts()): $query->the_post();
              	$terms 		= get_the_terms( $post->ID, 'project-cat' );
				$cats 		= array();
				if($terms):
			    	foreach($terms as $t) array_push($cats, $t->name);
			   	endif;
			   	
               ?>
                  <div class="default-gallery-item item">
                    <div class="inner-box">
                        <!--Image Box-->
                        <figure class="image-box">
                        <?php if(has_post_thumbnail()){ the_post_thumbnail( 'full', array('class'=>'img-responsive') ); } ?>
                        </figure>
                        <!--Overlay Box-->
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="content">
                                    <a href="images/gallery/h1.jpg" class="lightbox-image image-link" title="Image Caption Here"><span class="icon icon-Search"></span></a>
                                    <h3><?php the_title( ); ?></h3>
                                    <p><?=($cats)?implode(', ', $cats):'Portfolio Category'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!--Default Gallery Item-->
                  </div>
              <?php endwhile; ?>

              </div>
          </div>
      </div>
  </section>
<?php endif; wp_reset_query(); ?>