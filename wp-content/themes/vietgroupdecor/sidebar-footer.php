<?php
/**
 * The Sidebar widget area for footer.
 *
 * @package dazzling
 */
?>

	<?php
	// If footer sidebars do not have widget let's bail.

	if ( ! is_active_sidebar( 'footer-widget-1' ) && ! is_active_sidebar( 'footer-widget-2' ) && ! is_active_sidebar( 'footer-widget-3' ) )
		return;
	// If we made it this far we must have widgets.
	?>
	<div class="row footer-widget-area">
		<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
		<div class="col-lg-2 col-md-4 col-sm-4 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-1' ); ?>
			<ul class="social">
				<li>
					<a href="#"class="social_link"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
				</li>
				<li>
					<a href="#"class="social_link"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
				</li>
				<li>
					<a href="#"class="social_link"><i class="fa fa-skype fa-2x" aria-hidden="true"></i></a>
				</li>
				<li>
					<a href="#"class="social_link"><i class="fa fa-phone-square fa-2x" aria-hidden="true"></i></a>
				</li>
			</ul>
		</div><!-- .widget-area .first -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
		<div class="col-lg-4 col-md-8 col-sm-8 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-2' ); ?>
		</div><!-- .widget-area .second -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
		<div class="col-lg-2 col-md-4 col-sm-4 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-3' ); ?>
		</div><!-- .widget-area .third -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
		<div class="col-lg-4 col-md-8 col-sm-8 footer-widget" role="complementary">
			<?php dynamic_sidebar( 'footer-widget-4' ); ?>
		</div><!-- .widget-area .third -->
		<?php endif; ?>
	</div>