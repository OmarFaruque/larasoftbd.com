<?php

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class recent_custom_post_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
        $widget_ops = array( 'classname' => 'col-md-3 col-sm-6 col-xs-12', 'description' => 'Recent Custom Post Type' );


/* Create the widget. */ 
        parent::__construct( 
           'recent_post', 'Recent Custom Posts Content', $widget_ops
        );
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
        echo $before_title; 
        echo $instance['title'];
        echo $after_title;

    //
    // Widget display logic goes here
    //
        $args = array(
        //Type & Status Parameters
        'post_type'   => $instance['post_type'],
        'post_status' => 'publish',

        //Pagination Parameters
        'posts_per_page'         => $instance['count'],        
      );
    
    $query = new WP_Query( $args );
    if($query->have_posts()):
     ?>
          <div class="footer-2">
          <?php while($query->have_posts()): $query->the_post(); ?>
            <p><a href="<?php the_permalink();  ?>"><?= substr(get_the_excerpt(), 0, 53) . '...';  ?></a></p>
            
          <?php endwhile; ?>
          </div>
  
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
        'title'   => 'latest news',
        'post_type' => 'post',
        'count' => 5
      ) );
   	
   	// Or use the instance
      $title      = strip_tags( $instance['title'] );
      $post_type  = strip_tags($instance['post_type']);
      $count      = strip_tags($instance['count']);
      ?>
        

            <p>
             <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
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
           <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Item Count', 'lawzone' ); ?>:</label>
           <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" value="<?php echo $count; ?>" />
        </p>

          
        
<?php
   }

/* Add Media Upload Script */
}

add_action( 'widgets_init', create_function( '', "register_widget( 'recent_custom_post_Widget' );" ) );
 

?>
