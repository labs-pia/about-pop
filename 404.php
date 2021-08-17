<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package About-Pop
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! You reached end of music.', 'about-pop' ); ?></h1>
			</header>
				<a class="back_home" href="#">Back to pop</a>
		</section>

	</main><!-- #main -->

<?php
get_footer();
