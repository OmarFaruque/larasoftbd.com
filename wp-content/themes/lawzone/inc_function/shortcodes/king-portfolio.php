<?php 
/*
* Portfolio
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(class_exists( 'KingComposer' )){


$kc->add_map(
    array(
        'portfolio' => array(
            'name'        => 'Portfolio Items',
            'description' => __('Display Poertfolio Items', 'kingcomposer'),
            'icon'        => 'cpicon kc-icon-tabs',
            'category'    => 'Lawzone',

            'params'      => array(
                array(
                    'name'  	=> 'template_style',
                    'label' 	=> 'Portfolio Style',
                    'value' 	=> 'box',
                    'type'  	=> 'select',
                    'options' 	=> array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
						'box' 	=> 'Box Style',
						'full' 	=> 'Full Screen'
					)
                ),
                array(
                	'name' 		=> 'gutter',
                	'label' 	=> 'Gutter',
                	'value' 	=> 'gutter',
                	'type' 		=> 'select',
                	'options' 	=> array(
                		'gutter' => 'With Gutter',
                		'gutter-less' => 'Without Gutter'
                	)	
                ),
                array(
                	'name' 		=> 'colm',
                	'label' 	=> 'Column',
                	'value' 	=> 3,
                	'type' 		=> 'select',
                	'options' 	=> array(
                		3 => 'Three',
                		4 => 'Four',
                		5 => 'Five'
                	)	

                )
            )
        )
    )
);



add_shortcode( 'portfolio', 'portfolio_PHP_Function' );

function portfolio_PHP_Function( $atts ){ 
		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$args = array(
			//Type & Status Parameters
			'post_type'   => 'project',
			'post_status' => 'publish',
			'posts_per_page' => -1
		);
	$querys = new WP_Query( $args );
	if($querys->have_posts()):
?>
        <!-- portfolio start -->
        <section class="cs-portfolio-area-cu" style="width:100%;">
          <div style="padding-top:0; padding-bottom:0;" class="container<?= ($atts['template_style'] == 'full')?'-fluid':''; ?>">
            <div class="section-wrap">

                <div class="row clearfix">
                <div class="portfolio-filter-item mb30 text-center">
                        <ul class="portfolio-filter">
                        <?php 
                       	 $allterms = get_terms( 'project-cat', false ); 
                        ?>
                            <li class="active"><a href="#" data-filter="*">All Projects</a></li>
                        <?php foreach($allterms as $sterm): ?>   
                            <li><a href="#" data-filter=".<?= $sterm->slug;  ?>"><?= $sterm->name;  ?></a></li>
                        <?php endforeach ?>

                        </ul>
                    </div>

                    <div class="portfolio col-<?= $atts['colm']; ?> gutter<?= ($atts['gutter'] == 'gutter-less')?'-less':''; ?> mtn">
                   <?php while($querys->have_posts()): $querys->the_post(); global $post; 
                         $terms = get_the_terms( $post->ID, 'project-cat' );
                         $cats = array();
                         $classA = array();
                         if($terms):
                         foreach($terms as $t){
                         	array_push($cats, $t->name);
                         	array_push($classA, $t->slug);
                         } 
                         endif;

                    ?>
                   	 <div class="portfolio-item <?= ($classA)?implode(' ', $classA):''; ?>">
                            <div class="thumb">
                               <?php 
                               	if(has_post_thumbnail()):
                               		the_post_thumbnail( 'full', array('class'=>'img-responsive img-fluide') );
                               	else:
                               ?>
                                <img src="<?= get_stylesheet_directory_uri();  ?>/css/images/portfolio/01.jpg" alt="Portfolio">
                               <?php endif; ?>
                                <div class="portfolio-hover">
                                    <div class="portfolio-btn">
                                        <a href="<?= (has_post_thumbnail())?wp_get_attachment_url( get_post_thumbnail_id()):get_stylesheet_directory_uri() . '/css/images/portfolio/01.jpg';  ?>" class="popup-link" title="lightbox view"> <i class="icon icon-Search"></i>  </a>
                                    </div>
                                    <div class="portfolio-info">
                                        <h4><a href="<?php the_permalink(); ?>" class="popup-link" title="lightbox view"><?php the_title(); ?></a></h4>
                                        <p><a href="<?php the_permalink(); ?>"><?=($cats)?implode(', ', $cats):'Portfolio Category'; ?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                   <?php endwhile; ?>
                    </div>
                </div>
            </div>
         </div>
      
        <!-- portfolio end -->
    <?php endif; wp_reset_query(); ?>

<?php }
} // End check if class exist
?>

