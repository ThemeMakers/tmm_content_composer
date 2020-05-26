<?php
/**
 * Plugin Name: ThemeMakers Visual Content Composer
 * Plugin URI: http://webtemplatemasters.com
 * Description: Universal Layout Composer with Shortcodes Package
 * Author: ThemeMakers
 * Author URI: http://themeforest.net/user/ThemeMakers
 * Version: 1.1.4
 * Text Domain: tmm_content_composer
*/

define('TMM_CC_DIR', plugin_dir_path( __FILE__ ));
define('TMM_CC_URL', plugin_dir_url( __FILE__ ));
define('TMM_CC_TEXTDOMAIN', 'tmm_content_composer');

require_once TMM_CC_DIR.'classes/content_composer.php';
require_once TMM_CC_DIR.'classes/layout_constructor.php';
require_once TMM_CC_DIR.'classes/shortcode.php';

/* Register */
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
				'Arial' => 'Arial',
				'Tahoma' => 'Tahoma',
				'Verdana' => 'Verdana',
				'Calibri' => 'Calibri',
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