<?php 
/*
* Default Sidebar 
*/
 ?>
<div class="sidebar">
	<?php 
		if(is_active_sidebar( 'shop-sidebar' )){
			dynamic_sidebar( 'shop-sidebar' );
		}
	?>
</div>