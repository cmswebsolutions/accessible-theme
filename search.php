<?php get_header(); ?>
<!-- <?php echo basename( __FILE__ ); ?> -->

	<?php if ( have_posts() ) : ?>
		<div id="content" role="main" class="post-list">

			<h1><?php printf( __( 'Search Results for "%s"' ), '<span class="query">' . get_search_query() . '</span>' ); ?></h1>
			<?php get_template_part( 'loop', 'search' ); ?>

			<?php else : ?>
				<?php get_template_part('404'); ?>
				<?php // get_search_form(); ?>
		</div>

	<?php endif; ?>

<?php get_footer(); ?>