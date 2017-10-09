<?php 
/*
* Wishlist
*/
?>
<div class="cs-add-to-cart"> 
<?php echo do_shortcode( '[ti_wishlists_addtowishlist]' ); ?>
<a href="shop-cart.html"><span class="icon icon-ShoppingCart"></span><sup><?=  WC()->cart->get_cart_contents_count();  ?></sup></a>
<a href="<?php the_permalink(); ?>"><span class="icon icon-Eye"></span></a>
</div>