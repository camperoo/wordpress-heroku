<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beardy
 */

get_header(); ?>



<div class="row clearfix" style="padding:60px 0 40px;">
	<div id="infinityscroll" class="wrap clearfix">
		<h5 class="littletitle"><?php echo get_theme_mod( 'home_posts_subtitle' ) ?></h5>
		<h1 class="bigtitle"><?php if ( get_theme_mod( 'home_posts_title' ) ) : echo get_theme_mod( 'home_posts_title' ); else : _e( 'Latest Posts', 'rey' ); endif;  ?></h1>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php rey_paging_nav(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>
</div>



<?php get_footer(); ?>