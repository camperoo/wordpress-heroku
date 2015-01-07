<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Beardy
 */

get_header(); ?>

<div class="row clearfix">
	<div class="wrap clearfix">
		<div class="full">
			<header class="entry-header">
				<h5 class="littletitle"><?php _e( 'That page can&rsquo;t be found.', 'rey' ); ?></h5>
				<h1 class="bigtitle"><?php _e( '404 Error', 'rey' ); ?></h1>
			</header><!-- .entry-header -->
		</div>

		<div class="full">
			<div class="entry-content" style="text-align:center;">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rey' ); ?></p>

				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
