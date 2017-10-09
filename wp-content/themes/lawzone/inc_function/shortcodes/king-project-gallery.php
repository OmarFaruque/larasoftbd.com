<?php 
/*
* KingComposer Project Gallery
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;


$kc->add_map(
    array(
        'lawzoneProjectGallery' => array(
            'name'        => 'Project Gallery',
            'description' => __('Lawzone Project Gallery', 'kingcomposer'),
            'icon'        => 'fa-camera',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(
               array(
                    'name'      => 'top_title',
                    'label'     => 'Top Title',
                    'type'      => 'text',
                    'description' => 'Top small title',
                    'value'     => 'WE CARE ABOUT Clients'
                ),
                array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'value'     => 'Our project <span> gallery</span>',
                    'type'      => 'text',
                    'description' => 'Title',
                ),
                array(
                    'name'      => 'description',
                    'label'     => 'Content',
                    'value'     => 'Sed malesuada nunc sit amet quam hendrerit, mollis vulputate risus tristique. Quisque dapibus eros et dolor accumsan, sit amet interdum tortor imperdiet.',
                    'type'      => 'textarea',
                    'description' => 'Content',
                ),
                array(
                    'name'      => 'post_type',
                    'label'     => 'Post Type',
                    'value'     => 'project',
                    'type'      => 'select',
                    'description' => 'Select Post Type to show',
                    'options'   => lawzone_all_post_types()
                )
            )
        )
    )
);



add_shortcode( 'lawzoneProjectGallery', 'lawzoneProjectGalleryCallback' );

function lawzoneProjectGalleryCallback( $atts ){ 
		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */

	   $args = array(   
            
            //Type & Status Parameters
            'post_type'   => @$atts['post_type'],
            'post_status' => 'publish',
            //Pagination Parameters
            'posts_per_page'         => -1,
                       
            //Parameters relating to caching
            'no_found_rows'          => false,
            'cache_results'          => true,
            'update_post_term_cache' => true,
            'update_post_meta_cache' => true,
           );
                    
        $query = new WP_Query( $args );
        if($query->have_posts()):
     ?>
       <section style="width:100%;" class="gallery-one bg-color-f1">
        <div class="container pbn">
          <div class="section-title">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-center">
                <h6><?= $atts['top_title'];  ?></h6>
                <h2><?= htmlspecialchars_decode($atts['title']);  ?></h2>
                <p><?= $atts['description'];  ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid ptn">
          <div class="row clearfix">
            <div class="carousel-col-5">
              
            <?php while($query->have_posts()): $query->the_post(); global $post; 
              $sub_title = get_post_meta( $post->ID, 'sub_title', true );
            ?>
              <div class="default-gallery-item item">
                <div class="inner-box"> 
                  <!--Image Box-->
                  <?php if(has_post_thumbnail( )): ?>
                  <figure class="image-box"><?php the_post_thumbnail( 'full', array('class'=>'img-responsive') ); ?></figure>
                  <?php endif; ?>

                  <!--Overlay Box-->
                  <div class="overlay-box">
                    <div class="overlay-inner">
                      <div class="content"> <a href="<?= wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );  ?>" class="lightbox-image image-link" title="Image Caption Here"><span class="icon icon-Search"></span></a>
                        <h3><?php the_title()  ?></h3>
                        <p><?= $sub_title; ?></p>
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
     <?php
     endif; wp_reset_query(); 
 }
} // End check if class exist
?>

