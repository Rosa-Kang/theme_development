<?php
/**
 * Therosessom Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package trs_Theme
 */

if ( ! function_exists( 'trs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function trs_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
    'primary' => esc_html( 'Primary Menu' ),
    'buttons-menu' => esc_html( 'Buttons Menu' ),
    'mobile-menu' => esc_html( 'Mobile Menu' ),
    'footer-menu' => esc_html( 'Footer Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Add theme support for custom line height
	add_theme_support( 'custom-line-height' );

	// Add theme support for custom units
	add_theme_support( 'custom-units' );

	// Add theme support for custom spacing
	add_theme_support( 'custom-spacing' );

}
endif; // trs_setup
add_action( 'after_setup_theme', 'trs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function trs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'trs_content_width', 1170 ); // Updated to match container width
}
add_action( 'after_setup_theme', 'trs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function trs_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Footer widget areas to match theme structure
	register_sidebar( array(
		'name'          => esc_html( 'Footer Logo' ),
		'id'            => 'footer-logo',
		'description'   => esc_html( 'Footer logo area' ),
		'before_widget' => '<div class="footer-logo-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html( 'Footer Column 1' ),
		'id'            => 'footer-1',
		'description'   => esc_html( 'First footer column' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html( 'Footer Column 2' ),
		'id'            => 'footer-2',
		'description'   => esc_html( 'Second footer column' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html( 'Footer Column 3' ),
		'id'            => 'footer-3',
		'description'   => esc_html( 'Third footer column' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'trs_widgets_init' );

/**
 * Filter the stylesheet_uri to output the compiled CSS file.
 */
function trs_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	// Check for compiled CSS file (could be from Tailwind build process)
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	} elseif ( file_exists( get_template_directory() . '/dist/css/style.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/dist/css/style.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'trs_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function trs_scripts() {
  wp_enqueue_style( 'trs-style', get_stylesheet_uri(), array(), time(), 'all' );
  
  // Preconnect to font CDNs for performance
  add_action( 'wp_head', function() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://use.typekit.net">' . "\n";
  }, 5 );
  
  // Google fonts with optimized loading
  wp_enqueue_style( 'trs-google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;600;700&family=Cinzel:wght@400;500;600;700&display=swap', array(), null );

  // Adobe typekit
  wp_enqueue_style('trs-fonts','https://use.typekit.net/zok3mvc.css', array(), null );

  // Animate.css - only load on pages that need it
  if ( is_front_page() || is_page_template( array( 'page-about.php', 'page-services.php' ) ) ) {
    wp_enqueue_style( 'trs-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1' );
  }

  // AOS (Animate on Scroll) - only load on pages that need it
  if ( is_front_page() || is_page_template( array( 'page-about.php', 'page-services.php', 'page-careers.php' ) ) ) {
    wp_enqueue_style('trs-aos-style','https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');
    wp_enqueue_script('trs-aos','https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);
  }

  // Swiper.js - conditional loading
  if ( is_page_template( array( 'page-about.php', 'page-video-library.php', 'page-services.php', 'page-careers.php', 'page-mentorship-programs.php') ) || is_front_page() ) {
    wp_enqueue_style( 'trs-swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.4.7');
    wp_enqueue_script( 'trs-swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '8.4.7', true);
    wp_enqueue_script( 'trs-gallery', get_template_directory_uri() . '/build/js/gallery.min.js', array('trs-swiper'), false, true );
  }
  
  // Core theme scripts
  wp_enqueue_script( 'trs-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true );
  wp_enqueue_script( 'trs-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true );
  
  // Conditional script loading
  if ( is_front_page() || is_page_template( array( 'page-about.php', 'page-services.php', 'page-careers.php' ) ) ) {
    wp_enqueue_script( 'trs-animations', get_template_directory_uri() . '/build/js/animations.min.js', array('jquery'), false, true );
  }

  wp_enqueue_script( 'trs-custom', get_template_directory_uri() . '/build/js/custom.min.js', array('jquery'), time(), true );

  // Add inline script for AOS initialization
  if ( wp_script_is( 'trs-aos', 'enqueued' ) ) {
    wp_add_inline_script( 'trs-aos', 'AOS.init({duration: 800, once: true});' );
  }

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'trs_scripts' );

/**
 * Add custom image sizes for Tailwind responsive design
 */
function trs_custom_image_sizes() {
	add_image_size( 'hero-mobile', 768, 576, true );
	add_image_size( 'hero-tablet', 1024, 576, true );
	add_image_size( 'hero-desktop', 1920, 1080, true );
	add_image_size( 'card-thumb', 400, 300, true );
	add_image_size( 'gallery-thumb', 600, 400, true );
}
add_action( 'after_setup_theme', 'trs_custom_image_sizes' );

/**
 * Add body classes for better Tailwind integration
 */
function trs_body_classes( $classes ) {
	// Add page template class
	if ( is_page_template() ) {
		$template = str_replace( '.php', '', get_page_template_slug() );
		$classes[] = 'template-' . str_replace( 'page-', '', $template );
	}

	// Add post type class
	if ( is_singular() ) {
		$classes[] = 'single-' . get_post_type();
	}

	// Add archive class for custom post types
	if ( is_post_type_archive() ) {
		$classes[] = 'archive-' . get_post_type();
	}

	return $classes;
}
add_filter( 'body_class', 'trs_body_classes' );

/**
 * Remove "Editor" links from sub-menus
 */
function trs_remove_submenus() {
  remove_submenu_page( 'themes.php', 'theme-editor.php' );
  remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'trs_remove_submenus', 110 );

/**
 * Add ACF options page - only if ACF is active
 */ 
if( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	) );
	
	// Add sub-option pages if needed
	acf_add_options_sub_page( array(
		'page_title' 	=> 'Business Information',
		'menu_title'	=> 'Business Info',
		'parent_slug'	=> 'theme-options',
	) );
	
	acf_add_options_sub_page( array(
		'page_title' 	=> 'Social Media',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'theme-options',
	) );
}

/**
 * Add admin notice if ACF is not active
 */
function trs_acf_admin_notice() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		?>
		<div class="notice notice-warning is-dismissible">
			<p><?php _e( '<strong>Therosessom Theme:</strong> This theme requires the Advanced Custom Fields plugin to be installed and activated for full functionality.', 'trs' ); ?></p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'trs_acf_admin_notice' );

/**
 * Team Post Archive
 * 
 * Change display order and display all posts
 */
function trs_teams_post_type( $query ) {
  if ( is_post_type_archive( 'team_members' ) && $query->is_main_query() ) {
      $query->set( 'posts_per_page', -1 );
      $query->set( 'order', 'ASC' );
      $query->set( 'orderby', 'date' );
      return;
  }
}
add_action( 'pre_get_posts', 'trs_teams_post_type', 1 );

/**
 * Optimize font loading with resource hints
 */
function trs_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'trs-google-fonts', 'done' ) && $relation_type === 'preconnect' ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'trs_resource_hints', 10, 2 );

/**
 * Add editor styles for Gutenberg to match Tailwind styles
 */
function trs_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'build/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'trs_add_editor_styles' );

// Include the setup functions from App namespace if using Sage-like structure
if ( file_exists( get_template_directory() . '/app/setup.php' ) ) {
	require_once get_template_directory() . '/app/setup.php';
}

// apply_filters( 'wpc_view_include_filename', $filter['view'], $filter, $set );
?>