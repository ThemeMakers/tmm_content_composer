<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
switch ($type) {
    case "info":
        $type = 'info type-1';
        break;
    case "error":
        $type = 'error type-1';
        break;
    case "success":
        $type = 'success type-1';
        break;
    case "notice":
        $type = 'notice type-1';
        break;
    default:
        $type = $type;
        break;
}
?>
<p class="<?php echo esc_attr($type) ?>"><?php echo esc_html($content) ?></p>