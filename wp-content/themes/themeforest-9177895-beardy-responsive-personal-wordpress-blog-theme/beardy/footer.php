<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Beardy
 */
?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer footer" role="contentinfo">
		<div class="footer-top">
			<div class="wrap clearfix">
				<div class="quarter" style="padding-left:0;">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 1')):
					endif; ?>
				</div>

				<div class="quarter odd">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 2')):
					endif; ?>
				</div>

				<div class="quarter prelast">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 3')):
					endif; ?>
				</div>

				<div class="quarter last" style="border:none">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 4')):
					endif; ?>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="wrap clearfix">
				<div class="full">
					<div class="site-info">
						<?php if ( get_theme_mod( 'footer_options_copy' ) ) { ?>
							<?php echo get_theme_mod( 'footer_options_copy' ) ?>
						<?php } else { ?>
							<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'rey' ) ); ?>"><?php bloginfo('name'); ?><?php printf( __( ' is powered by %s', 'rey' ), 'WordPress' ); ?></a>
						<?php } ?>
					</div>
					<div class="social-footer">
			          <ul>
						<?php if ( get_theme_mod( 'social_icon_1' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_1' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_1' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_2' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_2' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_2' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_3' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_3' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_3' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_4' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_4' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_4' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_5' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_5' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_5' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_6' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_6' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_6' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_7' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_7' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_7' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_8' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_8' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_8' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_9' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_9' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_9' ) ?>"></i></a></li>
						<?php } if ( get_theme_mod( 'social_icon_10' ) ) { ?><li><a href="<?php echo esc_url( get_theme_mod( 'social_link_10' ) ); ?>"><i class="fa fa-<?php echo get_theme_mod( 'social_icon_10' ) ?>"></i></a></li>
						<?php } ?>
			          </ul>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
