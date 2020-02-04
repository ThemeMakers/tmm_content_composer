<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">

		<div class="one-third">
			<?php
			$numbers = array();
			for ($i = 1; $i <= 100; $i++) {
				$numbers[$i] = $i;
			}
			//***
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Rows count', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'rows',
				'id' => 'table_rows',
				'options' => $numbers,
				'default_value' => TMM_Content_Composer::set_default_value('rows', 3),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->


		<div class="one-third">
			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => __('Columns count', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'cols',
				'id' => 'table_cols',
				'options' => $numbers,
				'default_value' => TMM_Content_Composer::set_default_value('cols', 3),
				'description' => ''
			));
			?>
		</div><!--/ .one-half-->


		<div class="one-third">
			<?php
			$value_type = TMM_Content_Composer::set_default_value('show_row_number', 1);

			TMM_Content_Composer::html_option(array(
				'type' => 'radio',
				'title' => __('Show Row Number', TMM_CC_TEXTDOMAIN),
				'shortcode_field' => 'show_row_number',
				'id' => 'show_row_number',
				'name' => 'show_row_number',
				'values' => array(
					1 => array(
						'title' => __('Yes', TMM_CC_TEXTDOMAIN),
						'id' => 'show_row_number_1',
						'value' => 1,
						'checked' => ($value_type == 1 ? 1 : 0)
					),
					0 => array(
						'title' => __('No', TMM_CC_TEXTDOMAIN),
						'id' => 'show_row_number_0',
						'value' => 0,
						'checked' => ($value_type == 0 ? 1 : 0)
					)
				),
				'value' => $value_type,
				'description' => '',
				'hidden_id' => 'show_row_number'
			));
			?>

		</div><!--/ .one-half-->

	</div>

	<?php
	$head_types_array = array(
		'string' => __('string', TMM_CC_TEXTDOMAIN),
		'number' => __('number', TMM_CC_TEXTDOMAIN)
	);
	if (isset($_REQUEST["shortcode_mode_edit"])) {
		$cols = (int) $_REQUEST["shortcode_mode_edit"]['cols'];
		$heads_types = explode('^', $_REQUEST["shortcode_mode_edit"]['heads_types']);
		$heads_values = explode('^', $_REQUEST["shortcode_mode_edit"]['heads_values']);
		$rows_data = explode('__GOOGLE_TABLE_ROW__', $_REQUEST["shortcode_mode_edit"]['content']);
	} else {
		$cols = 3;
		$heads_types = array('string', 'string', 'string');
		$heads_values = array('', '', '');
		$rows_data = array('^^', '^^', '^^');
	}
	?>


	<h4 for="google_table_headers" class="label"><?php _e('Table headers', TMM_CC_TEXTDOMAIN); ?></h4>
	<ul id="google_table_headers">

		<li>
			<ul class="google_table_cols">

				<?php foreach ($heads_values as $key => $head_value) : ?>
					<li style="width: <?php echo((int) 100 / $cols) ?>%;">
						<?php
						TMM_Content_Composer::html_option(array(
							'type' => 'select',
							'title' => '',
							'shortcode_field' => '',
							'id' => '',
							'options' => $head_types_array,
							'default_value' => $heads_types[$key],
							'description' => '',
							'css_classes' => 'google_table_type'
						));
						?><br />
						<input type="text" class="google_table_col" value="<?php echo $head_value ?>" />
					</li>
				<?php endforeach; ?>

			</ul>
		</li>

	</ul>
	<br />
	<div style="clear: both;"></div>
	<h4 for="google_table" class="label"><?php _e('Table data', TMM_CC_TEXTDOMAIN); ?></h4>
	<ul id="google_table">

		<?php foreach ($rows_data as $key => $row_data) : ?>
			<?php $row_data = explode('^', $row_data); ?>
			<li>
				<ul class="google_table_cols">
					<?php foreach ($row_data as $key => $val) : ?>
						<li style="width: <?php echo((int) 100 / count($row_data)) ?>%;">
							<input type="text" class="google_table_col" value="<?php echo $val ?>" />
						</li>
					<?php endforeach; ?>
				</ul>
			</li>
		<?php endforeach; ?>
	</ul>

</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {

		tmm_ext_shortcodes.google_table_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.google_table_changer(shortcode_name);
		});

		jQuery(".google_table_col, .google_table_type").on('keyup, change', function() {
			tmm_ext_shortcodes.google_table_changer(shortcode_name);
		});

		//*****
		jQuery("#table_rows").change(function() {
			var rows = jQuery(this).val();
			current_rows_count = jQuery("#google_table > li").length;
			if (current_rows_count < rows) {
				for (var i = 0; i < (rows - current_rows_count); i++) {
					var clone = jQuery("#google_table").children("li:last-child").clone(true);
					var last_row = jQuery("#google_table").children("li:last-child");
					jQuery(clone).insertAfter(last_row, clone);
					jQuery("#google_table").children("li:last-child").find('input[type=text]').val("");
				}
			} else {
				for (var i = current_rows_count; i > rows; i--) {
					jQuery("#google_table").children("li:last-child").remove();
				}
			}


			tmm_ext_shortcodes.google_table_changer(shortcode_name);
		});

		//***

		jQuery("#table_cols").change(function() {
			var cols = jQuery(this).val();
			current_cols_count = jQuery("#google_table > li:last-child > ul > li").length;
			current_rows = jQuery("#google_table > li");
			jQuery.each(current_rows, function(index, row) {
				if (current_cols_count < cols) {
					for (var i = 0; i < (cols - current_cols_count); i++) {
						var clone = jQuery(row).find(".google_table_cols > li:last-child").clone(true);
						var last_col = jQuery(row).find(".google_table_cols > li:last-child");
						jQuery(clone).insertAfter(last_col, clone);
						jQuery(row).find(".google_table_cols > li:last-child").find('input[type=text]').val("");
						//heads
						if (index == 0) {
							var clone = jQuery("#google_table_headers > li .google_table_cols > li:last-child").clone(true);
							var last_col = jQuery("#google_table_headers > li .google_table_cols > li:last-child");
							jQuery(clone).insertAfter(last_col, clone);
							jQuery("#google_table_headers > li .google_table_cols > li:last-child").find('input[type=text]').val("");
						}
					}
				} else {
					for (var i = current_cols_count; i > cols; i--) {
						jQuery(row).find(".google_table_cols > li:last-child").remove();
						if (index == 0) {
							jQuery("#google_table_headers > li .google_table_cols > li:last-child").remove();
						}
					}
				}
				//***
				var new_cols_count = jQuery(row).find(".google_table_cols > li").length;
				jQuery(row).find(".google_table_cols > li").css('width', (100 / new_cols_count) + '%');
				if (index == 0) {
					jQuery("#google_table_headers > li .google_table_cols > li").css('width', (100 / new_cols_count) + '%');
				}
			});


			tmm_ext_shortcodes.google_table_changer(shortcode_name);

		});
		
	});
</script>
