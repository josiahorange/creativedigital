<?php

function add_meta_tags() {
    ?>
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>



    <?php }
    add_action('wp_head', 'add_meta_tags');
    
function seopress_theme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'seopress_theme_slug_setup' );


function include_jquery()
{
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.0.min.js', '', 1, true);
    add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');


//removing wordpress unwanted enqueuing

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
//disable wp-embed
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_enqueue_scripts', 'my_deregister_scripts' );

function loadjs()
{
    wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
    wp_enqueue_script('customjs');


}
add_action('wp_enqueue_scripts', 'loadjs');

// Defer Javascript
function defer_parsing_js($url) {
//Add the files to exclude from defer. Add jquery.js by default
    $exclude_files = array('scripts.js');
//Bypass JS defer for logged in users
    if (!is_user_logged_in()) {
        if (false === strpos($url, '.js')) {
            return $url;
        }

        foreach ($exclude_files as $file) {
            if (strpos($url, $file)) {
                return $url;
            }
        }
    } else {
        return $url;
    }
    return "$url' defer='defer";

}
add_filter('clean_url', 'defer_parsing_js', 11, 1);

function load_stylesheets()
{
          wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
          wp_enqueue_style('bootstrap');

          wp_register_style('fontawesome', get_template_directory_uri() . '/css/all.min.css', array(), false, 'all');
          wp_enqueue_style('fontawesome');

          wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
          wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');






add_theme_support('menus');
//add_theme_support('widgets');
add_theme_support('post-thumbnails');
add_theme_support( 'custom-logo' );



register_nav_menus(
array(

    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
    'photography-menu' => __('Photography Menu', 'theme'),
    'home-menu' => __('Home Menu', 'theme'),
    'bg-menu' => __('BG Menu', 'theme'),



)

);






add_image_size('blog-small', 400, 300, true);
add_image_size('blog-large', 1152, 528, true);
add_image_size('ideasblog-small', 400, 400, true);
add_image_size('logo', 200, 200, true);
add_image_size('headerimage', 1000, 1000, true);





function my_first_post_type()
{
$args = array(

    'labels' => array(
          'name' => 'Web Dev Projects',
          'singular_name' => 'Web Dev Project',
          
    ),





    'hierarchical' => 'true',
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-money-alt',
    'supports' => array('title', 'editor', 'thumbnail'),
    //'rewrite' => array('slug' => 'custom name'),
   // 'rewrite' => array('slug' => 'ideas'),





);

    register_post_type('webdevprojects', $args);

}
add_action('init', 'my_first_post_type');

/*
function my_first_taxonomy()
{
    $args = array(
        'labels' => array(
               'name' => 'Web Dev Project Sections',
               'singular_name' => 'Buying Guide Section',
        ),

      'public' => true,
      'hierarchical' => 'true',
   

  
    );
    register_taxonomy('buyingguidessections', array('buyingguides'), $args);

}
add_action('init', 'my_first_taxonomy');
*/


function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 100,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );







//Except Length

add_filter( 'excerpt_length', function($length) {
    return 20;
} );



function table_of_contents( $atts ) {
    $html = "";
    if(function_exists('TOCTable')){

        $ints = explode('-', $atts['id']);

        $html = TOCTable($ints[0], $ints[1]);
    }

    return $html;
    
    //return wp_nav_menu( array( 'theme_location' => 'header', 'echo' => false ) );
   
}
add_shortcode( 'toc', 'table_of_contents' );


// no media comments
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );


