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
								<?php about_pop_post_thumbnail();?>
							</div>
							<?php the_title( '<a class="wp-block-latest-posts__post-title" href="' . esc_url( get_permalink() ) . '" >', '</a>' );?>
							<div class="wp-block-latest-posts__post-excerpt">
								<?php the_excerpt(); ?>
							</div>
						</li>
					<?php 

					endwhile;

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
