<?php 
/*
* Lawzone Call to Action 
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(

    array(

        'lawzone_accordion_item' => array(
            'name'        => 'Accordion Item',
            'is_system'    => true, // Don't show as an element on list elements
            'category'    => 'Lawzone',
            'title'        => 'Lawzone Accordion Item',
            'icon'        => 'et-layers',
            'is_container' => true,
            'params'      => array(
                  array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'value'     => 'Title',
                    'type'      => 'text',
                    'description' => 'Call to Action Title',
                ),
                array(
                    'name'      => 'content',
                    'label'     => 'Content',
                    'value'     => 'Simple Text',
                    'type'      => 'textarea_html',
                    'description' => 'Accordion Text',
                ),
            )
        )
    )
);

$kc->add_map(
    array(
            'lawzone_accordion' => array(
                'name'         => 'Lawzone Accordion',
                'description'  => __( 'Accordion Tab Settings', 'KingComposer' ),
                'category'     => 'Lawzone',
                'icon'         => 'sl-notebook',
                'title'        => 'Lawzone Accordion',
                'is_container' => true,
                'params'       => array(
                    array(
                        'name'      => 'title',
                        'label'     => 'Title',
                        'value'     => 'Title',
                        'type'      => 'text',
                        'description' => 'Accordion Title',
                    ), 
                    array(
                        'name'      => 'content',
                        'label'     => 'Content',
                        'value'     => 'Simple Text',
                        'type'      => 'textarea_html',
                        'description' => 'Accordion Text',
                        )
                              
                    ),
                    'views'        => array(
                    'type'     => 'views_sections',
                    'sections' => 'lawzone_accordion_item', // this is children item was added above
                    'display'  => 'vertical'
                )

            )
    )
);



add_shortcode( 'lawzone_accordion', 'lawzone_accordion_callback' );

function lawzone_accordion_callback( $atts ){ 
   $out = '<div class="faq-default-content-area faq-content">
                        <div class="faq-default-content faq-content">
                            <div class="panel-group" id="accordion">'.do_shortcode( $atts['content'] ).'</div>
                        </div>
        </div>';

        $out .= '  
        <script>
            jQuery(document).ready(function($){
                $("div#accordion > div.panel:first-child").find(".panel-collapse").addClass("in");
                $("div#accordion > div.panel:first-child").find(".panel-heading").find("a").removeClass("collapsed").attr("aria-expanded", true);
            });
        </script>
    ';
   return $out;
}


add_shortcode( 'lawzone_accordion_item', 'lawzone_accordion_item_callback' );

function lawzone_accordion_item_callback( $atts ){ 
    ob_start();
    $output = ' <div class="panel panel-default" role="tablist">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#'. sanitize_title($atts['title']) .'" aria-expanded="false" aria-controls="'. sanitize_title($atts['title']) .'">
                                              '.@$atts['title'] .'
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="'.sanitize_title($atts['title']).'" class="panel-collapse collapse" role="tabpanel" >
                                        <div class="panel-body">
                                            <div class="panel_body_up">
                                                '.do_shortcode( $atts['content'] ).'
                                            </div>
                                        </div>
                                    </div>
                                </div>';
        return $output;


   ob_end_flush();
}




} // End check if class exist




