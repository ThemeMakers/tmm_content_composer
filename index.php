<?php
/**
 * Plugin Name: ThemeMakers Visual Content Composer
 * Plugin URI: http://webtemplatemasters.com
 * Description: Universal Layout Composer with Shortcodes Package
 * Author: ThemeMakers
 * Author URI: http://themeforest.net/user/ThemeMakers
 * Version: 1.0.1
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

$tmm_row_options = array(
	'section_title' => '',
	'lc_displaying' => 'default',
	'full_width' => 0,
	'content_full_width' => 0,
	'padding_top' => 0,
	'padding_bottom' => 0,
	'margin_top' => 0,
	'margin_bottom' => 0,
	'align' => 'center',
	'section_content' => 1,
	'bg_type' => 'none',
	'bg_custom_type' => 'color',
	'bg_color' => '#ffffff',
	'bg_image' => '',
	'bg_attachment' => '1',
	'bg_video' => '',
	'bg_video_panel' => 1,
	'bg_video_mute' => 0,
	'bg_video_loop' => 1,
	'bg_fullscreen' => 0,
	'overlay' => 0,
	'bg_overlay_color' => '#ffffff',
	'bg_overlay_opacity' => 100,
	'border_width' => 0,
	'border_type' => 'solid',
	'border_color' => '#ffffff'
);

$GLOBALS['tmm_row_options'] = $tmm_row_options;
