<?php get_header(); ?>
<!-- <?php echo basename( __FILE__ ); ?> -->

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article role="main" id="content">
				<h1><?php the_title(); ?></h1>
				<p class="time-authored">
					Posted
					<strong><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></strong>
					on
					<time datetime="<?php the_date('Y-m-d') ?>"><?php the_time('l, F jS, Y') ?></time>
					&middot;
					<a href="<?php the_permalink(); ?>">Permalink</a>
				</p>


				<?php the_post_thumbnail('full');?>
				<?php the_content(); ?>
				<!--
				<div class="category-list">
					<h2>Categories</h2>
					<ul>
						<?php
							$args = array(
							'orderby'            => 'name',
							'order'              => 'ASC',
							'style'              => 'list',
							'show_count'         => 0,
							'hierarchical'       => 1,
							'title_li'           => false,
							'show_option_none'   => __( 'No categories' ),
							);

							wp_list_categories( $args );
						?>
					</ul>
				</div>
				-->



				<?php comments_template( '', true ); ?>

<!--
				<ul class="navigation">
					<li class="older">
						<?php previous_post_link( '%link', '%title' ); ?>
					</li>
					<li class="newer">
						<?php next_post_link( '%link', '%title' ); ?>
					</li>
				</ul>
-->
			</article>

		<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>