<?php 
/*
* Legal Memorandum 
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lebal_memorandum' => array(
            'name'        => 'Legal Memorandum',
            'description' => __('The Legal Memorandum with contact Form button', 'kingcomposer'),
            'icon'        => 'cpicon sl-paper-plane',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'content',
                    'label'     => 'Description',
                    'value'     => 'The legal memorandum is the most common type of predictive legal analysis; it may include the <span class="text-theme-color">client letter or legal opinion</span>.',
                    'type'      => 'textarea_html',
                    'description' => 'The legal memorandum text.',
                ),
				array(
                    'name'      => 'url',
                    'label' 	=> 'URL',
                    'type'      => 'select',
                    'value'     => '',
                    'options'   => lawzone_all_posts('page'),
                    'description' => 'Select Button Target page.'
                ),   
                array(
                    'name'      => 'overlayer',
                    'label' 	=> 'Over Layer',
                    'type'      => 'select',
                    'value'     => 'default-overlay',
                    'options'   => array(
                    	'default-overlay' => 'Overlayer Default',
                    	'overlayer-black' => 'Overlayer Black'
                    	),
                    'description' => 'Select Section Overlayer.'
                ),
                array(
                    'name' => 'bg',
                    'label' => 'Upload Background',
                    'type' => 'attach_image',
                    'admin_label' => true,
                )   
            )
        )
    )
);

add_shortcode( 'lebal_memorandum', 'lebal_memorandum_callback' );

function lebal_memorandum_callback( $atts ){ 
    //
    // Widget display logic goes her
     ?>
       <section id="lebal_memorandum" class="style-two overlayer <?= @$atts['overlayer'];  ?> parallax" data-bg-image="<?= (@$atts['bg'])?wp_get_attachment_url( @$atts['bg'] ):get_template_directory_uri() . '/css/images/bg/bg6.jpg'; ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center txt-color-white text-uppercase">
              <h3><?= $atts['content']; ?></h3>
              <a href="<?= get_the_permalink( $atts['url'], false );  ?>" class="btn theme-btn mt20">Contact Us</a> </div>
          </div>
        </div>
      </section>
<?php }
} // End check if class exist
?>

