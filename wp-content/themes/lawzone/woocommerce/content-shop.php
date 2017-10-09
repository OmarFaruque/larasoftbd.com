<?php 
/*
* Content Shop 
*/
?>

<?php if ( have_posts() ) : ?>

<?php woocommerce_product_loop_start(); ?>
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <?php do_action( 'woocommerce_before_shop_loop' ); ?>
    </div>
  </div>
<?php woocommerce_product_subcategories(); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>
				<?php wc_get_template_part( 'content', 'product' ); ?>
		<?php endwhile; // end of the loop. ?> 
  <!-- product end -->
<?php woocommerce_product_loop_end(); ?>

	
<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

<?php
		/**
		 * woocommerce_no_products_found hook.
		 *
		 * @hooked wc_no_products_found - 10
		 */
	do_action( 'woocommerce_no_products_found' );
?>
<?php endif; wp_reset_query(); wp_reset_postdata(); ?>