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
	                    array
	                        (
	                            'post_type' => 'post',
	                            'posts_per_page' => 3,
	                        )
	                );
	                $i = 0;
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
						<?php the_post_thumbnail( 'dazzling-featured'); ?>
					</div>
					<div style="clear:both"></div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>
	<div class="boxso" class="content-area">
      	<div class="container">
          	<div class="row gallery">
            	<?php
					$the_query = new WP_Query(
						array
							(
								'post_type' => 'product',
								'posts_per_page' => 3,
							)
					);
					$currency = get_woocommerce_currency_symbol();
					foreach($the_query->posts as $p):
						$pid = $p->ID;
						$product = wc_get_product( $pid );
              	?>
              	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 item-decor">
                  	<div class="hservice">
						<ul>
							<li class="noneli">
								<div class="block-image">
									<div class="ih-item"><a href="<?php echo get_permalink($pid); ?>">
										<div class="img"><?php echo get_the_post_thumbnail($pid); ?></div>
										</a>
									</div>
								</div>
								<div class="thong-tin-sp">
									<h4><a href="<?php echo get_permalink($pid); ?>"><?php echo $p->post_title; ?></a></h4>
									<p class="price"><?php echo $product->get_price_html(); ?></p>
								</div>
							</li>
						</ul>
                	</div>
            	</div>
				<?php endforeach; ?>
        	</div>
        </div>
    </div>

<?php get_footer(); ?>