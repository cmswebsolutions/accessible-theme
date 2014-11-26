<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="not-ie" <?php language_attributes(); ?>> <!--<![endif]-->

	<head>
		<title><?php wp_title('|', true, 'right') ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<!--<link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.png">
		<link rel="apple-touch-icon" href="<?php echo bloginfo('template_directory'); ?>/apple-touch-icon-precomposed.png"/>-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700,800|Exo+2:700' rel='stylesheet' type='text/css'>
		<!--<link href='http://fonts.googleapis.com/css?family=Exo+2:700' rel='stylesheet' type='text/css'>-->
		<?php wp_head(); ?>
	</head>





	<body <?php body_class(); ?>>
		<span class="band"></span>
		<div class="inner">
			<header role="banner" class="header">
				<a class="skip" href="#main">Skip to Content</a>
					<!--<h1><?php bloginfo( 'name' ); ?></h1>-->
					<img class="logo" src="<?php echo bloginfo('template_directory'); ?>/img/logo.svg" alt="">

					<!--
					<div id="search">
						<form method="get" action="<?php bloginfo('url'); ?>/">
							<label class="hidden" for="s">Search String</label>
							<input type="text" name="s" id="s" value="<?php echo get_search_query(); ?>" />

							<label class="hidden" for="searchsubmit">Submit Search</label>
							<input type="submit" id="searchsubmit" name="searchsubmit" class="button" value="Search" />
						</form>
					</div>
					-->

					<nav role="navigation">
						<?php wp_nav_menu( array( 'container' => false, 'menu_id' => '', 'menu_class' => '', 'theme_location' => 'primary' ) ); ?>
					</nav>
			</header>

			<main id="main" tabindex="0">