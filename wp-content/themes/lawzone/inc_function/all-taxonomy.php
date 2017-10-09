<?php


function lawzone_create_my_taxonomy() {

    register_taxonomy(
        'practice-format',
        array('practice'),
        array(
            'label' => __( 'List Format' ),
            'rewrite' => array( 'slug' => 'practice-format' ),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );


    register_taxonomy(
        'slider-cat',
        array('slider'),
        array(
            'label' => __( 'Slider Category' ),
            'rewrite' => array( 'slug' => 'slider-cat' ),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );

    register_taxonomy(
        'project-cat',
        array('project'),
        array(
            'label' => __( 'Project Category' ),
            'rewrite' => array( 'slug' => 'project-cat' ),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );


    register_taxonomy(
        'member-cat',
        array('attorney'),
        array(
            'label' => __( 'Member Category' ),
            'rewrite' => array( 'slug' => 'member-cat' ),
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );

}

add_action( 'init', 'lawzone_create_my_taxonomy' );


function practice_insert_category() {
	$items = array('Our Services', 'thumbnail', 'box');
	foreach($items as $item):
    wp_insert_term(
       	$item,
        'practice-format',
        array(
          'description' => 'Practice Formate Texonomy Description',
          'slug'    => $item
         )
    );
	endforeach;
}
add_action('init','practice_insert_category');



function slider_category() {
  $items = array('revslider', 'Hero Slider', 'BX Slider', 'Flex Slider', 'Nivo Slider', 'Swiper Slider');
  foreach($items as $item):
    wp_insert_term(
        $item,
        'slider-cat',
        array(
          'description' => 'Practice Formate Texonomy Description',
          'tag-name'    => str_replace('_', ' ', $item),
          'slug'    => $item
         )
    );
  endforeach;
}
add_action('init','slider_category');


function attorey_category() {
  $items = array('Attorney', 'Lawer');
  foreach($items as $item):
    wp_insert_term(
        $item,
        'member-cat',
        array(
          'description' => 'Our team category',
          'slug'    => $item
         )
    );
  endforeach;
}
add_action('init','attorey_category');