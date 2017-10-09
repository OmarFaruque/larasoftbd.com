<?php 
/*
* KingComposer Wellcome zone
*/




include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;


$kc->add_map(
    array(
        'lawzone_wellcome' => array(
            'name'        => 'Wollcome to',
            'description' => __('Wellcome Content', 'kingcomposer'),
            'icon'        => 'cpicon kc-icon-tabs',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(
                array(
                    'name'      => 'top_title',
                    'label' 	=> 'Top Title',
                    'value' 	=> 'All legal systems deal with the same basic issues',
                    'type'  	=> 'text',
                    'description' => 'Wollcome zone top title with small fonts.',
                ),
                array(
                	'name' 		=> 'title',
                	'label' 	=> 'Title',
                	'value' 	=> 'WELCOMET O LAW ZONE - <span>LEGAL HELP</span>',
                	'type' 		=> 'text',
                    'description' => 'Main Title, can use html element.'
                ),
                array(
                    'name'      => 'sub_title',
                    'label'     => 'Sub Title',
                    'value'     => 'Perferendis repudiandae nostrum quibusdam',
                    'type'      => 'text',
                    'description' => 'Colored Sub title (Optional)'
                ),
                array(
                    'name'      => 'content',
                    'label'     => 'Description',
                    'value'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, corrupti, fugit. Temporibus nostrum nam deleniti vitae accusantium iste sunt facilis, quisquam eveniet reiciendis corporis, veniam nulla. Provident tempora perspiciatis quod commodi iure neque eaque quos, consequuntur expedita dolorem dicta dignissimos.',
                    'type'      => 'textarea_html',
                    'description' => 'Main Content for welcome.',
                ),
                array(
                    'name'      => 'consultation',
                    'label'     => 'Get a free Consultation',
                    'value'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'type'      => 'textarea',
                    'description' => 'Set free consultation message for bottom Contact Form.',
                    'admin_label' => true,
                ),
                array(
                    'name'      => 'url',
                    'label'     => 'Contact URL',
                    'value'     => get_home_url('/') . '/contact-us/',
                    'type'      => 'text',
                    'description' => 'Contact Us page URL'
                ),
                array(
                	'name' 		=> 'post_type',
                	'label' 	=> 'Post Type',
                	'value' 	=> 'practice',
                	'type' 		=> 'select',
                	'options' 	=> lawzone_all_post_types(),
                ),
                array(
                    'name'      => 'post_count',
                    'label'     => 'Post Count',
                    'value'     => 0,
                    'type'      => 'number',
                    'description' => 'Post Item Amount.'
                ),
                array(
                    'name'      => 'format_type',
                    'label'     => 'List Style',
                    'value'     => 'box',
                    'type'      => 'select',
                    'options'   => lawzone_get_taxonomy('practice-format'),
                    'description' => 'Wellcome Zone list item style.'
                ),
                array(
                    'name'      => 'consultant',
                    'label'     => 'Free Consultant Contact Form',
                    'type'      => 'select',
                    'value'     => '',
                    'options'   => lawzone_all_posts('wpcf7_contact_form'),
                    'description' => 'Select Contact Form from Contact Form 7.'
                ),
                 array(
                    'name'      => 'background',
                    'label'     => 'Thumbnail Image',
                    'type'      => 'attach_image',
                    'description' => 'Thumbnail image.'
                ),
                array(
                    'name'      => 'column',
                    'label'     => 'Select Column',
                    'type'      => 'select',
                    'value'     => '',
                    'options'   => array(
                        '' => 'Select Column',
                        1 => 'One',
                        2 => 'Two'
                    ),
                    'description' => 'Select Column for different style.'
                ),
            )
        )
    )
);



add_shortcode( 'lawzone_wellcome', 'lawzone_wellcome_PHP_Function' );

function lawzone_wellcome_PHP_Function( $atts ){ 
		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */

	  if(@$atts['post_count'] > 0){
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
            'posts_per_page'         => @$atts['post_count'],
            
            //Custom Field Parameters
            
            'meta_query'     => array(
              array(
                'key' => 'court_icon',
                'value' => '',
                'type' => 'CHAR',
                'compare' => '!='
              )
             ),
            
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
        
        $query = new WP_Query( $args );
      }

    //
    // Widget display logic goes here
    //
    if(!@$atts['background'] && @$atts['consultation'] && !@$atts['consultant'] && !@$atts['column']): ?>
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="mb15 col-md-10 col-md-offset-1 wow fadeInLeft animated text-center section-title2">
              <?php if(@$atts['top_title']): ?>
              <h6><?= @$atts['top_title']; ?></h6>
              <?php endif; ?>

                <h2 class="text-uppercase small-line-center text"><?= htmlspecialchars_decode( @$atts['title']); ?></h2>
                
              <?php if(@$atts['sub_title']): ?>
              <h4 class="mt20 mb20 text-theme-color"><?= @$atts['sub_title']; ?></h4>
              <?php endif; ?>
              <?=  (@$atts['top_title'])?'<br/>':'';  ?>
                <p><?= @$atts['content']; ?></p>
              </div>
            </div>
            <div class="row">
          <?php if(@$atts['consultation'] && @$atts['post_count'] <= 0): ?>
              <div class="col-md-12">
                <div class="action clearfix mt30">
                  <div class="inner"> <i class="flaticon-letter text-theme-color"></i>
                    <div class="submit-btn"> <a class="btn theme-btn" href="<?= @$atts['url'];  ?>">Submit Your Request</a> </div>
                    <div class="content">
                      <h4>Get a free <span class="text-theme-color">consultation</span> </h4>
                      <p><?= @$atts['consultation'];  ?></p>
                    </div>
                  </div>
                </div>
              </div>
           <?php elseif(@$atts['post_count'] > 0):  
        if($query->have_posts()): while($query->have_posts()): $query->the_post(); global $post;
         $icon   = esc_html(get_post_meta( $post->ID, 'court_icon', true ));
           ?>
          <div class="col-sm-6 col-md-3">
            <div class="service-box style-1" style="background-image:url(<?= wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);">
              <div class="service-box-overlay"></div>
              <i class="<?= ($icon)?$icon:'flaticon-criminal'; ?>"></i>
              <div class="service-box-content">
                <h5><a href="<?= the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <a href="<?= the_permalink();  ?>">Read More</a> </div>
              <!-- service-box-content --> 
            </div>
          </div>

           <?php endwhile; endif; endif; ?>
            </div>
          </div>
        </div>
     <?php elseif(@$atts['background'] && !@$atts['column']):  ?>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h2 class="text-uppercase small-line-2 text"><?= htmlspecialchars_decode(@$atts['title']); ?></h2>
              <h4 class="mt20 mb20 text-theme-color"><?= @$atts['sub_title']; ?></h4>
              <?= @$atts['content'];  ?>
            </div>
            <div class="col-md-6">
              <?php 
              $image_alt = get_post_meta( @$atts['background'], '_wp_attachment_image_alt', true);
              ?>
              <img src="<?= wp_get_attachment_url( $atts['background'] );  ?>" class="img-responsive" alt="<?= $image_alt;  ?>">
            </div>
          </div>
        </div>
      </div>
     <?php elseif(@$atts['column'] && @$atts['column'] == 2): ?>
    <div class="container mb0 pb0 column2">
      <div class="section-content">
        <div class="row">
          <div class="col-md-6 section-title">
            <h6><?= @$atts['top_title'];  ?></h6>
            <h2 class="text-uppercase small-line-2 text"><?= htmlspecialchars_decode(@$atts['title']); ?></h2>
            <h4 class="mt20 mb20"></h4>
            <?= @$atts['content'];  ?>
          </div>
          <div class="col-md-6">
            <div class="row">
              
                <?php 
                if($query->have_posts()): while($query->have_posts()): $query->the_post(); 
                  global $post;   
                  $icon   = esc_html(get_post_meta( $post->ID, 'court_icon', true )); ?>
                <div class="col-sm-6 col-md-6">
                  <div class="service-box style-1" style="background-image:url(<?= wp_get_attachment_url( get_post_thumbnail_id( ) );  ?>);">
                    <div class="service-box-overlay"></div>
                   <i class="<?= ($icon)?$icon:'flaticon-criminal'; ?>"></i>
                    <div class="service-box-content">
                      <h5><a href="<?= the_permalink();  ?>"><?php the_title(); ?></a></h5>
                      <a href="<?= the_permalink();  ?>">Read More</a> </div>
                    <!-- service-box-content --> 
                  </div>
                </div>
              <?php endwhile; endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
     <?php else: ?>
        <div class="container pbn">
          <div class="section-content">
            <div class="row wow fadeInLeft animated">
              <div class="col-md-8 section-title">
                <h6><?= @$atts['top_title'];  ?></h6>
                <h2 class="text-uppercase small-line-2 text"> <?= htmlspecialchars_decode (@$atts['title']);  ?></h2>
                <h4 class="mt20 mb20"></h4>
                <p><?= @$atts['content'];  ?></p>
                <div class="row mt30">
                <?php 
                if(@$atts['post_count'] > 0 && $query->have_posts()): while($query->have_posts()): $query->the_post(); 
                  global $post;   
                  $icon   = esc_html(get_post_meta( $post->ID, 'court_icon', true )); ?>
                <div class="col-sm-6 col-md-4">
                  <div class="service-box style-1" style="background-image:url(<?= wp_get_attachment_url( get_post_thumbnail_id( ) );  ?>);">
                    <div class="service-box-overlay"></div>
                   <i class="<?= ($icon)?$icon:'flaticon-criminal'; ?>"></i>
                    <div class="service-box-content">
                      <h5><a href="<?= the_permalink();  ?>"><?php the_title(); ?></a></h5>
                      <a href="<?= the_permalink();  ?>">Read More</a> </div>
                    <!-- service-box-content --> 
                  </div>
                </div>
              <?php endwhile; endif; ?>
                </div>
              </div>
              <div class="col-md-4 appointment-1 mt-sm-20">
                <div class="appointment-head">
                  <h3 class="text-uppercase">free consultation</h3>
                </div>
                <div class="contact-form appointment-form p30">
                  <?= do_shortcode( '[contact-form-7 id="'.@$atts['consultant'].'" title="'.get_the_title( @$atts['consultant'] ).'"]' );  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
     <?php endif; ?>

<?php }
} // End check if class exist
?>

