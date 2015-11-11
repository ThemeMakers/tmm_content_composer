<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<style type="text/css">

	.simple-pricing-table .column {
		margin-bottom: 50px;
		background-color: #fff;
		-webkit-box-shadow: 2px 2px 3px rgba(0,0,0,.08), -1px -1px 1px rgba(0,0,0,.01);
				box-shadow: 2px 2px 3px rgba(0,0,0,.08), -1px -1px 1px rgba(0,0,0,.01);
		-webkit-box-sizing: border-box;
				box-sizing: border-box;
	}

	.simple-pricing-table .column { padding: 10px 10px 25px; }

	#price_tables_list > li {
		display: inline;
		float: left;
		margin-left: 1%;
		margin-right: 1%;
		width: 23%;
	}

		.simple-pricing-table .header {
			padding: 10px 5px 15px;
			text-align: center;
		}

		.simple-pricing-table .title { margin: 0; }

			.simple-pricing-table .cost {
				margin: 0;
				font-weight: 600;
			}

			.simple-pricing-table .description {
				font-weight: 600;
				font-size: 12px;
			}

			.simple-pricing-table .description { color: #9e9e9e; }

	.simple-pricing-table .features li {
		position: relative;
		border-bottom-width: 1px;
		border-bottom-style: solid;
		border-bottom-color: #dedede;
		color: #6b6b6b;
		text-shadow: 1px 1px 0 rgba(255,255,255,.5);
	}

	.simple-pricing-table .features li {
		margin: 0;
		padding: 5px 10px;
	}

	.simple-pricing-table .features li:first-child {
		border-top-width: 1px;
		border-top-style: solid;
		border-top-color: #dedede;
	}

	.simple-pricing-table .features li:nth-child(odd) { background-color: #f2f2f2; }
	.simple-pricing-table .featured .features li:nth-child(odd) { background-color: #fcfcfc; }

	.simple-pricing-table .features li {
		-webkit-box-shadow: inset 0 1px 0 0 #f9f9f9;
		-moz-box-shadow: inset 0 1px 0 0 #f9f9f9;
		box-shadow: inset 0 1px 0 0 #f9f9f9;
	}

		.simple-pricing-table .footer {
			padding: 5px 10px 0;
			text-align: center;
		}

		.simple-pricing-table .footer .label {
			color: #8F9296;
			font-style: italic;
		}
		.simple-pricing-table .footer .button { margin: 0; }

</style>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Table Count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'count',
			'id' => 'count',
			'options' => array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				6 => 6,
			),
			'default_value' => TMM_Content_Composer::set_default_value('count', 1),
			'description' => ''
		));
		?>
	</div>

	<div class="one-half">
		<?php
		$row_count_array = array();
		for ($i = 1; $i <= 20; $i++) {
			$row_count_array[$i] = $i;
		}
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Row Count', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'row_count',
			'id' => 'row_count',
			'options' => $row_count_array,
			'default_value' => TMM_Content_Composer::set_default_value('row_count', 4),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->

	<ul id="price_tables_list">

		<?php
		$shortcodes_texts_array = array(0 => '[price_table title="' . __('Starter Package', TMM_CC_TEXTDOMAIN) . '" price="' . __('19.95', TMM_CC_TEXTDOMAIN) . '" button_text="' . __('Details', TMM_CC_TEXTDOMAIN) . '" button_link="#" featured="0"]^^^[/price_table]');
		//***
		if (isset($_REQUEST["shortcode_mode_edit"])) {
			$shortcodes_texts_array = array();
			$edit_data_array = array();
			//***
			//parcing data
			$content_edit_data = $_REQUEST["shortcode_mode_edit"]['content'];
			$content_edit_data = str_replace('__PRICE_TABLE__', '[price_table', $content_edit_data);
			$content_edit_data = str_replace('__PRICE_TABLE_CLOSE__', ']', $content_edit_data);
			$content_edit_data = str_replace('__PRICE_TABLE_END__', '[/price_table]', $content_edit_data);
			$content_edit_data = str_replace('\\', '"', $content_edit_data);
			$content_edit_data = explode('[/price_table]', $content_edit_data);
			//***
			//unset last empty item
			end($content_edit_data);
			unset($content_edit_data[key($content_edit_data)]);
			//***
			if (!empty($content_edit_data)) {
				foreach ($content_edit_data as $key => $value) {
					if (empty($value)) {
						unset($content_edit_data[$key]);
					}
					$shortcodes_texts_array[] = trim($value . '[/price_table]');
				}
			}
		}
		?>

		<?php foreach ($shortcodes_texts_array as $pt_shortcode_txt) : ?>
			<?php
			$_REQUEST["shortcode_mode_edit"] = 1;
			do_shortcode($pt_shortcode_txt);
			
			$options_content = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
			?>
			<li>
				<section class="simple-pricing-table col1 clearfix">

					<div class="column">

						<div class="header">
							<h2 class="title"><input type="text" class="price_table_title_row price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['title'] ?>" /></h2>
							<h3 class="cost"><input type="text" class="price_table_price_row price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['price'] ?>" /></h3>
						</div><!-- .header -->
						
						<ul class="features">
							<?php foreach ($options_content as $option_text) : ?>
								<li><input type="text" class="price_table_option_row price_table_row_input data-input" value="<?php echo $option_text ?>" placeholder="<?php _e('Enter text here', TMM_CC_TEXTDOMAIN); ?>" /></li>
							<?php endforeach; ?>
						</ul><!-- .features -->

						<div class="footer">
							<h4 class="label"><?php _e('Button Text', TMM_CC_TEXTDOMAIN); ?></h4>
							<input type="text" class="price_table_button_text price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['button_text'] ?>" />
							<h4 class="label"><?php _e('Button Link', TMM_CC_TEXTDOMAIN); ?></h4>
							<input type="text" class="price_table_button_link price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['button_link'] ?>" />
							<!--<h4 class="label"><?php _e('Is Featured', TMM_CC_TEXTDOMAIN); ?></h4>-->
							<br /><input type="checkbox" value="<?php echo $_REQUEST["shortcode_mode_edit"]['featured'] ?>" <?php echo($_REQUEST["shortcode_mode_edit"]['featured'] == 1 ? 'checked' : '') ?> class="featured_price_list data-check js_shortcode_checkbox_self_update" />
							<label class="label">
								<span></span>
								<i class="description"><?php _e('Is Featured', TMM_CC_TEXTDOMAIN); ?></i>
							</label>
						</div><!-- .footer -->

					</div><!-- .column -->

				</section>
			</li>
			
		<?php endforeach; ?>

	</ul>
</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	//***
	jQuery(function() {

		tmm_ext_shortcodes.price_table_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.price_table_changer(shortcode_name);
		});

		jQuery("#price_tables_list").find("input").life('keyup', function() {
			tmm_ext_shortcodes.price_table_changer(shortcode_name);
		});

		//***

		jQuery("#price_tables_list").life('click', '.featured_price_list', function() {
			if (jQuery(this).is(":checked")) {
				jQuery(this).val(1);
			} else {
				jQuery(this).val(0);
			}
			tmm_ext_shortcodes.price_table_changer(shortcode_name);
			return true;
		});

		jQuery("#count").change(function() {
			var count = parseInt(jQuery(this).val(), 10);
			var length = jQuery("#price_tables_list > li").length;

			if (count > length) {
				for (var i = 0; i < (count - length); i++) {
					add_price_table_html();
					tmm_ext_shortcodes.price_table_changer(shortcode_name);
				}
			} else {
				for (var i = length; i >= count; i--) {
					if (i > count) {
						jQuery("#price_tables_list > li:last").remove();
						tmm_ext_shortcodes.price_table_changer(shortcode_name);
					}
				}
			}

			jQuery("#type").trigger('change');
		});

		//***

		jQuery("#row_count").change(function() {
			var row_count = parseInt(jQuery(this).val(), 10);
			var current_inputs_count = jQuery("#price_tables_list > li:last ul.features > li").length;

			if (row_count > current_inputs_count) {
				for (var i = 0; i < (row_count - current_inputs_count); i++) {
					var lists = jQuery("#price_tables_list > li");
					jQuery.each(lists, function(index, li) {
						var clone = jQuery("#price_tables_list > li:last").find("ul.features > li:eq(0)").clone(false);
						jQuery(clone).insertAfter(jQuery(li).find("ul.features > li:last"), clone);
						tmm_ext_shortcodes.price_table_changer(shortcode_name);
					});
				}
			} else {
				for (var i = current_inputs_count; i >= row_count; i--) {
					if (i > row_count) {
						jQuery("#price_tables_list > li").find("ul.features > li:last").remove();
						tmm_ext_shortcodes.price_table_changer(shortcode_name);
					}
				}
			}
		});

		//***

		jQuery("#type").change(function() {
			var type = parseInt(jQuery(this).val(), 10);
			var count = parseInt(jQuery("#count").val(), 10);
			var css_class = 'simple-pricing-table type-' + type + ' col-' + count + ' clearfix';
			jQuery("#price_tables_list > li > section").removeAttr('class');
			jQuery("#price_tables_list > li > section").addClass(css_class);
			tmm_ext_shortcodes.price_table_changer(shortcode_name);
		});

	});

	function add_price_table_html() {
		var clone = jQuery("#price_tables_list > li:last").clone(false);
		var last_row = jQuery("#price_tables_list > li:last");
		jQuery(clone).insertAfter(last_row, clone);
		tmm_ext_shortcodes.price_table_changer(shortcode_name);
	}
</script>
