<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 16th_Purley_Scout_Group
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-footer-wrapper">
			<?php
				if ( is_active_sidebar( 'sidebar-2' ) ) {
					dynamic_sidebar( 'sidebar-2' );
				}

				if ( is_active_sidebar( 'sidebar-3' ) ) {
					dynamic_sidebar( 'sidebar-3' );
				}
				
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
				) );
			?>
		</div>

		<div class="site-info">
			<span>&copy; <?php echo date('Y'); ?> <span class="copyright"><?php echo get_theme_mod( 'copyright_block' ); ?></span>, all rights reserved</span>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'purley_scouts' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Powered by %s', 'purley_scouts' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'purley_scouts' ), 'purley_scouts', '<a href="https://github.com/spSlaine">Simon Phillips</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
