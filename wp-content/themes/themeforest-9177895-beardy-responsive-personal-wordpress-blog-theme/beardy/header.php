<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Beardy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('favicon_image') ) : ?>
<link rel="shortcut icon" href="<?php echo get_theme_mod('favicon_image'); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header header clearfix" role="banner">
		<div class="wrap clearfix">
			<div class="site-navigation">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<a class="menu-toggle" href="#"><i class="fa fa-bars"></i></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="site-search">
				<a href="#"><i class="fa fa-search"></i></a>
			</div>
			<div class="search-toogle">
				<?php get_search_form(); ?>
			</div>
			<div class="site-mobile-navigation">
				<nav id="mobile-navigation" class="mobile-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
			</div>
		</div>
	</header><!-- #masthead -->

	<div class="big-logo" style="background-image: url(<?php echo esc_url( get_theme_mod( 'header_image' ) ); ?>);">
		<div class="wrap clearfix">
		<?php if ( get_theme_mod( 'image_logo' ) ): ?>
			<div class="site-title">
				<a class="logo-box" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img class="image-logo" src="<?php echo esc_url( get_theme_mod( 'image_logo' ) ); ?>" <?php if ( get_theme_mod( 'retina_image_logo' ) ){ ?>data-at2x="<?php echo esc_url( get_theme_mod( 'retina_image_logo' ) ); ?>"<?php } ?> alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</a>
			</div>
		<?php else : ?>
			<div class="site-title">
				<a class="logo-box" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<h1 class="text-logo"><?php bloginfo( 'name' ); ?></h1>
				</a>
			</div>
		<?php endif ?>
		</div>
	</div>

	<div id="content" class="site-content">
