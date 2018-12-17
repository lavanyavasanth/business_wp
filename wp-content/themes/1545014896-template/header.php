<?php
/**
 * The header for the exported theme
 */

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>
 class="no-js no-svg">

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>
">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="profile" href="http://gmpg.org/xfn/11">



<?php wp_head(); ?>




<link rel='stylesheet' id='dashicons-css'  href='<?php echo get_stylesheet_directory_uri()."/css/style.css";?>
' type='text/css' media='all' />


</head>

<span id='tgback-0'>
</span>

<body <?php body_class(); ?>
>

<div id="i6nfl" class="top-container">
<div id="ioiib">
<div id="ixrro" class="col1_main">
<a id="iz1zs" title="Landing Page" href="https://themesgenerator.com/" target="_blank" class="link">
<span id="tgimg-14">
<img <?php if( get_theme_mod( "tgimg-14") != "" ) {echo "src='".get_theme_mod( "tgimg-14")."'";} else {echo " src='".get_template_directory_uri()."/images/output-onlinepngtools6-406.png'";} ?>
 id="i6yrxg" />
</span>
</a>
</div>
<div id="ixhob" class="col2-main">
<div data-gjs="navbar" id="ikf2p" class="navbar">
<div id="i7k9j" class="navbar-container">
<div id="izydb" class="navbar-burger">
<div id="iijack" class="navbar-burger-line">
</div>
<div class="navbar-burger-line">
</div>
<div class="navbar-burger-line">
</div>
</div>
<div data-gjs="navbar-items" class="navbar-items-c">
<nav data-gjs="navbar-menu" class="navbar-menu">
<?php wp_nav_menu(array('walker' =>
 new Excerpt_Walker(), 'container' =>
 false)); ?>
</nav>
</div>
</div>
</div>
</div>
<div id="ip27l">
</div>
</div>
</div>
</div>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'themesgenerator' ); ?>
</a>


	<header id="masthead" class="site-header" role="banner">


		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>


		<?php if ( has_nav_menu( 'top' ) ) : ?>

			<div class="navigation-top">

				<div class="wrap">

					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>

				</div>
<!-- .wrap -->

			</div>
<!-- .navigation-top -->

		<?php endif; ?>


	</header>
<!-- #masthead -->


	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! themesgenerator_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">
';
		echo get_the_post_thumbnail( get_queried_object_id(), 'themesgenerator-featured-image' );
		echo '</div>
<!-- .single-featured-image-header -->
';
	endif;
	?>


	<div class="site-content-contain">

		<div id="content" class="site-content">

