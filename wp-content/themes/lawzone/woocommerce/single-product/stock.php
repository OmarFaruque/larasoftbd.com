<?php
/**
 * Single Product stock.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/stock.php.
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
	exit;
}
global $product;
?>

<?php if ( $product->is_in_stock() ) :  ?>
<h5>Availabilty :  <span class="btn btn-default cs-my-btn" role="button">In Stock</span></h5>
<?php else: ?>
<h5>Availabilty :  <span class="btn btn-default cs-my-btn" role="button">Out of Stock</span></h5>
<?php endif; ?>
