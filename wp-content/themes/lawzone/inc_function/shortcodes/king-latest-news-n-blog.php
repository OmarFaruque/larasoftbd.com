<?php 
/*
* Lawzone Blog
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){
global $kc;

$kc->add_map(
    array(
        'lawzone_latest_blog' => array(
            'name'        => 'Latest Blog & News',
            'description' => __('Lawzone Latest Blog & News Section', 'kingcomposer'),
            'icon'        => 'et-documents',
            'category'    => 'Lawzone',
            'is_container' => true,

            'params'      => array(          
                array(
                    'name'      => 'top_title',
                    'label'     => 'Top Title',
                    'type'      => 'text',
                    'description' => 'Top small title',
                    'value'     => 'Latest blog'
                ),
                array(
                    'name'      => 'title',
                    'label'     => 'Title',
                    'value'     => 'latest <span> news & blog</span>',
                    'type'      => 'text',
                    'description' => 'Title',
                ),
                array(
                    'name'      => 'description',
                    'label'     => 'Content',
                    'value'     => 'Sed malesuada nunc sit amet quam hendrerit, mollis vulputate risus tristique. Quisque dapibus eros et dolor accumsan, sit amet interdum tortor imperdiet.',
                    'type'      => 'textarea',
                    'description' => 'Content',
                ),
                array(
                    'name'      => 'post_type',
                    'label'     => 'Post Type',
                    'value'     => 'post',
                    'type'      => 'select',
                    'description' => 'Select Post Type to show',
                    'options'   => lawzone_all_post_types()
                ),
                array(
                    'name' => 'count',
                    'label' => 'Item Amount',
                    'type' => 'number_slider',  // USAGE RADIO TYPE
                    'options' => array(    // REQUIRED
                        'min' => 2,
                        'max' => 20,
                        'show_input' => true
                    ),
                    'value' => 3, // remove this if you do not need a default content 
                    'description' => 'Post Amount',
                )
            )
        )
    )
);

add_shortcode( 'lawzone_latest_blog', 'lawzone_latest_blog_callback' );

function lawzone_latest_blog_callback( $atts ){ 
    ob_start();
        /**
         * The WordPress Query class.
         * @link http://codex.wordpress.org/Function_Reference/WP_Query
         *
         */
           $args = array(
        //Type & Status Parameters
        'post_type'   => @$atts['post_type'],
        'post_status' => 'publish',

        //Pagination Parameters
        'posts_per_page'         => @$atts['count'],        
      );
      $class = ($atts['count'] < 3)?'col-md-6':'col-md-4';
    
    $query = new WP_Query( $args );
    if($query->have_posts()):

          $output ='<div class="section-title">
              <div class="row">
                <div class="col-md-4">
                  <h6>'.@$atts['top_title'].'</h6>
                  <h2>'.htmlspecialchars_decode( $atts['title'] ).'</h2>
                </div>
                <div class="col-md-7">
                  <p>'.@$atts['description'].'</p>
                </div>
              </div>
            </div>
            <div class="section-content">
              <div class="row">';

              while($query->have_posts()): $query->the_post(); global $post;
                $output .='<div class="col-sm-6 '.$class.'">
                  <article class="post clearfix">
                    <div class="post-overlay"> <a href="'.get_post_permalink().'"><i class="icon icon-Linked"></i></a>';
                    
                      if(has_post_thumbnail()){
                        $output .= get_the_post_thumbnail($post->ID, 'full', array('class'=>'img-responsive') );
                      }
                    
                    $output .='</div>
                    <div class="post-body">
                      <div class="post-info"> 
                        <a href="'.get_the_permalink().'"><span class="icon icon-Time text-theme-color"> </span>'.get_the_modified_date('M j\<\s\u\p\>S\<\/\s\u\p\>, Y').' - </a> 
                        <a href="'. get_the_permalink().'"><span class="icon icon-Message text-theme-color"></span>'; 
                            $comments_count = wp_count_comments($post->ID);
                        $output .= $comments_count->total_comments .' Comments</a> 
                        <a href="'.get_the_permalink().'"> - <span class="icon icon-Pen text-theme-color"></span> by '.get_the_author().'</a> </div>
                      <div class="post-content">
                        '.get_the_title( '<h4>', '</h4>').'
                        <p>'.get_the_excerpt().'</p>
                        <a href="'.get_the_permalink().'" class="btn theme-btn mt10">Read more</a> </div>
                    </div>
                  </article>
                </div>';
              endwhile;
              $output .= '</div>
            </div>';

     endif; wp_reset_query();

    return $output;      
    ob_end_flush();
  }
} // End check if class exist
?>

