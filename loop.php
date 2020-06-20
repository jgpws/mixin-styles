<!-- begins the loop -->
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<!-- opens post article -->
	<article id="post-<?php the_id(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title">
		<?php if( !is_single() ) { ?>
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		<?php } else {
		the_title();
		} ?>
		</h2>
		<section class="entry-meta">
			<div class="the_date">
			<!-- Thanks to Alex at www.euphorish.com for providing date stamp images and a method to implement them. http://www.euphorish.com/author/alex/ -->
				<div class="date_m"><?php the_time('F'); ?></div>
				<div class="date_d"><?php the_time('jS'); ?></div>
				<div class="date_y"><?php the_time('Y'); ?></div>
			</div>
			<p class="postdata">
				<strong><?php esc_html_e( 'By author: ', 'mixin-styles' ); ?></strong><?php the_author_posts_link(); ?>
				<?php if( !is_page() ) { ?>
					| <strong><?php esc_html_e( 'Categories: ', 'mixin-styles' ); ?></strong><?php the_category(', ');
				 } ?>
			 	| <strong><?php esc_html_e( 'Number of comments: ', 'mixin-styles' ); ?></strong><?php comments_number(); ?>
			</p>
		</section>

	<!-- opens entry section -->
		<section class="entry">
		<?php // Performs a check to see if the function is available and there's also a thumbnail attached
			if ( function_exists ('has_post_thumbnail') && has_post_thumbnail() ) {
				if ( is_search() ) {
					the_post_thumbnail( 'thumbnail' );
				} else {
					mixin_styles_switch_tn_size(); // In customizer.php
				}
			} ?>

		<?php
		$content_length = get_theme_mod( 'mixin_styles_content_length', 'full' );
		if( is_archive() || is_search() || $content_length == 'excerpt' ) {
			the_excerpt();
		} else {
			the_content();
		} ?>
		<br class="clearboth" />
	</section>
	<!-- closes entry section -->
	<?php the_tags( '<section class="entry-footer"><strong>' . esc_html__( 'Tags for this post:', 'mixin-styles' ) . '</strong> ', ', ', '</section>' ); ?>
	<?php wp_link_pages( array(
			'before' => '<p class="pagination"><strong>' . esc_html__( 'Pages:', 'mixin-styles' ) . '</strong>',
			'after' => '</p>',
			'link_before' => '<span class="pagination-link">',
			'link_after' => '</span>',
		) ); ?>

	</article>
	<!-- closes post article -->
	<?php endwhile; else: ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'mixin-styles' ); ?></p>
	<?php endif; ?>
<!-- ends the loop -->
