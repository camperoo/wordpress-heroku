<?php
/**
 * Template Name: Contact Page
 *
 * @package Beardy
 */


$nameError = __( 'Please enter your name.', 'rey' );
$emailError = __( 'Please enter your email address.', 'rey' );
$emailInvalidError = __( 'You entered an invalid email address.', 'rey' );
$commentError = __( 'Please enter a message.', 'rey' );

$errorMessages = array();
if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$errorMessages['nameError'] = $nameError;
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		if(trim($_POST['email']) === '')  {
			$errorMessages['emailError'] = $emailError;
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$errorMessages['emailInvalidError'] = $emailInvalidError;
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['comments']) === '') {
			$errorMessages['commentError'] = $commentError;
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
			$emailTo = get_option('admin_email');
			$subject = '[Contact Form] From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}	
}


get_header(); ?>

	<div id="map"></div>
	<div class="row clearfix contact-page">
		<div class="wrap clearfix">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="full">
				<header class="entry-header">
					<?php the_title( '<h1 class="bigtitle" style="margin-bottom:0;">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
			<div class="third">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>

			<div class="two-thirds">
				<?php if(isset($emailSent) && $emailSent == true) { ?>
					<h4><?php _e('Thanks, your email was sent successfully.', 'rey') ?></h4>
				<?php } else { ?>

					<?php if(isset($hasError) || isset($captchaError)) { ?>
					<p class="error"><?php _e('Sorry, an error occured.', 'rey') ?><p>
					<?php } ?>
					<div class="contact-form">
						<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
							<ul class="contactform clearfix">
								<li class="contactname">
									<input type="text" name="contactName" id="contactName" placeholder="<?php _e('Name', 'rey') ?>" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
									<?php if(isset($errorMessages['nameError'])) { ?>
										<span class="error"><?php echo $nameError; ?></span> 
									<?php } ?>
								</li>
								<li class="email">
									<input type="text" name="email" id="email" placeholder="<?php _e('Email', 'rey') ?>" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
									<?php if(isset($errorMessages['emailError'])) { ?>
										<span class="error"><?php echo $emailError; ?></span>
									<?php } ?>
								</li>
								<li class="comments">
									<textarea name="comments" id="commentsText" rows="10" cols="30" placeholder="<?php _e('Message', 'rey') ?>" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
									<?php if(isset($errorMessages['commentError'])) { ?>
										<span class="error"><?php echo $commentError; ?></span> 
									<?php } ?>
								</li>
								<li class="submit">
									<input type="hidden" name="submitted" id="submitted" value="true" />
									<input type="submit" id="submit" value="<?php _e('Send Email', 'rey') ?>"/>
								</li>
							</ul>
						</form>
					</div>
				<?php } ?>
			</div>

		<?php endwhile; // end of the loop. ?>
		</div>
	</div>


<script type="text/javascript">
	jQuery(document).ready(function($) {
	    var map;
	    $(document).ready(function(){
			map = new GMaps({
				el: '#map',
				lat: <?php echo get_theme_mod( 'location_map_lat' ) ?>,
				lng: <?php echo get_theme_mod( 'location_map_lng' ) ?>,
				width: '100%',
				height: '400px',
				disableDefaultUI: true
			});
			map.addMarker({
				lat: <?php echo get_theme_mod( 'location_map_lat' ) ?>,
				lng: <?php echo get_theme_mod( 'location_map_lng' ) ?>,
				title: '',
				infoWindow: {
				  content: '<?php echo get_theme_mod( 'location_map_marker' ) ?>'
				}
			});
	    });
	});
</script>
<?php get_footer(); // Rey Footer ?>