<?php

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class ourBrochure_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
        $widget_ops = array( 'classname' => 'our_brochure', 'description' => 'Our Brochure with download link for single practice area.' );

/* Create the widget. */ 
        parent::__construct( 
           'our_brochure', 'Our Brochure', $widget_ops
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
        global $post;
        $d_pdf      = get_post_meta( $post->ID, 'd_pdf', true ); // PDF
     ?>
                <h4><?= @$instance['title'];  ?></h4>
                <p><?= @$instance['description'];  ?></p>
                <?php if(@$instance['active_d']): ?>
                <a href="<?= ($d_pdf)?wp_get_attachment_url( $d_pdf ):'#';  ?>" class="transition3s" download="<?= $post->post_name;  ?>">Download.PDF</a>
                <?php endif; ?>
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
        'title'         => 'Our Brochure',
        'description'   => 'Our 2016 financial prospectus brochure for easy to read guide all of the services offered.',
        'active_d'        => 1
      ) );
   	
   	// Or use the instance
      $title        = format_to_edit($instance['title']);
      $description  = format_to_edit( $instance['description'] );
      $active_d     = strip_tags( $instance['active_d'] );
     
      ?>
       
        
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'lawzone' ); ?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
      </p>
    
      <p>
          <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description', 'lawzone' ); ?>:</label>
          <textarea raws="50" style="min-height: 60px;" class="widefat" id="<?= $this->get_field_id( 'description' ); ?>" name="<?= $this->get_field_name( 'description' );  ?>"><?= $description;  ?></textarea>
      </p>

      <p>
        <span>Active Download Link: </span><br>
        <label><input type="radio" <?= ($active_d)?'checked="checked"':'';  ?> name="<?= $this->get_field_name( 'active_d' );  ?>" value="1"> Yes</label>&nbsp;&nbsp;
        <label><input type="radio" <?= (!$active_d)?'checked="checked"':'';  ?> name="<?= $this->get_field_name( 'active_d' );  ?>" value="0"> No</label>
      </p>
     
<?php
   }
}
add_action( 'widgets_init', create_function( '', "register_widget( 'ourBrochure_Widget' );" ) ); 

?>
