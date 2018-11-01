<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dazzling
 */
?>
	</div><!-- #content -->
	<div id="footer-area">
		<div class="container footer-inner">
			<?php get_sidebar( 'footer' ); ?>
			<footer id="colophon" class="site-footer">
				<div class="site-info container">
					<div class="copyright col-sm-12">
					© 2017 <a href="<?php echo home_url(); ?>" title="Mật Ong Hoa Thiên Nhiên">Mật Ong Hoa Thiên Nhiên</a>
					</div>
				</div><!-- .site-info -->
				<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
			</footer><!-- #colophon -->
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>