<?php

/*
* lawzone main functions
*/
/* Include */
define('THEME_DIRECTORY', get_stylesheet_directory_uri()); 
define('PARENT_THEME_DIR', get_template_directory_uri()); 


require_once('inc_function/lara_frame/admin-function.php'); 
require_once('inc_function/wp_bootstrap_navwalker.php'); 
require_once('inc_function/custom-post.php'); 
require_once('inc_function/meta-box.php'); 
require_once('inc_function/all-taxonomy.php');
require_once('inc_function/visual-meta-box.php');

//Order Post
require_once('inc_function/post-order/post-order.php');

//Pagination
require_once('inc_function/paginationFunction.php');

// Hook
require_once('inc_function/lawzone-hook.php');
require_once('inc_function/hook-template.php');

/* LawZone Widget */
require_once('inc_function/widgets/footer-follow-us.php');
require_once('inc_function/widgets/recent-custom-post.php');
require_once('inc_function/widgets/contact-us.php');
require_once('inc_function/widgets/flickr-album-gallery/flickr-album-gallery.php');
require_once('inc_function/widgets/google-map-widget.php');
require_once('inc_function/widgets/other-posts-widget.php');
require_once('inc_function/widgets/our-brochure-widget.php');
require_once('inc_function/widgets/wp-recent-posts.php');

// Shortcodes for King-Composer 
require_once('inc_function/shortcodes/king-portfolio.php');
require_once('inc_function/shortcodes/king-welcome-zone.php');
require_once('inc_function/shortcodes/king-request-a-callback.php');
require_once('inc_function/shortcodes/king-legal-memorandum.php');
require_once('inc_function/shortcodes/king-professional-expert.php');
require_once('inc_function/shortcodes/king-lawzone-testimonial.php');
require_once('inc_function/shortcodes/king-under-construction.php');
require_once('inc_function/shortcodes/king-lawzone-pricing.php');
require_once('inc_function/shortcodes/king-call-to-action.php');
require_once('inc_function/shortcodes/king-accordion.php');
require_once('inc_function/shortcodes/king-lawzone-blog.php');
require_once('inc_function/shortcodes/king-contactus.php');
require_once('inc_function/shortcodes/king-lawzone-slider.php');
require_once('inc_function/shortcodes/king-who-we-are.php');
require_once('inc_function/shortcodes/king-our-workandservice.php');
require_once('inc_function/shortcodes/king-latest-news-n-blog.php');
require_once('inc_function/shortcodes/king-project-gallery.php');
require_once('inc_function/shortcodes/king-counter.php');
require_once('inc_function/shortcodes/king-why-choose-us.php');
require_once('inc_function/shortcodes/king-about-lawyer.php');
require_once('inc_function/shortcodes/king-lawzone-google-map.php');

// Social Sharing
require_once('inc_function/social-sharing/social-sharing.php');

require_once 'inc_function/class-tgm-plugin-activation.php';



add_action('wp_head', 'lawzone_head');
function lawzone_head(){ ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php            
   /*            
    * Print the <title> tag based on what is being viewed.            
    */        
    global $page, $paged;             
    wp_title( '|', true, 'right' );                  
    //wp_title ( string $sep = '&raquo;', bool $display = true, string $seplocation = '' );
    //wp_title('<!--blah-->');
    // Add the blog name.
    bloginfo( 'name' );                   
    // Add the blog description for the home/front page.            
    $site_description = get_bloginfo( 'description' );            
    if ( $site_description && ( is_home() || is_front_page() ) )              
      echo " | $site_description";                    
    // Add a page number if necessary:  
    
    if ( $paged >= 2 || $page >= 2 )              
      echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );         
    ?></title>  
<!-- Stylesheets -->
<?php $favicon =  (ls_option('favicon'))?ls_option('favicon'):get_template_directory_uri(). '/css/images/favicon.png'; ?>
<link rel="shortcut icon" type="image/png" href="<?= $favicon; ?>" />


<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<?php
}

/*
* WP Enqueue Script
*/
function lawzone_scripts() {
	/* Style File */
	wp_enqueue_style( 'style', get_stylesheet_uri(), '', '1.0.0');
	wp_enqueue_style( 'bootstrap-css', PARENT_THEME_DIR . '/css/bootstrap.css', '', '3.1.1');
	wp_enqueue_style( 'flexSlider-css', PARENT_THEME_DIR . '/css/flexslider.css', '', '3.1.2'); 
	wp_enqueue_style( 'bx-slider-css', PARENT_THEME_DIR . '/css/jquery.bxslider.min.css', '', '3.2.2', 'screen' );
	wp_enqueue_style( 'nivo-slider-css', PARENT_THEME_DIR . '/css/nivo-slider.css', '', '3.2.3'); 
	wp_enqueue_style( 'nivo-slider-dflt', PARENT_THEME_DIR . '/css/nivo-slider-default.css', '', '3.2.4'); 
	wp_enqueue_style( 'swiper', PARENT_THEME_DIR . '/css/swiper.min.css', '', '3.2.5'); 
	
	wp_enqueue_style( 'revolution-slider', PARENT_THEME_DIR . '/css/revolution-slider.css', '', '3.2.6', 'screen' );
	wp_enqueue_style( 'responsive', PARENT_THEME_DIR . '/css/responsive.css', '', '3.2.7', 'screen' );
	wp_enqueue_style( 'ls_style', PARENT_THEME_DIR . '/css/style.min.css', array(), '5.2.99');
	wp_enqueue_style( 'woocommerce', PARENT_THEME_DIR . '/css/woocommerce.min.css', array(), '9.8.17', 'screen');
	

	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', '', '1.0.0', false );
	wp_enqueue_script('YTPlayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js', '', '1.4.1', true );
	wp_enqueue_script('all-jquery', get_template_directory_uri() . '/js/all-jquery.js', '', '1.4.3', true );
	wp_enqueue_script('js-script', get_template_directory_uri() . '/js/script.js', '', '1.4.4', true );

	wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.11.4/jquery-ui.js', '', '1.4.5', true );
	
	wp_enqueue_script('revolution-js', get_template_directory_uri() . '/js/revolution.min.js', '', '1.4.7', true );
	wp_enqueue_script('rev-custom', get_template_directory_uri() . '/js/rev-custom.js', '', '1.4.9', true );
	wp_enqueue_script('pagenav', get_template_directory_uri() . '/js/pagenav.js', '', '1.4.10', true );
	

 wp_enqueue_script( 'comment-reply' );
	
}
add_action( 'wp_enqueue_scripts', 'lawzone_scripts' );



function wpse71451_enqueue_comment_reply() {
    if ( get_option( 'thread_comments' ) ) { 
        wp_enqueue_script( 'comment-reply' ); 
    }
}
// Hook into comment_form_before
add_action( 'wp_enqueue_scripts', 'wpse71451_enqueue_comment_reply' );

/*
* CH Option for Admin function and get data from theme options
*/
function ls_option($data){
	$ch_data = new ch_option;
	return $ch_data->ch_get_opt($data);
}


/*
* Register Menus
*/
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'lawzone' ),
) );

/*
* Thumbnail support
*/

add_theme_support( 'post-thumbnails', array( 'post', 'slider', 'practice', 'attorney', 'testimonial', 'project', 'page', 'product', 'court' ) ); // Posts and Movies



/**
 * Register Sidebar
 */
function lawzone_register_sidebars() {



	/**
	 * The WordPress Query class.
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 *
	 */
	$args = array(
		//Type & Status Parameters
		'post_type'   => 'widget',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);

	$query = new WP_Query( $args );
	if($query->have_posts()): while($query->have_posts()): $query->the_post();
		global $post;
		$description 	= get_post_meta( $post->ID, 'description', true );
		$before_widget 	= htmlspecialchars_decode(get_post_meta($post->ID, 'before_widget', true)); 
		$after_widget 	= htmlspecialchars_decode(get_post_meta($post->ID, 'after_widget', true)); 
		$before_title 	= htmlspecialchars_decode(get_post_meta($post->ID, 'before_title', true));
		$after_title 	= htmlspecialchars_decode(get_post_meta($post->ID, 'after_title', true));

		register_sidebar(
			array(
				'id' => $post->post_name,
				'name' => __( get_the_title(), 'lawzone' ),
				'description' => __( $description, 'lawzone' ),
				'before_widget' => $before_widget,
				'after_widget' => $after_widget,
				'before_title' => $before_title,
				'after_title' => $after_title
			)
		);	
	endwhile; endif; wp_reset_query(); wp_reset_postdata();

		
		register_sidebar( //Footer
			array(
				'id' => 'footer-contents',
				'name' => __( 'Footer Contents', 'lawzone' ),
				'description' => __( 'Lawzone Footer Widget Items.', 'lawzone' ),
				'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 col-xs-12 widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);	



		register_sidebar(
			array(
				'id' => 'shop-sidebar',
				'name' => __( 'Woocommerce Shop Sidebar', 'lawzone' ),
				'description' => __( 'Woocommerce Shop / Archive Sidebar.', 'lawzone' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget law-widget widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<div class="sidebar-title"><h2 class="widget-title">',
				'after_title' => '</h2></div>'
			)
		);	

		
	/* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'lawzone_register_sidebars' );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );



/*
* Slider image show on admin column
* Source: https://wordpress.stackexchange.com/questions/203571/how-to-display-posts-thumbnail-in-dashboard-all-posts-row-in-first-column
*/
add_image_size( 'admin-list-thumb', 80, 80, false );

// add featured thumbnail to admin post columns
function wpcs_add_thumbnail_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'slider-cat' => 'Slider Style',
        'featured_thumb' => 'Slider Image',
        'date' => 'Date'
    );
    return $columns;
}

function wpcs_add_thumbnail_columns_data( $column, $post_id ) {

	$slider_img     = esc_html(get_post_meta( $post_id, 'slider_img', true ));
    switch ( $column ) {
    case 'featured_thumb':
    	$img = wp_get_attachment_image_src( $slider_img, 'thumbnail', false );
        echo '<a href="' . get_edit_post_link() . '">';
       	echo '<img style="max-width:50px;" src="'.$img[0].'"/>';  
        echo '</a>';
    break;
    case 'slider-cat':
    	$cats = get_the_terms( $post_id, 'slider-cat' );
    	$arrays = array(); 
    	foreach($cats as $ct){
    		array_push($arrays, $ct->name);
    	}
    	echo '<a href="' . get_edit_post_link() . '">';
       	echo implode(',', $arrays);  
        echo '</a>';
    break;
    }
}

if ( function_exists( 'add_theme_support' ) ) {
	if(isset($_GET['post_type']) && $_GET['post_type'] == 'slider'):
	    add_filter( 'manage_posts_columns' , 'wpcs_add_thumbnail_columns' );
	    add_action( 'manage_posts_custom_column' , 'wpcs_add_thumbnail_columns_data', 10, 2 );
    endif;
}

//Woocommerce Function 
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {   
    $fragments['a.ajax-total-count sup'] = '<sup>' . WC()->cart->get_cart_contents_count() . '</sup>';
    
    return $fragments;
    
}


// Woocommerce Product per archive page
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
	$amount = ls_option('product_item_per_page');
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = ($amount)?$amount:12;
  return $cols;
}







add_filter( 'widget_title', 'html_widget_title_replace' ); //Uses the built in filter function.  The title of the widget is passed to the function.

function html_widget_title_replace($html_widget_title) {

	$html_widget_title_tagopen = '['; //Our HTML opening tag replacement
	$html_widget_title_tagclose = ']'; //Our HTML closing tag replacement

	$html_widget_title = str_replace($html_widget_title_tagopen, '<', $html_widget_title);
	$html_widget_title = str_replace($html_widget_title_tagclose, '>', $html_widget_title);

	return $html_widget_title;
}



function lawzone_all_post_types(){
	    global $wpdb;
        $table = $wpdb->prefix . 'posts';
        $post_types = $wpdb->get_results( "SELECT `post_type` FROM ".$table." GROUP BY `post_type`", OBJECT );
        $alltypes = array();
        foreach($post_types as $pst) $alltypes[$pst->post_type] = $pst->post_type;

        $removs = array('attachment', 'kc-section', 'fa_gallery', 'nav_menu_item', 'slider');
        $posts = array_diff($alltypes, $removs);
        return $posts;
}

function lawzone_get_taxonomy($taxonomys){
		global $wpdb;
		$terms  	= $wpdb->prefix . 'terms';
		$taxonomy 	= $wpdb->prefix . 'term_taxonomy';

		$output = array();
	 	$query = $wpdb->get_results( "SELECT * FROM ".$terms." LEFT JOIN ".$taxonomy." ON ".$terms.".term_id=".$taxonomy.".term_id WHERE ".$taxonomy.".taxonomy = '".$taxonomys."' ", OBJECT );
	 	foreach($query as $tax) $output[$tax->slug] = $tax->name;
	 return $output;
}

function lawzone_all_posts($post_type){
	$argsf = array(   
            //Type & Status Parameters
           'post_type'   => $post_type,
           'post_status' => 'publish',
           'posts_per_page' => -1
       );

      $forms = new WP_Query($argsf);
      $contactForms = array(''=>'Select Contact Form');
      if($forms->have_posts()):
      	while($forms->have_posts()): $forms->the_post(); global $post;
      		$contactForms[$post->ID] = get_the_title();
      	endwhile;
      endif; wp_reset_query();
      return $contactForms;
}

/* Under Constructin Function */
function underconstruction(){
	wp_reset_query(); wp_reset_postdata();
	$active = ls_option('under_construction');
	$cspage = ls_option('under_construction_page');
	global $post;

	
	if(!is_page($cspage) && $active == 'yes' && !is_user_logged_in()):
		echo '
		<script>
			jQuery(location).attr("href","'.get_the_permalink($cspage).'");
		</script>';
	endif;
}
add_action( 'wp_head', 'underconstruction', 10 );


function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchformOmar" class="Omar searchform" action="' . home_url( '/' ) . '" >
   
   <div class="sidebar-widget search-box ptn">
          <div class="form-group mb0">
             <input type="search" name="s" id="s" value="' . get_search_query() . '" placeholder="Search">
             <button type="submit"><span class="icon icon-Search"></span></button>
          </div>
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );




/* Move Comment Textarea to bottom */
function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );



/* Google Tracking code */
function googleTrackingCode() {
	$trackingID = ls_option('google_analytics_tracking_id');
	if($trackingID):
    ?>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', '<?= $trackingID; ?>', 'auto');
	  ga('send', 'pageview');
	</script>
    <?php
    endif;
}
add_action('after_body_open_tag', 'googleTrackingCode', 10);



/* Chagne Admin login Logo */
if(!function_exists('lowzone_login_logo')){
function lowzone_login_logo() { 
	$cLogo = ls_option('custom_login_logo_id');
	if($cLogo):
	?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?= wp_get_attachment_url( $cLogo ); ?>);
		height:auto;
		width:auto;
		background-size: auto;
		background-repeat: no-repeat;
        padding-bottom: 30px;
        background-position: center center;
        }
    </style>
<?php endif; }
add_action( 'login_enqueue_scripts', 'lowzone_login_logo' );
}

if(!function_exists('lawzone_login_logo_url')){
	function lawzone_login_logo_url() {
	    return home_url();
	}
	add_filter( 'login_headerurl', 'lawzone_login_logo_url' );
}

if(!function_exists('lawzone_login_logo_url_title')){
function lawzone_login_logo_url_title() {
    return 'Powered by LaraSoft';
}
add_filter( 'login_headertitle', 'lawzone_login_logo_url_title' );
}



/*-----------------------------------------------------------------------------------*/
/*	 require plugin of learncare
/*-----------------------------------------------------------------------------------*/


if (!function_exists('learncare_req_plugins_include')) {

	function learncare_req_plugins_include() {
		$plugins = array(
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => true,
			),

			array(
				'name'      => 'KingComposer',
				'slug'      => 'kingcomposer',
				'required'  => true,
			),
			array(
				'name'      => 'WooCommerce',
				'slug'      => 'woocommerce',
				'required'  => true,
			),
			array(
				'name'      => 'WooCommerce WishList',
				'slug'      => 'ti-woocommerce-wishlist',
				'required'  => true,
			),
			array(
				'name'      => 'WordPress Importer',
				'slug'      => 'wordpress-importer',
				'required'  => true,
			),
			array(
				'name'      => 'widget Import Export',
				'slug'      => 'widget-settings-importexport',
				'required'  => true,
			)
			

			
			/*array(
				'name'                  => 'Revolution Slider', // The plugin name
				'slug'                  => 'revslider', // The plugin slug (typically the folder name)
				'source'                => 'http://learncare.themexlab.com/wp-content/uploads/revslider.zip', // The plugin source
				'required'              => true, // If false, the plugin is only 'recommended' instead of required
				'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation'    => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'          => '', // If set, overrides default API URL and points to an external URL
			)*/
			
		);
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'id'           => 'lawzone',
			'domain' => 'lawzone', // Text domain - likely want to be the same as your theme.
			'default_path' => '', // Default absolute path to pre-packaged plugins
			'parent_slug' => 'themes.php', // Default parent URL slug
			'menu' => 'install-required-plugins', // Menu slug
			'has_notices' => true, // Show admin notices or not
			'is_automatic' => true, // Automatically activate plugins after installation or not
			'message' => '', // Message to output right before the plugins table
			'strings' => array(
				'page_title' => esc_html__('Install Required Plugins', 'lawzone'),
				'menu_title' => esc_html__('Install Plugins', 'lawzone'),
				'installing' => esc_html__('Installing Plugin: %s', 'lawzone'), // %1$s = plugin name
				'oops' => esc_html__('Something went wrong with the plugin API.', 'lawzone'),
				'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' , 'lawzone'), // %1$s = plugin name(s)
				'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'lawzone'), // %1$s = plugin name(s)
				'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'lawzone'), // %1$s = plugin name(s)
				'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'lawzone'), // %1$s = plugin name(s)
				'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'lawzone'), // %1$s = plugin name(s)
				'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'lawzone'), // %1$s = plugin name(s)
				'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'lawzone'), // %1$s = plugin name(s)
				'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'lawzone'), // %1$s = plugin name(s)
				'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'lawzone'),
				'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', 'lawzone'),
				'return' => esc_html__('Return to Required Plugins Installer', 'lawzone'),
				'plugin_activated' => esc_html__('Plugin activated successfully.', 'lawzone'),
				'complete' => esc_html__('All plugins installed and activated successfully. %s','lawzone'), // %1$s = dashboard link
				),
			);

		tgmpa($plugins, $config);

	}
}
add_action('tgmpa_register', 'learncare_req_plugins_include');





?>