<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $product;
?>
                    <div class="col-sm-6 col-xs-6 cs-wd-100per">
                        <div class="cs-product-col cs-product-single-col hover-zoom">
                            <a title="Your product Title" href="<?= (has_post_thumbnail($post->ID))?wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ): get_stylesheet_directory_uri() . '/css/images/shop/product_9.jpg'; ?>">
                            <?php 
                            	if(has_post_thumbnail()){
                            		the_post_thumbnail( 'full', array('class'=>'img-responsive', 'width'=>555, 'height'=>320) );                            	}
                            ?>
                            </a> 
                        </div>
                    </div>
