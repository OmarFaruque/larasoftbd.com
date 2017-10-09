<?php 
/*
* 404 Template 
*/

get_header(); 
$title 		= ls_option('404_title');
$stitle 	= ls_option('404_subtitle');
$content 	= ls_option('404_content');
$bg 		= ls_option('404_background_id'); 
$overlayer 	= ls_option('404_overlayer');
?>
    <section class="style-two overlayer <?= ($overlayer)?$overlayer:'default-overlay';  ?> parallax" 
    data-bg-image="<?= ($bg)?wp_get_attachment_url( $bg ):get_stylesheet_directory_uri() . '/css/images/bg/bg3.jpg'; ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center txt-color-white pt100 pb100">
            <h1 class="text-theme-color error-font"><?= $title;  ?></h1>
            <h2><?= $stitle;  ?></h2>
            <h4><?= $content;  ?></h4>
            <a class="btn theme-btn mt30" href="<?= get_home_url( '/' );  ?>">Back home Page</a>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>