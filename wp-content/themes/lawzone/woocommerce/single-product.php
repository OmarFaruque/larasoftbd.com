<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php do_action('lazone_header'); ?>
	 <!-- product start -->
	  <section class="cs-product-area cs-inner-product-area">
	      <div class="container pbn">
	          <div class="row">
	            <div class="col-md-8">
	                <div class="row">
						<?php while ( have_posts() ) : the_post(); ?>
						<?php wc_get_template_part( 'content', 'single-product' ); ?>
						<?php endwhile; // end of the loop. ?>
		             </div>
	            </div>
	            <div class="col-md-4">
		            
		              		<?php
							/**
							 * woocommerce_sidebar hook.
							 *
							 * @hooked woocommerce_get_sidebar - 10
							 */
							do_action( 'woocommerce_sidebar' );
							
							?>
	            </div>
	          </div>
	      </div>
	  </section>
	  <!-- product end -->
	  <?php do_action('lawzone_relatead_products'); ?>



<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
