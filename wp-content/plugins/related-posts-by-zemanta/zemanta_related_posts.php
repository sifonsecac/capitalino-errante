<?php
/*
Plugin Name: Related Posts by Sovrn
Version: 1.14
Plugin URI: http://wordpress.org/extend/plugins/related-posts-by-zemanta/
Description: Quickly increase your readers' engagement with your posts by adding Related Posts in the footer of your content. Click on <a href="admin.php?page=zemanta-related-posts">Sovrn tab</a> to configure your settings.
Author: Sovrn, zemanta
Author URI: http://www.sovrn.com/
*/

if (! function_exists('wp_rp_init_zemanta')) {
	function zem_rp_init_error() {
		?>
		<div class="updated">
        <p><?php _e('Related Posts by Sovrn couldn\'t initialize.'); ?></p>
		</div>
		<?php
	}

	try {
		include_once(dirname(__FILE__) . '/init.php');
	}
	catch (Exception $e) {
		trigger_error($e);
		add_action( 'admin_notices', 'zem_rp_init_error' );
	}
}
else {
	function zem_multiple_plugins_notice() {
		?>
		<div class="updated">
        <p><?php _e( 'Oh, it\'s OK, looks like you\'ve already got one related posts plugin installed, so no need for another one.', 'wp_wp_related_posts' ); ?></p>
		</div>
		<?php
	}
	add_action( 'admin_notices', 'zem_multiple_plugins_notice' );
}
