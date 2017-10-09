<?php 
/*
* Swiper Slider
*/
?>
<?php 

  /**
   * The WordPress Query class.
   * @link http://codex.wordpress.org/Function_Reference/WP_Query
   *
   */
  $args = array(
    
  
    //Type & Status Parameters
    'post_type'   => 'slider',
    'post_status' => 'publish',
    
    
    //Pagination Parameters
    'posts_per_page'         => -1,
    
    
    //Taxonomy Parameters
    'tax_query' => array(
    'relation'  => 'AND',
      array(
        'taxonomy'         => 'slider-cat',
        'field'            => 'slug',
        'terms'            => array( 'swiper-slider' ),
        'include_children' => true,
        'operator'         => 'IN'
      )
    ),
    
    //Permission Parameters -
    'perm' => 'readable',
    
    //Parameters relating to caching
    'no_found_rows'          => false,
    'cache_results'          => true,
    'update_post_term_cache' => true,
    'update_post_meta_cache' => true,
    'orderby'         => 'rand'
    
  );

$query = new WP_Query( $args );
if($query->have_posts()):
?>
  <!-- swiper Slider Start here -->
  <div class="container pbn">
    <div class="row">
      <div class="col-md-12">
        <div class="swiper-container">
            <div class="swiper-wrapper">
            	<?php 
            	while($query->have_posts()): $query->the_post(); global $post; 
            	$slider_img     = esc_html(get_post_meta( $post->ID, 'slider_img', true ));
            	?>
                <div class="swiper-slide" style="background-image:url(<?= wp_get_attachment_url( $slider_img );  ?>)"></div>
            	<?php endwhile; ?>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Add Arrows -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
      </div>
    </div>
  </div>
  	

 <?php 
 endif; wp_reset_query();
 ?>