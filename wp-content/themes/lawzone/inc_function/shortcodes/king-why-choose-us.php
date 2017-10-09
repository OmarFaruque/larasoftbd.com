<?php 
/*
* Lawzone Contact Us
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzoneWhyChooseUs' => array(
            'name'        => 'Why Choose Us',
            'description' => __('Lawzone Why Choose Us', 'kingcomposer'),
            'icon'        => 'et-happy',
            'category'    => 'Lawzone',
            'is_container' => false,

            'params' => array(
                array(
                    'type'          => 'text',
                    'label'         => __( 'Top Title', 'KingComposer' ),
                    'name'          => 'top_title',
                    'value'         => 'WE CARE ABOUT Clients',
                    'description'   => __( 'Top title.', 'KingComposer' ),
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'text',
                    'label'         => __( 'Title', 'KingComposer' ),
                    'name'          => 'title',
                    'value'         => 'Why  <span> Choose us</span>',
                    'description'   => __( 'Main Title.', 'KingComposer' ),
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'textarea',
                    'label'         => __( 'Content', 'KingComposer' ),
                    'name'          => 'description',
                    'value'         => 'Sed malesuada nunc sit amet quam hendrerit, mollis vulputate risus tristique. Quisque dapibus eros et dolor accumsan, sit amet interdum tortor imperdiet.',
                    'description'   => __( 'Content / Description.', 'KingComposer' ),
                    'admin_label'   => true,
                ),

                array(
                    'type'          => 'group',
                    'label'         => __('Items', 'KingComposer'),
                    'name'          => 'options',
                    'description'   => __( 'Repeat this fields with each item created, Each item corresponding contact element.', 'KingComposer' ),
                    'options'       => array('add_text' => __('Add new Item', 'kingcomposer')),
                    'value' => base64_encode( json_encode(array(
                        "1" => array(
                            "title" => "Get Legal Advice",
                            "description" => "Mega was designed by our best designers with latest trends and technology.",
                            'icon' => 'flaticon-gavel'
                        ),
                        "2" => array(
                            "title" => "Expert Lawyers",
                            "description" => "Mega was designed by our best designers with latest trends and technology.",
                            'icon' => 'flaticon-lawyer'
                        ),
                        "3" => array(
                            "title" => "Case Investigation",
                            "description" => "Mega was designed by our best designers with latest trends and technology.",
                            'icon' => 'flaticon-footprint'
                        )
                    ) ) ),
                    'params' => array(
                        array(
                            'type' => 'text',
                            'label' => __( 'Title', 'KingComposer' ),
                            'name' => 'title',
                            'description' => __( 'Enter your title.', 'KingComposer' ),
                            'admin_label' => true,
                        ),
                        array(
                            'type' => 'textarea',
                            'label' => __( 'Content', 'KingComposer' ),
                            'name' => 'description',
                            'description' => __( 'Enter text / Description / Content.', 'KingComposer' ),
                            'admin_label' => true,
                        ),
                        array(
                            'type' => 'icon_picker',
                            'label' => __( 'Icon', 'KingComposer' ),
                            'name' => 'icon',
                            'description' => __( 'Item Icon', 'KingComposer' ),
                        )
                    )
                ),
                array(
                    'type'          => 'attach_image',
                    'label'         => __( 'Background Image', 'KingComposer' ),
                    'name'          => 'background',
                    'description'   => __( 'Section Background Image', 'KingComposer' ),
                    'admin_label'   => true,
                ),
                  array(
                    'type'          => 'text',
                    'label'         => __( 'Free consultation Title', 'KingComposer' ),
                    'name'          => 'counsultation_title',
                    'value'         => 'Get a free <span>consultation</span>',
                    'description'   => __( 'Free Consultation Title.', 'KingComposer' ),
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'textarea',
                    'label'         => __( 'Free Consultation Content', 'KingComposer' ),
                    'name'          => 'consul_desc',
                    'value'         => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'description'   => __( 'Free Consultation Content / Description.', 'KingComposer' ),
                    'admin_label'   => true,
                ),
                array(
                    'name' => 'contact_link',
                    'label' => 'Contact Page Link',
                    'type' => 'link',
                    'value' => '#|Submit Your Request|#', // remove this if you do not need a default content
                    'description' => 'Select Contact Page URL',
                )
            )
        )
    )
);

add_shortcode( 'lawzoneWhyChooseUs', 'lawzoneWhyChooseUsCallback' );

function lawzoneWhyChooseUsCallback( $atts ){ 
    ob_start();
    $links = explode('|', $atts['contact_link']); 

    $output = ' <section class="our-department">
                     <div class="pbn">
            <div class="section-title">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                  <h6>'.$atts['top_title'].'</h6>
                  <h2>'.htmlspecialchars_decode($atts['title']).'</h2>
                  <p>'.$atts['description'].'</p>
                </div>
              </div>
            </div>
            <div class="section-wrap">
              <div class="row"> 
                <!--Column-->
                <div class="col-md-5">';
                if($atts['background']):
                  $output .= '<img src="'.wp_get_attachment_url( $atts['background'] ).'" class="img-responsive" alt="">';
                endif;
                $output .='</div>
                <div class="col-md-6 col-md-offset-1">';
                  
                foreach($atts['options'] as $item ): 
                  $output .='<div class="choose-item">
                    <div class="icon-holder">
                      <i class="'.$item->icon.'"></i>
                    </div>
                    <div class="icon-detail icon-box-image-detail">
                          <div class="icon-box-title">
                            <h4>'.$item->title.'</h4>
                          </div>
                          <div class="icon-box-detail">
                            <p>'.$item->description.'</p>
                          </div>
                    </div>
                  </div>';
                endforeach;
                $output .='</div>
              </div>
            </div>
          </div>
    </section>';
    $output .='  <section class="choose">
    <div class="container ptn">
      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <div class="action clearfix mt30">
              <div class="inner"> <i class="flaticon-letter text-theme-color"></i>
                <div class="submit-btn"> <a class="btn theme-btn" href="'.$links[0].'">'.$links[1].'</a> </div>
                <div class="content">
                  <h4>'.htmlspecialchars_decode($atts['counsultation_title']).'</h4>
                  <p>'.$atts['consul_desc'].'</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>';

    return $output;      
    ob_end_flush();
  }
} // End check if class exist
?>

