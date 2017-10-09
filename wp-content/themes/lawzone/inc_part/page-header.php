<?php 
/*
* Page Header
*/
 ?>
   <section class="overlay overlayer-black parallax" data-bg-image="<?= (has_post_thumbnail())?wp_get_attachment_url( get_post_thumbnail_id() ):get_template_directory_uri() . '/css/images/bg/bg3.jpg'; ?>" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-title">
            <h2><?= the_title( );  ?></h2>
            <p>Home // <?php the_title();  ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>