<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		$grids = array();
		$arrGrids = Essential_Grid::get_essential_grids();

		foreach($arrGrids as $grid){
			$alias = $grid->handle;
			$title = $grid->name;
			$grids[$alias] = $title;
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Choose Grid', 'tmm_content_composer'),
			'shortcode_field' => 'grid',
			'id' => 'grid',
			'options' => $grids,
			'default_value' => TMM_Content_Composer::set_default_value('grid', ''),
			'description' => ''
		));
		?>

	</div>

</div>

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function($) {

		tmm_ext_shortcodes.changer(shortcode_name);

		$('#grid').on('change',function(){
			tmm_ext_shortcodes.changer(shortcode_name);
		});

	});
</script>