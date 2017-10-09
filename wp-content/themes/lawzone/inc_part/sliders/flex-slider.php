<?php 
/*
* Flex Slider
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
        'terms'            => array( 'flex-slider' ),
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
<div class="flexslider">
    <ul class="slides">
    <?php 
    	while($query->have_posts()): $query->the_post(); global $post;
    	$slider_img     = esc_html(get_post_meta( $post->ID, 'slider_img', true ));
    	$alt            = get_post_meta( $slider_img, '_wp_attachment_image_alt', true);
    	$slider_text    = get_post_meta( $post->ID, 'slider_text', true );
    ?>
    <li>
      <img src="<?= wp_get_attachment_url( @$slider_img );  ?>">
      <div class="meta">
        <h1><?php the_title();  ?></h1>
        <h2><?= (@$slider_text)?@$slider_text:''; ?></h2>
      </div>
    </li>
	<?php endwhile; ?>
  </ul>
</div>
<style type="text/css" media="screen">
  .kc-wrap-columns{display: block !important;}
</style>
<?php endif; wp_reset_query(); ?>