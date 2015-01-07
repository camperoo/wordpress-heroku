<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Beardy
 */

get_header(); ?>

	<div class="row clearfix">
		<div class="wrap clearfix">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php	$sidebartoggle = get_option( 'single_pages_sidebar' ); 
					$comments = get_theme_mod( 'single_pages_comments' ); 
			if ( ( $sidebartoggle == 1 ) && ( $comments == 'bellow' ) ) { ?>

				<div class="full">
					<?php get_template_part( 'content', 'page' ); ?>
				</div>
				<div class="full" style="padding-top: 50px;">
					<?php
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>

			<?php } else { ?>

				<div class="two-thirds">
					<?php get_template_part( 'content', 'page' ); ?>
				</div>

				<?php if ( $comments == 'side' ) { ?>	

					<div class="third">
						<?php
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>
						<?php if ( $sidebartoggle == 0 ) { ?>				
							<?php get_sidebar(); ?>
						<?php } ?>
					</div>

				<?php } else { ?>

					<div class="third">
						<?php if ( $sidebartoggle == 0 ) { ?>				
							<?php get_sidebar(); ?>
						<?php } ?>
					</div>
					<div class="two-thirds" style="padding-top: 50px;">
						<?php
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>
					</div>

				<?php } ?>

			<?php } ?>

		<?php endwhile; // end of the loop. ?>

		</div>
	</div>

<?php get_footer(); ?>
