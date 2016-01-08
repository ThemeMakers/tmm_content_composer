<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="fullwidth">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Enter text', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>


    </div><!--/ .fullwidth-->
    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'title' => __('Text Color', 'tmm_content_composer'),
			'shortcode_field' => 'type',
			'type' => 'select',
            'default_value' => '',
			'description' => '',
            'options' => array(
                '' => 'Default',
                'type-1' => 'Type 1 (Gray background)',
                'type-2' => 'Type 2 (Blue background)',
                                ),
			'default_value' => TMM_Content_Composer::set_default_value('type', 'type-1'),
			'id' => '',
			'display' => 1
		));
		?>
    </div>
    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'title' => __('Author', 'tmm_content_composer'),
			'shortcode_field' => 'author',
			'type' => 'text',            
			'description' => '',                        
			'default_value' => TMM_Content_Composer::set_default_value('author', ''),
			'id' => '',
			'display' => 1
		));
		?>
    </div>
    

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
