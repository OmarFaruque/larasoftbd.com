<?php 
/*
* Home Style Two Slider
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
    'posts_per_page'  => -1,
    'orderby'         => 'rand',
    
    
    //Taxonomy Parameters
    'tax_query' => array(
    'relation'  => 'AND',
      array(
        'taxonomy'         => 'slider-cat',
        'field'            => 'slug',
        'terms'            => array( 'hero-slider' ),
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
    
  );

$query = new WP_Query( $args );
if($query->have_posts()):
?>


<!-- start of hero -->
  <section class="hero hero-slider-wrapper">
    <div class="hero-slider">
    <?php while($query->have_posts()): $query->the_post();
            $slider_img     = esc_html(get_post_meta( $post->ID, 'slider_img', true ));
            $slider_text    = get_post_meta( $post->ID, 'slider_text', true );
            $button_text    = get_post_meta( $post->ID, 'button_text', true );
            $slider_url     = get_post_meta($post->ID, 'slider_url', true );
            $data_title     = get_post_meta($post->ID, 'data_title', true);
            $text_position  = get_post_meta($post->ID, 'text_position', true );
    ?>
      <div class="slide"> 
      <img src="<?= ($slider_img)?wp_get_attachment_url( $slider_img ):'';  ?>" alt>
        <div class="title"> <span><?php the_title(); ?></span>
          <h1><?= ($slider_text)?$slider_text:'Your Lawzone Starts Here !'; ?></h1>
          <?php if($button_text): ?>
          <a href="<?= ($slider_url)?$slider_url:'';  ?>" class="btn theme-btn"><?= ($button_text)?$button_text:'';  ?></a>
          <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
  </section>
  <!-- end hero slider --> 
<?php endif; ?> 
