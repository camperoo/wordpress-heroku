<?php
/**
 * @package Beardy
 */
?>

<?php if( is_singular() ) { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php $category = get_the_category(); echo '<span class="category"><a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a></span>'; ?>
			<?php the_title( '<h1 class="bigtitle" style="margin-bottom:0;">', '</h1>' ); ?>

			<div class="littletitle">
				<?php rey_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<?php if ( get_option( 'single_pages_featured' ) == 0 ) : ?>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-image">
				<?php the_post_thumbnail(); ?>
			</div><!-- .entry-image -->
			<?php } ?>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'rey' ),
					'after'  => '</div>',
				) );
			?>
		<?php if ( get_option( 'single_pages_featured' ) == 1 ) : ?>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-image">
				<?php the_post_thumbnail(); ?>
			</div><!-- .entry-image -->
			<?php } ?>
		<?php endif; ?>
		</div><!-- .entry-content -->

		<ul class="entry-sharing clearfix">
			<li><a class="share facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><span><i class="fa fa-facebook-square"></i><?php _e( 'Share on Facebook', 'rey' ); ?></span></a></li>
			<li><a class="share twitter" target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php the_title(); ?>%20-%20<?php the_permalink(); ?>"><span><i class="fa fa-twitter"></i><?php _e( 'or Twitter', 'rey' ); ?></span></a></li>
			<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
			<li><a class="share pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pin_image; ?>&description=<?php the_title(); ?>"><span><i class="fa fa-pinterest"></i><?php _e( 'or Pinterest', 'rey' ); ?></span></a></li>
			<li><a class="share google" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><span><i class="fa fa-google-plus"></i><?php _e( 'or Google+', 'rey' ); ?></span></a></li>
		</ul>

		<ul class="entry-meta">
				<?php if( get_the_author() ) { ?><li><i class="fa fa-pencil"></i><?php the_author(); ?></li><?php } ?>
				<li><i class="fa fa-clock-o"></i><?php the_date(); ?></li>
				<?php if( get_the_author() ) { ?><li><i class="fa fa-list-ul"></i><?php the_category(', '); ?></li><?php } ?>
				<?php if( get_the_tags() ) { ?><li><i class="fa fa-tags"></i><?php the_tags(''); ?></li><?php } ?>
				<?php if( is_user_logged_in() && is_author(get_current_user_id())) { ?>
				<li><i class="fa fa-user"></i><?php edit_post_link( __( 'Edit', 'rey' ), '<span class="edit-link">', '</span>' ); ?></li>
				<?php } ?>
		</ul><!-- .entry-footer -->
	</article><!-- #post-## -->

<?php } else { ?>

	<div class="blog-item">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<div class="social-sharing">
				<a class="share-link" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><span><i class="fa fa-facebook"></i></span></a>
				<a class="share-link" target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php the_title(); ?>%20-%20<?php the_permalink(); ?>"><span><i class="fa fa-twitter"></i></span></a>
				<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
				<a class="share-link" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pin_image; ?>&description=<?php the_title(); ?>"><span><i class="fa fa-pinterest"></i></span></a>
				<a class="share-link" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><span><i class="fa fa-google-plus"></i></span></a>
			</div>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('item-size'); ?></a>
		</div><?php } ?>
		<div class="wp-caption-text" style="text-align:left;"><?php the_excerpt(); ?></div>
		<span class="date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
		<span class="format"><a href="<?php the_permalink(); ?>"><?php $format = get_post_format(); if( false === $format ) { $format = 'standard'; } echo $format; ?></a></span>
	</div>

<?php } ?>