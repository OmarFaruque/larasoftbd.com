<?php 
/*
* Professional Expert 
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'professional_expertrc' => array(
            'name'        => 'Professional Experts',
            'description' => __('Lawzone Professional Expert', 'kingcomposer'),
            'icon'        => 'cpicon sl-paper-plane',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'value'     => 'Meet Our <span>Attorney</span>',
                    'type'      => 'text',
                    'description' => 'Professional Expert Title'
                ),
                array(
                    'name'      => 'description',
                    'label'     => 'Content',
                    'value'     => 'Sed malesuada nunc sit amet quam hendrerit, mollis vulputate risus tristique. Quisque dapibus eros et dolor accumsan, sit amet interdum tortor imperdiet.',
                    'type'      => 'textarea',
                    'description' => 'Professional Expert top description'
                ),
				      array(
                    'name'      => 'taxonomy',
                    'label' 	=> 'Expert Category',
                    'type'      => 'select',
                    'value'     => 'attorney',
                    'options'   => lawzone_get_taxonomy('member-cat'),
                    'description' => 'Select Expert Category for Query.'
                ),   
                array(
                    'name'      => 'count',
                    'label'     => 'Expert Count',
                    'value'     => 3,
                    'type'      => 'number',
                    'description' => 'Expert Item Count'
                ),
                array(
                    'name'      => 'column',
                    'label'     => 'Column',
                    'value'     => 3,
                    'type'      => 'number',
                    'description' => 'Expert Item Column Count'
                ) 
            )
        )
    )
);

add_shortcode( 'professional_expertrc', 'professional_expertrc_callback' );

function professional_expertrc_callback( $atts ){ 
    // Widget display logic goes her
        ob_start();
        $argss = array(   
            //Type & Status Parameters
            'post_type'   => 'attorney',
            'post_status' => 'publish',
            //Pagination Parameters
            'posts_per_page' => $atts['count'],
            
            //Custom Field Parameters
            'meta_query'     => array(
                array(
                  'key' => 'designation',
                  'value' => '',
                  'type' => 'CHAR',
                  'compare' => '!='
                )
             ),

            //Taxonomy Parameters
            'tax_query' => array(
            'relation'  => 'AND',
              array(
                'taxonomy'         => 'member-cat',
                'field'            => 'slug',
                'terms'            => array( $atts['taxonomy'] ),
                'include_children' => true,
                'operator'         => 'IN'
              )
            )
           );
        $querys = new WP_Query( $argss );
        if(count($querys->posts > 0)): ?>
        <section class="description">
         <div class="container pb0">
          <div class="section-title">
            <div class="row">
              <div class="col-md-4">
                <h6>Professional expert</h6>
                <h2><?= htmlspecialchars_decode( $atts['title']);  ?></h2>
              </div>
              <div class="col-md-7">
                <p><?= $atts['description'];  ?></p>
              </div>
            </div>
          </div>
          <div class="section_wrap">
            <div class="row">

            <?php foreach($querys->posts as $sp): 
              $designation  = get_post_meta( $sp->ID, 'designation', true );
              $dribbble     = get_post_meta( $sp->ID, 'dribbble', true );
              $twitter    = get_post_meta( $sp->ID, 'twitter', true );
              $skype      = get_post_meta( $sp->ID, 'skype', true );
            ?>
              <div class="col-md-<?= ($atts['column'] == 2)?'6':'4'; ?>">
                <div class="team-item">
                  <div class="team-img"> <img class="img-fullwidth img-responsive" src="<?= wp_get_attachment_url( get_post_thumbnail_id( $sp->ID ) ); ?>" alt=""> </div>
                  <div class="img-title">
                    <h4><a href="<?= get_the_permalink( $sp->ID, false );  ?>"><?= $sp->post_title; ?></a></h4>
                    <p><?= $designation;  ?></p>
                  </div>
                  <div class="team-icon">
                    <ul>
                      <li><a target="_blank" href="<?= $dribbble;  ?>"><span class="fa fa-dribbble"></span></a></li>
                      <li><a target="_blank" href="<?= $twitter; ?>"><span class="fa fa-twitter"></span></a></li>
                      <li><a target="_blank" href="<?= $skype;  ?>"><span class="fa fa-skype"></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

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

