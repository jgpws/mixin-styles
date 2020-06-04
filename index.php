<?php get_header(); ?>


<!-- begins main div -->
<div id="main">


<!-- begins content section -->
<section id="content" role="main">
	<?php get_template_part( 'nav', 'pages' ); ?>
	
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
