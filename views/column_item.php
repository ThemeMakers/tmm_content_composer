<?php if (!defined('ABSPATH')) exit; ?>

<div class="tmm-lc-column-wrapper <?php echo esc_attr($css_class); ?>">

	<div class="tmm-lc-column" id="item_<?php echo $uniqid ?>">

		<div class="tmm-lc-column-bar-left">
			<a href="#" class="tmm-lc-column-size-plus" data-item-id="<?php echo esc_attr($uniqid); ?>"></a>
			<a href="#" class="tmm-lc-column-size-minus" data-item-id="<?php echo esc_attr($uniqid); ?>"></a>
		</div>

		<div class="tmm-lc-column-size"><?php echo esc_html($value); ?></div>
		<div class="tmm-lc-column-title"><?php echo empty($title) ? esc_html__('Empty title', TMM_CC_TEXTDOMAIN) : esc_html($title); ?></div>

		<div class="tmm-lc-column-bar-right">
			<a title="<?php esc_attr_e("Edit", TMM_CC_TEXTDOMAIN) ?>" class="tmm-lc-edit-column" data-item-id="<?php echo esc_attr($uniqid); ?>"></a>
			<a title="<?php esc_attr_e("Delete", TMM_CC_TEXTDOMAIN) ?>" class="tmm-lc-delete-column" data-item-id="<?php echo esc_attr($uniqid); ?>"></a>
		</div>

		<input type="hidden" class="js_title" value="<?php echo esc_attr($title); ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][title]" />
		<input type="hidden" class="js_css_class" value="<?php echo esc_attr($css_class); ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][css_class]" />
		<input type="hidden" class="js_front_css_class" value="<?php echo esc_attr($front_css_class); ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][front_css_class]" />
		<input type="hidden" class="js_value" value="<?php echo esc_attr($value); ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][value]" />

		<input type="hidden" class="js_effect" value="<?php echo esc_attr(@$effect); ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][effect]" />
		<input type="hidden" class="js_left_indent" value="<?php echo esc_attr(@$left_indent); ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][left_indent]" />
		<input type="hidden" class="js_right_indent" value="<?php echo esc_attr(@$right_indent); ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][right_indent]" />

		<textarea style="display: none;" class="js_content" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][content]"><?php echo esc_html($content); ?></textarea>

	</div>

</div>
