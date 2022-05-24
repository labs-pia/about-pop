<?php
/**
 * footer contains the closing of the #content div and all content after.
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div id="footer-sidebar" class="secondary">
				<div id="footer-sidebar1">
				<?php
				if(is_active_sidebar('footer-sidebar-1')){
				dynamic_sidebar('footer-sidebar-1');
				}
				?>
				</div>
				<div id="footer-sidebar2">
				<?php
				if(is_active_sidebar('footer-sidebar-2')){
				dynamic_sidebar('footer-sidebar-2');
				}
				?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
