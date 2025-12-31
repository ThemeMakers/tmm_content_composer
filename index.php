<?php if (!defined('ABSPATH')) {
    exit;
}

/**
 * Plugin Name: ThemeMakers Visual Content Composer
 * Plugin URI: https://webtemplatemasters.com
 * Description: Universal Layout Composer with Shortcodes Package
 * Author: ThemeMakers
 * Author URI: https://themeforest.net/user/ThemeMakers
 * Version: 1.6.0
 * Text Domain: tmm_content_composer
 * Domain Path: /languages/
 */

define('TMM_CC_DIR', trailingslashit(plugin_dir_path(__FILE__)));
define('TMM_CC_URL', trailingslashit(plugin_dir_url(__FILE__)));

if (!function_exists('tmm_cc_load_textdomain')) {
    function tmm_cc_load_textdomain()
    {
        load_plugin_textdomain('tmm_content_composer', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }
}

add_action('plugins_loaded', 'tmm_cc_load_textdomain');

require_once TMM_CC_DIR . '/classes/content_composer.php';
require_once TMM_CC_DIR . '/classes/layout_constructor.php';
require_once TMM_CC_DIR . '/classes/shortcode.php';

if (!function_exists('tmm_cc_array_sanitize_deep')) {
    function tmm_cc_array_sanitize_deep($value)
    {
        if (is_array($value)) {
            foreach ($value as $key => $item) {
                $value[$key] = tmm_cc_array_sanitize_deep($item);
            }
            return $value;
        }

        if (is_scalar($value)) {
            return is_numeric($value) ? $value + 0 : sanitize_text_field((string) $value);
        }

        return '';
    }
}

if (!function_exists('tmm_cc_safe_decode_params')) {
    function tmm_cc_safe_decode_params($raw)
    {
        if (empty($raw)) {
            return array();
        }

        if (is_array($raw)) {
            return tmm_cc_array_sanitize_deep($raw);
        }

        if (!is_string($raw)) {
            return array();
        }

        $decoded = base64_decode($raw, true);
        if ($decoded === false) {
            return array();
        }

        // Prevent object injection by disallowing classes and rejecting non-arrays.
        $data = @unserialize($decoded, array('allowed_classes' => false));
        if ($data === false && $decoded !== 'b:0;') {
            $data = json_decode($decoded, true);
        }

        if (!is_array($data)) {
            return array();
        }

        return tmm_cc_array_sanitize_deep($data);
    }
}

/**
 * Register
 */
function tmm_cc_register()
{

    TMM_Content_Composer::get_instance();

    if (!function_exists('tmm_enqueue_script')) {
        function tmm_enqueue_script($key)
        {
            wp_enqueue_script('tmm_' . $key);
        }
    }

    if (!function_exists('tmm_enqueue_style')) {
        function tmm_enqueue_style($key)
        {
            wp_enqueue_style('tmm_' . $key);
        }
    }

    if (!function_exists('tmm_get_fonts_array')) {
        function tmm_get_fonts_array()
        {
            return array(
                '' => 'Default',
                'Arial' => 'Arial',
                'Tahoma' => 'Tahoma',
                'Verdana' => 'Verdana',
                'Calibri' => 'Calibri',
            );
        }
    }
}

add_action('init', 'tmm_cc_register');

/**
 * Deactivate old Shortcodes and Layout Constructor plugins
 */
function tmm_cc_activation()
{
    deactivate_plugins(array('tmm_layout_constructor/index.php', 'tmm_shortcodes/index.php'));
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
