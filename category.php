<?php get_header(); ?>
<!-- <?php echo basename( __FILE__ ); ?> -->

	<div id="content" role="main" class="post-list">
		<?php if ( have_posts() ): ?>
		<h1><?php echo single_cat_title( '', false ); ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time>
				<?php the_excerpt(); ?>

				<p class="details">
					<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
					by
					<a href="<?php bloginfo( 'url' ); ?>/author/<?php echo the_author_meta( 'user_nicename' ); ?>" class="auth"><?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name'); ?></a>
					<?php echo '<a class="numcomments" href="' . get_permalink() . '#comments">' . get_comments_number('0', '1', '%') . '<span class="hidden">Comments</span></a>'; ?>
				</p>

			<?php endwhile; ?>

		<?php else: ?>
			<h1>No posts to display in <?php echo single_cat_title( '', false ); ?></h1>
		<?php endif; ?>

		<ul class="navigation">
			<li class="newer"><?php previous_posts_link( __( 'Newer posts' ) ); ?></li>
			<li class="older"><?php next_posts_link( __( 'Older posts' ) ); ?></li>
		</ul>
	</div> <!-- /#content -->
<?php get_footer(); ?>