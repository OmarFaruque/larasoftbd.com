<?php

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class otherPosts_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
        $widget_ops = array( 'classname' => 'single-practice-widget sidebar-widget law-widget widgetsidebar-widget law-widget widget', 'description' => 'Practice Area Widget for display other posts title and links' );

/* Create the widget. */ 
        parent::__construct( 
           'other_posts', 'Other Posts', $widget_ops
        );
        
        add_action('admin_enqueue_scripts', 'my_media_lib_uploader_enqueue');
    }

    function my_media_lib_uploader_enqueue() {
      wp_register_style( 'widget_css', get_template_directory_uri() . '/css/widget/widget.css', false, '9.2.3' );
      wp_enqueue_style( 'widget_css' );
    }
   
    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance ) {
        ob_start();
        extract( $args, EXTR_SKIP );
        echo $before_widget;
        //echo $before_title; 
        //echo $after_title;

    //
    // Widget display logic goes here
    //
          /**
           * The WordPress Query class.
           * @link http://codex.wordpress.org/Function_Reference/WP_Query
           *
           */
          $args = array(   
            
            //Type & Status Parameters
            'post_type'   => @$instance['post_type'],
            'post_status' => 'publish',
            //Pagination Parameters
            'posts_per_page'  => @$instance['amount'],
            'orderby'         => @$instance['orderby'],
                       
            //Parameters relating to caching
            'no_found_rows'          => false,
            'cache_results'          => true,
            'update_post_term_cache' => true,
            'update_post_meta_cache' => true,
           );
                    
        $query = new WP_Query( $args );
        if($query->have_posts()):
     ?>
           
                <div class="sidebar-title">
                  <h2><?= @$instance['title'];  ?></h2>
                </div>
                <ul class="law-list pb20">
                <?php while($query->have_posts()): $query->the_post(); global $post; ?>
                  <li><a style="text-transform: capitalize;" href="<?php the_permalink(); ?>"><?php the_title();  ?></a></li>
                <?php endwhile; ?>
                </ul>
             
     <?php
     endif; wp_reset_query();
     echo $after_widget;
     ob_end_flush();
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance ) {
        //$instance = wp_parse_args( (array) $instance, array( array 'test' => 'value pairs' ) );
  // Set default arguments
      $instance = wp_parse_args( (array) $instance, array(
        'title'         => 'Practice Areas <span class="text-theme-color">Widget</span>',
        'post_type'     => 'project',
        'amount'        => 8,
        'orderby'       => 'rand'
      ) );
   	
   	// Or use the instance
      $title        = format_to_edit($instance['title']);
      $post_type    = format_to_edit( $instance['post_type'] );
      $amount       = format_to_edit( $instance['amount'] );
      $orderby      = format_to_edit( $instance['orderby'] );
      ?>
       
        
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'lawzone' ); ?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
      </p>
    
      <p style="margin-top:0;">
         <label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e( 'Post Type', 'lawzone' ); ?>:</label>
         <select id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?= $this->get_field_name( 'post_type' );  ?>" >
          <option value="">Select Post Type</option>
            <?php 
             $post_types =   get_post_types(array('public'   => true));
             unset($post_types['attachment']);
             unset($post_types['widget']);
             foreach($post_types as $post):
             ?>
         <option <?= ($post == $post_type)?'selected':''; ?> value="<?= $post;  ?>"><?= $post;  ?></option>
           <?php endforeach; ?>
        </select>
      </p> 

      <p>
        <label for="<?php echo $this->get_field_id( 'amount' ); ?>"><?php _e( 'Number of posts to show', 'lawzone' ); ?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'amount' ); ?>" name="<?php echo $this->get_field_name( 'amount' ); ?>" type="text" value="<?php echo $amount; ?>" />
      </p>

      <p style="margin-top:0;">
         <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By', 'lawzone' ); ?>:</label>
         <select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?= $this->get_field_name( 'orderby' );  ?>" >
          <option value="">Select Order</option>
            <?php 
             $orders = array('rand', 'asc', 'desc');
             foreach($orders as $ordr):
             ?>
         <option <?= ($ordr == $orderby)?'selected':''; ?> value="<?= $ordr;  ?>"><?= $ordr;  ?></option>
           <?php endforeach; ?>
        </select>
      </p> 
     
<?php
   }
}
add_action( 'widgets_init', create_function( '', "register_widget( 'otherPosts_Widget' );" ) ); 

?>
