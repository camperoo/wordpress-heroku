<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beardy
 */
?>

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
		<?php if( get_the_category() ) { $category = get_the_category(); echo '<span class="category"><a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a></span>'; } ?>
		<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
		<span class="date"><?php echo get_the_date(); ?></span>
		<span class="format"><a href="<?php the_permalink(); ?>"><?php $format = get_post_format(); if( false === $format ) { $format = 'standard'; } echo $format; ?></a></span>
</div>
