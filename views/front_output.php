<?php if (!defined('ABSPATH')) die('No direct access allowed');

if (!empty($tmm_layout_constructor)) {
    foreach ($tmm_layout_constructor as $key => $rows) {
        if (!empty($rows)) {
            global $tmm_row_options;

            $group = $rows['group'];
            unset($rows['group']);

            //styles
            $border_bottom_css = (isset($group['border_bottom_color']) && !empty($group['border_bottom_color']) )
                                    ? "border-color:" . $group['border_bottom_color'] . ';' : '';
            $padding_top       = (isset($group['padding_top']) && !empty($group['padding_top']) )
                                    ? $group['padding_top'] : $tmm_row_options['padding_top'];
            $padding_bottom    = (isset($group['padding_bottom']) && !empty($group['padding_bottom']) )
                                    ? $group['padding_top'] : $tmm_row_options['padding_bottom'];
            $bg_color          = (isset($group['bg_color']) && !empty($group['bg_color']) )
                                    ? "background-color:" . $group['bg_color'] . ';' : '';

            //classes
            $is_mobile_touch   = (@$group['is_parallax'] AND !empty($group['bg_touch_image'])) ? 1 : '';
            $container_class   = (!$group['is_full_width']) ? "container" : '';
            $row_class         = (!$group['is_full_width']) ? "row" : '';
            $bg_class          = ($group['bg_attachment']) ? "full-bg-image-fixed" : '';
            $section_class     = "section";

            if ($is_mobile_touch)
                $section_class = $section_class . ' mobile-video-image';
            if (!empty($padding_top))
                $section_class = $section_class . ' padding-top-off';
            if (!empty($padding_bottom))
                $section_class = $section_class . ' padding-bottom-off';
            if (@!empty($group['is_parallax']))
                $section_class = $section_class . ' parallax';
            if (!empty($border_bottom_color))
                $section_class = $section_class . ' border';
            if ($group['bg_attachment'])
                $section_class = $section_class . ' bg_attachment';

            /** row groups definition */
            // in case of undefined groups
            if (!isset($group['row_group']) || '0' == $group['row_group']) {
                if (isset($group_id)) { // group closing
                    echo "</div><!--/ .container--></section><!--/ .section-->";
                    unset($group_id);
                }
                $section_open = true;
                $section_close = true;
            }
            //in case of defined groups
            else {
                if (!isset($group_id)) { // group opening
                    $group_id = $group['row_group'];
                    $section_open = true;
                    $section_close = false;
                } elseif ($group_id == $group['row_group']) { // continue group
                    $section_open = false;
                    $section_close = false;
                } elseif ($group_id != $group['row_group']) { // group closing
                    echo "</div><!--/ .container--></section><!--/ .section-->";
                    $group_id = $group['row_group'];
                    $section_open = true;
                    $section_close = false;
                }
            }
            ?>

            <?php if ($section_open): ?>
                <section class="<?php echo $section_class ?>" style="<?php echo $bg_color ?><?php echo $border_bottom_css ?>">
                    <?php if ($group['is_overlay']): ?>
                        <div class="parallax-overlay"></div>
                    <?php endif; ?>

                    <?php if (!empty($group['bg_image'])): ?>
                        <div class="full-bg-image <?php echo $bg_class ?>"
                             style="background-image: url(<?php echo @$group['bg_image'] ?>);
                                    opacity: <?php echo (@$group['opacity'] / 100) ?>;
                                    filter: alpha(opacity = <?php echo @$group['opacity'] ?>);"></div>
                    <?php endif; ?>

                    <?php if ($group['is_parallax'] AND !(empty($group['bg_touch_image']))): ?>
                        <div class="full-bg-image" style="background-image: url(<?php echo @$group['bg_touch_image'] ?>);"></div>
                    <?php endif; ?>

                    <div class="<?php echo $container_class ?>">
            <?php endif; ?>

                        <?php foreach ($rows as $row): ?>
                            <div class="<?php echo $row_class ?>">

                                <?php if (!empty($row) AND is_array($row)): ?>
                                    <?php if (!empty($row['columns']) AND is_array($row['columns'])): ?>

                                        <?php foreach ($row['columns'] as $col_id => $column) : ?>
                                            <div class="<?php if (!@$group['is_full_width']) echo $column['front_css_class'] . ' ' ?><?php echo $column['grid_class'] ?>">
                                                <?php echo preg_replace('/^<p>|<\/p>$/', '', do_shortcode($column['content'])); ?>
                                            </div>
                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                <?php endif; ?>

                            </div><!--/ .row-->
                        <?php endforeach; ?>

            <?php if ($section_close): ?>
                    </div><!--/ .container-->
                </section><!--/ .section-->
            <?php endif; ?>

            <?php
        }
    }
}
