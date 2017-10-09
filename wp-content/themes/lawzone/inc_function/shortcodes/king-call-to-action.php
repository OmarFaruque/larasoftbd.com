<?php 
/*
* Lawzone Call to Action 
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_calltoaction' => array(
            'name'        => 'Call to Action',
            'description' => __('Lawzone Call to Action', 'kingcomposer'),
            'icon'        => 'et-layers',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'value'     => 'Working Hours',
                    'type'      => 'text',
                    'description' => 'Call to Action Title',
                ),
                array(
                    'name'      => 'content',
                    'label'     => 'Content',
                    'value'     => '<ul>
                            <li><span>Monday - Friday</span> <span>9am - 10pm</span></li>
                            <li><span>Sunday</span> <span>Closed</span></li>
                            <li><span>Saturday</span> <span>Closed</span></li>
                          </ul>',
                    'type'      => 'textarea_html',
                    'description' => 'Html content.',
                ),
				array(
                    'name'      => 'icon',
                    'label'     => 'Icon',
                    'type'      => 'icon_picker',
                    'value'     => 'icon icon-Time',
                    'description' => 'Select Icon.'
                ),
                array(
                    'name' => 'bg',
                    'label' => 'Upload Background',
                    'type' => 'attach_image',
                    'admin_label' => true,
                ),
                array(
                    'name' => 'btn-link',
                    'label' => 'Link',
                    'type' => 'link',
                    'value' => 'link|caption|target',
                    'description' => 'Price Button Text & Link',
                )      
            )
        )
    )
);

add_shortcode( 'lawzone_calltoaction', 'lawzone_calltoaction_callback' );

function lawzone_calltoaction_callback( $atts ){ 
    ob_start();


    $links = explode('|', $atts['btn-link']);
    
    $output = '<div class="row"><div class="call-to-action-corner-1" style="background-image: url( '.wp_get_attachment_url( $atts['bg'] ).'">
              <div class="single-call-to-action">
                <div class="icon-box">
                  <div class="inner-box"> <i class=" '.@$atts['icon'].' "></i> </div>
                </div>
                <div class="content-box">
                  <h3>'.$atts['title'].'</h3>
                  <p>' . $atts['content']. '</p>
                </div>
              </div>
            </div></div>';

    return $output;      
    ob_end_flush();
  }
} // End check if class exist
?>

