<?php get_header(); ?>
<!-- <?php echo basename( __FILE__ ); ?> -->

	<div id="content" role="main" class="post-list">
		<?php if ( have_posts() ): ?>

			<?php if ( is_day() ) : ?>
				<h1>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h1>
			<?php elseif ( is_month() ) : ?>
				<h1>Archive: <?php echo  get_the_date( 'M Y' ); ?></h1>
			<?php elseif ( is_year() ) : ?>
				<h1>Archive: <?php echo  get_the_date( 'Y' ); ?></h1>
			<?php else : ?>
				<h1>Archive</h1>
			<?php endif; ?>


			<?php while ( have_posts() ) : the_post(); ?>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>


		<?php else: ?>
			<h1>Sorry, No posts to display</h1>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>

