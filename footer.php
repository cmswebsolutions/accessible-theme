			</main>
		</div> <!-- end .inner -->

		<footer>
			<div class="inner">
				<p>&copy; <?php bloginfo( 'name' ); ?> <?php echo date("Y"); ?></p>

				<!--<div class="spinner"></div>-->

				<ul class="social">
					<?php if(get_field('facebook_link', 'option')){ echo '<li><a href="' . get_field('facebook_link', 'option') . '" class="facebook">Facebook</a></li>';}?>
					<?php if(get_field('twitter_link', 'option')){ echo '<li><a href="' . get_field('twitter_link', 'option') . '" class="twitter">Twitter</a></li>';}?>
					<?php if(get_field('linkedin_link', 'option')){ echo '<li><a href="' . get_field('linkedin_link', 'option') . '" class="linkedin">LinkedIn</a></li>';}?>
				</ul>
			</div>
		</footer>

	<?php wp_footer(); ?>
	</body>
</html>