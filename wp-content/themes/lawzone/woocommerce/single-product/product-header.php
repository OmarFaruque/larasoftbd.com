<?php 
/*
/* Product Header
*/
?>

<?php 
$img_id 	= ls_option('product_header_background_id');
$overlayer 	= ls_option('product_header_overlayer'); 
?>
<!-- inner Section -->
<section class="overlay <?= ($overlayer)?$overlayer:'overlayer-black';  ?> parallax" data-bg-image="<?= ($img_id)?wp_get_attachment_url( $img_id ):get_stylesheet_directory_uri() . '/css/images/bg/bg1.jpg'; ?>" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-title">
            <h2><?php the_title(); ?></h2>
            <p>Home // <?php the_title(); ?></p>
          </div>
        </div>
      </div>
    </div>
</section>
