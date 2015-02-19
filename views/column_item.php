<?php if (!defined('ABSPATH')) exit; ?>

<div class="tmm-lc-column-wrapper <?php echo $css_class ?>">

	<div class="tmm-lc-column" id="item_<?php echo $uniqid ?>">

		<div class="tmm-lc-column-bar-left">
			<a href="#" class="tmm-lc-column-size-plus" data-item-id="<?php echo $uniqid ?>"></a>
			<a href="#" class="tmm-lc-column-size-minus" data-item-id="<?php echo $uniqid ?>"></a>
		</div>

		<div class="tmm-lc-column-size"><?php echo $value ?></div>
		<div class="tmm-lc-column-title"><?php echo empty($title) ? __('Empty title', TMM_CC_TEXTDOMAIN) : $title; ?></div>

		<div class="tmm-lc-column-bar-right">
			<a title="<?php _e("Edit", TMM_CC_TEXTDOMAIN) ?>" class="tmm-lc-edit-column" data-item-id="<?php echo $uniqid ?>"></a>
			<a title="<?php _e("Delete", TMM_CC_TEXTDOMAIN) ?>" class="tmm-lc-delete-column" data-item-id="<?php echo $uniqid ?>"></a>
		</div>

		<input type="hidden" class="js_title" value="<?php echo $title ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][title]" />
		<input type="hidden" class="js_css_class" value="<?php echo $css_class ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][css_class]" />
		<input type="hidden" class="js_front_css_class" value="<?php echo $front_css_class ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][front_css_class]" />
		<input type="hidden" class="js_value" value="<?php echo $value ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][value]" />
		<input type="hidden" class="js_effect" value="<?php echo @$effect ?>" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][effect]" />

		<textarea style="display: none;" class="js_content" name="tmm_layout_constructor[<?php echo $row ?>][<?php echo $uniqid ?>][content]"><?php echo $content ?></textarea>

	</div>

</div>
