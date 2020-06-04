<!-- see http://themeshaper.com/2009/06/29/wordpress-theme-index-template-tutorial/ -->
<?php global $wp_query;
$mixin_styles_total_pages = $wp_query->max_num_pages;
if ( $mixin_styles_total_pages > 1 ) { ?>
	<div class="navigation">
		<?php posts_nav_link( ' | ' ); ?>
	</div>
<?php } ?>
