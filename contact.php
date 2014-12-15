<?php
/*
Template Name: Contact
*/
?>

<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'Inquiry From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>
<?php get_header(); ?>

		<div id="content" role="main" class="contact">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>

						<?php if(isset($emailSent) && $emailSent == true) { ?>
							<div class="thanks">
								<?php echo '<p>Thanks ' . $name . '! Your email was sent successfully.</p>'; ?>
							</div>
							<?php the_content(); ?>

						<?php } else { ?>

							<?php if(isset($hasError) || isset($captchaError)) { ?>
								<p class="error">Sorry, an error occured. Check below for details.<p>
							<?php } ?>

							<?php the_content(); ?>


							<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
								<ul class="contactform">
									<li>
										<?php if($nameError != '') { ?>
											<span class="error"><?=$nameError;?></span>
										<?php } ?>
										<label for="contactName">Name</label>
										<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField <?php if($nameError != ''){ echo 'error';} ?>" />
									</li>

									<li>
										<?php if($emailError != '') { ?>
											<span class="error"><?=$emailError;?></span>
										<?php } ?>
										<label for="email">Email</label>
										<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email <?php if($emailError != ''){ echo 'error';} ?>" />
									</li>

									<li>
										<?php if($commentError != '') { ?>
											<span class="error"><?=$commentError;?></span>
										<?php } ?>
										<label for="commentsText">Message</label>
										<textarea name="comments" id="commentsText" class="required requiredField <?php if($nameError != ''){ echo 'error';} ?>"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
									</li>
								</ul>
								<button type="submit">Send Message</button>
							<input type="hidden" name="submitted" id="submitted" value="true" />
						</form>

					<?php } ?>
			<?php endwhile; endif; ?>
		</div><!-- #content -->

<?php get_footer(); ?>