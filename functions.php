<?php

//add_filter('show_admin_bar', '__return_false');

/**
 * Reboot functions and definitions
 */

/*-----------------------------------------------------------------------------------*/
/* Declaring the content width based on the theme's design and stylesheet
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
  $content_width = 940; /* pixels */

/*-----------------------------------------------------------------------------------*/
/* Declaring the theme language domain (for language translations)
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain('reboot');

/*-----------------------------------------------------------------------------------*/
/* Enqueue & Register JS and CSS
/*-----------------------------------------------------------------------------------*/

function queue_assets() {
	$data = get_option("reboot_options");

	$body_font = ucwords($data['body_font']['face']);
	$mission_font = ucwords($data['mission_font']['face']);
	$headings_font = ucwords($data['headings_font']['face']);
	$logo_font = ucwords($data['logo_font']['face']);
  $alt_stylesheet = ($data['alt_stylesheet']);

if ( !is_admin() ) {
	wp_deregister_script('jquery');

  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() .'/js/bootstrap.js');
	wp_enqueue_script('modernizr', get_template_directory_uri() .'/js/modernizr-2.0.min.js');
	wp_enqueue_script('superfish', get_template_directory_uri() .'/js/superfish.js');
	wp_enqueue_script('custom-js-settings', get_template_directory_uri() .'/js/jquery.custom.settings.js');
	//wp_enqueue_script('fancybox-js', get_template_directory_uri() .'/js/jquery.fancybox.min.js');
	//wp_enqueue_script('fancybox-settings', get_template_directory_uri() .'/js/jquery.fancybox.settings.js');

  // Register Scripts
  wp_register_script('isotope', get_template_directory_uri() .'/js/jquery.isotope.min.js');
	wp_register_script('wait-for-images', get_template_directory_uri() .'/js/jquery.waitforimages.js');
	//wp_register_script('flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js');
  //wp_register_script('flexslider-settings', get_template_directory_uri() .'/js/jquery.flexslider-settings.js');
	wp_register_script('jquery-easing', get_template_directory_uri() .'/js/jquery.easing-1.3.js');
	wp_register_script('jquery-validate', get_template_directory_uri() .'/js/jquery.validate.min.js');
	wp_register_script('jquery-verify', get_template_directory_uri() .'/js/verif.js');

  // Enqueue Styles
  //wp_enqueue_style('fancybox', get_template_directory_uri().'/css/fancybox/fancybox.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap/bootstrap.css');
	wp_enqueue_style('responsive', get_template_directory_uri().'/css/bootstrap/bootstrap-responsive.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome/font-awesome.css');
	//wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider/flexslider.css');
	wp_enqueue_style("body-font", "https://fonts.googleapis.com/css?family={$body_font}");
	wp_enqueue_style("mission-font", "https://fonts.googleapis.com/css?family={$mission_font}");
	wp_enqueue_style("headings-font", "https://fonts.googleapis.com/css?family={$headings_font}");
	wp_enqueue_style("logo-font", "https://fonts.googleapis.com/css?family={$logo_font}");
  wp_enqueue_style('main-styles', get_template_directory_uri().'/style.css');
  wp_enqueue_style('options-css', get_template_directory_uri().'/css/dynamic-css/options.css');
  wp_enqueue_style("alt-stylesheet", get_template_directory_uri()."/css/{$alt_stylesheet}");

} else {
  wp_register_script('reboot-admin-custom', get_template_directory_uri() . '/js/jquery.custom.admin.js');
  }
}
add_action("init", "queue_assets");

// Load Homepage scripts (isotope, flexslider etc...) only on Homepage
function gt_homepage_scripts() {
  if (is_page_template('template-homepage.php') ) {
  wp_enqueue_script('isotope');
  wp_enqueue_script('jquery-easing');
  wp_enqueue_script('wait-for-images');
  wp_enqueue_script('flexslider');
  wp_enqueue_script('flexslider-settings');
  }
}
add_action('wp_enqueue_scripts', 'gt_homepage_scripts');

// Load Portfolio scripts (isotope etc...) only on Portfolio page
function gt_portfolio_scripts() {
  if (is_page_template('template-portfolio.php') ) {
  wp_enqueue_script('isotope');
  wp_enqueue_script('jquery-easing');
  wp_enqueue_script('wait-for-images');
  }
}
add_action('wp_enqueue_scripts', 'gt_portfolio_scripts');

// Load Contact Form scripts (validation etc...) only on Contact page
function gt_contact_scripts() {
  if (is_page_template('template-contact.php') ) {
    wp_enqueue_script('jquery-validate');
    wp_enqueue_script('jquery-verify');
    }
}
add_action('wp_enqueue_scripts', 'gt_contact_scripts');

// Load (Fancybox etc...) scripts only on Singular pages
function gt_singular_scripts() {
  if (is_singular() ) {
    wp_enqueue_script('comment-reply');
    wp_enqueue_script('flexslider');
    wp_enqueue_script('flexslider-settings');
    }
}
add_action('wp_enqueue_scripts', 'gt_singular_scripts');

// Load Custom admin script (Portfolio type chooser)
function gt_admin_scripts() {
    wp_enqueue_script('reboot-admin-custom');
}
add_action('wp_print_scripts', 'gt_admin_scripts');

/*-----------------------------------------------------------------------------------*/
/* Register Custom Menus
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_nav_menus') ) :
	register_nav_menus( array(
		  'Header' => __('Header Navigation Menu', 'reboot')
		) );
endif;

function gt_fallback() {
	echo '<ul id="nav" class="group">';
	wp_list_pages('title_li=&');
	echo '</ul>';
}

/*-----------------------------------------------------------------------------------*/
/* Enable Dropdown Select Box Menu for smaller screen sizes (Smartphone, Tablet etc...)
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/functions/dropdown-menus.php' );

/*-----------------------------------------------------------------------------------*/
/* Register Sidebars/Widget Areas
/*-----------------------------------------------------------------------------------*/

function gt_widgets_init() {

  register_sidebar( array(
    'name' => 'Welcome Banner',
    'id'   => 'welcome-banner',
    'before_widget' => '<div id="welcome-banner" class="widget %2$s span12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));


  register_sidebar( array(
    'name' => 'Page Sidebar',
    'id' => 'sidebar-page',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

  register_sidebar( array(
    'name' => 'Blog Sidebar',
    'id' => 'sidebar-blog',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

  register_sidebar( array(
    'name' => 'Footer Sidebar #1',
    'id'   => 'footer-sidebar-1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));

  register_sidebar( array(
    'name' => 'Footer Sidebar #2',
    'id'   => 'footer-sidebar-2',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));

  register_sidebar( array(
    'name' => 'Footer Sidebar #3',
    'id'   => 'footer-sidebar-3',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));

  register_sidebar( array(
    'name' => 'Footer Sidebar #4',
    'id'   => 'footer-sidebar-4',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ));

}

add_action( 'init', 'gt_widgets_init' );

add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Call Custom Post Types
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/functions/custom-post-types/portfolio-type.php' );
require_once( get_template_directory() . '/functions/custom-post-types/slider-type.php' );
require_once( get_template_directory() . '/functions/custom-post-types/services-type.php' );

/*-----------------------------------------------------------------------------------*/
/* Setup custom Metaboxes
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/functions/theme-portfoliometa.php' );
require_once( get_template_directory() . '/functions/theme-slidermeta.php' );
require_once( get_template_directory() . '/functions/theme-servicesmeta.php' );

/*-----------------------------------------------------------------------------------*/
/* Call to Custom Theme Functions
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/functions/theme-functions.php' );

/*-----------------------------------------------------------------------------------*/
/* Call to Custom (Twitter Bootstrap) Shortcodes
/*-----------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/functions/shortcodes.php' );

/*-----------------------------------------------------------------------------------*/
/* Add support, and configure Thumbnails (for WordPress 2.9+)
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 200, 200, true ); // Normal post thumbnails
add_image_size( 'large', 632, 290, true ); // Large thumbnails
add_image_size( 'small', 125, '', true ); // Small thumbnails
add_image_size( 'gallery-thumbnail', 800, 320, true ); // WP Gallery shortcode thumbnails
add_image_size( 'latest-thumb', 400, 225, true ); // Latest Work/Latest News Thumbnails (appears on Homepage)
add_image_size( 'post-index', 780, 320, true ); // Post Thumbnail (appears on Blog index)
add_image_size( 'single-post', 800, 460, true ); // Fullsize Image (appears on Single Post page)
add_image_size( 'feature-image', 1200, 550, true ); // Fullsize Image (appears on Portfolio page)
add_image_size( 'portfolio-thumb', 400, 225, true ); // Portfolio Thumbnail (appears on Portfolio page)
add_image_size( 'related-thumb', 100, 100, true ); // Related Projects Thumbnail (appears on Single Portfolio page)
add_image_size( 'large-slider-thumb', 1200, 550, true ); // Large Slider Thumbnail (appears on the homepage)
add_image_size( 'services-thumb', 65, 65, true ); // Thumbnails for the Service descriptions (appears on the homepage)
}

/*-----------------------------------------------------------------------------------*/
/* Custom Excerpt function
/*-----------------------------------------------------------------------------------*/

function gt_excerpt($more) {
  global $post;
  return '&nbsp; &nbsp;<br /><br /><a href="'. get_permalink($post->ID) . '" class="btn btn-inverse btn-small read-more">Continue Reading</a>';
}

add_filter('excerpt_more', 'gt_excerpt');

/*-----------------------------------------------------------------------------------*/
/* Add support for Post Formats
/*-----------------------------------------------------------------------------------*/

add_theme_support('post-formats', array( 'aside', 'gallery', 'link', 'quote', 'video', 'audio'));

/*-----------------------------------------------------------------------------------*/
/* Remove inline styling for WP Gallery shortcode
/*-----------------------------------------------------------------------------------*/

add_filter( 'use_default_gallery_style', '__return_false' );

/*-----------------------------------------------------------------------------------*/
/* Assign custom WP Gallery shortcode and function
/*-----------------------------------------------------------------------------------*/

remove_shortcode( 'gallery' );
add_shortcode( 'gallery' , 'custom_gallery' );
function custom_gallery($attr) {
    global $post;

    static $instance = 0;
    $instance++;

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'gallery-thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        $gallery_style = "
        <style type='text/css'>
            #{$selector} .gallery-item {
                width: {$itemwidth}%;
            }
        </style>";
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '';
    }

    $output .= "
            <div style='clear:both;'></div>
        </div>\n";

    return $output;
}

/*-----------------------------------------------------------------------------------*/
/* Custom Navigation for Single Posts
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'gt_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function gt_content_nav( $nav_id ) {
	global $wp_query;

	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'reboot' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'reboot' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
		<li class="next"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'reboot' ) ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="previous"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'reboot' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>

	<?php
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Call to the Options Framework
/*-----------------------------------------------------------------------------------*/

require_once ('admin/index.php');
