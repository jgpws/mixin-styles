<?php get_header(); ?>


<!-- begins main div -->
<div id="main">


<!-- begins content section -->
<section id="content" role="main">
	<?php get_template_part( 'nav', 'pages' ); ?>

	<p class="large-text page-title"><strong><?php esc_html_e( 'Your search results for: ', 'mixin-styles' ); ?></strong><?php the_search_query(); ?> </p>

	<?php get_template_part( 'loop' ); ?>

	<?php get_template_part( 'nav', 'pages' ); ?>
</section>
<!-- ends content div -->

<?php get_sidebar(); ?>

</div>
<!-- ends main div -->


<?php get_footer(); ?>

</div>
<!-- ends wrapper div -->


</body>
</html>
