<?php

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class footer_followus_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
        $widget_ops = array( 'classname' => 'col-md-3 col-sm-6 col-xs-12', 'description' => 'Footer Follow US' );


/* Create the widget. */ 
        parent::__construct( 
           'follow_us', 'Footer Follow US', $widget_ops
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
        echo $after_title;

    //
    // Widget display logic goes here
    //
     ?>
        <div class="footer-1">  <img src="<?= (ls_option('logo_id'))?wp_get_attachment_url(ls_option('logo_id')):get_template_directory_uri() . '/css/images/logo/logo.png';  ?>" alt="Logo">
            <p><?= $instance['text'];  ?></p>
            <ul class="social">
              <li><a href="javascript:void(0)"><span>follow us :</span></a></li>
              <?php if($instance['facebook']): ?>
              <li><a target="_blank" href="<?= $instance['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
              <?php endif; if($instance['twitter']): ?>
              <li><a target="_blank" href="<?= $instance['twitter'];  ?>"><i class="fa fa-twitter"></i></a></li>
              <?php endif; if($instance['dribbble']): ?>
              <li><a target="_blank" href="<?= $instance['dribbble'];  ?>"><i class="fa fa-dribbble"></i></a></li>
              <?php endif; if($instance['behance']): ?>
              <li><a target="_blank" href="<?= $instance['behance'];  ?>"><i class="fa fa-behance"></i></a></li>
              <?php endif; if($instance['googleplus']): ?>
              <li><a target="_blank" href="<?= $instance['googleplus'];  ?>"><i class="fa fa-google-plus"></i></a></li>
              <?php endif; ?>

            </ul>
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
        'text'   => 'Nulla vitae cursus quam, nec ultrices nibh. Quisque tristique lorem ac diam laoreet auctor. Proin ac massa elit.',
        'facebook'      => '#', 
        'twitter'       => '#', 
        'dribbble'      => '#', 
        'behance'       => '#',
        'googleplus'    => '#'
      ) );
   	
   	// Or use the instance
      $text       = strip_tags( $instance['text'] );
      $facebook   = format_to_edit($instance['facebook']);
      $twitter    = format_to_edit($instance['twitter']);
      $dribbble   = format_to_edit($instance['dribbble']);
      $behance    = format_to_edit($instance['behance']);
      $googleplus = format_to_edit($instance['googleplus']);      
      ?>
        

          <p>
           <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text', 'lawzone' ); ?>:</label>
           <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
          </p>

          <div class="follow_us">
            <p><b>Follow Us</b></p>
            <p>
             <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo $facebook; ?>" />
            </p>

            <p>
             <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'twitter', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo $twitter; ?>" />
            </p>

             <p>
             <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'dribbble', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo $dribbble; ?>" />
            </p>

            <p>
             <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e( 'behance', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'behance' ); ?>" type="text" value="<?php echo $behance; ?>" />
            </p>

            <p>
             <label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e( 'googleplus', 'lawzone' ); ?>:</label>
             <input class="widefat"  name="<?php echo $this->get_field_name( 'googleplus' ); ?>" type="text" value="<?php echo $googleplus; ?>" />
            </p>
          </div>
        
<?php
   }

/* Add Media Upload Script */
}

add_action( 'widgets_init', create_function( '', "register_widget( 'footer_followus_Widget' );" ) );
 

?>
