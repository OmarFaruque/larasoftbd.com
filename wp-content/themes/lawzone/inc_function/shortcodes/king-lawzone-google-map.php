<?php 
/*
* Lawzone Call to Action 
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzoneGoogleMap' => array(
            'name'        => 'Lawzone Google Map',
            'description' => __("Set Google Map", 'kingcomposer'),
            'icon'        => 'et-map',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'zoom',
                    'label'     => 'Map Zoom',
                    'value'     => 12,
                    'type'      => 'number',
                    'description' => 'Set Map Zoom',
                ),
                array(
                    'name'      => 'lat',
                    'label'     => 'Latitude',
                    'value'     => '-37.817085',
                    'type'      => 'text',
                    'description' => 'Map Latitude',
                ),
                array(
                    'name'      => 'lng',
                    'label'     => 'Longitude',
                    'value'     => '144.955631',
                    'type'      => 'text',
                    'description' => 'Map Longitude',
                ),
                array(
                    'name'      => 'type',
                    'label'     => 'Map Type',
                    'type'      => 'select',
                    'value'     => 'roadmap',
                    'description' => 'Select Map Type',
                    'options'   => array(
                        'roadmap' => 'Road Map', 
                        'satellite' => 'Satellite', 
                        'hybrid' => 'Hybrid', 
                        'terrain' => 'Terrain'
                    )
                ),

                array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'type'      => 'text',
                    'value'     => 'Envato',
                    'description' => 'Map Marker Title',
                ),
                array(
                    'name'      => 'address',
                    'label'     => 'Address',
                    'type'      => 'text',
                    'value'     => 'Melbourne VIC 3000, Australia',
                    'description' => 'Map Address',
                ),
                array(
                    'name'      => 'email',
                    'label'     => 'Map Email Addres',
                    'type'      => 'email',
                    'value'     => 'info@youremail.com',
                    'description' => 'Set Email Address for Map',
                ),
                array(
                    'name'      => 'height',
                    'label'     => 'Map Height',
                    'type'      => 'number',
                    'description' => 'Map Height',
                    'value'     => 500
                ),
                 array(
                    'type'          => 'attach_image',
                    'label'         => __( 'Marker Image', 'Lawzone' ),
                    'name'          => 'Marker',
                    'description'   => __( 'Select Marker Image', 'Lawzone' ),
                    'admin_label'   => true,
                )
            )
        )
    )
);

add_shortcode( 'lawzoneGoogleMap', 'lawzoneGoogleMapCallback' );

function lawzoneGoogleMapCallback( $atts ){ 
    wp_enqueue_script('google_map', get_stylesheet_directory_uri() . '/js/map-script.js', '', '1.4.11', true );
    ob_start();
     ?>
    
    <section class="map-section" style="width:100%;">
    <!--Map Container-->
        <div class="map-outer">
            <!--Map Canvas-->
            <div class="map-contact"
                data-zoom="<?= @$atts['zoom']; ?>"
                data-lat="<?= @$atts['lat']; ?>"
                data-lng="<?= @$atts['lng']; ?>"       
                data-type="<?= @$atts['type'];  ?>"
                data-hue="#ffc400"
                data-title="<?= @$atts['title']; ?>"
                data-content="<?= @$atts['address']; ?><br><a href='<?= @$atts['email'];  ?>'><?= @$atts['email'];  ?></a>",
                data-marker='<?= (@$atts['marker'])?wp_get_attachment_url( @$atts['marker'] ):get_template_directory_uri() . '/css/images/icons/map-marker.png';  ?>'              
                style="height: <?= @$atts['height'];  ?>px;">
            </div>
        </div>
    </section>
     
    <?php 
    ob_end_flush();
  }
} // End check if class exist
?>

