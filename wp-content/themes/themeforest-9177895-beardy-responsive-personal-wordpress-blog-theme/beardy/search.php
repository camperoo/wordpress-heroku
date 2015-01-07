<?php
/**
 * The template for displaying search results pages.
 *
 * @package Beardy
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
	<div class="row clearfix">
		<div class="wrap clearfix">

			<div class="full">
				<header class="page-header">
					<h5 class="littletitle"><?php _e( 'Search results for', 'rey' ); ?></h5>
					<h1 class="bigtitle"><?php echo get_search_query(); ?></h1>
				</header><!-- .page-header -->
			</div>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php rey_paging_nav(); ?>

		</div>
	</div>
	<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

<?php get_footer(); ?>
