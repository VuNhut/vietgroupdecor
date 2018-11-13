<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dazzling
 */

get_header(); ?>
	<div class="top-section">
		<?php dazzling_featured_slider(); ?>

		<?php dazzling_call_for_action(); ?>
		<div class="box-banner">
			<?php $args_banner = array('category_name' => 'banner-home', 'posts_per_page' => 1); ?>
			<?php $query_banner = new WP_Query($args_banner); ?>
			<?php if ($query_banner->have_posts()) : while ($query_banner->have_posts()) : $query_banner->the_post(); ?>
			<?php the_post_thumbnail('img-responsive', array( 'sizes' => '(max-width:320px) 300px, (max-width:425px) 400px, 382px' )); ?>
			<?php endwhile; endif; ?>
		</div>
		<div style="clear:both"></div>
	</div>
	<div class="boxso" class="content-area">
      	<div class="container">
          	<div class="row">
			  <div class="col-12 title-decor">
				<h2><?php if( $term = get_term_by( 'id', 455, 'product_cat' ) ){ echo $term->name; } ?></h2>
					<b></b>
					<div style="clear:both"></div>
				</div>
            	<?php
					$the_query = new WP_Query(
						array (
							'post_type' => 'product',
							'posts_per_page' => 4,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'term_id',
									'terms' => 455
								)
							),
						)
					);
					if($the_query->have_posts()) :
						while ($the_query->have_posts() ) : $the_query->the_post();
							$product = wc_get_product( get_the_ID() );
              	?>
					<div class="col-lg-3 col-md-4 col-6 item-decor">
						<div class="hservice product">
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
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div> <!-- End Row 1 -->
			<div class="row">
			  <div class="col-12 title-decor">
				<h2><?php if( $term = get_term_by( 'id', 440, 'product_cat' ) ){ echo $term->name; } ?></h2>
					<b></b>
					<div style="clear:both"></div>
				</div>
            	<?php
					$the_query = new WP_Query(
						array (
							'post_type' => 'product',
							'posts_per_page' => 4,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'term_id',
									'terms' => 440
								)
							),
						)
					);
					if($the_query->have_posts()) :
						while ($the_query->have_posts() ) : $the_query->the_post();
							$product = wc_get_product( get_the_ID() );
              	?>
					<div class="col-lg-3 col-md-4 col-6 item-decor">
						<div class="hservice product">
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
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div> <!-- End Row 2 -->
			<div class="row">
			  <div class="col-12 title-decor">
				<h2><?php if( $term = get_term_by( 'id', 454, 'product_cat' ) ){ echo $term->name; } ?></h2>
					<b></b>
					<div style="clear:both"></div>
				</div>
            	<?php
					$the_query = new WP_Query(
						array (
							'post_type' => 'product',
							'posts_per_page' => 4,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'term_id',
									'terms' => 454
								)
							),
						)
					);
					if($the_query->have_posts()) :
						while ($the_query->have_posts() ) : $the_query->the_post();
							$product = wc_get_product( get_the_ID() );
              	?>
					<div class="col-lg-3 col-md-4 col-6 item-decor">
						<div class="hservice product">
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
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div> <!-- End Row 3 -->
			<div class="row">
			  <div class="col-12 title-decor">
				<h2><?php if( $term = get_term_by( 'id', 453, 'product_cat' ) ){ echo $term->name; } ?></h2>
					<b></b>
					<div style="clear:both"></div>
				</div>
            	<?php
					$the_query = new WP_Query(
						array (
							'post_type' => 'product',
							'posts_per_page' => 4,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'term_id',
									'terms' => 453
								)
							),
						)
					);
					if($the_query->have_posts()) :
						while ($the_query->have_posts() ) : $the_query->the_post();
							$product = wc_get_product( get_the_ID() );
              	?>
					<div class="col-lg-3 col-md-4 col-6 item-decor">
						<div class="hservice product">
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
				<?php endwhile; endif; wp_reset_postdata(); ?>
        	</div> <!-- End Row 4 -->
        </div>
    </div>

<?php get_footer(); ?>