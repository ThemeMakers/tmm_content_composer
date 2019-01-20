<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">

		<?php
		$tt = get_posts(array('numberposts' => -1, 'post_type' => TMM_Staff::$slug));
		$staff = array();
		if (!empty($tt)) {
			foreach ($tt as $value) {
				$staff[$value->ID] = $value->post_title;
			}
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Staff', 'tmm_content_composer'),
			'options' => $staff,
			'shortcode_field' => 'content',
			'id' => 'content',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

    </div><!--/ .one-half-->
	
	<div class="one-half">
		
		<?php 
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => esc_html__('Type', 'tmm_content_composer'),
			'options' => array(
				'half' => 'Half',
				'full' => 'Full'
			),
			'shortcode_field' => 'type',
			'id' => 'type',
			'default_value' => TMM_Content_Composer::set_default_value('type', 'half'),
			'description' => ''
		));		
		?>
		
	</div><!--/ .one-half-->

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
	});
</script>
