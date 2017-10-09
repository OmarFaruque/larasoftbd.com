<?php 
/*
* KingComposer Wellcome zone
*/




include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;


$kc->add_map(
    array(
        'lawzone_request_a_call_back' => array(
            'name'        => 'Request a Call Back',
            'description' => __('Request a call back, Working Hours and Contact Form 7', 'kingcomposer'),
            'icon'        => 'cpicon sl-paper-plane',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(
                array(
                    'name'      => 'title',
                    'label' 	=> 'Title',
                    'value' 	=> 'REQUEST A CALLBACK',
                    'type'  	=> 'text',
                    'description' => 'Request a call back main title.',
                ),          
                array(
                    'name'      => 'content',
                    'label'     => 'Description',
                    'value'     => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum vitae, minima adipisci possimus quos perspiciatis sequi suscipit ipsa et sit eveniet in aliquam, esse repellendus, mollitia itaque reprehenderit voluptatem eaque! Consequuntur maxime, aut veritatis expedita ipsum voluptatum nihil placeat, dolorem!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum vitae, minima adipisci possimus quos perspiciatis sequi suscipit ipsa et sit eveniet in aliquam, esse repellendus, mollitia itaque reprehenderit voluptatem eaque! Consequuntur maxime, aut veritatis expedita ipsum voluptatum nihil placeat, dolorem! <br/>
                    <div class="content-box mt20">
                      <h3>Working Hours</h3>
                      <ul>
                        <li><span>Monday - Friday</span> <span>9am - 10pm</span></li>
                        <li><span>Sunday</span> <span>Closed</span></li>
                        <li><span>Saturday</span> <span>Closed</span></li>
                      </ul>
                    </div>',
                    'type'      => 'textarea_html',
                    'description' => 'Main Content for Request a callback.',
                ),

                array(
                    'name'      => 'consultant',
                    'label'     => 'Appointment Contact Form (Contact Form 7)',
                    'type'      => 'select',
                    'value'     => '',
                    'options'   => lawzone_all_posts('wpcf7_contact_form'),
                    'description' => 'Select Contact Form from Contact Form 7.'
                )
            )
        )
    )
);



add_shortcode( 'lawzone_request_a_call_back', 'lawzone_request_a_call_back_PHP_Function' );

function lawzone_request_a_call_back_PHP_Function( $atts ){ 

    //
    // Widget display logic goes here
     ?>
        <div class="container mt0 pt0">
          <div class="section-content">
            <div class="row">
              <div class="col-md-7">
                <h3 class="small-line-2 mb20"><?= @$atts['title']; ?></h3>
                <?= @$atts['content']; ?>
              </div>
              <div class="col-md-5">
                  <div class="appointment-head">
                    <h3 class="text-uppercase">MAKE AN APPOINTMENT</h3>
                  </div>
                  <div class="appointment-form p30">
                    <div class="frm-register">
                    <?= (@$atts['consultant'])? do_shortcode( '[contact-form-7 id="'.$atts['consultant'].'" title="'. get_the_title($atts['consultant']) .'"]' ) :''?>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    

<?php }
} // End check if class exist
?>

