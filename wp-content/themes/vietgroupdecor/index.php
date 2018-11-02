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
		<div class="box-tin-tuc">
			<div class="tin-tuc">
				<h2>Tin tức</h2>
				<b></b>
				<div style="clear:both"></div>
			</div>
			<div class="news-info">
				<?php
	                $the_query = new WP_Query(
	                    array (
							'cat' => 441,
							'post_type' => 'post',
							'posts_per_page' => 3,
	                    )
	                );
					$i = 0;
					if ($the_query->have_posts()) :
	                while ( $the_query->have_posts() ) {
	                    $the_query->the_post();
	                    $i++;
	            ?>
				<div class="info <?php if ($i == 3) { echo 'no-border-bottom'; } ?>">
					<div class="title">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p>Ngày đăng: <?php echo get_the_date( 'd/m/Y' ); ?></p>
					</div>
					<div class="img-news">
						<?php the_post_thumbnail(array(109, 69)); ?>
					</div>
					<div style="clear:both"></div>
				</div>
				<?php } endif; wp_reset_postdata(); ?>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>
	<div class="boxso" class="content-area">
      	<div class="container">
          	<div class="row">
			  <div class="title-decor">
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
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-decor">
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
			  <div class="title-decor">
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
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-decor">
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
			  <div class="title-decor">
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
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-decor">
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
			  <div class="title-decor">
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
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-decor">
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