<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
   wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}
add_action('wp_enqueue_scripts', 'add_normalize_CSS');

// Register a new sidebar simply named 'sidebar'
function add_widget_support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_widget_support' );

 // Register a new navigation menu
register_nav_menus( array(
		'header-menu' => __( 'Header Menu' ),
		'footer' => __( 'Footer Menu')
	));

//thumbnail functions
function my_post_thumbnail_class( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = str_replace( 'class="', 'class="thumbnail ', $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'my_post_thumbnail_class', 10, 5 );

function my_custom_thumbnail_size() {
    add_image_size( 'my-thumbnail-size', 300, 200, true );
}
add_action( 'after_setup_theme', 'my_custom_thumbnail_size' );

//featured image functions
function custom_featured_image_size() {
  add_image_size( 'featured-image-size', 1000, 1000, true ); // adjust dimensions to your liking
}
add_action( 'after_setup_theme', 'custom_featured_image_size' );

function latest_thumbnail_size() {
    add_image_size( 'latest-image-size', 230, 130, true );
}
add_action( 'after_setup_theme', 'latest_thumbnail_size' );


