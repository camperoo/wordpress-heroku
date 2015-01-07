<?php
/**
 * Beardy functions and definitions
 *
 * @package Beardy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'rey_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rey_setup() {

	// CHANGE LOCAL LANGUAGE
	// must be called before load_theme_textdomain()
	add_filter( 'locale', 'my_theme_localized' );
	function my_theme_localized( $locale )
	{
		if ( isset( $_GET['l'] ) )
		{
			return esc_attr( $_GET['l'] );
		}

		return $locale;
	}	

	/*
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'rey', get_template_directory() . '/languages' );



	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rey' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'gallery', 'image'
	) );

	add_image_size( 'item-size', 500, 333, true );

}
endif; // rey_setup
add_action( 'after_setup_theme', 'rey_setup' );

/**
 * Register widget area.
 *
 */
function rey_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'rey' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

    register_sidebar(array(
        'name' => __( 'Footer Widget 1', 'rey' ),
        'id' => 'rey-footer-widget-1',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __( 'Footer Widget 2', 'rey' ),
        'id' => 'rey-footer-widget-2',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __( 'Footer Widget 3', 'rey' ),
        'id' => 'rey-footer-widget-3',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __( 'Footer Widget 4', 'rey' ),
        'id' => 'rey-footer-widget-4',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'rey_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rey_scripts() {

	// Enqueue Styles
	wp_enqueue_style( 'beardy-style', get_stylesheet_uri() );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( 'jquery-bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css' );

	// Register Scripts
	wp_register_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', 'jquery', '', true);
	wp_register_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '', true);
	wp_register_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', 'jquery', '', true);
	wp_register_script( 'SmoothScroll', get_template_directory_uri() . '/js/SmoothScroll.js', 'jquery', '', true);
	wp_register_script( 'gmaps', get_template_directory_uri() . '/js/gmaps.js', 'jquery', '', true);
	wp_register_script( 'gmapi', 'http://maps.google.com/maps/api/js?sensor=true', 'jquery', '', true);
	wp_register_script( 'retina', get_template_directory_uri() . '/js/retina.min.js', 'jquery', '', true);
	wp_register_script( 'beardy', get_template_directory_uri() . '/js/beardy.js', 'jquery', '', true);
	wp_register_script( 'validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', 'jquery');

	// Enqueue Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'parallax' );
	wp_enqueue_script( 'owl' );
	wp_enqueue_script( 'bxslider' );
	wp_enqueue_script( 'SmoothScroll' );
	wp_enqueue_script( 'retina' );
	wp_enqueue_script( 'beardy' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_page_template('template-contact.php') ) {
		wp_enqueue_script('validation');
		wp_enqueue_script( 'gmapi' );
		wp_enqueue_script( 'gmaps' );
	}

}
add_action( 'wp_enqueue_scripts', 'rey_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function rey_accent_color_style() {

	if ( get_theme_mod( 'accent_color' ) ) {
		echo '<style type="text/css">.entry-content a,.footer li:hover,.footer-widget.widget_recent_entries li:hover .post-date,a:hover,a:focus,a:active,span.category a,.testimonial a,.testimonial .link,.separator span i,.secundary-menu li a:hover,.main-navigation .sub-menu li a:hover,button:hover,input[type=button]:hover,input[type=reset]:hover,input[type=submit]:hover{ color:';
		echo get_theme_mod( 'accent_color' );
		echo ';}' . "\n";
		echo '.footer-widget.widget_tag_cloud .tagcloud a:hover,.social-footer li a:hover,.reviews span,.comment .author-tag,.widget_calendar thead th,.entry-sharing a.share:hover{background-color:';
		echo get_theme_mod( 'accent_color' );
		echo ';}</style>' . "\n";
	}
	if ( get_theme_mod( 'height_home_featured' ) ) {
		echo '<style type="text/css">.featured-item{ height:';
		echo get_theme_mod( 'height_home_featured' );
		echo 'px;}</style>' . "\n";
	}
	if ( get_option( 'toggle_sticky_header' ) == 0 ) {
		echo '<style type="text/css">.site-header { position: fixed; width: 100%; z-index: 100000; } .big-logo { padding-top: 37px; }';
		echo '</style>' . "\n";
	}
	if ( get_theme_mod( 'header_top_margin' ) || get_theme_mod( 'header_bottom_margin' ) ) {
		echo '<style type="text/css">.logo-box{';
		if ( get_theme_mod( 'header_top_margin' ) ) {
			echo 'margin-top:';
			echo get_theme_mod( 'header_top_margin' );
			echo ';';
		} if ( get_theme_mod( 'header_bottom_margin' ) ) {
			echo 'margin-bottom:';
			echo get_theme_mod( 'header_bottom_margin' );
			echo ';';
		}
		echo '}</style>' . "\n";
	}
	if ( get_theme_mod( 'site_title_size' ) || get_option( 'toggle_title_back' ) == 1 ) {
		echo '<style type="text/css">.text-logo{';
		if ( get_option( 'toggle_title_back' ) == 1 ) {
			echo 'background-color:transparent;padding:0;';
		} if ( get_theme_mod( 'site_title_size' ) ) {
			echo 'font-size:';
			echo get_theme_mod( 'site_title_size' );
			echo ';';
		}
		echo '}</style>' . "\n";
	}
	if ( get_theme_mod( 'big_title_size' ) ) {
		echo '<style type="text/css">h1.bigtitle,.reviews h2{ font-size:';
		echo get_theme_mod( 'big_title_size' );
		echo ';}</style>' . "\n";
	}
	if ( get_theme_mod('lot1_home_featured') || get_theme_mod('lot2_home_featured') || get_theme_mod('lot3_home_featured') || get_theme_mod('lot4_home_featured') || get_theme_mod('lot5_home_featured') ) { ?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(document).ready(function() {
				$(".featured-carousel").owlCarousel({
					nav : false,
					items : 6,
					margin: 20,
					responsive:{
				        0:{
				            items:<?php echo get_theme_mod( 'lot5_home_featured' ) ?>,
				        },
				        650:{
				            items:<?php echo get_theme_mod( 'lot4_home_featured' ) ?>,
				        },
				        900:{
				            items:<?php echo get_theme_mod( 'lot3_home_featured' ) ?>,
				        },
				        1100:{
				            items:<?php echo get_theme_mod( 'lot2_home_featured' ) ?>,
				        },
				        1300:{
				            items:<?php echo get_theme_mod( 'lot1_home_featured' ) ?>,
				        }
				    }
				});
			});
		});
		</script>
	<?php } else { ?>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(document).ready(function() {
				$(".featured-carousel").owlCarousel({
					nav : false,
					items : 6,
					margin: 20,
					responsive:{
				        0:{
				            items:2,
				        },
				        650:{
				            items:3,
				        },
				        900:{
				            items:4,
				        },
				        1100:{
				            items:5,
				        },
				        1300:{
				            items:6,
				        }
				    }
				});
			});
		});
		</script>
	<?php }
	if ( get_theme_mod( 'custom_css_source' ) ) {
		echo '<style type="text/css">';
		echo get_theme_mod( 'custom_css_source' );
		echo '</style>' . "\n";
	}

}
add_action( 'wp_head', 'rey_accent_color_style' );
