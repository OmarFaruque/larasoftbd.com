<?php 
/*
* Lawzone Blog
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_blog' => array(
            'name'        => 'Lawzone Blog',
            'description' => __('Lawzone Create Blog page', 'kingcomposer'),
            'icon'        => 'et-browser',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'          => 'post_type',
                    'label'         => 'Post Type',
                    'value'         => 'post',
                    'type'          => 'select',
                    'description'   => 'Set Blog post type',
                    'options'        => lawzone_all_post_types()
                ),
                array(
                        'name' => 'count',
                        'label' => 'Number post show',
                        'type' => 'number_slider',
                        'value' => 12,
                        'options' => array(
                            'min' => 2,
                            'max' => 200,
                            'show_input' => true
                        ),
                        'description' => 'Display number of post'
                ),    
                array(
                        'name' => 'item_row',
                        'label' => 'Items on Row',
                        'type' => 'select',
                        'value' => 3,
                        'options' => array(
                            12 => '1 Item',
                            6 => '2 Items',
                            4 => '3 Items',
                            3 => '4 Items',
                            2 => '6 Items',
                        ),
                        'description' => 'Items for each row.'
                ),      
                array(
                        'name' => 'img_size',
                        'label' => 'Image Size',
                        'type' => 'select',
                        'value' => 'full',
                        'options' => array(
                            'thumbnail' => 'Thumbnail',
                            'medium' => 'Medium',
                            'large' => 'Large',
                            'full' => 'Full'
                        ),
                        'description' => 'Item image size'
                ),   
                array(
                        'type'          => 'toggle',
                        'label'         => __( 'Show Date', 'KingComposer' ),
                        'name'          => 'show_date',
                        'description'   => __( 'Show blog listing date', 'KingComposer' ),
                        'value'             => 'yes'
                ),   
                array(
                        'type'          => 'toggle',
                        'label'         => __( 'Show Comments', 'KingComposer' ),
                        'name'          => 'show_comments',
                        'description'   => __( 'Show blog Comments Count', 'KingComposer' ),
                        'value'             => 'yes'
                ),   
                array(
                        'type'          => 'toggle',
                        'label'         => __( 'Show Author', 'KingComposer' ),
                        'name'          => 'show_author',
                        'description'   => __( 'Show Author name', 'KingComposer' ),
                        'value'             => 'yes'
                ),  
                array(
                        'type'          => 'toggle',
                        'label'         => __( 'Active Pagination', 'KingComposer' ),
                        'name'          => 'active_pagnav',
                        'description'   => __( 'Active Page Navigation', 'KingComposer' ),
                        'value'             => 'yes'
                ), 
                array(
                        'type'          => 'toggle',
                        'label'         => __( 'Active Excerpt', 'KingComposer' ),
                        'name'          => 'active_excerpt',
                        'description'   => __( 'Active Page Excerpt', 'KingComposer' ),
                        'value'             => 'no'
                ),  
                array(
                        'name' => 'orderby',
                        'label' => 'Order by',
                        'type' => 'select',
                        'value' => 'DESC',
                        'options' => array(
                            'DESC' => 'Descending',
                            'ASC' => 'Ascending'
                        ),
                        'description' => 'Order'
                ),
                array(
                        'name' => 'extra_class',
                        'label' => 'Extra Class',
                        'type' => 'text'
                )    
            )
        )
    )
);

add_shortcode( 'lawzone_blog', 'lawzone_blog_callback' );

function lawzone_blog_callback( $atts ){ 
    ob_start();
        /**
         * The WordPress Query class.
         * @link http://codex.wordpress.org/Function_Reference/WP_Query
         *
         */
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            //Type & Status Parameters
            'post_type'   => @$atts['post_type'],
            'post_status' => 'publish',           

            //Order & Orderby Parameters
            'order'               => @$atts['orderby'],
            'orderby'             => 'date',
           
            //Pagination Parameters
            'posts_per_page'         => @$atts['count'],
            'nopaging'               => false,
            'paged'                  => $paged
        );
    
        $query = new WP_Query( $args );
        if($query->have_posts()):
            $output = '';
            $output = '<div class="row">';
            $count = 1;
            while($query->have_posts()): $query->the_post();
                $attaImg = wp_get_attachment_image_src( get_post_thumbnail_id(), @$atts['img_size'] ); 
                $attaAlt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                $archive_year  = get_the_time('Y');
                $archive_month = get_the_time('m');
                $counDivider = 0; 
                $mb = '';
                $pt = '';
                $excerpt = '';
                if($atts["item_row"] == 12){
                    $counDivider .= 1;     
                    $mb .= 'mb30';
                    $pt .= 'mt20';
                    $excerpt .= ($atts['active_excerpt'] == 'yes')? '<p>' . get_the_excerpt() . '</p>':'';
                }elseif($atts["item_row"] == 6){
                    $counDivider .= 2;     
                }elseif($atts["item_row"] == 4){
                    $counDivider .= 3;     
                }elseif($atts["item_row"] == 3){
                    $counDivider .= 4;     
                }elseif($atts["item_row"] == 2){
                    $counDivider .= 6;     
                }
                $effect = ($counDivider > 1)?'wow slideInLeft" data-wow-duration="1s" data-wow-delay=".5s"':'';

                $output .= '              
                <div class="'.$mb.' col-xxs-12 col-sm-12 col-md-'.@$atts["item_row"].' '.$effect.'">
                <article class="post clearfix">
                    <div class="blog-effect"> <a href="'.get_the_permalink().'"><figure> 
                    <img class="img-responsive" src="'.$attaImg[0].'" alt="'.$attaAlt.'">
                    </figure> </a> </div>
                    <div class="post-body">
                      <div class="post-info">';
                      if(@$atts['show_date']== 'yes'):
                        $output .= '<a href="'.get_month_link( $archive_year, $archive_month ).'">'.get_the_time( 'F jS, Y' ).' - </a> ';
                      endif;
                      $output .='<a href="'.get_the_permalink().'"><span class="icon icon-Message"></span> '.get_comments_number().' Comments</a> 
                      <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'"> - <span class="icon icon-Pen"></span> by '.get_the_author().'</a> 
                      </div>
                      <h3 class="post-title '.$pt.'">'.get_the_title().'</h3> '.$excerpt.'
                      <a href="'.get_the_permalink().'" class="btn theme-btn mt10">Read more</a>
                    </div>
                </article>
              </div>';
              $output .= ($count % (int)@$counDivider == 0)?'<div class="clearfix"></div>':'';
              $count++;
            endwhile;
            $output .= '</div>';
        endif;

    return $output;      
    ob_end_flush();
  }
} // End check if class exist
?>

