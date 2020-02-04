<?php
if (!defined('ABSPATH')) die('No direct access allowed');

$fontello_icons = TMM_Helper::get_fontello_icons();

$all_menu_items = TMM_Content_Composer::get_all_menu_items();
?>

<style type="text/css">
	@font-face {
		font-family: 'iconSweetsRegular';
		src: url('<?php echo TMM_THEME_URI; ?>/fonts/fontello.eot');

		url('<?php echo TMM_THEME_URI; ?>/fonts/fontello.woff') format('woff'),
		url('<?php echo TMM_THEME_URI; ?>/fonts/fontello.ttf') format('truetype'),
		url('<?php echo TMM_THEME_URI; ?>/fonts/fontello.svg#iconSweetsRegular') format('svg');
		font-weight: normal;
		font-style: normal;
	}

	.iconsweets {
		font: 400 35px/35px "fontello", sans-serif;
		margin-top: 20px;
	}

</style>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">
		<div class="fullwifth">
			<div class="fullwidth">
				<h3><?php _e('First Box:',TMM_CC_TEXTDOMAIN); ?></h3>
			</div>

			<div class="one-half icon-option">
				<?php
				$view_icon_group = TMM_Content_Composer::set_default_value('first_icon', 'icon-group');
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Icon', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_icon',
					'id' => 'first_icon',
					'options' => $fontello_icons,
					'default_value' => $view_icon_group,
					'description' => ''
				));
				?>
				<div class="iconsweets first_icon <?php echo esc_attr($view_icon_group); ?>"></div>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Page Links', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => '',
					'id' => 'first_select_menu_item',
					'options' => $all_menu_items,
					'default_value' => (isset($all_menu_items[TMM_Content_Composer::set_default_value('first_link_url', '')])) ? TMM_Content_Composer::set_default_value('first_link_url', '') : 'none' ,
					'description' => '',
					'css_classes' => 'select_menu_item'
				));

				?>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'text',
					'title' => __('Title',TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_title',
					'id' => 'first_title',
					'default_value' => TMM_Content_Composer::set_default_value('first_title', ''),
					'description' => ''
				));
				?>

			</div>

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'text',
					'title' => __('Link URL', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_link_url',
					'id' => '',
					'css_classes' => 'first_select_menu_item',
					'default_value' => TMM_Content_Composer::set_default_value('first_link_url', ''),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->

			<div class="fullwidth">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'textarea',
					'title' => __('Description', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_description',
					'id' => '',
					'default_value' => TMM_Content_Composer::set_default_value('first_description', ''),
					'description' => ''
				));
				?>

			</div><!--/ .fullwidth-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Icon Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_box_icon_color',
					'id' => 'first_box_icon_color',
					'default_value' => TMM_Content_Composer::set_default_value('first_box_icon_color', '#c3c3c4'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Title Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_box_title_color',
					'id' => 'first_box_title_color',
					'default_value' => TMM_Content_Composer::set_default_value('first_box_title_color', '#14b3e4'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Description Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_box_desc_color',
					'id' => 'first_box_desc_color',
					'default_value' => TMM_Content_Composer::set_default_value('first_box_desc_color', '#4b4b4b'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Top Border Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_top_border',
					'id' => 'first_top_border',
					'default_value' => TMM_Content_Composer::set_default_value('first_top_border', '#14b3e4'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_box_bg',
					'id' => 'first_box_bg',
					'default_value' => TMM_Content_Composer::set_default_value('first_box_bg', '#e1e1e1'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Mouseover Background Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'first_box_hover_bg',
					'id' => 'first_box_hover_bg',
					'default_value' => TMM_Content_Composer::set_default_value('first_box_hover_bg', '#14b3e4'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<br class="clear"><br>

			<hr>

			<br><br>

			<div class="fullwidth">
				<h3><?php _e('Second Box:',TMM_CC_TEXTDOMAIN); ?></h3>
			</div>

			<div class="one-half icon-option">

				<?php
				$view_icon_group = TMM_Content_Composer::set_default_value('second_icon', 'icon-thumbs-up-4');
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Icon', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_icon',
					'id' => 'second_icon',
					'options' => $fontello_icons,
					'default_value' => $view_icon_group,
					'description' => ''
				));
				?>

				<div class="iconsweets second_icon <?php echo esc_attr($view_icon_group); ?>"></div>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Page Links', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => '',
					'id' => 'second_select_menu_item',
					'options' => $all_menu_items,
					'default_value' => (isset($all_menu_items[TMM_Content_Composer::set_default_value('second_link_url', '')])) ? TMM_Content_Composer::set_default_value('second_link_url', '') : 'none' ,
					'description' => '',
					'css_classes' => 'select_menu_item'
				));

				?>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'text',
					'title' => __('Title',TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_title',
					'id' => '',
					'default_value' => TMM_Content_Composer::set_default_value('second_title', ''),
					'description' => ''
				));
				?>

			</div>

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'text',
					'title' => __('Link URL', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_link_url',
					'id' => '',
					'css_classes' => 'second_select_menu_item',
					'default_value' => TMM_Content_Composer::set_default_value('second_link_url', ''),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->

			<div class="fullwidth">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'textarea',
					'title' => __('Description', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_description',
					'id' => '',
					'default_value' => TMM_Content_Composer::set_default_value('second_description', ''),
					'description' => ''
				));
				?>

			</div><!--/ .fullwidth-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Icon Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_box_icon_color',
					'id' => 'second_box_icon_color',
					'default_value' => TMM_Content_Composer::set_default_value('second_box_icon_color', '#c3c3c4'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Title Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_box_title_color',
					'id' => 'second_box_title_color',
					'default_value' => TMM_Content_Composer::set_default_value('second_box_title_color', '#00c99f'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Description Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_box_desc_color',
					'id' => 'second_box_desc_color',
					'default_value' => TMM_Content_Composer::set_default_value('second_box_desc_color', '#4b4b4b'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Top Border Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_top_border',
					'id' => 'second_top_border',
					'default_value' => TMM_Content_Composer::set_default_value('second_top_border', '#00c99f'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_box_bg',
					'id' => 'second_box_bg',
					'default_value' => TMM_Content_Composer::set_default_value('second_box_bg', '#e1e1e1'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Mouseover Background Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'second_box_hover_bg',
					'id' => 'second_box_hover_bg',
					'default_value' => TMM_Content_Composer::set_default_value('second_box_hover_bg', '#00c99f'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->

			<br class="clear"><br>

			<hr>

			<br><br>

			<div class="fullwidth">
				<h3><?php _e('Third Box:',TMM_CC_TEXTDOMAIN); ?></h3>
			</div>

			<div class="one-half icon-option">

				<?php
				$view_icon_group = TMM_Content_Composer::set_default_value('third_icon', 'icon-calendar-inv');
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Icon', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_icon',
					'id' => 'third_icon',
					'options' => $fontello_icons,
					'default_value' => $view_icon_group,
					'description' => ''
				));
				?>

				<div class="iconsweets third_icon <?php echo esc_attr($view_icon_group); ?>"></div>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'select',
					'title' => __('Page Links', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => '',
					'id' => 'third_select_menu_item',
					'options' => $all_menu_items,
					'default_value' => (isset($all_menu_items[TMM_Content_Composer::set_default_value('third_link_url', '')])) ? TMM_Content_Composer::set_default_value('third_link_url', '') : 'none' ,
					'description' => '',
					'css_classes' => 'select_menu_item'
				));

				?>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'text',
					'title' => __('Title',TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_title',
					'id' => '',
					'default_value' => TMM_Content_Composer::set_default_value('third_title', ''),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-half">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'text',
					'title' => __('Link URL', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_link_url',
					'id' => '',
					'css_classes' => 'third_select_menu_item',
					'default_value' => TMM_Content_Composer::set_default_value('third_link_url', ''),
					'description' => ''
				));
				?>

			</div><!--/ .one-half-->

			<div class="fullwidth">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'textarea',
					'title' => __('Description', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_description',
					'id' => '',
					'default_value' => TMM_Content_Composer::set_default_value('third_description', ''),
					'description' => ''
				));
				?>

			</div><!--/ .fullwidth-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Icon Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_box_icon_color',
					'id' => 'third_box_icon_color',
					'default_value' => TMM_Content_Composer::set_default_value('third_box_icon_color', '#c3c3c4'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Title Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_box_title_color',
					'id' => 'third_box_title_color',
					'default_value' => TMM_Content_Composer::set_default_value('third_box_title_color', '#f36d6a'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Description Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_box_desc_color',
					'id' => 'third_box_desc_color',
					'default_value' => TMM_Content_Composer::set_default_value('third_box_desc_color', '#4b4b4b'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Top Border Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_top_border',
					'id' => 'third_top_border',
					'default_value' => TMM_Content_Composer::set_default_value('third_top_border', '#f36d6a'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-half-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_box_bg',
					'id' => 'third_box_bg',
					'default_value' => TMM_Content_Composer::set_default_value('third_box_bg', '#e1e1e1'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->

			<div class="one-third">

				<?php
				TMM_Content_Composer::html_option(array(
					'type' => 'color',
					'title' => __('Mouseover Background Color', TMM_CC_TEXTDOMAIN),
					'shortcode_field' => 'third_box_hover_bg',
					'id' => 'third_box_hover_bg',
					'default_value' => TMM_Content_Composer::set_default_value('third_box_hover_bg', '#f36d6a'),
					'description' => '',
					'display' => 1
				));
				?>

			</div><!--/ .one-third-->
		</div>
	</div>



</div><!--/ .tmm_shortcode_template->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});

		jQuery('.select_menu_item').on('change', function(){
			var $this = jQuery(this),
				$thisId = $this.attr('id'),
				$thisVal = $this.val();

			jQuery('.'+$thisId).val($thisVal);
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		jQuery("#tmm_shortcode_template .icon-option select").on('change', function() {
			var block_class = jQuery(this).data('shortcode-field');
			jQuery('.' + block_class).removeClass().addClass(jQuery(this).val() + ' iconsweets ' + block_class);
		});

		colorizator();

	});
</script>
