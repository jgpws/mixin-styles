<!-- begins sidebar aside -->
<aside id="sidebar" role="complementary">
	<ul>
	<!-- opens sidebar ul -->

	<!-- begins widgetized section -->
		<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar() ) : ?>
		<li class="log-in-out"><h3 class="widgettitle"><?php esc_html_e( 'Login', 'mixin-styles' ) ?></h3>
			<ul>
			<?php if( is_user_logged_in() ){
	echo '<li><span class="login-message">' . esc_html__( 'Welcome registered user:', 'mixin-styles' ) . '</span></li>'; wp_register('<li>', ' ' . esc_html__( '(Edit Site)', 'mixin-styles' ) . '</li>');} ?>
				<li><?php wp_loginout(); ?></li>
			</ul>
		</li>
		<?php
			the_widget( 'WP_Widget_Pages' );
			the_widget( 'WP_Widget_Categories' );
			the_widget( 'WP_Widget_Archives' );
		endif; ?>
		<!-- ends widgetized section -->
	</ul>
	<!-- closes sidebar ul -->
</aside>
<!-- ends sidebar aside -->
