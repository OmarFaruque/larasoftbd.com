<?php 
/*
* Lawzone Testomonial 
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_pricing' => array(
            'name'        => 'Lawzone Pricing',
            'description' => __('Lawzone Testimonials', 'kingcomposer'),
            'icon'        => 'et-pricetags',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'value'     => 'Standard Plan',
                    'type'      => 'text',
                    'description' => 'Price Item Name.',
                ),
                array(
                    'name'      => 'details',
                    'label'     => 'Details',
                    'value'     => 'Maecenas maximus sit amet neque quis accumsan. Donec tristique elementum fermentum. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
                    'type'      => 'textarea',
                    'description' => 'Price Details Description.',
                ),
				       array(
                    'name'      => 'payon',
                    'label'     => 'Pay On',
                    'type'      => 'select',
                    'value'     => 'month',
                    'options'   => array(
                      'month' => 'Month',
                      'year' => 'Year'
                      ),
                    'description' => 'Select Payment System.'
                ),
               array(
                    'name'      => 'price_in',
                    'label'     => 'Price',
                    'value'     => 70,
                    'type'      => 'number',
                    'description' => 'Put Item Price',
                ),
               array(
                    'name'      => 'currency',
                    'label'     => 'Currency Symbol',
                    'type'      => 'text',
                    'value'     => '$',
                    'description' => 'Set Currency Symbol.'
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
                ),      
            )
        )
    )
);

add_shortcode( 'lawzone_pricing', 'lawzone_pricing_callback' );

function lawzone_pricing_callback( $atts ){ 
    ob_start();

    $links = explode('|', $atts['btn-link']);

    $output = '
      <div class="price-table">
        <div class="price-content">
        <div class="price-box-price-info">
        <div class="price-box" style="background-image: url('.wp_get_attachment_url( @$atts['bg'] ).');">
        <div class="amount">
        <span class="price"> <sup>'.$atts['currency'].'</sup>'.(int)@$atts['price_in'].'</span> / '.$atts['payon'].'
        </div>
        </div>
        <div class="price-table-top">
        <h3>'.$atts['title'].'</h3>
        </div>
        <p>'.@$atts['details'].'</p>
        <a href="'.$links[0].'" class="btn btn-block theme-btn">'.$links[1].'</a>
        </div>
        </div>
      </div>';

    return $output;      
    ob_end_flush();
  }
} // End check if class exist
?>

