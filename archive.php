<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package About-Pop
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<div id="frame">
				<ul class="wp-block-latest-posts__list is-grid columns-5 aligncenter programm wp-block-latest-posts">
					<?php // Start the Loop
					while ( have_posts() ) :
						echo '<li>';
						the_post();
						?>
						<div class="wp-block-latest-posts__featured-image aligncenter <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
							<div class="event_thumbnail">
								<?php about_pop_post_thumbnail();

								if ( is_singular() ) :
									the_title( '<h2 class="entry-title">', '</h2>' );
								else :
									the_title( '<h2 class="entry-title"><a class="wp-block-latest-posts__post-title" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								endif;
								?>
							</div>
							<div>
								<?php

								if ( 'post' === get_post_type() ) :
								endif; ?>
							<div class="wp-block-latest-posts__post-excerpt">
								<?php
								the_content(
									sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'about-pop' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										wp_kses_post( get_the_title() )
									)
								);
								?>
							</div>
						</div>




						</li>
					<?php 

					endwhile;

					the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			</ul>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
