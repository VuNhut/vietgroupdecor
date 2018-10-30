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
	
	<button type="submit" class="single_add_to_cart_button button alt">Mua ngay <p>Đặt hàng trực tiếp trên website</p></button>
	<a href="tel:0946410840" class="call-buy-product">Gọi ngay <p>Đặt hàng qua điện thoại</p></a>
	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
