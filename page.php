<?php get_header(); ?>
	<!-- <?php echo basename( __FILE__ ); ?> -->

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<div id="content" role="main">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>

	<?php endwhile; ?>

<?php get_footer(); ?>