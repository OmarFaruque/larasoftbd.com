<?php 
/*
* Main Slider
*/


?>
  <!--Main Slider Start-->
  <?php $query_args = array(
      // Because of the many possibilities use wp-query-args to display arguments snippets
        'post_type' => 'slider',
        'post_status' => 'publish',
            //Taxonomy Parameters
        'tax_query' => array(
        'relation'  => 'AND',
          array(
            'taxonomy'         => 'slider-cat',
            'field'            => 'slug',
            'terms'            => array( 'revslider' ),
            'include_children' => true,
            'operator'         => 'IN'
          )
        ),
  );
  $query = new WP_Query( $query_args );
  if($query->have_posts()):
  ?>

  <section class="main-slider">
    <div class="tp-banner-container">
      <div class="tp-banner">
        <ul>
        <?php 
            $counter = 0;
            while($query->have_posts()): $query->the_post();
            $slider_img     = esc_html(get_post_meta( $post->ID, 'slider_img', true ));
            $slider_text    = get_post_meta( $post->ID, 'slider_text', true );
            $button_text    = get_post_meta( $post->ID, 'button_text', true );
            $slider_url     = get_post_meta($post->ID, 'slider_url', true );
            $data_title     = get_post_meta($post->ID, 'data_title', true);
            $text_position  = get_post_meta($post->ID, 'text_position', true );
        ?>
          <li data-transition="<?= ($counter%2 == 0)?'fade':'slideup'; ?>" data-slotamount="1" data-masterspeed="1000" data-thumb="<?= wp_get_attachment_url( $slider_img ); ?>"  data-saveperformance="off"  data-title="<?= ($data_title)?$data_title:''; ?>"> <img src="<?= wp_get_attachment_url( $slider_img ); ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
            <div class="tp-caption lfb tp-resizeme"
                        data-x="<?= $text_position; ?>" data-hoffset="<?= ($text_position == 'left')?15:-15;  ?>"
                        data-y="center" data-voffset="-80"
                        data-speed="1500"
                        data-start="500"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><span style="padding:6px 22px; "><?= get_the_title();  ?></span></div>
            <div class="tp-caption lfb tp-resizeme"
                        data-x="<?= $text_position; ?>" data-hoffset="<?= ($text_position == 'left')?15:-15;  ?>"
                        data-y="center" data-voffset="-10"
                        data-speed="1500"
                        data-start="750"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
              <div class="big-title <?= ($text_position == 'right')?'text-right':'text-left'; ?>">
                <h1 class="slide-bg-theme slide-psm">The Greatest Strongest <br>
                  Firm you can Trest.</h1>
              </div>
            </div>
            <div class="tp-caption lfb tp-resizeme"
                        data-x="<?= $text_position; ?>" data-hoffset="<?= ($text_position == 'left')?15:-15;  ?>"
                        data-y="center" data-voffset="80"
                        data-speed="1500"
                        data-start="1000"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
              <div class="link-btn" style="padding:6px 22px; "><a href="#" class="btn theme-btn">MAKE AN APPOINTMENT <i class="fa fa-arrow-circle-right"></i></a></div>
            </div>
          </li>
          <?php $counter++; endwhile; ?>
        </ul>
        <div class="tp-bannertimer"></div>
      </div>
    </div>
  </section>
<?php endif; ?>
  <!--Main Slider End--> 