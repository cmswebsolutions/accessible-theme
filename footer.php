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





		<div id="lightbox" tabindex="0">
			<div class="image">
				<div id="img-box">
					<img id="photo" src="" alt=""/>
					<div class="caption" aria-live="polite" aria-relevant="additions" ></div>
				</div>

				<button id="prev"><span class="hidden">Previous</span><img src="<?php echo bloginfo('template_directory'); ?>/img/prev.svg" alt="" /></button>
				<button id="next"><span class="hidden">Next</span><img src="<?php echo bloginfo('template_directory'); ?>/img/next.svg" alt="" /></button>
				<button id="close">Close<span class="hidden"> image slideshow</span></button>
				<span class="height"></span>
			</div>
		</div>

	<?php wp_footer(); ?>
	</body>
</html>