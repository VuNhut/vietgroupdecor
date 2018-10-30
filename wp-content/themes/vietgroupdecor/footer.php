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
		</div>

		<footer id="colophon" class="site-footer">
			<div class="site-info container">
				<?php dazzling_social(); ?>
				<nav role="navigation" class="col-md-6">
					<?php dazzling_footer_links(); ?>
				</nav>
				<div class="copyright col-md-6">
				© 2017 <a href="<?php echo home_url(); ?>" title="Mật Ong Hoa Thiên Nhiên">Mật Ong Hoa Thiên Nhiên</a>
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87660056-3', 'auto');
  ga('send', 'pageview');

</script>
<a style="display:none" rel="nofollow" title="Real Time Analytics" href="http://clicky.com/101006637"><img alt="Real Time Analytics" src="//static.getclicky.com/media/links/badge.gif" border="0" /></a>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(101006637); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/101006637ns.gif" /></p></noscript>
</body>
</html>