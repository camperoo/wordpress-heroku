<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beardy
 */

get_header(); ?>

	<div class="row clearfix" style="padding-bottom:0;">
		<div class="wrap clearfix">

		<?php if ( have_posts() ) : ?>
			<div class="full">
			<header class="page-header">
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="littletitle">%s</div>', $term_description );
					endif;
				?>
				<h5 class="littletitle">
					<?php
						if ( is_category() ) :
							_e( 'All posts in', 'rey' );

						elseif ( is_tag() ) :
							_e( 'All posts tagged as', 'rey' );

						elseif ( is_author() ) :
							_e( 'All posts by', 'rey' );

						elseif ( is_day() ) :
							_e( 'Archive for', 'rey' );

						elseif ( is_month() ) :
							_e( 'Archive for', 'rey' );

						elseif ( is_year() ) :
							_e( 'Archive for', 'rey' );

						else :
							_e( 'Showing', 'rey' );

						endif;
					?>
				</h5>
				<h1 class="bigtitle" style="margin-bottom:0;">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							the_author();

						elseif ( is_day() ) :
							the_date();

						elseif ( is_month() ) :
							the_time('F, Y');

						elseif ( is_year() ) :
							the_time('Y');

						else :
							_e( 'Archives', 'rey' );

						endif;
					?>
				</h1>
			</header><!-- .page-header -->
			</div>

		</div><!-- #main -->
	</div><!-- #primary -->


	<div class="row clearfix">
		<div class="wrap clearfix">

			<?php /* Start the Loop */ ?>
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
