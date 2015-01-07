<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Beardy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="bigtitle" style="margin-bottom:0;">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'rey' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>
