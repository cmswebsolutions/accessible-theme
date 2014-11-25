<?php get_header(); ?>
<!-- <?php echo basename( __FILE__ ); ?> -->

	<div id="content" role="main" class="post-list">
		<?php
			$blogID = get_option('page_for_posts');
			echo '<h1>' . get_the_title($blogID) . '</h1>';
		?>
		<?php get_template_part( 'loop', 'index' ); ?>
	</div>
<?php get_footer(); ?>