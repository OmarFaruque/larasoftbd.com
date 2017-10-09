<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
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
$layout   = ls_option('shop_layout_style'); 
?>
<?php if($layout && $layout == 'left'): ?>
</div>
<?php get_sidebar(); ?>
<?php elseif($layout && $layout == 'right'): ?>
</div>
<div class="col-md-4 col-xs-12 col-sm-4">
  <?php get_sidebar(); ?>
</div>
<?php endif; ?>

  </div>
          <div class="row mt30">
            <div class="text-center">
                  <div class="span9 ca_pagination"><?php pagenavi(); ?></div>
            </div>
          </div>
        </div>
      </div>
  </section>
