<?php 
/*
* Under Construction
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'underconstruction_call_back' => array(
            'name'        => 'Lawzone Under Construction',
            'description' => __('Under construction Content, Please set under construction active from your theme option & mark this page as a under construction page.', 'kingcomposer'),
            'icon'        => 'cpicon kc-icon-creative-button',
            'category'    => 'Lawzone',
            'is_container' => false,

            'params'      => array(
                array(
                    'name'      => 'content',
                    'label' 	=> 'Content',
                    'value' 	=> 'Sorry.... We are improving and fixing problems of our website. We will be back very soon....',
                    'type'  	=> 'textarea',
                    'description' => 'Under Construction page message to client.',
                ), 
                array(
                    'name'      => 'mobile',
                    'label'   => 'Call Us',
                    'value'   => 'Call Us: +(012) 345 6789 for Emergency',
                    'type'    => 'text',
                    'description' => 'Set Mobile / Phone Number for evergency call.',
                ),
                array(
                    'name' => 'bg',
                    'label' => 'Upload Background',
                    'type' => 'attach_image',
                    'admin_label' => true,
                    'description' => 'Pralax body background.',
                ),
                 array(
                    'name'      => 'overlayer',
                    'label'     => 'Over Layer',
                    'type'      => 'select',
                    'value'     => 'default-overlay',
                    'options'   => array(
                      'default-overlay' => 'Overlayer Default',
                      'overlayer-black' => 'Overlayer Black'
                      ),
                    'description' => 'Select Section Overlayer.'
                )            
            )
        )
    )
);



add_shortcode( 'underconstruction_call_back', 'underconstruction_PHP_Function' );

function underconstruction_PHP_Function( $atts ){ 

    //
    // Widget display logic goes here
     ?>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center txt-color-white pt100 pb100">
            <h1 class="text-theme-color error-font"><?php the_title(); ?></h1>
            <h3><?= @$atts['content'];  ?></h3>
            <h4 class="text-theme-color mt20"><?= @$atts['mobile']; ?></h4>
            <!--<a class="btn theme-btn mt30" href="index.html">Back home Page</a> -->
          </div>
        </div>
      </div>
    </section>

    <script type="text/javascript">
      jQuery(document).ready(function($){
         $('body').addClass('theme-green style-two overlayer <?= @$atts['overlayer'];  ?> parallax pt100 pb100 bg-img fullScreen');
         $('body').attr('data-bg-image', '<?= wp_get_attachment_url($atts['bg']); ?>' );
         $("header.main-header, section.overlay.parallax, footer.main-footer").remove();
      });
    </script>
    

<?php }
} // End check if class exist
?>

