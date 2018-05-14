<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 16th_Purley_Scout_Group
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'purley_scouts' ); ?></a>
	<nav id="top-navigation" class="top-navigation">
	<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-3',
				'menu_id'        => 'top-menu',
			) );
			?>
	</nav>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
			<header>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				$purley_scouts_description = get_bloginfo( 'description', 'display' );
				if ( $purley_scouts_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $purley_scouts_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</header>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button type="button" class="menu-toggle hamburger hamburger--collapse" aria-controls="primary-menu" aria-expanded="false">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php if ( has_header_image() ) { ?>
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
		<?php } ?>	