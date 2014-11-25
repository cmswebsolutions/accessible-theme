<!-- <?php echo basename( __FILE__ ); ?> -->


<!-- If there are no posts to display, such as an empty archive page -->
<?php if ( ! have_posts() ) : ?>
	<?php echo '<p>There are no blog posts to be shown at this point.</p>' ?>
<?php endif; ?>


<!--<h1><?php if ( is_day() ) : ?><?php printf( __( '<span>Daily Archive</span> %s' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?><?php printf( __( '<span>Monthly Archive</span> %s' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?><?php printf( __( '<span>Yearly Archive</span> %s' ), get_the_date('Y') ); ?>
<?php elseif ( is_category() ) : ?><?php echo single_cat_title(); ?>
<?php elseif ( is_search() ) : ?><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?>
<?php elseif ( is_home() ) : ?>News &amp; Events<?php else : ?>
<?php endif; ?></h1>-->




	<?php

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$args = array(
		'post_type'   => 'post',
		'posts_per_page'=> get_option('posts-per-page'),
		'paged'=> $paged
		//'meta_key'    => 'start_date',
		//'orderby'   => 'meta_value_num',
		//'order'     => 'ASC'
		);

		$wp_query = new WP_Query( $args );
		while ( $wp_query->have_posts() ) : $wp_query->the_post();

		$ID = $post->ID;

			echo '<article class="post" id="post-' . $ID . '">';
				echo '<h2><a href="' . get_permalink() . '" rel="bookmark">' . get_the_title() . '</a></h2>';
				echo '<p>' . the_excerpt() . '</p>';
			echo '</article>';

		endwhile;

		comments_template( '', true );
	?>


	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<ul class="navigation">
			<li class="newer"><?php previous_posts_link( __( 'Newer posts' ) ); ?></li>
			<li class="older"><?php next_posts_link( __( 'Older posts' ) ); ?></li>
		</ul>
	<?php endif; ?>
<?php wp_reset_query(); ?>