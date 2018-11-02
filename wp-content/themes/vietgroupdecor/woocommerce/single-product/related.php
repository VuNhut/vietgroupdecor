<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					$product = wc_get_product( $related_product->get_id() );

				?>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 item-decor">
					<div class="hservice">
						<a href="<?php the_permalink(); ?>">
							<div class="block-image">
								<?php if ( $product->is_on_sale() ) : ?>
									<?php echo apply_filters( 'woocommerce_sale_flash', '', $post, $product ); ?>
								<?php endif; ?>
								<div class="ih-item">
									<div class="img"><?php the_post_thumbnail('size-custom', array('sizes' => '(max-width: 768px) 300px, (max-width: 992px) 250px, 200px')); ?></div>
								</div>
							</div>
							<div class="thong-tin-sp">
								<h4><?php the_title(); ?></h4>
								<p class="price"><?php echo $product->get_price_html(); ?></p>
							</div>
						</a>
					</div>
				</div>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();
