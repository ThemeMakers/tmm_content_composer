<?php if (!defined('ABSPATH')) {
    exit();
}

if (!empty($logos_list)) {
    if (!is_array($logos_list)) {
        $logos_list = explode(',', $logos_list);
    }
} else {
    $logos_list = '';
}

$hide_empty = isset($hide_empty) ? $hide_empty : false;

if (!function_exists('get_terms')) {
    require_once ABSPATH . WPINC . '/taxonomy.php';
}

$inventory_page_url = '';
$searching_page_id = (int) TMM::get_option('searching_page', TMM_APP_CARDEALER_PREFIX);
if ($searching_page_id) {
    if (class_exists('TMM_Helper') && method_exists('TMM_Helper', 'get_permalink_by_lang')) {
        $inventory_page_url = TMM_Helper::get_permalink_by_lang($searching_page_id);
    } else {
        $inventory_page_url = get_permalink($searching_page_id);
    }
}

// TODO: update the shortcode with the following feature extension
$args = array(
    'taxonomy' => 'carproducer',
    'orderby' => 'none',
    'order' => 'ASC',
    'include' => $logos_list,
    'hide_empty' => $hide_empty,
    'fields' => 'all',
    'parent' => 0,
    'hierarchical' => true,
    'pad_counts' => true,
);

$makes = get_terms($args);

if (!isset($show_name)) {
    $show_name = 1;
}
//var_dump($logos_list);

//usort($makes);

//var_dump($makes);

?>

<ul class="list-entry carproducers_list">

    <?php
    foreach ($makes as $make) {

        //        var_dump($make->term_id);

        $image_name = strtolower($make->name);
        $image_name = preg_replace(array('/\s/', '/ë/'), array('_', 'e'), $image_name);
        $src = 'images/car_makes_logos/' . $image_name . '.svg';

        if (!file_exists(TMM_CC_DIR . $src)) {
            $src = '';
        } else {
            $src = TMM_CC_URL . $src;
        }

        if (isset($show_only_with_logo) && $show_only_with_logo && !$src) {
            continue;
        }

        if ($make->count > 0 || !$hide_empty) {
    ?>

            <li class="cat-item-<?php echo esc_attr((str_replace(' ', '-', strtolower($make->name)))) ?>">
                <?php
                // Prefer linking to the inventory/search page with a prefilled make filter; fall back to taxonomy link.
                if ($inventory_page_url) {
                    $make_url = user_trailingslashit(trailingslashit($inventory_page_url) . 'make/' . $make->slug);
                } else {
                    $make_url = get_term_link($make->slug, 'carproducer');
                }
                ?>

                <?php if (!isset($show_link) || $show_link && $make->count > 0) { ?>
                    <a title="<?php echo sprintf(esc_html__('View all ads filed under %s', 'tmm_content_composer'), $make->name); ?>"
                        href="<?php echo esc_url($make_url); ?>"
                        class="tmm-make-to-inventory"
                        data-carproducer="<?php echo (int) $make->term_id; ?>"
                        data-inventory-url="<?php echo esc_url($inventory_page_url); ?>">
                    <?php } ?>

                    <?php if ($show_logo && $src != '') { ?>
                        <span class="icon"><img src="<?php echo esc_attr($src) ?>" alt="<?php echo esc_html__($make->name, 'tmm_content_composer') ?>" /></span>
                    <?php } ?>

                    <?php if ($show_name) { ?>
                        <div class="h4-style car-title">
                            <?php
                            echo esc_html__($make->name, 'tmm_content_composer');
                            echo (!isset($show_count) || $show_count) ? ' (' . $make->count . ')' : '';
                            ?>
                        </div>
                    <?php } ?>

                    <?php if (!isset($show_link) || $show_link && $make->count > 0) { ?>
                    </a>
                <?php } ?>

            </li>

    <?php
        }
    }
    ?>

</ul>
