<?php 
/* Template Name: Flexible Content */
?>

<?php get_header(); ?>

	<!-- <?php echo basename( __FILE__ ); ?> -->

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="content">
			<!-- base for flexible content layouts -->

			<?php
				// check if the flexible content field has rows of data
				if( have_rows('general_content') ):
				 
				    // loop through the rows of data
				    while ( have_rows('general_content') ) : the_row();
				 
				        if( get_row_layout() == 'full_width' ):
				 			
				 			echo '<div class="full">' . "\n";
				        	the_sub_field('full_width_column');
				        	echo '</div>' . "\n";
				 
				        elseif( get_row_layout() == 'two-thirds_one-third' ): 

				        	echo '<div class="cols">' . "\n";
				 			echo '<div class="twothirds">' . "\n";
				 			the_sub_field('two_thirds');
				 			echo '</div>' . "\n";
				 			echo '<div class="onethird">' . "\n";
				 			the_sub_field('one_third');
				 			echo '</div>' . "\n";
				 			echo '</div>' . "\n";

				 		 elseif( get_row_layout() == 'one-third_two-thirds' ): 

				        	echo '<div class="cols">' . "\n";
				 			echo '<div class="onethird">' . "\n";
				 			the_sub_field('one_third');
				 			echo '</div>' . "\n";
				 			echo '<div class="twothirds">' . "\n";
				 			the_sub_field('two_thirds');
				 			echo '</div>' . "\n";
				 			echo '</div>' . "\n";

				        elseif( get_row_layout() == 'equal_halves' ): 
				 			
				 			echo '<div class="cols">' . "\n";
				 			echo '<div class="lefthalf">' . "\n";
				 			the_sub_field('left_half');
				 			echo '</div>' . "\n";
				 			echo '<div class="righthalf">' . "\n";
				 			the_sub_field('right_half');
				 			echo '</div>' . "\n";
				 			echo '</div>' . "\n";

				 		elseif( get_row_layout() == 'info_box' ): 
				 			
				 			// check if the nested repeater field has rows of data
				        	if(get_sub_field('buttons')): 
							 	echo '<ul class="infobox">';
				 
							 	// loop through the rows of data
								foreach(get_sub_field('buttons') as $button):
				 					if($button['external_link']):
				 						$link = $button['external_link'];
				 					else: 
				 						$link = $button['button_link'];
				 					endif;

									echo '<li><a href="'. $link . '">' . $button['button_text'] . '</a></li>' . "\n";
				 
								endforeach;
				 
								echo '</ul>';
				 
							endif;

				        endif;
				 
				    endwhile;
				 
				else :
				    // no layouts found
				    
				endif;				 
			?>
		</div>
	<?php endwhile; ?>

<?php get_footer(); ?>