<?php
/**
 * Single variation cart button
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	
	<!-- <button type="submit" class="single_add_to_cart_button button alt">Mua ngay <p>Đặt hàng trực tiếp trên website</p></button> -->
	<a href="tel:0903347866" class="col-sm-12 call-buy-product">Gọi ngay: <span>0903 347 866</span> <p>Đặt hàng ngay hôm nay để nhận được ưu đãi</p></a>
	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
