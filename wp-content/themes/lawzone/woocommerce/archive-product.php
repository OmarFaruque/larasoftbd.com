<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' );
global $post;
$page 		= get_page_by_path( 'shop' );
?>

 <section class="overlay overlayer-black parallax" data-bg-image="<?= (has_post_thumbnail())?wp_get_attachment_url( get_post_thumbnail_id((int)$page->ID) ):get_stylesheet_directory_uri() . '/css/images/bg/bg3.jpg'; ?>" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-title">
            <h2><?= get_the_title( (int)$page->ID );  ?></h2>
            <p>Home // <?= get_the_title( (int)$page->ID );  ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php get_template_part( 'woocommerce/content', 'shop' ); ?>



<?php get_footer( 'shop' ); ?>
