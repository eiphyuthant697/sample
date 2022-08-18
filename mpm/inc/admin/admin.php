<?php

if (!defined('ABSPATH')) {
	exit;
}

/*
 * Welcome Notice after Theme Activation
 */

if (!function_exists('foodica_admin_notice')) {
	function foodica_admin_notice() {
		global $pagenow, $foodica_version;
		if (current_user_can('edit_theme_options') && 'index.php' === $pagenow && !get_option('foodica_notice_welcome') || current_user_can('edit_theme_options') && 'themes.php' === $pagenow && isset($_GET['activated']) && !get_option('foodica_notice_welcome')) {
			wp_enqueue_style('foodica-admin-notice', get_template_directory_uri() . '/inc/admin/admin-notice.css', array(), $foodica_version);
			foodica_welcome_notice();
		}
	}
}
add_action('admin_notices', 'foodica_admin_notice');


/*
 * Hide Welcome Notice in WordPress Dashboard ***
 */

if (!function_exists('foodica_hide_notice')) {
	function foodica_hide_notice() {
		if (isset($_GET['foodica-hide-notice']) && isset($_GET['_foodica_notice_nonce'])) {
			if (!wp_verify_nonce($_GET['_foodica_notice_nonce'], 'foodica_hide_notices_nonce')) {
				wp_die(esc_html__('Action failed. Please refresh the page and retry.', 'foodica'));
			}
			if (!current_user_can('edit_theme_options')) {
				wp_die(esc_html__('You do not have the necessary permission to perform this action.', 'foodica'));
			}
			$hide_notice = sanitize_text_field($_GET['foodica-hide-notice']);
			update_option('foodica_notice_' . $hide_notice, 1);
		}
	}
}
add_action('wp_loaded', 'foodica_hide_notice');

/*
 * Content of Welcome Notice in WordPress Dashboard
 */

if (!function_exists('foodica_welcome_notice')) {
	function foodica_welcome_notice() {
		global $foodica_data; ?>
		<div class="notice notice-success wpz-welcome-notice">
			<a class="notice-dismiss wpz-welcome-notice-hide" href="<?php echo esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('foodica-hide-notice', 'welcome')), 'foodica_hide_notices_nonce', '_foodica_notice_nonce')); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__('Dismiss this notice.', 'foodica'); ?>
				</span>
			</a>
			<p><?php printf(esc_html__('Thanks for using %1$s! To get started please make sure you visit our %2$swelcome page%3$s.', 'foodica'), $foodica_data['Name'], '<a href="' . esc_url(admin_url('themes.php?page=foodica')) . '">', '</a>'); ?></p>
			<p class="wpz-welcome-notice-button">
				<a class="button-secondary" href="<?php echo esc_url(admin_url('themes.php?page=foodica')); ?>">
					<?php printf(esc_html__('Get Started with %s', 'foodica'), $foodica_data['Name']); ?>
				</a>
				
			</p>
		</div><?php
	}
}

/*
 * About Theme Page
 */

if (!function_exists('foodica_theme_info_page')) {
	function foodica_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Foodica Theme', 'foodica'), esc_html__('About MPM', 'MPM'), 'edit_theme_options', 'foodica', 'foodica_display_theme_page');
	}
}
add_action('admin_menu', 'foodica_theme_info_page');

if (!function_exists('foodica_display_theme_page')) {
	function foodica_display_theme_page() {
		global $foodica_data; ?>
		<div class="theme-info-wrap">

			<div class="wpz-row theme-intro wpz-clearfix">


				<div class="wpz-col-1-4">
					<img class="theme-screenshot"
					     src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>"
					     alt="<?php esc_attr_e( 'Theme Screenshot', 'foodica' ); ?>"/>
				</div>
				<div class="wpz-col-3-4 theme-description">

                    <h1>
                        <?php printf(esc_html__('Welcome to %1$1s %2$2s', 'foodica'), $foodica_data['Name'], $foodica_data['Version']); ?>
                    </h1>


                    <?php esc_html_e('MPM Clinic is for Myanmar Premium Medical Clinic website which is for patients can reserve booking before coming hospital, not time-serving and patients can register for member card.', 'foodica'); ?>

                    

                </div>

			</div>
			
			
			

		</div><?php
	}
}

?>