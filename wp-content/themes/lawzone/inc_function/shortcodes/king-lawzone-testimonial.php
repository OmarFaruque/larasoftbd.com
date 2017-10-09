<?php 
/*
* Lawzone Testomonial 
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_testimonials' => array(
            'name'        => 'Lawzone Testimonials',
            'description' => __('Lawzone Testimonials', 'kingcomposer'),
            'icon'        => 'cpicon kc-icon-pcarousel',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'post_type',
                    'label'     => 'Post Type',
                    'value'     => 'testimonial',
                    'type'      => 'select',
                    'options'   => lawzone_all_post_types(),
                    'description' => 'Post Type for testimonial.',
                ),
                array(
                    'name'      => 'count',
                    'label'     => 'Post Count',
                    'value'     => -1,
                    'type'      => 'number',
                    'description' => 'Testimonial Post Count.',
                ),
				       array(
                    'name'      => 'overlayer',
                    'label'     => 'Over Layer',
                    'type'      => 'select',
                    'value'     => 'default-overlay',
                    'options'   => array(
                      'default-overlay' => 'Overlayer Default',
                      'overlayer-black' => 'Overlayer Black',
                      'overlayer-white' => 'Overlayer White'
                      ),
                    'description' => 'Select Section Overlayer.'
                ),
               array(
                    'name'      => 'column',
                    'label'     => 'Column',
                    'value'     => 2,
                    'type'      => 'number',
                    'description' => 'Expert Item Column Count',
                ),
                array(
                    'name' => 'bg',
                    'label' => 'Upload Background',
                    'type' => 'attach_image',
                    'admin_label' => true,
                )   
            )
        )
    )
);

add_shortcode( 'lawzone_testimonials', 'lawzone_testimonials_callback' );

function lawzone_testimonials_callback( $atts ){ 
    // Widget display logic goes her
      ob_start();
      global $post; 
      $layout = get_post_meta( $post->ID, 'layout', true ); 

      /**
       * The WordPress Query class.
       * @link http://codex.wordpress.org/Function_Reference/WP_Query
       *
       */
      $args = array(
        //Type & Status Parameters
        'post_type'   => $atts['post_type'],
        'post_status' => 'publish',

        //Pagination Parameters
        'posts_per_page'         => $atts['count'],        
      );
    
    $query = new WP_Query( $args );
    if($query->have_posts()):
      $textcolor = ($atts['overlayer'] != 'overlayer-white')?'txt-color-white':'';
     ?>
    <section class="width100 testimonial <?= ($atts['overlayer'])?$atts['overlayer']:'default-overlay'; ?> parallax" data-bg-image="<?= wp_get_attachment_url( $atts['bg'] ); ?>">
    <div class="container">
      <div class="section-content">
        <div class="row">
        
          <div class="<?= ($atts['column'] == 2)?'carousel-col-2':'carousel-col-1'; ?> <?= ($layout=='box')?'p50':''; ?> ">
          <?php while($query->have_posts()): $query->the_post(); global $post;  ?>
            <div class="item">
              <div class="testimonial-item"> <i class="icon icon-MessageRight <?= $textcolor;  ?>"></i>
                <p class="<?= $textcolor;  ?>"><em><?= get_the_excerpt(); ?></em></p>
                <div class="content"> 
                  <?php 
                    if(has_post_thumbnail()){
                      the_post_thumbnail( 'full', array('class'=>'img-responsive') );
                    }
                  ?>
                  <h4 class="<?= $textcolor;  ?>"><?= get_the_title(); ?></h4>
                  <p>Happy Clients</p>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata();  ?>
          </div>
        </div>
      </div>
    </div>
  </section>
     <?php
     endif; wp_reset_query();
     ob_end_flush();
  }
} // End check if class exist
?>

