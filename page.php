<?php get_header(); ?>


<!-- begins main div -->
<div id="main">

<!-- begins content div -->
<section id="content" role="main">
	<div class="navigation">
		<?php previous_post_link(); ?> | <?php next_post_link(); ?>
	</div>
	
	<?php get_template_part( 'loop' ); ?>

	<!-- add comments and reply form to the page -->
	<?php comments_template(); ?>
	
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
