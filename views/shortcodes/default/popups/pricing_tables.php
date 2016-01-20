<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<link rel="stylesheet" href="<?php echo TMM_THEME_URI; ?>/css/fontello.css" type="text/css" media="all" />

<style type="text/css">

	.lc-pricing-table .column {
		margin-bottom: 50px;
		background-color: #fff;
		-webkit-box-shadow: 2px 2px 3px rgba(0,0,0,.08), -1px -1px 1px rgba(0,0,0,.01);
		-moz-box-shadow: 2px 2px 3px rgba(0,0,0,.08), -1px -1px 1px rgba(0,0,0,.01);
		box-shadow: 2px 2px 3px rgba(0,0,0,.08), -1px -1px 1px rgba(0,0,0,.01);
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	.lc-pricing-table.type-1 .column { padding: 10px 10px 25px; }
	.lc-pricing-table.type-2 .column { padding: 10px 0 25px; }

	#price_tables_list > li {
		display: inline;
		float: left;
		margin-left: 8px;
		margin-right: 10px;
		width: 220px;
	}

	.lc-pricing-table.type-1 .header {
		padding: 10px 5px 15px;
		text-align: center;
	}

	.lc-pricing-table.type-2 .header {
		padding: 10px 15px 15px;
		text-align: center;
	}

	.lc-pricing-table .title { margin: 0; }

	.lc-pricing-table .cost {
		margin: 0;
		font-weight: 600;
	}

	.lc-pricing-table .description {
		font-weight: 600;
		font-size: 12px;
	}

	.lc-pricing-table .description { color: #9e9e9e; }

	.lc-pricing-table .features li {
		position: relative;
		border-bottom-width: 1px;
		border-bottom-style: solid;
		border-bottom-color: #dedede;
		color: #6b6b6b;
		text-shadow: 1px 1px 0 rgba(255,255,255,.5);
	}

	.lc-pricing-table .features li {
		margin: 0;
		padding: 5px 10px 5px 47px;
	}

	.lc-pricing-table .features li:first-child {
		border-top-width: 1px;
		border-top-style: solid;
		border-top-color: #dedede;
	}

	.lc-pricing-table .features li:nth-child(odd) { background-color: #f2f2f2; }
	.lc-pricing-table .featured .features li:nth-child(odd) { background-color: #fcfcfc; }

	.lc-pricing-table .features li {
		-webkit-box-shadow: inset 0 1px 0 0 #f9f9f9;
		-moz-box-shadow: inset 0 1px 0 0 #f9f9f9;
		box-shadow: inset 0 1px 0 0 #f9f9f9;
	}

	.lc-pricing-table .features li:before {
		position: absolute;
		top: 50%;
		margin-top: -7px;
		font-family: 'Fontello';
		content: "\e83a";
	}

	.lc-pricing-table .features li:before { left: 25px; }

	.lc-pricing-table .footer {
		padding: 5px 10px 0;
		text-align: center;
	}

	.lc-pricing-table .footer .label {
		color: #8F9296;
		font-style: italic;
	}
	.lc-pricing-table .footer .button { margin: 0; }

</style>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	
	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Table Count', 'tmm_content_composer'),
			'shortcode_field' => 'count',
			'id' => 'count',
			'options' => array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5,
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
			'title' => __('Row Count', 'tmm_content_composer'),
			'shortcode_field' => 'row_count',
			'id' => 'row_count',
			'options' => $row_count_array,
			'default_value' => TMM_Content_Composer::set_default_value('row_count', 4),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->
        
        <div class="one-half">
            <?php
            TMM_Content_Composer::html_option(array(
                        'title' => __('Effect for Appearing Table', 'tmm_content_composer'),
                        'type' => 'select',
                        'shortcode_field' => 'effect_type',
                        'id' => 'effect_type',
                        'default_value' => TMM_Content_Composer::set_default_value('effect_type', 'elementFade'),
                        'options' => array(
                                'elementFade' => __('Element Fade', 'tmm_content_composer'),
                                'opacity' => __('Opacity', 'tmm_content_composer'),
                                'opacity2xRun' => __('Opacity 2x Run', 'tmm_content_composer'),
                                'scale' => __('Scale', 'tmm_content_composer'),
                                'slideRight' => __('Slide Right', 'tmm_content_composer'),
                                'slideLeft' => __('Slide Left', 'tmm_content_composer'),
                                'slideDown' => __('Slide Down', 'tmm_content_composer'),
                                'slideUp' => __('Slide Up', 'tmm_content_composer'),
                                'slideUp2x' => __('Slide Up 2x', 'tmm_content_composer'),
                                'extraRadius' => __('Extra Radius', 'tmm_content_composer')
                        ),
                        'description' => __('Effect for Appearing Post.', 'tmm_content_composer')
                        
            ));
                
            ?>
        </div>

	<ul id="price_tables_list">

		<?php
		$shortcodes_texts_array = array(0 => '[price_table title="' . __('Starter Package', 'tmm_content_composer') . '" price="' . __('$19.95', 'tmm_content_composer') . '" period="' . __('per month', 'tmm_content_composer') . '" button_text="' . __('Get Started', 'tmm_content_composer') . '" button_link="#" featured="0"]^^^[/price_table]');
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

		<?php foreach ($shortcodes_texts_array as $pt_shortcode_txt) {          
            
			$_REQUEST["shortcode_mode_edit"] = 1;
			do_shortcode($pt_shortcode_txt);
			$options_content = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);            
			?>
			<li>
				<section class="lc-pricing-table type-1 col-1 clearfix">

					<div class="column">

						<div class="header">
							<h4 class="title"><input type="text" class="price_table_title_row price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['title'] ?>" /></h4>
							<div class="price">
								<h2 class="cost"><input type="text" class="price_table_price_row price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['price'] ?>" /></h2>
								<span class="description"><input type="text" class="price_table_period_row price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['period'] ?>" /></span>
							</div><!--/ .price-->
						</div><!-- .header -->

						<ul class="features">
							<?php foreach ($options_content as $option_text) : ?>
								<li><input type="text" class="price_table_option_row price_table_row_input data-input" value="<?php echo $option_text ?>" placeholder="<?php _e('Enter text here', 'tmm_content_composer'); ?>" /></li>
							<?php endforeach; ?>
						</ul><!-- .features -->

						<div class="footer">
							<h4 class="label"><?php _e('Button Text', 'tmm_content_composer'); ?></h4>
							<input type="text" class="price_table_button_text price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['button_text'] ?>" />
							<h4 class="label"><?php _e('Button Link', 'tmm_content_composer'); ?></h4>
							<input type="text" class="price_table_button_link price_table_row_input data-input" value="<?php echo $_REQUEST["shortcode_mode_edit"]['button_link'] ?>" />
							<!--<h4 class="label"><?php _e('Is Featured', 'tmm_content_composer'); ?></h4>-->
							<br /><input type="checkbox" value="<?php echo $_REQUEST["shortcode_mode_edit"]['featured'] ?>" <?php echo($_REQUEST["shortcode_mode_edit"]['featured'] == 1 ? 'checked' : '') ?> class="featured_price_list data-check js_shortcode_checkbox_self_update" />
							<label class="label"><span></span><i class="description"><?php _e('Is Featured', 'tmm_content_composer'); ?></i></label>
						</div><!-- .footer -->

					</div><!-- .column -->

				</section>
			</li>
        <?php } ?>



	</ul>
</div>

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	//***
	jQuery(function() {

		tmm_ext_shortcodes.price_table_changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
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
			var css_class = 'lc-pricing-table type-' + type + ' col-' + count + ' clearfix';
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
