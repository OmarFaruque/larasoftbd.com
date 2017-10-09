<?php 
/*
* Bloog Loop
*/
$layout = '';
$sidebar_id ='';
if( !is_archive() ){
  $layout  .= ls_option('blog_page_layout_style');   
  $sidebar_id .= ls_option('blog_sidebar');
}else{
  $layout  .= ls_option('archive_layout_style');   
  $sidebar_id .= ls_option('archive_sidebar');
}
$sidebar_post   = get_post( $sidebar_id, OBJECT, 'raw' );
$sidebar_slug   = $sidebar_post->post_name; 


?>
  <section class="blog">
      <div class="container">
        <div class="section-content">
        <div class="row">
         <?php if($layout != 'no' && $layout == 'left'): ?>
                       <div class="col-md-4">
                            <div class="sidebar">
                            <?php 
                                if($sidebar_id && is_dynamic_sidebar( $sidebar_slug )){
                                    dynamic_sidebar( $sidebar_slug );
                                }
                            ?>
                            </div>
                       </div>
         <?php endif; ?> 
  		  <div class="col-md-<?= ($layout == 'no')?'12':'8'; ?>"><div class="row">
          <?php $ct = 1; while(have_posts()): the_post(); ?>
          	<?php $archive_year  = get_the_time('Y'); ?>
			<?php $archive_month = get_the_time('m'); ?>
              <div class="col-xxs-12 col-sm-12 col-md-<?= ($layout == 'no')?'4 wow slideInLeft':'12 mb30'; ?>" data-wow-duration="1s" data-wow-delay=".5s">
                <article class="post clearfix">
                    <div class="blog-effect"> 
	                    <a href="<?php the_permalink(); ?>">
		                    <figure> 
		                    	<?php 
		                    	if(has_post_thumbnail( )){
		                    		the_post_thumbnail( 'full', array('class'=>'img-responsive') );
		                    	}
		                    	?>
		                    </figure> 
	                    </a> 
                    </div>
                    <div class="post-body">
                      <div class="post-info"> 
                      <a href="<?php echo get_month_link( $archive_year, $archive_month ); ?>"><?php the_time( 'F jS, Y' );  ?> - </a> 
                      <a href="<?php the_permalink(); ?>"><span class="icon icon-Message"></span> <?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?></a> 
                      <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> - <span class="icon icon-Pen"></span> by <?= get_the_author(); ?></a> 
                      </div>
                      <h3 class="post-title"><?php the_title(); ?></h3>
                      <?php if($layout != 'no'){ ?>
                      	<p><?php the_excerpt(); ?></p>
                      <?php } ?>
                      <a href="<?php the_permalink(); ?>" class="btn theme-btn mt10">Read more</a>
                    </div>
                </article>
              </div>
              <?= ($layout == 'no' && $ct%3==0)?'<div class="clearfix"></div>':'';  ?>
          <?php $ct++; endwhile; ?>
          	</div>
          	</div>
          	<?php if($layout != 'no' && $layout == 'right'): ?>
                       <div class="col-md-4">
                            <div class="sidebar">
                            <?php 
                                if($sidebar_id && is_dynamic_sidebar( $sidebar_slug )){
                                    dynamic_sidebar( $sidebar_slug );
                                }
                            ?>
                            </div>
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