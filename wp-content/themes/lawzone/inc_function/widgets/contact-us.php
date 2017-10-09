<?php

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class cuntact_us_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
        $widget_ops = array( 'classname' => 'col-md-3 col-sm-6 col-xs-12', 'description' => 'Contact US Fotter Section' );


/* Create the widget. */ 
        parent::__construct( 
           'contact_us', 'Contact US', $widget_ops
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
   
     ?>
         <div class="footer-3">
            <?php if($instance['address']): ?>
            <p><span>Address :</span> <br><?= $instance['address'];  ?></p>
            <?php endif; if($instance['call_us']): ?>
            <p><span>Call Us :</span> <br><?= $instance['call_us'];  ?></p>
            <?php endif; if($instance['email']): ?>
            <p><span>Email :</span> <br><?= $instance['email'];  ?></p>
            <?php endif; ?>
          </div>
  
     <?php

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
        'title'   => 'Contact Us',
        'address' => '8500 Lorem Street, Chicago, IL, 55030',
        'call_us' => '(123) 456-78-90',
        'email'   => 'sales@yoursite.com'
      ) );
   	
   	// Or use the instance
      $address      = strip_tags( $instance['address'] );
      $call_us      = strip_tags($instance['call_us']);
      $email        = strip_tags($instance['email']);
      $title        = strip_tags($instance['title']);
      ?>
        

            <p>
             <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>

            <p>
             <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo $address; ?>" />
            </p>

            <p>
             <label for="<?php echo $this->get_field_id( 'call_us' ); ?>"><?php _e( 'Call Us', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'call_us' ); ?>" type="text" value="<?php echo $call_us; ?>" />
            </p>

            <p>
             <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" />
            </p>        
<?php
   }

/* Add Media Upload Script */
}

add_action( 'widgets_init', create_function( '', "register_widget( 'cuntact_us_Widget' );" ) );
 

?>
