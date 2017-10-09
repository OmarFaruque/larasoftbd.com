<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$layout   = ls_option('shop_layout_style'); 
$exClass = '';
if(is_archive()):
$exClass .= ($layout == 'right' || $layout == 'left')?'col-lg-4 col-md-4 col-sm-6 col-xs-6 cs-wd-100per':'col-lg-3 col-md-3 col-sm-6 col-xs-6 cs-wd-100per';
else:
$exClass .=  'cs-product-col animated bounceInUp slow delay-500 go';
endif;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>
<div <?php post_class($exClass ); ?>>
 	<div class="<?= (is_archive())?'cs-product-col animated bounceInUp slow delay-250':'related_s_item';  ?> ">
  		<div class="cs-product-item">

			                <div class="cs-product-img">
			                <?php 
			                global $woocommerce;
			                	if(has_post_thumbnail( )){
			                		the_post_thumbnail( 'full', array('class' => '') );
			                	}
			                ?>
                              </div>
                              <div class="cs-product-content">
                                  <h5><?php the_title(); ?></h5>

                                  <p><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></p>
                                  <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                                
                                  <div class="cs-icon-box">
                                  
                                  	
                                      <?= do_shortcode("[ti_wishlists_addtowishlist loop=yes]");  ?>
                                      <a class="ajax-total-count" href="<?= $woocommerce->cart->get_cart_url();  ?>"><span class="icon icon-ShoppingCart"></span><sup><?=  WC()->cart->get_cart_contents_count();  ?></sup></a>
                                      <a href="<?php the_permalink();  ?>"><span class="icon icon-Eye"></span></a>
                                  </div>
                              </div>
		</div>
	</div>
</div>
