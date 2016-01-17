<?php
/**
 * Plugin Name: ThemeMakers Visual Content Composer
 * Plugin URI: http://webtemplatemasters.com
 * Description: Universal Layout Composer with Shortcodes Package
 * Author: ThemeMakers
 * Author URI: http://themeforest.net/user/ThemeMakers
 * Version: 1.2.10
 * Text Domain: tmm_content_composer
*/

define('TMM_CC_DIR', plugin_dir_path( __FILE__ ));
define('TMM_CC_URL', plugin_dir_url( __FILE__ ));
define('TMM_CC_TEXTDOMAIN', 'tmm_content_composer');

require_once TMM_CC_DIR.'classes/content_composer.php';
require_once TMM_CC_DIR.'classes/layout_constructor.php';
require_once TMM_CC_DIR.'classes/shortcode.php';

/**
 * Register
 */
function tmm_cc_register() {

	TMM_Content_Composer::get_instance();

	if ( !function_exists('tmm_enqueue_script') ) {
		function tmm_enqueue_script($key) {
			wp_enqueue_script('tmm_' . $key);
		}
	}

	if ( !function_exists('tmm_enqueue_style') ) {
		function tmm_enqueue_style($key) {
			wp_enqueue_style('tmm_' . $key);
		}
	}

	if ( !function_exists('tmm_get_fonts_array') ) {
		function tmm_get_fonts_array() {
			return array(
				'' => __('Default', TMM_CC_TEXTDOMAIN),
				'Arial' => __('Arial', TMM_CC_TEXTDOMAIN),
				'Tahoma' => __('Tahoma', TMM_CC_TEXTDOMAIN),
				'Verdana' => __('Verdana', TMM_CC_TEXTDOMAIN),
				'Calibri' => __('Calibri', TMM_CC_TEXTDOMAIN),
			);
		}
	}

}

add_action( 'init', 'tmm_cc_register' );

/**
 * Load plugin textdomain.
 */
function tmm_cc_load_textdomain() {
	load_plugin_textdomain( 'tmm_content_composer', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'tmm_cc_load_textdomain' );

/**
 * Deactivate old Shortcodes and Layout Constructor plugins
 */
function tmm_cc_activation() {
	deactivate_plugins( array('tmm_layout_constructor/index.php', 'tmm_shortcodes/index.php') );
}

register_activation_hook(__FILE__, 'tmm_cc_activation');

$tmm_row_options = array(
	'lc_displaying' => 'default',
	'container_width' => 0,
	'container_height' => 0,
	'align' => 'left',
	'border_top' => 0,
	'padding_top' => 0,
	'padding_bottom' => 20,
	'bg_type' => 'none',
	'bg_color_type' => 0,
	'bg_color' => '',
	'bg_image' => '',
	'bg_attachment' => 1,
	'bg_overlay' => 0,
	'bg_overlay_color' => '#ffffff',
	'bg_overlay_opacity' => 100,
);

$GLOBALS['tmm_row_options'] = $tmm_row_options;