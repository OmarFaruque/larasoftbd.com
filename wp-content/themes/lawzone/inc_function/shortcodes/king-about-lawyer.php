<?php 
/*
* Lawzone Contact Us
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzoneAboutLawyer' => array(
            'name'        => 'About Lawyer',
            'description' => __('Lawzone About the Lawyer', 'kingcomposer'),
            'icon'        => 'et-megaphone',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params' => array(
         
                array(
                    'type'          => 'text',
                    'label'         => __( 'Title', 'Lawzone' ),
                    'name'          => 'title',
                    'description'   => __( 'This is title. Leave blank if no title is needed.', 'Lawzone' ),
                    'value'         => 'About <br> <span> The Lawyer </span>',
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'text',
                    'label'         => __( 'Sub Title', 'Lawzone' ),
                    'name'          => 'sub_title',
                    'description'   => __( 'This is sub title. Leave blank if no title is needed.', 'Lawzone' ),
                    'value'         => 'Perferendis repudiandae nostrum quibusdam.',
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'textarea',
                    'label'         => __( 'Description', 'Lawzone' ),
                    'name'          => 'description',
                    'description'   => __( 'Description', 'Lawzone' ),
                    'value'         => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, corrupti, fugit. Temporibus nostrum nam deleniti vitae accusantium iste sunt facilis, quisquam eveniet reiciendis corporis, veniam nulla. Provident tempora perspiciatis quod commodi iure neque eaque quos, consequuntur expedita dolorem dicta dignissimos.',
                    'admin_label'   => true,
                ),
                 array(
                    'type'          => 'text',
                    'label'         => __( 'Name', 'Lawzone' ),
                    'name'          => 'name',
                    'description'   => __( 'This is Lawyer Name field. Leave blank if no name is needed.', 'Lawzone' ),
                    'value'         => 'Jenifer Willinger',
                    'admin_label'   => true,
                ),
                array(
                    'type'          => 'text',
                    'label'         => __( 'designation', 'Lawzone' ),
                    'name'          => 'designation',
                    'description'   => __( 'This is Lawyer Designation. Leave blank if no designation is needed.', 'Lawzone' ),
                    'value'         => 'Personal lawyer / Law Officer, Webaashi',
                    'admin_label'   => true,
                ),
                array(
                    'name' => 'content',  // the name must be 'content'
                    'label' => 'Cotnent',

                    'type' => 'textarea_html',  // USAGE TEXTAREA_HTML TYPE
                    'value' => '  <h4 class="small-line pt20 mb20">About Education</h4>
                      <ul class="styled-list">
                        <li><strong>University of Oxford School of Law, J.D., 1968 -</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam nihil earum et quod ipsam natus sit est, quia consequuntur obcaecati distinctio, similique voluptatem nemo, tempora consequatur nostrum, ratione doloremque quasi.<br></li>
                        <li><strong>University of Oxford, BA., 1965 -</strong>Consectetur adipisicing elit. Sapiente nisi, eum ab officia vitae cum et, iste adipisci accusamus sed asperiores nulla aspernatur delectus consectetur velit non praesentium, autem ratione!</li>      
                      </ul>
                      <h4 class="small-line pt20 mb20">Bar Admissions</h4>
                      <ul class="styled-list">
                      <li><strong>Phasellus felis odio -</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam nihil earum et quod ipsam natus sit est, quia consequuntur obcaecati distinctio, similique voluptatem nemo, tempora consequatur nostrum, ratione doloremque quasi.<br></li>
                      <li><strong>Quia consequuntur -</strong>Consectetur adipisicing elit. Sapiente nisi, eum ab officia vitae cum et, iste adipisci accusamus sed asperiores nulla aspernatur delectus consectetur velit non praesentium, autem ratione!</li>      
                    </ul>', // remove this if you do not need a default content 
                    'description' => 'Details Content for Lawyer like About Education and Bar Admissions.'
                  ),
                array(
                    'type'          => 'group',
                    'label'         => __('Options', 'KingComposer'),
                    'name'          => 'options',
                    'description'   => __( 'Repeat this fields with each item created, Each item corresponding contact element.', 'KingComposer' ),
                    'options'       => array('add_text' => __('Add new Item', 'kingcomposer')),
                    'value' => base64_encode( json_encode(array(
                        "1" => array(
                            'icon' => 'icofont icofont-investigation',
                            'link' => '#|Investigation|#'
                        ),
                        "2" => array(
                            'icon' => 'icofont icofont-court-hammer',
                            'link' => '#|Legal Proceeding|#',
                        )
                    ) ) ),
                    'params' => array(
                        array(
                            'type' => 'icon_picker',
                            'label' => __( 'Icon', 'lawzone' ),
                            'name' => 'icon',
                            'description' => __( 'Set Your Icon, keep blank if no icon is needed.', 'lawzone' ),
                            'admin_label' => true,
                        ),
                        array(
                            'type' => 'link',
                            'label' => __( 'Link & Button Text', 'lawzone' ),
                            'name' => 'link',
                            'description' => __( 'Enter link / Button Text / Target.', 'lawzone' ),
                            'admin_label' => true,
                        ),
                        array(
                            'type' => 'attach_image',
                            'label' => __( 'Image', 'lawzone' ),
                            'name' => 'bg',
                            'description' => __( 'Set Item Background', 'lawzone' ),
                        )
                    )
               )
          )
     )
)
);

add_shortcode( 'lawzoneAboutLawyer', 'lawzoneAboutLawyerCallback' );

function lawzoneAboutLawyerCallback( $atts ){ 
    ob_start();
    $output = '<div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-md-6">
                <h2 class="text-uppercase small-line-2 text">'.htmlspecialchars_decode($atts['title']).'</h2>
                <h4 class="mt20 mb10 text-theme-color">'.$atts['sub_title'].'</h4>
                <p>'.$atts['description'].'</p>
                <h3>'.$atts['name'].'</h3>
                <h6>'.$atts['designation'].'</h6>

                <div class="row mt30">';
                foreach($atts['options'] as $item):
                  $link = explode('|', $item->link);
                  $output .= '<div class="col-md-6">
                    <div class="service-box style-1" style="background-image:url('.wp_get_attachment_url( $item->bg ).');">
                      <div class="service-box-overlay"></div>
                      <i class="'.$item->icon.'"></i>
                      <div class="service-box-content">
                        <h5><a href="'.$link[0].'">'.$link[1].'</a></h5>
                        </div>
                      <!-- service-box-content --> 
                    </div>
                  </div>';
                endforeach; 
                $output .='</div>
              </div>
              <div class="col-md-6">
                '.$atts['content'].'
              </div>
          </div>
        </div>';

    return $output;      
    ob_end_flush();
  }
} // End check if class exist
?>

