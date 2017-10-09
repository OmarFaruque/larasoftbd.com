<?php 
/*
* Lawzone Call to Action 
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_who_we_are' => array(
            'name'        => 'Who We Are',
            'description' => __("Lawzone Slider's", 'kingcomposer'),
            'icon'        => 'et-pictures',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'top_title',
                    'label'     => 'Top Title',
                    'value'     => 'WE BELIVE JUSTUCE',
                    'type'      => 'text',
                    'description' => 'Top small title',
                ),
                array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'value'     => 'Who we are',
                    'type'      => 'text',
                    'description' => 'Title / Second Title if active contact Form',
                ),
                array(
                    'name'      => 'description',
                    'label'     => 'Content',
                    'value'     => 'Consectetur adipisicing elit. Eius reprehenderit modi minima, facilis, quis atque fugit? Quasi culpa, doloremque dicta.Vivamus pellentesque hendrerit erat, sit amet dictum nibh viverra iaculis.',
                    'type'      => 'textarea',
                    'description' => 'Content',
                ),
                array(
                    'name'      => 'post_type',
                    'label'     => 'Post Type',
                    'value'     => 'court',
                    'type'      => 'select',
                    'description' => 'Select Post Type to show',
                    'options'   => lawzone_all_post_types()
                ),
                array(
                    'name'      => 'bg',
                    'label'     => 'Background Image',
                    'type'      => 'attach_image',
                    'description' => 'Left Background Image',
                ),
                array(
                    'name'      => 'overlayer_title',
                    'label'     => 'Overlayer Title',
                    'type'      => 'text',
                    'description' => 'Left Image Overlayer Title',
                ),
                array(
                    'name'      => 'overlayer_url',
                    'label'     => 'Overlayer url',
                    'type'      => 'link',
                    'description' => 'Set Overlayer URL',
                ),
                array(
                    'name'      => 'active_contact',
                    'label'     => 'Active Contact Form',
                    'type'      => 'toggle',
                    'value'     => 'no',
                    'description' => 'Active Contact Form and hide post content from right side.',
                ),
                array(
                    'name'      => 'contact_form',
                    'label'     => 'Contact Form',
                    'type'      => 'select',
                    'description' => 'Select Contact Form from existing contact form.',
                    'options'   => lawzone_all_posts('wpcf7_contact_form')
                )

            )
        )
    )
);

add_shortcode( 'lawzone_who_we_are', 'lawzone_who_we_are_callback' );

function lawzone_who_we_are_callback( $atts ){ 
    ob_start();

      $args = array(
        //Type & Status Parameters
        'post_type'   => $atts['post_type'],
        'post_status' => 'publish',
        //Order & Orderby Parameters
        'order'               => 'ASC',
        'orderby'             => 'date',
      );
    
    $query = new WP_Query( $args );
    $imgClass = (!@$atts['overlayer_title'])?'image1':'image3 style-2';
    $bgImg = ($atts['bg'])? wp_get_attachment_url( $atts['bg'] ): get_site_url() . '/wp-content/themes/lawzone/css/images/bg/bg3.jpg';
?>
  <section class="who-we-are">
    <div style="background-image: url(<?= $bgImg;  ?>)" class="left-side <?= $imgClass;  ?>">

        <?php if(@$atts['overlayer_title']):  
        $link = explode('|', $atts['overlayer_url']);
        ?>
        <div class="row">
          <div class="col-md-6 col-md-offset-4">
            <h2 class="txt-color-white"><?=  @$atts['overlayer_title'];  ?></h2>
            <a href="<?= $link[0]; ?>" class="btn theme-btn mt10"><?= $link[1];  ?></a>
          </div>
        </div>
        <?php endif; ?>

    </div>
    <!-- end left-side -->
    <div class="right-side">
      <div class="content-inner">
        <?php if($atts['active_contact'] != 'yes'): ?>
        <div class="section-title"> <span class="sub-title"><?= $atts['top_title'];  ?></span>
          <h2><?= $atts['title'];  ?></h2>
        </div>
        <!-- end section title -->
        <p><?= $atts['description'];  ?></p>

        <?php if($query->have_posts()): 
            while($query->have_posts()): $query->the_post(); global $post;
            $icon = get_post_meta( $post->ID, 'court_icon', true ); ?>
        <div class="col-md-6">
          <div class="service-item effect-border mbn">
            <?=  ($icon)?'<div class="box-icon"> <i class="'.$icon.'"></i> </div>':''; ?>
            <h5><a href="<?= get_the_permalink();  ?>"><?= get_the_title();  ?></a></h5>
            <p><?= get_the_excerpt();  ?></p>
            <a href="<?= get_the_permalink();  ?>" class="btn theme-btn mt10">Read more</a> </div>
        </div>
        <?php endwhile; endif; wp_reset_query(); ?>
        <?php else: ?>
            <!-- Contact Form -->
          <div class="appointment-head">
            <h3 class="text-uppercase"><?= $atts['top_title'];  ?></h3>
            <h5 class="text-uppercase"><?= $atts['title'];  ?></h5>
          </div>
          <div class="appointment-form p30">
            <div class="frm-register">
            <?= ($atts['contact_form'])? do_shortcode( '[contact-form-7 id="'.$atts['contact_form'].'" title="'. get_the_title($atts['contact_form']) .'"]' ) :''?>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <!-- end content-inner --> 
    </div>
    <!-- end left-side --> 
  </section>
    <?php ob_end_flush();
  }
} // End check if class exist
?>

