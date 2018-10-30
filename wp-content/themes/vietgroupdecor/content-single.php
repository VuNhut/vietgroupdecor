<?php
/**
 * @package dazzling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">


		<h1 class="entry-title "><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php dazzling_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div role="form" class="wpcf7" id="wpcf7-f1450-p1464-o1" lang="vi" dir="ltr">
			<div class="screen-reader-response"></div>
			<form action="#wpcf7-f1450-p1464-o1" method="post" class="wpcf7-form" novalidate="novalidate">
				<h3>Đặt Hàng Online</h3>
				<div style="display: none;">
					<input type="hidden" name="_wpcf7" value="1450">
					<input type="hidden" name="_wpcf7_version" value="4.7">
					<input type="hidden" name="_wpcf7_locale" value="vi">
					<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1450-p1464-o1">
					<input type="hidden" name="_wpnonce" value="e5e4e0791c">
				</div>
				<div class="hoten">
					<p>Họ Tên *</p>
				    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span>
				</div>
				<div class="sdt">
					<p>Điện Thoại *</p>
				    <span class="wpcf7-form-control-wrap tel-242"><input type="tel" name="tel-242" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false"></span>
				</div>
				<div class="email">
					<p>Email (nếu có)</p>
				    <input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false">
				</div>
				<div style="clear:both"></div>
				<div class="noidung-tuvan">
					<p>Nội dung đặt hàng</p>
				    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="2" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span>
				</div>
				<div class="gui-yeu-cau">
					<div class="wpcf7-response-output wpcf7-display-none"></div>
					<div class="button-gui"><input type="submit" value="Gửi yêu cầu đặt hàng" class="wpcf7-form-control wpcf7-submit btn btn-default"></div>
				</div>
				<p class="chuthich-tuvan">* Vui lòng điền đầy đủ và chính xác những thông tin bên trên. Chúng tôi sẽ gọi điện thoại trực tiếp hoặc gửi email cho bạn ngay khi nhận được đơn đặt hàng</p>
			</form>
		</div>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'            => '<div class="page-links">'.__( 'Pages:', 'dazzling' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1
       		) );
    	?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'dazzling' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'dazzling' ) );

			if ( ! dazzling_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = '<i class="fa fa-folder-open-o"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
				} else {
					$meta_text = '<i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = '<i class="fa fa-folder-open-o"></i> %1$s <i class="fa fa-tags"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
				} else {
					$meta_text = '<i class="fa fa-folder-open-o"></i> %1$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'dazzling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
		<?php dazzling_setPostViews(get_the_ID()); ?>
		<hr class="section-divider">
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
