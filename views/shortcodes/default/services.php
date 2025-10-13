<?php if (!defined('ABSPATH')) die('No direct access allowed');

$normalize_list = static function ($value, $delimiter) {
    if (is_array($value)) {
        return array_values(array_map('trim', $value));
    }

    if (!is_string($value)) {
        return array();
    }

    $value = trim($value);

    if ($value === '') {
        return array();
    }

    return array_values(array_map('trim', explode($delimiter, $value)));
};

$content = $normalize_list($content, '^');
$titles = $normalize_list($titles, '^');
$hover_titles = $normalize_list($hover_titles, '^');
$links = $normalize_list($links, '^');
$icons = $normalize_list($icons, ',');

$colors = is_array($colors) ? array_values(array_map('trim', $colors)) : $normalize_list($colors, ',');
$color_groups = !empty($colors) ? array_chunk($colors, 4) : array();

$item_count = count($content);
if ($item_count > 0) {
    $titles = array_pad($titles, $item_count, '');
    $hover_titles = array_pad($hover_titles, $item_count, '');
    $links = array_pad($links, $item_count, '');
    $icons = array_pad($icons, $item_count, '');
    $color_groups = array_pad($color_groups, $item_count, array());
}

$build_color_style = static function ($hex, $property) {
    if ($hex === '') {
        return '';
    }

    return $property . ': rgb(' . TMM_Content_Composer::hex2RGB($hex, 1) . ');';
};

switch ($type) {
    case '1':
?>
        <div class="content-boxes">

            <ul class="list-entry">
                <?php if (!empty($content)) { ?>
                    <?php foreach ($content as $key => $text) {
                        $title = $titles[$key];
                        $hover_title = $hover_titles[$key];
                        $link = $links[$key];
                        $icon = $icons[$key];
                        $color_set = array_pad((array) $color_groups[$key], 4, '');

                        list($color_text, $color_bg, $color_hover_text, $color_hover_bg) = $color_set;

                        $text_color = $build_color_style($color_text, 'color');
                        $bg_color = $build_color_style($color_bg, 'background-color');
                        $hover_text_color = $build_color_style($color_hover_text, 'color');
                        $hover_bg_color = $build_color_style($color_hover_bg, 'background-color');

                        $li_style = trim($text_color . ' ' . $bg_color);
                        $title_style = trim($text_color);
                        $hover_title_style = trim($hover_text_color);
                        $hover_box_style = trim($hover_bg_color);
                    ?>
                        <li style="<?php echo esc_attr($li_style); ?>">
                            <?php if (!empty($link)) { ?>
                                <a style="<?php echo esc_attr($hover_title_style); ?>" href="<?php echo esc_url($link); ?>">
                                <?php } ?>
                                <i class="content-icon <?php echo esc_attr($icon); ?>"></i>
                                <h3 style="<?php echo esc_attr($title_style); ?>"><?php echo esc_html($title); ?></h3>

                                <div class="hover-box" style="<?php echo esc_attr($hover_box_style); ?>" data-color="<?php echo esc_attr($color_text); ?>" data-color-state="<?php echo esc_attr($color_bg); ?>" data-text-hover="<?php echo esc_attr($color_hover_text); ?>" data-color-hover="<?php echo esc_attr($color_hover_bg); ?>"></div><!--/ .hover-box-->
                                <div class="extra-content">

                                    <div class="extra-table">
                                        <div class="extra-inner">
                                            <h3 style="<?php echo esc_attr($hover_title_style); ?>">
                                                <?php echo esc_html($hover_title); ?>
                                            </h3>
                                            <p style="<?php echo esc_attr($hover_title_style); ?>">
                                                <?php echo esc_html($text); ?>
                                            </p>
                                        </div><!--/ .extra-inner-->
                                    </div>

                                </div><!--/ .extra-content-->
                                <?php if (!empty($link)) { ?>
                                </a>
                            <?php } ?>
                        </li>
                    <?php } ?>
                <?php } ?>

            </ul>

        </div><!--/ .content-boxes-->

        <?php
        break;
    case '2':
        if (!empty($content)) {
            foreach ($content as $key => $text) {
                $title = $titles[$key];
                $link = $links[$key];
                $icon = $icons[$key];
                $wrapper_tag = !empty($link) ? 'a' : 'div';
                $wrapper_attributes = !empty($link) ? ' href="' . esc_url($link) . '"' : '';
        ?>
                <<?php echo $wrapper_tag; ?> class="ca-shortcode-alt" <?php echo $wrapper_attributes; ?>>
                    <i class="ca-icon <?php echo esc_attr($icon); ?>"></i>
                    <div class="ca-content">
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($text); ?></p>
                    </div>
                </<?php echo $wrapper_tag; ?>><!--/ .ca-shortcode-->

            <?php
            }
        }
        break;
    default:

        if (!empty($content)) {
            foreach ($content as $key => $text) {
                $title = $titles[$key];
                $link = $links[$key];
                $icon = $icons[$key];
                $wrapper_tag = !empty($link) ? 'a' : 'div';
                $wrapper_attributes = !empty($link) ? ' href="' . esc_url($link) . '"' : '';
            ?>

                <<?php echo $wrapper_tag; ?> class="ca-shortcode" <?php echo $wrapper_attributes; ?>>
                    <i class="ca-icon <?php echo esc_attr($icon); ?>"></i>
                    <div class="ca-content">
                        <h3 class="ca-title"><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($text); ?></p>
                    </div>
                </<?php echo $wrapper_tag; ?>><!--/ .ca-shortcode-->

<?php
            }
        }
        break;
}
?>