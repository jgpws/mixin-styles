<?php get_header(); ?>


<!-- begins main div -->
<div id="main">

<!-- begins content div -->
<section id="content" role="main">
	<?php get_template_part( 'nav', 'pages' ); ?>

	<p class="large-text page-title"><strong><?php esc_html_e( 'Posts Tagged: ', 'mixin-styles' ); ?></strong><?php single_tag_title(' '); ?> </p>

	<?php get_template_part( 'loop' ); ?>

	<?php get_template_part( 'nav', 'pages' ); ?>
</section>
<!-- ends content section -->

<?php get_sidebar(); ?>

</div>
<!-- ends main div -->

<?php get_footer(); ?>

</div>
<!-- ends wrapper div -->


</body>
</html>
