<?php
$date = date_i18n( 'Y' );
?>
<!-- begins footer -->
<footer id="footer" role="contentinfo">
	<address>&copy; <?php echo esc_html( $date ); ?> <?php bloginfo('name'); ?>. <?php esc_html_e( 'All rights reserved', 'mixin-styles' ); ?></address>
	<p class="small">
		<strong><a href="http://www.jasong-designs.com/2011/11/30/mixin-styles/"><?php esc_html_e( 'Mixin\' Styles ', 'mixin-styles' ); ?></a></strong>,
		<?php esc_html_e( 'designed by ', 'mixin-styles' ); ?>
		<strong><a href="http://www.jasong-designs.com"><?php esc_html_e( 'Jason G. Designs', 'mixin-styles' ); ?></a></strong>.
	</p>
</footer>
<?php wp_footer(); ?>
<!-- ends footer div -->
