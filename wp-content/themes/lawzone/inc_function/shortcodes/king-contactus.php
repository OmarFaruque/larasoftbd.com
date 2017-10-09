<?php 
/*
* Lawzone Contact Us
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_contactus' => array(
            'name'        => 'Contact Us',
            'description' => __('Lawzone Contact Us', 'kingcomposer'),
            'icon'        => 'et-envelope',
            'category'    => 'Lawzone',
            'is_container' => false,

            'params' => array(
         
                array(
                    'type'          => 'text',
                    'label'         => __( 'Title', 'Lawzone' ),
                    'name'          => 'title',
                    'value'         => 'Send Us <span>Message</span>',
                    'description'   => __( 'This is text title. Leave blank if no title is needed.', 'KingComposer' ),
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'dropdown',
                    'label'         => __( 'Select Contact Form', 'KingComposer' ),
                    'name'          => 'contact_form',
                    'description'   => __( 'Select Contact Form from Contact Form 7', 'KingComposer' ),
                    'options'       => lawzone_all_posts('wpcf7_contact_form'),
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'group',
                    'label'         => __('Options', 'KingComposer'),
                    'name'          => 'options',
                    'description'   => __( 'Repeat this fields with each item created, Each item corresponding contact element.', 'KingComposer' ),
                    'options'       => array('add_text' => __('Add new Item', 'kingcomposer')),
                    'value' => base64_encode( json_encode(array(
                        "1" => array(
                            "title" => "Contact Us :",
                            "content" => "17 Downtown St, Victoria, <br/>Australia",
                            'icon' => 'icon icon-Starship'
                        ),
                        "2" => array(
                            "title" => "Call Us :",
                            "content" => "+(01) 123 456 7896 <br/> +(01) 123 456 7896",
                            'icon' => 'icon icon-Phone2'
                        ),
                        "3" => array(
                            "title" => "Web mail : ",
                            "content" => "info@yourmail.com <br/> yourwebsite.com",
                            'icon' => 'icon icon-WorldWide'
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
                            'type' => 'text',
                            'label' => __( 'Content', 'KingComposer' ),
                            'name' => 'content',
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
                    'type'          => 'toggle',
                    'label'         => __( 'Item Horizontal', 'KingComposer' ),
                    'name'          => 'horizontal',
                    'description'   => __( 'Select Horizontal / Vertical', 'KingComposer' ),
                    'value'             => 'no'
                )
                )
                )
            )
);

add_shortcode( 'lawzone_contactus', 'lawzone_contactus_callback' );

function lawzone_contactus_callback( $atts ){ 
    ob_start();
    $output = ' <section class="contact-1">
              <div class="container">
                  <div class="section-content">
                      <div class="row">';
                          
                          $output .= (!$atts['horizontal']=='yes')?'<div class="col-md-4">':'';
                          foreach($atts['options'] as $item):
                            $output .= (!$atts['horizontal']!='yes')?'<div class="col-md-4">':'';
                              $output .= '<div class="contact-item">
                                  <div class="content">
                                      <h5>'.$item->title.'</h5>
                                      <p>'.$item->content.'</p>
                                  </div>
                                  <span class="'.$item->icon.'"></span>
                              </div>';
                              $output .= (!$atts['horizontal']!='yes')?'</div>':'';
                          endforeach;
                          $output .= (!$atts['horizontal']=='yes')?'</div>':'';
                          $output .= '<div class=" col-md-8">
                              <h2>'. htmlspecialchars_decode($atts['title']).'</h2>
                                '.do_shortcode('[contact-form-7 id="'.$atts['contact_form'].'" title="' .get_the_title( $atts['contact_form'] ).  '"]').'
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

