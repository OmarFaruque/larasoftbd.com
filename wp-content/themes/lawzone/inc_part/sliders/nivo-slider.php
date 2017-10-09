<?php 
/*
* Nivo Slider Template
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
        'terms'            => array( 'nivo-slider' ),
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

 <div id="nivoSlider" class="nivoSlider"> 
 	<?php $counter = 0;
 		while($query->have_posts()): $query->the_post(); global $post;
 		$slider_img     = esc_html(get_post_meta( $post->ID, 'slider_img', true ));
    	$alt            = get_post_meta( $slider_img, '_wp_attachment_image_alt', true);
    	$slider_text    = get_post_meta( $post->ID, 'slider_text', true );
 	?>
    <img src="<?= wp_get_attachment_url( @$slider_img );  ?>" data-thumb="<?= wp_get_attachment_url( @$slider_img );  ?>" alt="<?= @$alt;  ?>" title="<?php the_title();  ?>" data-transition="<?= ($counter%2 == 0)?'slideInRight':'slideInLeft'; ?>" /> 
    <?php $counter++; endwhile; ?>
  </div>

 <?php endif; wp_reset_query();  ?>