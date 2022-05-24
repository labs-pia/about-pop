<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package About-Pop
 */

?>
<div id="frame"> 
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="event_thumbnail">
			<?php about_pop_post_thumbnail(); ?>
		</div>
		<div class="post-content">
			<?php
			if ( is_singular() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
			endif; ?>
			
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

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'about-pop' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->
</div>