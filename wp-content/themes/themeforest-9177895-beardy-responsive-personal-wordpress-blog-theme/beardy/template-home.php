<?php
/**
 * Template Name: Home Page
 *
 * @package Beardy
 */

get_header(); ?>

<?php if ( get_option( 'toggle_home_featured' ) == 0 ) : ?>
<div class="row clearfix" style="padding:0px;">
	<div class=" clearfix">
		<div class="featured-carousel owl-carousel">
			<?php 
			$kind = get_theme_mod( 'kind_home_featured' );
			$amount = get_theme_mod( 'amount_home_featured' );
			if ( $kind == 'popular' ){
				$args = array( 'post_type' => 'post', 'posts_per_page' => $amount, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', );
				$the_query = new WP_Query( $args );
			} if ( $kind == 'commented' ){
				$args = array( 'post_type' => 'post', 'posts_per_page' => $amount, 'orderby' => 'comment_count', 'order' => 'DESC', );
				$the_query = new WP_Query( $args );
			} if ( $kind == 'alphabetically' ){
				$args = array( 'post_type' => 'post', 'posts_per_page' => $amount, 'orderby' => 'title', 'order' => 'ASC', );
				$the_query = new WP_Query( $args );
			} if ( $kind == 'latest' ){
				$args = array( 'post_type' => 'post', 'posts_per_page' => $amount, 'order' => 'DESC', );
				$the_query = new WP_Query( $args );
			} if ( $kind == 'random' ){
				$args = array( 'post_type' => 'post', 'posts_per_page' => $amount, 'orderby' => 'rand', 'order' => 'DESC', );
				$the_query = new WP_Query( $args );
			} else {
				$args = array( 'cat' => $kind, 'post_type' => 'post', 'posts_per_page' => $amount, 'order' => 'DESC', );
				$the_query = new WP_Query( $args );
			}
			 ?>
			<?php if ( $the_query->have_posts() ) : ?>
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
					?>
					<div class="featured-item" style="background-image: url(<?php echo $thumb_url[0]; ?>);">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
						<div class="wrap-title">
							<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						</div>
					</div><?php endwhile; ?>
				<!-- end of the loop -->
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'rey' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>


<div class="row clearfix" style="padding:60px 0 40px;">
	<div class="wrap clearfix">
		<h5 class="littletitle"><?php echo get_theme_mod( 'home_posts_subtitle' ) ?></h5>
		<h1 class="bigtitle"><?php if ( get_theme_mod( 'home_posts_title' ) ) : echo get_theme_mod( 'home_posts_title' ); else : _e( 'Latest Posts', 'rey' ); endif;  ?></h1>
		<?php
		// The Query
		query_posts( array( 'post_type' => 'post' ) );

			if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
				<?php rey_paging_nav(); ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif;

		// Reset Query
		wp_reset_query();
		?>
	</div>
</div>


<?php if ( get_option( 'toggle_reviews' ) == 0 ) : ?>
<div class="row clearfix reviews" style="padding: 60px 0 50px;background-image: url(<?php echo esc_url( get_theme_mod( 'reviews_image' ) ); ?>);">
	<div class="wrap clearfix">
		<div class="quarter">
			<?php if ( get_theme_mod( 'reviews_title' ) ) { ?>
				<h2><?php echo get_theme_mod( 'reviews_title' ) ?></h2>
			<?php } ?>
			<?php if ( get_theme_mod( 'review_intro' ) ) { ?>
				<?php echo get_theme_mod( 'review_intro' ) ?>
			<?php } ?>
        </div>
		<div class="three-quarters">
			<div class="reviews-carousel owl-carousel">
				<?php if ( get_theme_mod( 'review_1' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_1' ) ?></div>
				<?php } if ( get_theme_mod( 'review_2' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_2' ) ?></div>
				<?php } if ( get_theme_mod( 'review_3' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_3' ) ?></div>
				<?php } if ( get_theme_mod( 'review_4' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_4' ) ?></div>
				<?php } if ( get_theme_mod( 'review_5' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_5' ) ?></div>
				<?php } if ( get_theme_mod( 'review_6' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_6' ) ?></div>
				<?php } if ( get_theme_mod( 'review_7' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_7' ) ?></div>
				<?php } if ( get_theme_mod( 'review_8' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_8' ) ?></div>
				<?php } if ( get_theme_mod( 'review_9' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_9' ) ?></div>
				<?php } if ( get_theme_mod( 'review_10' ) ) { ?>
					<div class="review"><?php echo get_theme_mod( 'review_10' ) ?></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>


<?php get_footer(); ?>