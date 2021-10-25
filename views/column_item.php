<?php if (!defined('ABSPATH')) exit; ?>

<div class="tmm-lc-column-wrapper <?php echo esc_attr( $css_class ) ?>">

	<div class="tmm-lc-column" id="item_<?php echo esc_attr( $uniqid ) ?>">

		<div class="tmm-lc-column-bar-left">
			<a href="#" class="tmm-lc-column-size-plus" data-item-id="<?php echo esc_attr( $uniqid ) ?>"></a>
			<a href="#" class="tmm-lc-column-size-minus" data-item-id="<?php echo esc_attr( $uniqid ) ?>"></a>
		</div>

		<div class="tmm-lc-column-size"><?php echo esc_attr( $value ) ?></div>
		<div class="tmm-lc-column-title"><?php echo empty($title) ? esc_html__('Empty title', 'tmm_content_composer') : $title; ?></div>

		<div class="tmm-lc-column-bar-right">
			<a title="<?php esc_attr_e("Edit", 'tmm_content_composer') ?>" class="tmm-lc-edit-column" data-item-id="<?php echo esc_attr( $uniqid ) ?>"></a>
			<a title="<?php esc_attr_e("Delete", 'tmm_content_composer') ?>" class="tmm-lc-delete-column" data-item-id="<?php echo esc_attr( $uniqid ) ?>"></a>
		</div>

		<input type="hidden" class="js_title" value="<?php echo esc_attr( $title ) ?>" name="tmm_layout_constructor[<?php echo esc_attr( $row ) ?>][<?php echo esc_attr( $uniqid ) ?>][title]" />
		<input type="hidden" class="js_css_class" value="<?php echo esc_attr( $css_class ) ?>" name="tmm_layout_constructor[<?php echo esc_attr( $row ) ?>][<?php echo esc_attr( $uniqid ) ?>][css_class]" />
		<input type="hidden" class="js_front_css_class" value="<?php echo esc_attr( $front_css_class ) ?>" name="tmm_layout_constructor[<?php echo esc_attr( $row ) ?>][<?php echo esc_attr( $uniqid ) ?>][front_css_class]" />
		<input type="hidden" class="js_value" value="<?php echo esc_attr( $value ) ?>" name="tmm_layout_constructor[<?php echo esc_attr( $row )  ?>][<?php echo esc_attr( $uniqid ) ?>][value]" />
		<input type="hidden" class="js_effect" value="<?php echo esc_attr( $effect ) ?>" name="tmm_layout_constructor[<?php echo esc_attr( $row ) ?>][<?php echo esc_attr( $uniqid ) ?>][effect]" />

		<textarea style="display: none;" class="js_content" name="tmm_layout_constructor[<?php echo esc_attr( $row ) ?>][<?php echo esc_attr( $uniqid ) ?>][content]"><?php echo wp_kses_post( $content ) ?></textarea>

	</div>

</div>