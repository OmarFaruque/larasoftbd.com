<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
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
$layout 	= ls_option('shop_layout_style'); 
?>
<!-- product start -->
  <section class="cs-product-area animatedParent animateOnce">
      <div class="container pn">
          <div class="section-wrap">
              <div class="row">
              <?php if($layout && $layout == 'left'): ?>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-md-8 col-xs-12 col-sm-8">
				<?php elseif($layout && $layout == 'right'): ?>
				<div class="col-md-8 col-xs-12 col-sm-8">
				<?php endif; ?>

