<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package dazzling
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="geo.position" content="10.793059;106.62913">
<meta name="geo.placename" content="TP HCM">
<meta name="geo.region" content="VN-65">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site no-touch">

		<div class="container header">
			<div class="row">

				<?php if( get_header_image() != '' ) : ?>

					<div id="logo" class="col-lg-3 col-12">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
					</div><!-- end of #logo -->

				<?php endif; // header image was removed ?>

				<?php if( !get_header_image() ) : ?>

				<div id="logo" class="col-lg-3 col-12">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </div><!-- end of #logo -->

                <?php endif; // header image was removed (again) ?>

				<form role="search" method="get" class="woocommerce-product-search col-lg-5 col-md-6 col-sm-6" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
					<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Bạn cần tìm gì&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
					<input type="submit" value="Tìm kiếm" />
					<input type="hidden" name="post_type" value="product" />
				</form>
				<div class="hotline-mobile col-lg-4 col-md-6 col-sm-6">
					<span class="hotro-dathang">Hỗ trợ & Đặt hàng:</span>
					<span><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:0946410840"> 0946 410 840</a></span>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-default navbar-expand-lg">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu-main">
				<span class="sr-only">Toggle navigation</span>
				<span class="text-icon-bar">Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php dazzling_header_menu(); ?>
		</nav><!-- .site-navigation -->