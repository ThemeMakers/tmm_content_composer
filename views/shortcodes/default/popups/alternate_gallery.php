<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		/**
		 * ---------------- Galleries ----------------
		 */
		$posts = get_posts(array('post_type' => 'gall', 'posts_per_page' => -1));
		$galleries_options_array = array();

		if (!empty($posts)) {
			foreach ($posts as $post) {
				$galleries_options_array[$post->ID] = $post->post_title;
			}
		}

		TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Galleries', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'content',
				'id' => '',
				'options' => $galleries_options_array,
				'default_value' => TMM_Content_Composer::set_default_value('content',''),
				'description' => ''
		));
		?>
    </div><!--/ .ona-half-->

</div><!--/ .thememakers_shortcode_template-->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">

	<script type="text/javascript">
		var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
		jQuery(function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

		});
	</script>

</div><!--/ .fullwidth-frame-->



