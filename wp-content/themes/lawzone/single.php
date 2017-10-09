<?php 
/*
* Single Content
*/
get_header();
$img_id 	    = ls_option('blog_details_header_background_id');
$overlayer 	    = ls_option('blog_details_header_overlayer'); 
$activeComment  = ls_option('active_comments'); 
$sidebar_id     = ls_option('blog_details_sidebar');
$sidebar_post   = get_post( $sidebar_id, OBJECT, 'raw' );
$sidebar_slug   = $sidebar_post->post_name;
$layout         = ls_option('blog_layout_style');


	if(have_posts()): while(have_posts()): the_post();
	$archive_year  = get_the_time('Y');
	$archive_month = get_the_time('m');
?>
  <section class="overlay <?= ($overlayer)?$overlayer:'overlayer-black';  ?> parallax" data-bg-image="<?= ($img_id)?wp_get_attachment_url( $img_id ):get_stylesheet_directory_uri() . '/css/images/bg/bg1.jpg'; ?> " data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-title">
            <h2><?php the_title();   ?></h2>
            <p>Home // <?php the_title();  ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- 1st-section -->
       <section class="inner-blog-single">
           <div class="section-content">
               <div class="container">
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
                        <div class="col-md-<?= ($layout == 'no')?'12':'8'; ?>">
                            <article class="post">
                                <div class="">
                                    <a href="javascript:void(0)">
                                    <?php 
                                    	if(has_post_thumbnail( )){
                                    		the_post_thumbnail( 'full', array('class'=>'img-responsive min100') );
                                    	}
                                    ?>
                                    </a>
                                  <div class="post-body">
                                    <div class="post-info"> 
				                      <a href="<?php echo get_month_link( $archive_year, $archive_month ); ?>"><?php the_time( 'F jS, Y' );  ?> - </a> 
				                      <a href="<?php the_permalink(); ?>"><span class="icon icon-Message"></span> <?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?></a> 
				                      <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> - <span class="icon icon-Pen"></span> by <?= get_the_author(); ?></a> 
				                      </div>
                                    <h3 class="post-title"><?php the_title(); ?></h3>
                                    <div class="content">
                                 		<?php the_content( ); ?>
                                 	</div>
                                  </div>
                                </div>

                                <?php if(comments_open() && $activeComment == 'yes'){
                                    echo '<h3>Comments</h3>';
                                    comments_template( );
                                    } ?>

                            </article>                          
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
                </div>
            </div>
       </section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>