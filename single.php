<?php get_header(); ?>


<!-- begins main div -->
<div id="main">

<section id="content" role="main">
	<?php get_template_part( 'nav', 'posts' ); ?>
	
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
