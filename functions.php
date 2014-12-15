<?php

// Removes the WordPress version as a layer of simple security
remove_action('wp_head', 'wp_generator');

//require( 'details-plugin/details.php' );


function my_theme_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

// ADD JS AND CSS FILES //////////////////////////////////////////////

	function theme_js() {

		wp_register_script( 'modernizr', get_template_directory_uri().'/js/modernizr.js', array( 'jquery' ) );
		wp_enqueue_script( 'modernizr' );

		wp_register_script( 'polyfills', get_template_directory_uri().'/js/polyfills.js', array( 'jquery' ) );
		wp_enqueue_script( 'polyfills' );

		wp_register_script( 'details', get_template_directory_uri().'/js/details.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'details' );

		wp_register_script( 'masonry', get_template_directory_uri().'/js/masonry.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'masonry' );


		wp_register_script( 'scripts', get_template_directory_uri().'/js/script.js', array( 'jquery' ) );
		wp_enqueue_script( 'scripts' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
	}

	add_action( 'wp_enqueue_scripts', 'theme_js' );

	// Remove inline gallery styling
	add_filter( 'use_default_gallery_style', '__return_false' );







// MENUS + DISPLAY //////////////////////////////////////////////


	register_nav_menus(array('primary' => 'Primary Navigation'));


	// Change the content of the excerpt
	function new_excerpt_more( $more ) {
		return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More<span class="hidden"> about "' . get_the_title() . '"</span></a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );


	// Change the excerpt length
	add_filter('excerpt_length', create_function('$a', 'return 50;'));






// EDITOR OPTIONS //////////////////////////////////////////////


	function add_theme_caps() {
		$role = get_role( 'editor' );
		// This only works, because it accesses the class instance.
		// would allow the author to edit others' posts for current theme only
		$role->add_cap( 'edit_theme_options' );
		$role->add_cap( 'create_users' );
	}
	add_action( 'admin_init', 'add_theme_caps');


	// Add addition buttons to MCE editor
	add_filter("mce_buttons", "enable_more_buttons");
	function enable_more_buttons($buttons) {
		$buttons[] = 'hr';
		return $buttons;
	}





// SITE SPECIFIC FUNCTIONS ///////////////////////////////////////////////////////



//add_theme_support( 'custom-header' );



add_image_size( 'gallery', 250, 250, true ); // (cropped)
remove_shortcode('gallery');
add_shortcode('gallery', 'custom_size_gallery');

function custom_size_gallery($attr) {
	// CHANGE THIS TO "MEDIUM" OR "LARGE" FOR A MASONRY EFFECT
     $attr['size'] = 'gallery';
     return gallery_shortcode($attr);
}




if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Settings');
}









// SIDEBARS ////////////////////////////////////////////////////


add_theme_support( 'menus' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));



// COMMENTS ////////////////////////////////////////////////////

function post_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?> <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>

				<p class="comment-meta">
					<?php printf( __( '%s' ), sprintf( '%s', get_comment_author_link() ) ); ?>

					<a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php printf( __( '%1$s' ), get_comment_date() ); ?>
					</a>

					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
					<?php endif; ?>
				</p>
			</div>

			<div class="comment-body"><?php comment_text(); ?></div>

			<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
		</div>
	<!--</li>-->

	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
	</li>
	<?php

		break;
	endswitch;
}

?>