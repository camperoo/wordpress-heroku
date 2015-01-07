<?php
/**
 * Template Name: About Page
 *
 * @package Beardy
 */

get_header(); ?>

<div class="row clearfix about">
	<div class="wrap clearfix">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="full">
			<?php get_template_part( 'content', 'page' ); ?>
		</div>
		<div class="team-profiles clearfix">
			<div class="quarter">
				<div class="team-profile">
					<img src="<?php echo esc_url( get_theme_mod( 'team_image_1' ) ); ?>" alt="<?php echo get_theme_mod( 'team_name_1' ) ?>">
					<div class="team-profile-social-wrap table clearfix">
						<ul class="team-profile-social cell">
							<?php if ( get_theme_mod( 'team_facebook_1' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_facebook_1' ) ); ?>"><i class="fa fa-facebook"></i></a></li><?php } if ( get_theme_mod( 'team_twitter_1' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_twitter_1' ) ); ?>"><i class="fa fa-twitter"></i></a></li><?php } if ( get_theme_mod( 'team_instagram_1' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_instagram_1' ) ); ?>"><i class="fa fa-instagram"></i></a></li><?php } if ( get_theme_mod( 'team_google_1' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_google_1' ) ); ?>"><i class="fa fa-google-plus"></i></a></li><?php } if ( get_theme_mod( 'team_tumblr_1' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_tumblr_1' ) ); ?>"><i class="fa fa-tumblr"></i></a></li><?php } ?>
						</ul>
					</div>
					<h3><?php echo get_theme_mod( 'team_name_1' ) ?></h3>
					<h5 class="littletitle"><?php echo get_theme_mod( 'team_sitin_1' ) ?></h5>
				</div>
			</div>
			<div class="quarter">
				<div class="team-profile">
					<img src="<?php echo esc_url( get_theme_mod( 'team_image_2' ) ); ?>" alt="<?php echo get_theme_mod( 'team_name_2' ) ?>">
					<div class="team-profile-social-wrap table clearfix">
						<ul class="team-profile-social cell">
							<?php if ( get_theme_mod( 'team_facebook_2' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_facebook_2' ) ); ?>"><i class="fa fa-facebook"></i></a></li><?php } if ( get_theme_mod( 'team_twitter_2' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_twitter_2' ) ); ?>"><i class="fa fa-twitter"></i></a></li><?php } if ( get_theme_mod( 'team_instagram_2' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_instagram_2' ) ); ?>"><i class="fa fa-instagram"></i></a></li><?php } if ( get_theme_mod( 'team_google_2' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_google_2' ) ); ?>"><i class="fa fa-google-plus"></i></a></li><?php } if ( get_theme_mod( 'team_tumblr_2' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_tumblr_2' ) ); ?>"><i class="fa fa-tumblr"></i></a></li><?php } ?>
						</ul>
					</div>
					<h3><?php echo get_theme_mod( 'team_name_2' ) ?></h3>
					<h5 class="littletitle"><?php echo get_theme_mod( 'team_sitin_2' ) ?></h5>
				</div>
			</div>
			<div class="quarter">
				<div class="team-profile">
					<img src="<?php echo esc_url( get_theme_mod( 'team_image_3' ) ); ?>" alt="<?php echo get_theme_mod( 'team_name_3' ) ?>">
					<div class="team-profile-social-wrap table clearfix">
						<ul class="team-profile-social cell">
							<?php if ( get_theme_mod( 'team_facebook_3' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_facebook_3' ) ); ?>"><i class="fa fa-facebook"></i></a></li><?php } if ( get_theme_mod( 'team_twitter_3' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_twitter_3' ) ); ?>"><i class="fa fa-twitter"></i></a></li><?php } if ( get_theme_mod( 'team_instagram_3' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_instagram_3' ) ); ?>"><i class="fa fa-instagram"></i></a></li><?php } if ( get_theme_mod( 'team_google_3' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_google_3' ) ); ?>"><i class="fa fa-google-plus"></i></a></li><?php } if ( get_theme_mod( 'team_tumblr_3' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_tumblr_3' ) ); ?>"><i class="fa fa-tumblr"></i></a></li><?php } ?>
						</ul>
					</div>
					<h3><?php echo get_theme_mod( 'team_name_3' ) ?></h3>
					<h5 class="littletitle"><?php echo get_theme_mod( 'team_sitin_3' ) ?></h5>
				</div>
			</div>
			<div class="quarter">
				<div class="team-profile">
					<img src="<?php echo esc_url( get_theme_mod( 'team_image_4' ) ); ?>" alt="<?php echo get_theme_mod( 'team_name_4' ) ?>">
					<div class="team-profile-social-wrap table clearfix">
						<ul class="team-profile-social cell">
							<?php if ( get_theme_mod( 'team_facebook_4' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_facebook_4' ) ); ?>"><i class="fa fa-facebook"></i></a></li><?php } if ( get_theme_mod( 'team_twitter_4' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_twitter_4' ) ); ?>"><i class="fa fa-twitter"></i></a></li><?php } if ( get_theme_mod( 'team_instagram_4' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_instagram_4' ) ); ?>"><i class="fa fa-instagram"></i></a></li><?php } if ( get_theme_mod( 'team_google_4' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_google_4' ) ); ?>"><i class="fa fa-google-plus"></i></a></li><?php } if ( get_theme_mod( 'team_tumblr_4' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'team_tumblr_4' ) ); ?>"><i class="fa fa-tumblr"></i></a></li><?php } ?>
						</ul>
					</div>
					<h3><?php echo get_theme_mod( 'team_name_4' ) ?></h3>
					<h5 class="littletitle"><?php echo get_theme_mod( 'team_sitin_4' ) ?></h5>
				</div>
			</div>
		</div>
	<?php endwhile; // end of the loop. ?>
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
