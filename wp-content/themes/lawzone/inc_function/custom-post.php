<?php 
/*
* Custom Post LawZone
*/

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function lawzone_register_slider() {

	$labels = array(
		'name'                => __( 'sliders', 'lawzone' ),
		'singular_name'       => __( 'slder', 'lawzone' ),
		'add_new'             => _x( 'Add New Slider', 'text-domain', 'lawzone' ),
		'add_new_item'        => __( 'Add New Slider', 'lawzone' ),
		'edit_item'           => __( 'Edit Slider', 'lawzone' ),
		'new_item'            => __( 'New Slider', 'lawzone' ),
		'view_item'           => __( 'View Slider', 'lawzone' ),
		'search_items'        => __( 'Search Slider', 'lawzone' ),
		'not_found'           => __( 'No Slider found', 'lawzone' ),
		'not_found_in_trash'  => __( 'No Slider found in Trash', 'lawzone' ),
		'parent_item_colon'   => __( 'Parent Slider:', 'lawzone' ),
		'menu_name'           => __( 'Sliders', 'lawzone' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title')
	);

	register_post_type( 'slider', $args );
}

add_action( 'init', 'lawzone_register_slider' );




/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function lawzone_register_court() {

	$labels = array(
		'name'                => __( 'courts', 'lawzone' ),
		'singular_name'       => __( 'court', 'lawzone' ),
		'add_new'             => _x( 'Add New Court', 'text-domain', 'lawzone' ),
		'add_new_item'        => __( 'Add New Court', 'lawzone' ),
		'edit_item'           => __( 'Edit Court', 'lawzone' ),
		'new_item'            => __( 'New Court', 'lawzone' ),
		'view_item'           => __( 'View Court', 'lawzone' ),
		'search_items'        => __( 'Search Court', 'lawzone' ),
		'not_found'           => __( 'No Court found', 'lawzone' ),
		'not_found_in_trash'  => __( 'No Court found in Trash', 'lawzone' ),
		'parent_item_colon'   => __( 'Parent Court:', 'lawzone' ),
		'menu_name'           => __( 'Courts', 'lawzone' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'post-formats')
	);

	register_post_type( 'court', $args );
}

add_action( 'init', 'lawzone_register_court' );





/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function lawzone_register_practice() {

	$labels = array(
		'name'                => __( 'Practices', 'lawzone' ),
		'singular_name'       => __( 'Practice', 'lawzone' ),
		'add_new'             => _x( 'Add New Practice & Service', 'text-domain', 'lawzone' ),
		'add_new_item'        => __( 'Add New Practice', 'lawzone' ),
		'edit_item'           => __( 'Edit Practice', 'lawzone' ),
		'new_item'            => __( 'New Practice', 'lawzone' ),
		'view_item'           => __( 'View Practice', 'lawzone' ),
		'search_items'        => __( 'Search Practice', 'lawzone' ),
		'not_found'           => __( 'No Practice found', 'lawzone' ),
		'not_found_in_trash'  => __( 'No Practice found in Trash', 'lawzone' ),
		'parent_item_colon'   => __( 'Parent Practice:', 'lawzone' ),
		'menu_name'           => __( 'Paractices & Services', 'lawzone' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt')
	);

	register_post_type( 'practice', $args );
}

add_action( 'init', 'lawzone_register_practice' );





/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function attorney_register_name() {

	$labels = array(
		'name'                => __( 'Members', 'lawzone' ),
		'singular_name'       => __( 'Member', 'lawzone' ),
		'add_new'             => _x( 'Add New Member', 'text-domain', 'lawzone' ),
		'add_new_item'        => __( 'Add New Member', 'lawzone' ),
		'edit_item'           => __( 'Edit Member', 'lawzone' ),
		'new_item'            => __( 'New Member', 'lawzone' ),
		'view_item'           => __( 'View Member', 'lawzone' ),
		'search_items'        => __( 'Search Member', 'lawzone' ),
		'not_found'           => __( 'No Members found', 'lawzone' ),
		'not_found_in_trash'  => __( 'No Members found in Trash', 'lawzone' ),
		'parent_item_colon'   => __( 'Parent Member:', 'lawzone' ),
		'menu_name'           => __( 'Our Teams', 'lawzone' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail', 'excerpt'
			)
	);

	register_post_type( 'attorney', $args );
}

add_action( 'init', 'attorney_register_name' );






/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function testimonial_register_name() {

	$labels = array(
		'name'                => __( 'Testimonials', 'text-domain' ),
		'singular_name'       => __( 'Testimonial', 'text-domain' ),
		'add_new'             => _x( 'Add New Testimonial', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Testimonial', 'text-domain' ),
		'edit_item'           => __( 'Edit Testimonial', 'text-domain' ),
		'new_item'            => __( 'New Testimonial', 'text-domain' ),
		'view_item'           => __( 'View Testimonial', 'text-domain' ),
		'search_items'        => __( 'Search Testimonials', 'text-domain' ),
		'not_found'           => __( 'No Testimonial', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Testimonial found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Testimonial Name:', 'text-domain' ),
		'menu_name'           => __( 'Testimonials', 'text-domain' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title', 'thumbnail', 'excerpt')
	);

	register_post_type( 'testimonial', $args );
}

add_action( 'init', 'testimonial_register_name' );





/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function lawzone_register_widget() {

	$labels = array(
		'name'                => __( 'Widgets', 'lawzone' ),
		'singular_name'       => __( 'Widget', 'lawzone' ),
		'add_new'             => _x( 'Add New Widget', 'text-domain', 'lawzone' ),
		'add_new_item'        => __( 'Add New Widget', 'lawzone' ),
		'edit_item'           => __( 'Edit Widget', 'lawzone' ),
		'new_item'            => __( 'New Widget', 'lawzone' ),
		'view_item'           => __( 'View Widget', 'lawzone' ),
		'search_items'        => __( 'Search Widgets', 'lawzone' ),
		'not_found'           => __( 'No Widget found', 'lawzone' ),
		'not_found_in_trash'  => __( 'No Widget found in Trash', 'lawzone' ),
		'parent_item_colon'   => __( 'Parent Widget:', 'lawzone' ),
		'menu_name'           => __( 'Widget', 'lawzone' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(	'title'	)
	);

	register_post_type( 'widget', $args );
}

add_action( 'init', 'lawzone_register_widget' );


/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function prefix_register_name() {

	$labels = array(
		'name'                => __( 'Projects', 'lawzone' ),
		'singular_name'       => __( 'Project', 'text-domain' ),
		'add_new'             => _x( 'Add New Project', 'text-domain', 'lawzone' ),
		'add_new_item'        => __( 'Add New Project', 'lawzone' ),
		'edit_item'           => __( 'Edit Project', 'lawzone' ),
		'new_item'            => __( 'New Project', 'lawzone' ),
		'view_item'           => __( 'View Project', 'lawzone' ),
		'search_items'        => __( 'Search Projects', 'lawzone' ),
		'not_found'           => __( 'No Projects found', 'lawzone' ),
		'not_found_in_trash'  => __( 'No Projects found in Trash', 'lawzone' ),
		'parent_item_colon'   => __( 'Parent Project Name:', 'lawzone' ),
		'menu_name'           => __( 'Projects', 'lawzone' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'post-formats')
	);

	register_post_type( 'project', $args );
}

add_action( 'init', 'prefix_register_name' );


