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
<link rel="shortcut icon" type="image/x-icon" href="<?php echo home_url(); ?>/wp-content/themes/vietgroupdecor/images/favicon-matonghoa.png">
<script type="text/javascript" src="<?php echo home_url(); ?>/wp-content/themes/vietgroupdecor/javascript/jquery-1.7.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<?php wp_head(); ?>
<script type="text/javascript">
	$(document).scroll(function() {
	    var y = $(document).scrollTop(), //get page y value 
	        header = $("#text-10"); // your div id
	    if(y >= 180)  {
	        header.css({position: "fixed", "top" : "0", "width" : "390px", "margin" : "0", "z-index" : "1"});
	    } else {
	    	header.css({position: "static"});
	    }
	});
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site no-touch">

	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">

				<?php if( get_header_image() != '' ) : ?>

					<div id="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
					</div><!-- end of #logo -->

				<?php endif; // header image was removed ?>

				<?php if( !get_header_image() ) : ?>

				<div id="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        <img src="<?php echo home_url(); ?>/wp-content/uploads/2015/08/logo-matonghoa.png" alt="mật ong hoa thiên nhiên" />
                    </a>
                </div><!-- end of #logo -->

                <?php endif; // header image was removed (again) ?>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				    <span class="sr-only">Toggle navigation</span>
				    <span class="text-icon-bar">Menu</span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				    <span class="icon-bar"></span>
			  	</button>
            </div>
            <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
				<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Bạn cần tìm gì&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
				<input type="submit" value="Tìm kiếm" />
				<input type="hidden" name="post_type" value="product" />
			</form>
            <div class="hotline-mobile">
            	<span class="hotro-dathang">Hỗ trợ & Đặt hàng:</span>
            	<span><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:0946410840"> 0946 410 840</a> <i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:0911406539"> 0911 406 539</a></span>
            </div>
		</div>
		<?php dazzling_header_menu(); ?>
	</nav><!-- .site-navigation -->