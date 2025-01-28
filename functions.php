<?php
///////////////////////////////////////////////////////////////
////////Carbonate functions and definitions. @package carbonate
///////////////////////////////////////////////////////////////
if ( ! defined( 'CARBONATE_VERSION' ) ) {
	define( 'CARBONATE_VERSION', '2.0.0' );
}


///////////////////////////////////////////////////////////////
//////// FEATURED IMAGE SUPPORT ///////////////////////////////
///////////////////////////////////////////////////////////////
add_theme_support( 'post-thumbnails' );


///////////////////////////////////////////////////////////////
//////// THEME CSS FILES //////////////////////////////////////
///////////////////////////////////////////////////////////////
function carbonate_theme_styles() {
    wp_enqueue_style( 'bootstrap_grid_css', get_template_directory_uri() . '/css/bootstrap-grid.min.css' );
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css', null, filemtime( get_stylesheet_directory().'/style.css') );
}
add_action( 'wp_enqueue_scripts', 'carbonate_theme_styles');


///////////////////////////////////////////////////////////////
//////// MENUS ////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
function carbonate_menus() {
    register_nav_menus(
        array(
        'carbonate-header-nav' => __( 'Carbonate Header' )
        )
    );
}
add_action( 'init', 'carbonate_menus' );


///////////////////////////////////////////////////////////////
//////// SETTINGS PAGE ACTIVATION /////////////////////////////
///////////////////////////////////////////////////////////////
require_once dirname( __FILE__ ) . '/inc/settings/class.settings-api.php';
require_once dirname( __FILE__ ) . '/inc/settings/class-settings.php';


///////////////////////////////////////////////////////////////
//////// THEME SETTINGS ///////////////////////////////////////
///////////////////////////////////////////////////////////////
// DEFAULTS FOR THEME SETTINGS
function carbonate_start(){
    if (empty(get_option('carbonate-settings'))){
        $carbonate = array('color-background' => '#ffffff', 'color-text' => '#222222', 'color-primary' => '#ff3399', 'color-secondary' => '#222222', 'color-button-text' => '#ffffff', 'color-link' => '#244be5', 'color-nav' => '#ffffff', 'headline-font' => 'Verdana', 'body-font' => 'Arial');
    } else {
        $carbonate = get_option('carbonate-settings');
    }
    return $carbonate;
}


// PRINTS DEFAULTS
function carbonate( $carbonate_option ){
    $carbonate = carbonate_start();
    return $carbonate[$carbonate_option];
}
add_action('' ,'carbonate');


// THEME SETTINGS FROM DATABASE
function carbonate_attributes(){
    $carbonate = carbonate_start();

    echo '<style>
    :root{
        --background:' . $carbonate['color-background'] . ';
        --text:' . $carbonate['color-text'] . ';
        --primary:' . $carbonate['color-primary'] . ';
        --secondary:' . $carbonate['color-secondary'] . ';
        --button-text:' . $carbonate['color-button-text'] . ';
        --link:' . $carbonate['color-link'] . ';
        --nav-text:' . $carbonate['color-nav'] . ';
        --headline:' . $carbonate['headline-font'] . ';
        --body:' . $carbonate['body-font'] . ';
    }
    </style>';
}
add_action('wp_head' ,'carbonate_attributes');


// SHOWS DEFAULT LOGO OR UPLOADED LOGO
function carbonate_logo(){
	if(empty(carbonate("theme-logo"))){
		$logo = bloginfo('template_directory') .'/images/logo.svg';
	} else {
		$logo = carbonate("theme-logo");
	}
	return $logo;
}


///////////////////////////////////////////////////////////////
//////// FEATURES /////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// READ TIME CALCULATION
function carbonate_reading_time() {
    $content = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);
    $timer = " min";
    $totalreadingtime = $readingtime . $timer;
    return $totalreadingtime;
}


// ADD ... TO END OF EXCERPT
function new_excerpt_more($more) {
        return '...';
    }
add_filter('excerpt_more', 'new_excerpt_more');


// YOAST, RANKMATH, AND DEFAULT DESCRIPTIONS
function carbonate_post_description(){
    global $post;
    $rankmath = 'rank_math_description';
    $yoast = '_yoast_wpseo_metadesc';
    $description = wp_trim_words(get_the_excerpt(), 20);
    if(in_array('wordpress-seo/wp-seo.php', apply_filters('active_plugins', get_option('active_plugins')))){
        $description = get_post_meta($post->ID, $yoast, true);
    }
    if(in_array('seo-by-rank-math/rank-math.php', apply_filters('active_plugins', get_option('active_plugins')))){
        $description = get_post_meta($post->ID, $rankmath, true);
    }
    echo $description;
}


function carbonate_breadcrumbs() {
    global $post;
    $category = get_the_category( $post->ID );
    $i = 0;
    foreach($category as $cat){
        $parent = get_term($cat->parent, 'category');
        if($cat->parent == 0){
            echo '<a href="/category/'.$cat->slug.'" class="underline">'.$cat->name.'</a>';
        } else {
            echo '<a href="/category/'.$parent->slug.'" class="underline">'.$parent->name.'</a>  &#187; <a href="/category/'.$parent->slug.'/'.$cat->slug.'" class="underline">'.$cat->name.'</a>';
        }
        if(++$i < 2) break;
    }
}