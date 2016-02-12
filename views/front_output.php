<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (!empty($tmm_layout_constructor_total)) {

    foreach ($tmm_layout_constructor_total as $group => $rows) {
var_dump($rows);
echo "<hr/>";
        if (!empty($rows)) {

            $border_bottom_css = "";
            $border_bottom_color = $tmm_layout_constructor_group[$group]['border_bottom_color'];

            if (!empty($border_bottom_color)) {
                $border_bottom_css = "border-color:" . $border_bottom_color.';';
            }

            $padding_top = $tmm_layout_constructor_group[$group]['padding_top'];
            $padding_bottom = $tmm_layout_constructor_group[$group]['padding_bottom'];

            $is_mobile_touch = "";

            if (@$tmm_layout_constructor_group[$group]['is_parallax'] AND !empty($tmm_layout_constructor_group[$group]['bg_touch_image'])) {
                $is_mobile_touch = 1;
            }

            ?>

            <section class="section <?php if ($is_mobile_touch): ?>mobile-video-image<?php endif; ?> <?php if (!empty($padding_top)): ?> padding-top-off<?php endif; ?><?php if (!empty($padding_bottom)): ?> padding-bottom-off<?php endif; ?><?php if (@!empty($tmm_layout_constructor_group[$group]['is_parallax'])): ?> parallax<?php endif; ?><?php if (!empty($border_bottom_color)): ?> border<?php endif; ?><?php if ($tmm_layout_constructor_group[$group]['bg_attachment']): ?> bg_attachment<?php endif; ?>" style="<?php if (@!empty($tmm_layout_constructor_group[$group]['bg_color'])): ?>background-color: <?php echo @$tmm_layout_constructor_group[$group]['bg_color'] ?>;<?php endif; ?><?php echo $border_bottom_css ?>">

                <?php if ($tmm_layout_constructor_group[$group]['is_overlay']): ?>
                    <div class="parallax-overlay"></div>
                <?php endif; ?>

                <?php if (!empty($tmm_layout_constructor_group[$group]['bg_image'])): ?>

                    <div class="full-bg-image <?php if ($tmm_layout_constructor_group[$group]['bg_attachment']): ?>full-bg-image-fixed<?php endif; ?>" style="background-image: url(<?php echo @$tmm_layout_constructor_group[$group]['bg_image'] ?>); opacity: <?php echo (@$tmm_layout_constructor_group[$group]['opacity'] / 100) ?>; filter: alpha(opacity = <?php echo @$tmm_layout_constructor_group[$group]['opacity'] ?>);"></div>

                <?php endif; ?>

                <?php if ($tmm_layout_constructor_group[$group]['is_parallax'] AND !(empty($tmm_layout_constructor_group[$group]['bg_touch_image']))): ?>

                    <div class="full-bg-image" style="background-image: url(<?php echo @$tmm_layout_constructor_group[$group]['bg_touch_image'] ?>);"></div>

                <?php endif; ?>

                <div <?php if (!$tmm_layout_constructor_group[$group]['is_full_width']): ?>class="container"<?php endif; ?>>

                    <?php foreach ($rows as $row): ?>

                        <div <?php if (!$tmm_layout_constructor_group[$group]['is_full_width']): ?>class="row"<?php endif; ?>>
                            <?php if (!empty($row) AND is_array($row)): ?>
                                <?php if (!empty($row['columns']) AND is_array($row['columns']) AND !empty($row['columns'])): ?>

                                    <?php foreach ($row['columns'] as $col_id => $column) : ?>
                                        <div class="<?php if (!@$tmm_layout_constructor_group[$group]['is_full_width']) echo $column['front_css_class'] . ' ' ?><?php echo $column['grid_class'] ?>">
                                            <?php echo preg_replace('/^<p>|<\/p>$/', '', do_shortcode($column['content'])); ?>
                                        </div>
                                    <?php endforeach; ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </div><!--/ .row-->

                    <?php endforeach; ?>

                </div><!--/ .container-->

            </section><!--/ .section-->

            <?php
        }

    }

}


