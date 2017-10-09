<?php 
/*
* Lawzone Contact Us
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzoneCounter' => array(
            'name'        => 'Lawzone Counter',
            'description' => __('Lawzone Counter Items', 'kingcomposer'),
            'icon'        => 'sl-options',
            'category'    => 'Lawzone',
            'is_container' => false,

            'params' => array(
         
                array(
                    'type'          => 'attach_image',
                    'label'         => __( 'Background Image', 'KingComposer' ),
                    'name'          => 'background',
                    'description'   => __( 'Section Background Image', 'KingComposer' ),
                    'admin_label'   => true,
                ),
                array(
                    'name'      => 'overlayer',
                    'label'     => 'Over Layer',
                    'type'      => 'select',
                    'value'     => 'default-overlay',
                    'options'   => array(
                      'default-overlay' => 'Overlayer Default',
                      'overlayer-black' => 'Overlayer Black',
                      'overlayer-white' => 'Overlayer White'
                      ),
                    'description' => 'Select Section Overlayer.'
                ),
                array(
                    'type'          => 'group',
                    'label'         => __('Items', 'KingComposer'),
                    'name'          => 'options',
                    'description'   => __( 'Repeat this fields with each item created, Each item corresponding contact element.', 'KingComposer' ),
                    'options'       => array('add_text' => __('Add new Item', 'kingcomposer')),
                    'value' => base64_encode( json_encode(array(
                        "1" => array(
                            "title" => "Professional Lawyer",
                            'icon' => 'flaticon-portfolio',
                            "amount" => 319,
                        ),
                        "2" => array(
                            "title" => "Our Clicens",
                            'icon' => 'flaticon-libra',
                            "amount" => 3199,
                        ),
                        "3" => array(
                            "title" => "Sucess Cases",
                            'icon' => 'flaticon-courthouse',
                            "amount" => 2937,
                        ),
                        "4" => array(
                            "title" => "Running Cases",
                            'icon' => 'flaticon-gavel',
                            "amount" => 262,
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
                            'type' => 'icon_picker',
                            'label' => __( 'Icon', 'KingComposer' ),
                            'name' => 'icon',
                            'description' => __( 'Item Icon', 'KingComposer' ),
                        ),
                        array(
                            'type' => 'number_slider',  // USAGE RADIO TYPE
                            'options' => array(    // REQUIRED
                              'min' => 0,
                              'max' => 100000,
                              'show_input' => true
                            ),
                            'label' => __( 'Item Amount', 'KingComposer' ),
                            'name' => 'amount',
                            'description' => __( 'Set Item Amount', 'KingComposer' ),
                            'admin_label' => true
                        )
                    )
                ) /*End Group field*/
                )
                )
            )
);

add_shortcode( 'lawzoneCounter', 'lawzoneCounterCallback' );

function lawzoneCounterCallback( $atts ){ 
    ob_start(); ?>
     <section style="width:100%;" class="fact-counter style-two overlayer <?= $atts['overlayer'];  ?> parallax text-center" 
   data-bg-image="<?= ($atts['background'])?wp_get_attachment_url( $atts['background'] ): get_template_directory_uri() . '/css/images/bg/bg1.jpg'; ?>">
    <div class="container">
      <div class="row fun-fact">

      <?php foreach($atts['options'] as $item): ?>
        <div class="col-md-3 col-sm-6 col-xs-12 counter-column wow fadeIn">
          <div class="cs-counter-col">
            <div class="cs-number-count"> <i class="<?= $item->icon;  ?>"></i>
              <div class="count-outer"><span class="counter count count-text" data-count="<?= $item->amount;  ?>">00</span></div>
              <div class="text">
                <h3><?= $item->title;  ?></h3>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
      <!-- end fun-fact --> 
    </div>
  </section>
  <?php
    ob_end_flush();
  }
} // End check if class exist
?>

