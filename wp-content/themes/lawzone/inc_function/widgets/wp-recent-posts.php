<?php 
/*
* Recent Posts
*/
 
 Class Lawzone_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
 	function form( $instance ) {
 		  $instance = wp_parse_args( (array) $instance, array(
        	'title'       => 'WE CARE ABOUT Clients',
    		));
 		  $title            = format_to_edit($instance['title']);
 		  $number 			= format_to_edit($instance['number']);
 		  $show_date 		= format_to_edit( $instance['show_date'] );
		?>
		 <p>
         <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'lawzone' ); ?>:</label>
         <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
         <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show', 'lawzone' ); ?>:</label>
         <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo $number; ?>" />
        </p>
        <p>
        <input <?= ($show_date)?'checked':'';  ?> value=1 class="checkbox" type="checkbox" id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>">
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>">Display post date?</label>
		</p>
 		<?php
 	}

	function widget($args, $instance) {
	
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			echo '<div class="sidebar-widget popular-posts">';
			if( $title ) echo $before_title . $title . $after_title; ?>
			
				<?php while( $r->have_posts() ) : $r->the_post(); ?>
				  <article class="post">
                      <figure class="post-thumb"><a title="<?php the_title( ); ?>" href="<?php the_permalink(); ?>">
                      	<?php 
                      	if(has_post_thumbnail( )){
                      		the_post_thumbnail( 'thumbnail', array('class'=>'img-responsive') );
                      	}
                      	?>
                      </figure>
                       <h4><a  title="<?php the_title( ); ?>" href="<?php the_permalink();  ?>"><?php the_title( ); ?></a></h4>
                       	<?php if(@$instance['show_date']): ?>
                       	<div class="post-info"><?php the_time( 'F dS, Y'); ?></div>
                   		<?php endif; ?>
                  </article>
                            
				<?php endwhile; ?>
			 
			<?php
			echo '</div>';
			echo $after_widget;
		
		wp_reset_postdata();
		
		endif;
	}
}
function lawzone_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('Lawzone_Recent_Posts_Widget');
}
add_action('widgets_init', 'lawzone_recent_widget_registration');




