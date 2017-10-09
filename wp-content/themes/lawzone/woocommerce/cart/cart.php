<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>


 <section class="cs-chat-area">
        <div class="container-fluid-custom">
            <div class="row">
                <div class="col-sm-12">
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="table cs-table shop_table_responsive cart-custom woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr class="cs-heading">
				
				<!--<td class="product-thumbnail"><h4>&nbsp;</h4></td>-->
				<td colspan="2" class="product-name"><h4><?php _e( 'Product', 'woocommerce' ); ?></h4></td>
				<td class="product-price"><h4><?php _e( 'Price', 'woocommerce' ); ?></h4></td>
				<td class="product-quantity"><h4><?php _e( 'Quantity', 'woocommerce' ); ?></h4></td>
				<td class="product-subtotal"><h4><?php _e( 'Total', 'woocommerce' ); ?></h4></td>
				<td class="product-remove"><h4>&nbsp;</h4></td>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item cs-table-content <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">



						<td class="product-thumbnail cs-pad">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail;
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
							?>
						</td>

						<td class="cs-pad product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>"><p>
							<?php
								if ( ! $product_permalink ) {
									echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								}

								// Meta data
								echo WC()->cart->get_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
								}
							?>
						</p></td>

						<td class="product-price cs-pad" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>"><p>
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
						</p></td>

						<td class="product-quantity cs-pad" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"><p>
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
						</p></td>

						<td class="product-subtotal cs-pad" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><p>
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</p></td>
						<td class="product-remove cs-pad cs-tab-button">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><button class="btn btn-default"><span class="icon icon-Delete"></span></button></a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>
		</tbody>
	</table>
			
				<div class="cs-couponbox">
				<div class="row">
				<div class="col-sm-6">
				<div class="input-group">
					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="form-group" style="margin-bottom: 0; width:100%;">
							<input type="text" name="coupon_code" class="input-text form-control cs-coupon-input" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code...', 'woocommerce' ); ?>" /> 
							
						</div>
						<span class="input-group-btn">
						<input class="btn theme-btn" type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
						</span>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					<?php } ?>
					</div>
					</div>
					<div class="col-sm-6 text-right">
						<input role="button" type="submit" class="btn btn-cart" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />						
						<a class="btn theme-btn" href="<?= WC()->cart->get_checkout_url();  ?>" title="PRCEED TO CHECKOUT">PRCEED TO CHECKOUT</a>
						<?php do_action( 'woocommerce_cart_actions' ); ?>

						<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</div>
					</div>
					</div>
				

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>

	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
	 	do_action( 'woocommerce_cart_collaterals' );
	?>
</div>
                </div>
            </div>
        </div>
    </section>

<?php do_action( 'woocommerce_after_cart' ); ?>


