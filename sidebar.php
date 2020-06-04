<!-- begins sidebar aside -->
<aside id="sidebar" role="complementary">
	<ul>
	<!-- opens sidebar ul -->
		<li class="log-in-out"><h3 class="widgettitle"><?php esc_html_e( 'Login', 'mixin-styles' ) ?></h3>
			<ul>
			<?php if( is_user_logged_in() ){
	echo '<li><span class="login-message">' . esc_html__( 'Welcome registered user:', 'mixin-styles' ) . '</span></li>'; wp_register('<li>', ' ' . esc_html__( '(Edit Site)', 'mixin-styles' ) . '</li>');} ?>
				<li><?php wp_loginout(); ?></li>
			</ul>
		</li>
	<!-- begins widgetized section -->
		<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar() ) : ?>


		<?php wp_list_pages('depth=3&&title_li=<h3 class="widgettitle">' . esc_html__( 'Pages', 'mixin-styles' ) . '</h3>' ); ?>
	<!-- Categories list -->
		<?php wp_list_categories('depth=3&title_li=<h3 class="widgettitle">' . esc_html__( 'Categories', 'mixin-styles' ) . '</h3>'); ?>
	<!-- Archives list -->
		<li class="archives"><h3 class="widgettitle"><?php esc_html_e( 'Archives', 'mixin-styles' ); ?></h3>
			<ul>
			<?php wp_get_archives(); ?>
			</ul>
		</li>
		<?php endif; ?>
		<!-- ends widgetized section -->
	</ul>
	<!-- closes sidebar ul -->
</aside>
<!-- ends sidebar aside -->
