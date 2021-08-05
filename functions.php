<?php

include('functions/functions_emojis.php');
include('functions/functions_posttypes.php');
include('functions/functions_shortcodes.php');
include('functions/functions_options.php');
include('functions/functions_woocommerce.php');

define('IMAGE_DIR', get_bloginfo('stylesheet_directory')."/lib/images/");
define('SCRIPT_DIR', get_bloginfo('stylesheet_directory')."/lib/js/");
define('LIBS_DIR', get_bloginfo('stylesheet_directory')."/lib/libs/");

add_theme_support( 'title-tag' );
	
remove_action('wp_head', 'wp_generator');

/**
 * Register and Enqueue Styles.
 */
function gj21_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'gj21-style', get_stylesheet_uri(), array(), $theme_version );
	wp_enqueue_style( 'fontawesome', get_bloginfo('stylesheet_directory')."/lib/fonts/font-awesome/css/all.min.css", array(), '' );
}

add_action( 'wp_enqueue_scripts', 'gj21_register_styles' );


/**
 * Register and Enqueue Scripts.
 */
function gj21_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );
	
	wp_enqueue_script( 'gj21-js', SCRIPT_DIR . 'scripts.js', array('jquery'), $theme_version, false );
	wp_script_add_data( 'gj21-js', 'async', true );
	
	if( is_page_template('page-termine.php') or 
		is_page_template('page-position_start.php') or 
		is_page_template('page-position.php') or
		is_category()) 
			wp_enqueue_script( 'colcade-js', LIBS_DIR . 'colcade.js', '', '', false );

}

add_action( 'wp_enqueue_scripts', 'gj21_register_scripts' );




function gj21_menus() {

	$locations = array(
		'primary'  => __( 'Hauptmenü', 'gj21' ),
		'meta'   => __( 'Meta-Menü', 'gj21' ),
		'positions'   => __( 'Positionen-Menü', 'gj21' ),
		'footer'   => __( 'Footer-Menü', 'gj21' ),
		'social'   => __( 'Sozialmenü', 'gj21' ),
		'partners'   => __( 'Partner-Menü', 'gj21' ),
		'join'   => __( 'Mach-Mit-Menü', 'gj21' )
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'gj21_menus' );



/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 600, 350 );
add_image_size( 'team', 600, 700 );
add_image_size( 'news', 600, 350 );




function gj21_setup()
{
	//load_theme_textdomain( 'gj21', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
    
    add_image_size( 'header', 2000, 9000 );    	

}
add_action( 'after_setup_theme', 'gj21_setup' );



function get_attachment_url_by_slug( $slug ) {
  $args = array(
    'post_type' => 'attachment',
    'name' => sanitize_title($slug),
    'posts_per_page' => 1,
    'post_status' => 'inherit',
  );
  $_header = get_posts( $args );
  $header = $_header ? array_pop($_header) : null;
  return $header ? wp_get_attachment_url($header->ID) : '';
}





// Walker for Position grid menu on home and /postionen 

class Positions_Menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		
		$page_id = get_post_meta( $item->ID, '_menu_item_object_id', true );
		$thumb = get_the_post_thumbnail_url($page_id);
		
		$output .= "<li class='" .  implode(" ", $item->classes) . "' style=\"background-image: url('".$thumb."')\">";
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '"><span>';
		} else {
			$output .= '<span>';
		}
 
		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</span></a>';
		} else {
			$output .= '</span>';
		}
	}
}



// block WP enum scans

if (!is_admin()) {
	// default URL format
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
	add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request) {
	// permalink URL format
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
	else return $redirect;
}


/* Auflistung aller Beiträge einer Kategorie	 */
function showCatentries($atts){
extract(shortcode_atts(array(
"catid" => '1'
), $atts));
$temp_query = $wp_query;
query_posts('showposts=50&cat='.$catid);

ob_start();

while (have_posts()) : the_post();
echo '<div class="catpost" id="post-';
the_ID();
echo '"><ul>';

echo '<li><a href="';
the_permalink();
echo '" rel="bookmark" title="';
the_title();
echo '">';
the_title();
echo '</a></li>';

echo '</ul></div>';
endwhile;
wp_reset_query();
return ob_get_clean();
}

add_shortcode("showCatentries", "showCatentries");


/* Auflistung aller Beiträge einer Kategorie ausführlicher	 */
function showCatentriesLong($atts){
extract(shortcode_atts(array(
"catid" => '1'
), $atts));
$temp_query = $wp_query;
query_posts('showposts=2&cat='.$catid);

while (have_posts()) : the_post();
echo '<div class="catpost" id="post-';
the_ID();
echo '">';

echo '<h3>';
the_title();
echo '</h3>';

if (has_post_thumbnail()) {
echo '<div class="threadimg">';
the_post_thumbnail('medium');
echo '</div>';
}

the_excerpt();
echo '</div>';
echo '<div><a href="';
the_permalink();
echo '" rel="bookmark" title="';
the_title();
echo '">komplette Pressemitteilung lesen</a></div>';
endwhile;
wp_reset_query();
}
add_shortcode("showCatentriesLong", "showCatentriesLong");



?>
