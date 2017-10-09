<?php

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class googleMap_Widget extends WP_Widget {
    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
        $widget_ops = array( 'classname' => 'map-section', 'description' => 'Set your google map from here.' );
        parent::__construct( 
        'google_map', 'Set Google Map', $widget_ops );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance ) {
        wp_enqueue_script('google_map', get_stylesheet_directory_uri() . '/js/map-script.js', '', '1.4.11', true );
        extract( $args, EXTR_SKIP );
       // echo $before_widget;
        echo $before_title; 
        echo $after_title;
        ?>
          <!-- Map -->
          
            <!--Map Container-->
             <section class="map-section">
                <!--Map Container-->
    <div class="map-outer">
        <!--Map Canvas-->
        <div class="map-contact"
            data-zoom="<?= @$instance['zoom']; ?>"
            data-lat="<?= @$instance['lat']; ?>"
            data-lng="<?= @$instance['lng']; ?>"       
            data-type="<?= @$instance['type'];  ?>"
            data-hue="<?= @$instance['hue']; ?>"
            data-title="<?= @$instance['title']; ?>"
            data-content="<?= @$instance['address']; ?><br><a href='<?= @$instance['email'];  ?>'><?= @$instance['email'];  ?></a>",
            data-marker='<?= (@$instance['marker'])?wp_get_attachment_url( @$instance['marker'] ):get_template_directory_uri() . '/css/images/icons/map-marker.png';  ?>';              
            style="height: <?= @$instance['height'];  ?>px;">
        </div>
        
    </div>
            </section>


        <?php
       // echo $after_widget;
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
        'zoom'    => 12,
        'lat'     => '-37.817085',
        'lng'     => '144.955631',
        'type'    => 'roadmap',
        'hue'     => '#ffc400',
        'title'   => 'Envato',
        'address' => 'Melbourne VIC 3000, Australia',
        'email'   => 'info@youremail.com',
        'height'  => 500,
        'marker'  => ''
      ) );
   	
   	// Or use the instance
      $zoom     = strip_tags($instance['zoom']);
      $lat      = strip_tags($instance['lat']);
      $lng      = strip_tags($instance['lng']);
      $type     = strip_tags($instance['type']);
      $hue      = format_to_edit($instance['hue']);
      $title    = format_to_edit($instance['title']);
      $address  = format_to_edit($instance['address']);
      $email    = format_to_edit($instance['email']);
      $height   = strip_tags($instance['height']);
      $marker   = format_to_edit($instance['marker']);
      $img_url  = wp_get_attachment_url( $marker );
?>
        <p>
          <label for="<?php echo $this->get_field_id( 'zoom' ); ?>"><?php _e( 'Zoom', 'lawzone' ); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'zoom' ); ?>" name="<?php echo $this->get_field_name( 'zoom' ); ?>" type="number" value="<?php echo $zoom; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'lat' ); ?>"><?php _e( 'Lat', 'lawzone' ); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'lat' ); ?>" name="<?php echo $this->get_field_name( 'lat' ); ?>" type="text" value="<?php echo $lat; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'lng' ); ?>"><?php _e( 'Lng', 'lawzone' ); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'lng' ); ?>" name="<?php echo $this->get_field_name( 'lng' ); ?>" type="text" value="<?php echo $lng; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Map Type', 'lawzone' ); ?>:</label>
          <select style="width:100%;" id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?= $this->get_field_name( 'type' );  ?>" >
              <?php 
              $types =   array('roadmap', 'satellite', 'hybrid', 'terrain');
              foreach($types as $typ):
              ?>
                <option <?= ($type == $typ)?'selected':''; ?> value="<?= $typ;  ?>"><?= ucfirst($typ);  ?></option>
              <?php endforeach; ?>
          </select>
        </p>

        <p>
           <label for="<?php echo $this->get_field_id( 'hue' ); ?>"><?php _e( 'Map Color', 'lawzone' ); ?>:</label>
           <input class="widefat" id="<?php echo $this->get_field_id( 'hue' ); ?>" name="<?php echo $this->get_field_name( 'hue' ); ?>" type="text" value="<?php echo $hue; ?>" />
        </p>
        <p>
           <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'lawzone' ); ?>:</label>
           <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
           <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address', 'lawzone' ); ?>:</label>
           <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo $address; ?>" />
        </p>
        <p>
           <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email', 'lawzone' ); ?>:</label>
           <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" />
        </p>
        <p>
           <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height', 'lawzone' ); ?>:</label>
           <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo $height; ?>" />
        </p>
        <p>
         <label for="<?php echo $this->get_field_id( 'marker' ); ?>"><?php _e( 'Marker Image', 'lawzone' ); ?>:</label>        
          <div class="img_prev" style="position: relative;">
          <?= ($marker)?'<div style="position:absolute; cursor:pointer; right:0; top:0; color:#b81111;" class="delete"><div alt="f158" class="dashicons dashicons-no" style="display: inline-block;"></div></div>':'';  ?>
           <input class="widefat" id="<?php echo $this->get_field_id( 'marker' ); ?>" name="<?php echo $this->get_field_name( 'marker' ); ?>" type="hidden" value="<?= $marker; ?>" />
            <a style="padding:<?= ($marker)?0:20; ?>;" class="text-center media_upload_widget_marker" href="javascript:void(0)" id="img_upload-marker" ><?= ($marker)?'<img style="margin:0 auto; display:block;" src="'.$img_url.'"/>':'Add Background Image';  ?></a>
          </div>
          <?= ($marker)?'<div style="text-align:center;" class="suggession"><span><small><i>Click on image for Edit</i></small></span></div>':'';  ?>
        </p>

        <script type="text/javascript">
        jQuery(document).ready(function($){
          //var mediaUploader;
          $(document.body).on('click', '.widget .media_upload_widget_marker', function(e) {

          e.preventDefault();
            var $button = $(this);
       
       
            // Create the media frame.
            var file_frame = wp.media.frames.file_frame = wp.media({
               title: 'Select or upload image',
               library: { // remove these to show all
                  type: 'image' // specific mime
               },
               button: {
                  text: 'Select'
               },
               multiple: false  // Set to true to allow multiple files to be selected
            });
       
            // When an image is selected, run a callback.
            file_frame.on('select', function () {
               // We set multiple to false so only get one image from the uploader
              $('.delete').remove();
               var attachment = file_frame.state().get('selection').first().toJSON();
               $button.css('padding','0');
               $button.prev('input').val(attachment.id);
               $button.html('<img src="'+attachment.url+'"/>');
               $('.img_prev').prepend('<div style="position:absolute; cursor:pointer; right:0; top:0; color:#b81111;" class="delete"><div alt="f158" class="dashicons dashicons-no" style="display: inline-block;"></div></div>');
       
            });
       
            // Finally, open the modal
            file_frame.open();
          });

          //Delete Image 
          $(document.body).on('click', '.delete', function(){
            $(this).next('input').next('a').html('<span>Add Background Image</span>').css('padding', 15);
            $(this).next('input').val('');
            $(this).closest('.img_prev').next('.suggession').remove();
            $(this).remove();
          }); // End Delete function
          }); //End Document Ready
        </script>
<?php

    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'googleMap_Widget' );" ) );

?>
