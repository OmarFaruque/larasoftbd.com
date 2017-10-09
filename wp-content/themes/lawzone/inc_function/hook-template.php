<?php 

 /*
 * Hook Template
 */

 function lawzone_default_header_with_bg(){
 	/*
 	* Single product page hader
 	*/
 	wc_get_template( 'single-product/product-header.php' );
 }

 function lawzone_amount_and_wishlist(){
 	/*
 	* single product wishlist button, amoutn of product oncart etc.
 	*/
 	wc_get_template( 'single-product/amount-wishlist.php' );
 }




if ( ! function_exists( 'lawzone_related_product_on_single' ) ) {

	/**
	 * Output the related products.
	 *
	 * @subpackage	Product
	 */
	function lawzone_related_product_on_single() {
		global $post;
		$args = array(
			'posts_per_page' 	=> -1,
			'columns' 			=> 4,
			'post__not_in' => array($post->ID),
			'orderby' 			=> 'rand',
		);

		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
	}
}


