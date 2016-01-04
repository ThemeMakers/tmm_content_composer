<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="fullwidth">

		<h4 class="label"><?php _e('List Type', TMM_CC_TEXTDOMAIN); ?></h4>

		<div class="radio-holder">
			<input <?php echo (TMM_Content_Composer::set_default_value('type', '')=='ul') ?  "checked=''" : ''; ?> type="radio" name="type" value="ul" id="list_type_ul" class="js_shortcode_radio_self_update data-check" />
			<label for="list_type_ul" class="label-form"><span></span><?php _e('Unordered', TMM_CC_TEXTDOMAIN); ?></label>
			<input <?php echo (TMM_Content_Composer::set_default_value('type', '')=='ol') ?  "checked=''" : ''; ?> type="radio" name="type" id="list_type_ol" value="ol" class="js_shortcode_radio_self_update" />
			<label for="list_type_ol" class="label-form"><span></span><?php _e('Ordered', TMM_CC_TEXTDOMAIN); ?></label>
			<input type="hidden" value="<?php echo TMM_Content_Composer::set_default_value('type', 'ul') ?>" class="js_shortcode_template_changer" data-shortcode-field="type" />
		</div><!--/ .radio-holder-->

		<span class="preset_description"><?php _e('Ordered list has only 2 first types from a list below, Unordered has all 16th list types there.', TMM_CC_TEXTDOMAIN); ?></span>

		<h4 class="label"><?php _e('List Styles', TMM_CC_TEXTDOMAIN); ?></h4>
		<?php
		$type_array = array();
		for ($i = 1; $i <= 16; $i++) {
			$type_array[$i] = $i;
		}
		?>
		<div class="sel">
			<select class="js_shortcode_template_changer data-select" data-shortcode-field="style">
				<?php if (!empty($type_array)): ?>
					<?php foreach ($type_array as $type) : ?>
						<option  <?php if (TMM_Content_Composer::set_default_value('style', '') == $type) echo 'selected' ?> value="<?php echo $type ?>"><?php _e('Type', TMM_CC_TEXTDOMAIN); ?> <?php echo $type ?></option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>
		</div>

		<h4 class="label"><?php _e('List Items', TMM_CC_TEXTDOMAIN); ?></h4>
		<textarea class="js_shortcode_template_changer data-area" data-shortcode-field="content"><?php echo TMM_Content_Composer::set_default_value('content', 'option 1^option 2^option 3') ?></textarea>
		<span class="preset_description"><?php _e('Example: option 1^option 2^option 3', TMM_CC_TEXTDOMAIN); ?></span>

	</div><!--/ .fullwidth-->

</div><!--/ .thememakers_shortcode_template-->


<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">

	<script type="text/javascript">
		jQuery(function() {
			var shortcode_name = "list";
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

		});
	</script>

</div><!--/ .fullwidth-frame-->



