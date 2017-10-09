<?php 
/*
* Lawzone Hook Function 
*/


add_action( 'lazone_header', 'lawzone_default_header_with_bg', 20 );
add_action( 'woocommerce_single_product_summary', 'lawzone_amount_and_wishlist', 70 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'lawzone_relatead_products', 'lawzone_related_product_on_single', 20 );


