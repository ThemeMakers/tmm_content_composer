<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'title' => __('Text Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'type',
			'type' => 'select',
            'default_value' => '',
			'description' => '',
            'options' => array(
                'type-1' => __('Type 1', TMM_CC_TEXTDOMAIN),
                'type-2' => __('Type 2', TMM_CC_TEXTDOMAIN),
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
            'type' => 'select',
            'title' => __('Align', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'align',
            'id' => '',
            'options' => array(
                'align-left' => __('Left', TMM_CC_TEXTDOMAIN),
                'align-center' => __('Center', TMM_CC_TEXTDOMAIN),
                'align-right' => __('Right', TMM_CC_TEXTDOMAIN),
            ),
            'default_value' => TMM_Content_Composer::set_default_value('align', ''),
            'description' => ''
        ));
        ?>
    </div>
	<div class="fullwidth">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Enter text', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>


	</div><!--/ .fullwidth-->
    

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
