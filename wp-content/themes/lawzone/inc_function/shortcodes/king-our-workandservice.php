<?php 
/*
* Lawzone Call to Action 
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_our_work' => array(
            'name'        => 'Work & Service',
            'description' => __("Lawzone Work & Service", 'kingcomposer'),
            'icon'        => 'et-toolbox',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'top_title',
                    'label'     => 'Top Title',
                    'type'      => 'text',
                    'value'     => 'Latest Work',
                    'description' => 'Top small title',
                ),
                array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'value'     => 'OUR PRACTICE <span> AREAS</span>',
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
                    'value'     => 'practice',
                    'type'      => 'select',
                    'description' => 'Select Post Type to show',
                    'options'   => lawzone_all_post_types()
                ),
                array(
                    'name' => 'item_count',
                    'label' => 'Item Amount',
                    'type' => 'number_slider',  // USAGE RADIO TYPE
                    'options' => array(    // REQUIRED
                        'min' => 2,
                        'max' => 20,
                        'show_input' => true
                    ),
                    'value' => 8, // remove this if you do not need a default content 
                    'description' => 'Post Amount',
                ),
                array(
                    'name'      => 'format_type',
                    'label'     => 'Taxonomy',
                    'value'     => 'box',
                    'type'      => 'select',
                    'description' => 'Select Post Taxonomy',
                    'options'   => lawzone_get_taxonomy('practice-format')
                ),
                array(
                    'name'      => 'title_position',
                    'label'     => 'Title Position',
                    'value'     => 'left',
                    'type'      => 'select',
                    'description' => 'Select Top Title Position',
                    'options'   => array(
                          'left'    => 'Left',
                          'center'  => 'Center',
                          'right'   => 'Right'
                    )
                ),
                array(
                    'name'      => 'background',
                    'label'     => 'Background Image',
                    'type'      => 'attach_image',
                    'description' => 'Left Background Image',
                )
            )
        )
    )
);

add_shortcode( 'lawzone_our_work', 'lawzone_our_work_callback' );

function lawzone_our_work_callback( $atts ){ 
    ob_start();
     $bg_img           = wp_get_attachment_url( $atts['background'] );
               $args = array(
            //Type & Status Parameters
            'post_type'   => @$atts['post_type'],
            'post_status' => 'publish',

            //Pagination Parameters
            'posts_per_page'         => @$atts['item_count'],
            
            //Custom Field Parameters
            
            'meta_query'     => array(),
            
            //Taxonomy Parameters
            'tax_query' => array(
            'relation'  => 'AND',
              array(
                'taxonomy'         => 'practice-format',
                'field'            => 'slug',
                'terms'            => array( @$atts['format_type'] ),
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

        if(@$instance['format_type'] == 'box'){
          $args['meta_query'][] =  array(
                'key' => 'court_icon',
                'value' => '',
                'type' => 'CHAR',
                'compare' => '!='
            );
        }
        elseif(@$instance['format_type'] == 'thumbnail'){
           $args['meta_query'][] = array(
                'key' => 'court_icon',
                'value' => '',
                'type' => 'CHAR',
                'compare' => '=='
              );
        }

        
        $query = new WP_Query( $args );
        if($query->have_posts()): ?>
       <?php 
       $bgexClass = ''; 
        if($atts['background']): 
        $bgexClass .= 'txt-color-white';  
       ?>
        <section style="width:100%;" class="our-department overlayer default-overlay parallax" data-bg-image="<?= wp_get_attachment_url( $atts['background'] );  ?>">
       <?php endif; ?>
           <div class="container">
         <?php if($atts['format_type'] != 'grid'): ?>
          <div class="section-title">
            <div class="row">
              <?php if($atts['format_type'] != 'our-services'):  ?>
              <div class="col-md-4">
                <h6><?= $atts['top_title'] ; ?></h6>
                <h2><?= htmlspecialchars_decode($atts['title']); ?></h2>
              </div>
              <div class="col-md-7">
                <p><?= $atts['description'];  ?></p>
              </div>
            <?php else:  
              if($atts['title_position'] == 'left'):
            ?>
               <div class="col-md-4">
              <h6><?= $atts['top_title'] ; ?></h6>
                <h2><?= htmlspecialchars_decode($atts['title']); ?></h2>
              </div>
              <div class="col-md-7">
                 <p><?= $atts['description'];  ?></p>
              </div>
            <?php else: ?>
              <div class="col-md-8 col-md-offset-2 text-center">
                <h6><?= $atts['top_title'] ; ?></h6>
                <h2 class="<?= $bgexClass;  ?>"><?= htmlspecialchars_decode($atts['title']); ?></h2>
                <p class="<?= $bgexClass;  ?>"><?= $atts['description'];  ?></p>
              </div>
            <?php endif; endif; ?>
            </div>
          </div>
        <?php endif; ?>
          <div class="section-wrap">
            <div class="row">
            <?php while($query->have_posts()): $query->the_post(); global $post; 
                $icon     = esc_html(get_post_meta( $post->ID, 'court_icon', true ));
                $title2   = esc_html(get_post_meta( $post->ID, 'title2', true ));
                if($atts['format_type'] == 'box'):
            ?>
              <div class="col-sm-6 col-md-3">
                <div class="service-box style-1" style="background-image:url(<?= wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>">
                  <div class="service-box-overlay"></div>
                  <i class="<?= ($icon)?$icon:'flaticon-criminal'; ?>"></i>
                  <div class="service-box-content">
                    <h5><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <a href="<?= the_permalink(); ?>">Read More</a> </div>
                  <!-- service-box-content --> 
                </div>
              </div>
            <?php elseif($atts['format_type'] == 'thumbnail'): ?>
               <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="department-item">
                    <div class="thumb"> 
                      <?php 
                        if(has_post_thumbnail( $post->ID )){
                          the_post_thumbnail( 'full', array('class'=>'img-responsive img-floude') );
                        }
                      ?>
                      <div class="department-title">
                        <h3 class="text-uppercase"><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <h6><?= $title2;  ?></h6>
                        <div class="department-dtls">
                          <p><?= get_the_excerpt( ); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php elseif($atts['format_type'] == 'our-services'): ?>
              <div class="col-md-4 col-sm-6 med-icon">
                <article class="inner-box">
                  <div class="icon"><span class="<?= ($icon)?$icon:'flaticon-lawyer'; ?>"></span></div>
                  <div class="content">
                    <h4 class="<?= $bgexClass;  ?>"><?php the_title(); ?></h4>
                    <div class="small-line-2 mb15"></div>
                    <div class="text">
                      <p class="<?= $bgexClass;  ?>"><?= get_the_excerpt( );  ?></p>
                    </div>
                  </div>
                </article>
              </div>
            <?php elseif($atts['format_type'] == 'grid'): ?>
            <div class="col-md-3 col-sm-6 med-icon">
              <div class="service-item effect-border mbn">
                <div class="box-icon"> <i class="<?= $icon;  ?>"></i> </div>
                <h5><a href="<?php the_permalink();  ?>"><?php the_title( );  ?></a></h5>
                <p><?=  get_the_excerpt(); ?></p>
                <a href="<?php the_permalink();  ?>" class="btn theme-btn mt10">Read more</a> 
              </div>
            </div>  
            <?php endif; endwhile; wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
        <?= ($atts['background'])?'</section>':'';  ?>
     <?php
     endif; wp_reset_query(); 
    ob_end_flush();
  }
} // End check if class exist
?>

