<?php 
/*
* Lawzone Call to Action 
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_slider' => array(
            'name'        => 'Lawzone Slider',
            'description' => __("Lawzone Slider's", 'kingcomposer'),
            'icon'        => 'et-pictures',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(
                array(
                    'name'      => 'slider',
                    'label'     => 'Select Slider',
                    'value'     => 'main-slider',
                    'type'      => 'select',
                    'description' => 'Select Slider Type',
                    'options'   => array(
                        'main-slider'    => 'Rev Slider', 
                        'home-owl-carousel'  => 'Owl Carousel',
                        'bx-slider'     => 'BX Slider',
                        'flex-slider'   => 'Flex Slider',
                        'nivo-slider'   => 'Nivo Slider',
                        'swiper-slider' => 'Swiper Slider',
                    ),
                    'relation' => array(
                            'parent'    => 'active_video',
                            'hide_when' => 'yes'
                    )
                ),
                array(
                    'name'      => 'active_video',
                    'label'     => 'Active Video Slider',
                    'value'     => 'no',
                    'type'      => 'toggle',
                    'description' => 'Active Video Slider & Off Image Slider.'  
                ),   
                array(
                    'name'     => 'url',
                    'label'    => 'Youtube Video Url',
                    'type'     => 'text',
                    'value'    => 'https://www.youtube.com/watch?v=czIAdDKolLE', 
                    'description' => 'Add youtube video url.',
                    'relation' => array(
                        'parent'    => 'active_video',
                        'show_when' => 'yes'
                    )
                ),
                array(
                    'name'     => 'title',
                    'label'    => 'Title',
                    'type'     => 'text',
                    'value'    => 'We can help you in <span><br>every matter</span>',
                    'description' => 'Add Video Title',
                    'relation' => array(
                        'parent'    => 'active_video',
                        'show_when' => 'yes'
                    )
                ),
                array(
                    'name'     => 'title2',
                    'label'    => 'Title 2',
                    'type'     => 'text',
                    'value'    => 'we providing best service for 20+ years',
                    'description' => 'Add title 2',
                    'relation' => array(
                        'parent'    => 'active_video',
                        'show_when' => 'yes'
                    )
                ),



                array(
                    'name'      => 'active_parallax',
                    'label'     => 'Active parallax Background',
                    'value'     => 'no',
                    'type'      => 'toggle',
                    'description' => 'Active Parallax Slider & Off Image, video Slider.'  
                ),   
                array(
                    'name'      => 'ptitle',
                    'label'     => 'Title',
                    'value'     => 'Senior Defence Lawyer <br> <span>Jenifer Willinger</span>',
                    'type'      => 'text',
                    'description' => 'Title',
                    'relation' => array(
                        'parent'    => 'active_parallax',
                        'show_when' => 'yes'
                    )
                ),
                array(
                    'name'      => 'psub_title',
                    'label'     => 'Sub Title',
                    'value'     => 'Call : +321 589 2369',
                    'type'      => 'text',
                    'description' => 'Sub title',
                    'relation' => array(
                        'parent'    => 'active_parallax',
                        'show_when' => 'yes'
                    )
                ),
               array(
                    'name'      => 'pbg',
                    'label'     => 'Background',
                    'type'      => 'attach_image',
                    'description' => 'Sub title',
                    'relation' => array(
                        'parent'    => 'active_parallax',
                        'show_when' => 'yes'
                    )
                ),
                array(
                    'name'      => 'plink',
                    'label'     => 'Button Link',
                    'type'      => 'link',
                    'description' => 'Add Button Text And Link',
                    'value'     => '#|MAKE AN APPOINTMENT|#',
                    'relation' => array(
                        'parent'    => 'active_parallax',
                        'show_when' => 'yes'
                    )
                ),






                array(
                    'name'      => 'active_type',
                    'label'     => 'Active Type Writer',
                    'value'     => 'no',
                    'type'      => 'toggle',
                    'description' => 'Active Type Writer Slider & Off Image, video Slider & Parallax.'  
                ),   
                array(
                    'name'      => 'items',
                    'label'     => 'Content',
                    'value'     => 'We are a Group of Young Attorneys;We are professoinal.;Welcome to lawzone.;Emergency services.',
                    'type'      => 'textarea',
                    'description' => 'Seperate with (;)',
                    'relation' => array(
                        'parent'    => 'active_type',
                        'show_when' => 'yes'
                    )
                ),
                array(
                    'name'      => 'toverlayer',
                    'label'     => 'Over Layer',
                    'type'      => 'select',
                    'value'     => 'default-overlay',
                    'options'   => array(
                      'default-overlay' => 'Overlayer Default',
                      'overlayer-black' => 'Overlayer Black'
                      ),
                    'description' => 'Select Section Overlayer.',
                    'relation' => array(
                        'parent'    => 'active_type',
                        'show_when' => 'yes'
                    )
                ),
               array(
                    'name'      => 'tbg',
                    'label'     => 'Background',
                    'type'      => 'attach_image',
                    'description' => 'Background',
                    'relation' => array(
                        'parent'    => 'active_type',
                        'show_when' => 'yes'
                    )
                ),



            )
        )
    )
);

add_shortcode( 'lawzone_slider', 'lawzone_slider_callback' );

function lawzone_slider_callback( $atts ){ 
    ob_start();
    if($atts['active_video'] != 'yes' && $atts['active_parallax'] != 'yes' && $atts['active_type'] != 'yes' ):
        get_template_part( 'inc_part/sliders/' . $atts['slider'], null );    
    elseif($atts['active_video'] == 'yes'): 
    ?>
    <section style="width:100%;" class="content-section video-section">
     <div class="pattern-overlay">
        <a id="bgndVideo" class="player" data-property="{videoURL:'<?= $atts['url'];  ?>',containment:'.video-section', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="text-uppercase"><?= htmlspecialchars_decode($atts['title']);  ?></h1>  
              <h3><?= $atts['title2'];  ?></h3>
            </div>
          </div>
        </div>
      </div>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $(".player").mb_YTPlayer();

      });
      </script>
    </section>
    <?php elseif($atts['active_parallax'] == 'yes'): $links = explode('|', $atts['plink']);
    ?>
        <section style="width: 100%;" class="style-two overlayer default-overlay parallax verstion pt200 pb200 personal-info" data-bg-image="<?= ($atts['pbg'])?wp_get_attachment_url( @$atts['pbg'] ):get_template_directory_uri() . '/css/images/about/3.jpg'; ?>">
            <div class="container pt100 pb100">
              <div class="row">
               <div class="col-md-8 col-sm-6 <?= ($layout == 'box')?'col-sm-offset-1':'';  ?> txt-color-white text-uppercase">
                <h1><?= htmlspecialchars_decode($atts['ptitle']);  ?></h1>
                <h3><?= $atts['psub_title'];  ?></h3>
                <a href="<?= @$links[0];  ?>" class="btn theme-btn mt20"><?= $links[1];  ?><i class="fa fa-arrow-circle-right"></i></a>
               </div>
             </div>
        </section>
    <?php else: ?>
        <section style="width:100%;" class="style-two overlayer <?= @$atts['toverlayer'];  ?> parallax" data-bg-image="<?= (@$atts['tbg'])?wp_get_attachment_url( @$atts['tbg'] ): get_template_directory_uri() . '/css/images/bg/bg6.jpg'; ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center txt-color-white text-uppercase">
              <div class="typing-slider">
               <h1>
               <?php 
                $final = array();
                $imps = explode(';', @$atts['items']);
                foreach($imps as $sim){
                  array_push($final, '"'.ltrim($sim).'"');
                }
               ?>
                <a href="" class="typewrite txt-color-white" data-period="<?= @$instance['period']; ?>" data-type='[ <?= implode(',', $final);  ?> ]'>
                  <span class="wrap"></span>
                </a>
              </h1>  
            </div>
          </div>
        </div>
      </section>
      <script src="<?= get_template_directory_uri() . '/js/typed.js?ver=91.2.2'; ?>" type="text/javascript" charset="utf-8" async defer></script>
    <?php endif;
    ob_end_flush();
  }
} // End check if class exist
?>

