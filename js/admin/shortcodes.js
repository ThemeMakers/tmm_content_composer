var TMM_APP_SHORTCODES = function() {
	var self = {
		html_buffer: null,
		init: function() {
			jQuery.fn.life = function(types, data, fn) {
				jQuery(this.context).on(types, this.selector, data, fn);
				return this;
			};

			if (!jQuery("#tmm_shortcodes_html_buffer").size()) {
				jQuery('body').append('<div id="tmm_shortcodes_html_buffer" style="display: none;"></div>');
			}
			self.html_buffer = jQuery("#tmm_shortcodes_html_buffer");

			jQuery(".js_shortcode_checkbox_self_update").life('click', function() {
				if (jQuery(this).is(':checked')) {
					jQuery(this).val(1);
				} else {
					jQuery(this).val(0);
				}

				try {
					self.changer(shortcode_name);
				} catch (e) {

				}
			});

			jQuery(".js_shortcode_radio_self_update").life('click', function() {
				jQuery("input[data-shortcode-field=" + jQuery(this).attr('name') + "]").val(jQuery(this).val()).trigger('change');
			});

		},
		insert_html_in_buffer: function(html) {
			jQuery(self.html_buffer).html(html);
		},
		get_html_from_buffer: function() {
			return jQuery(self.html_buffer).html();
		},
		changer: function(shortcode) {
			var items = jQuery("#tmm_shortcode_template .js_shortcode_template_changer");
			var begin_string = "[" + shortcode;
			var end_string = "[/" + shortcode + "]";
			var content = "";
			var save_as_one = {};
			jQuery.each(items, function(key, value) {
				var shortcode_field = jQuery(value).data('shortcode-field');

				if (shortcode_field !== undefined) {
					if (shortcode_field == 'content') {
						content = jQuery(value).val();
					} else {
						//save_as_one for dynamic lists
						var vals = ''+jQuery(value).val();

						vals = vals.replace(/\"/gi, "\'");

						if (!jQuery(value).hasClass('save_as_one')) {
							begin_string = begin_string + " " + shortcode_field + '="' + vals + '"';
						} else {
							//taking to associative array
							if (save_as_one[shortcode_field] === undefined) {
								save_as_one[shortcode_field] = [];
							}
							save_as_one[shortcode_field].push(vals);
						}
					}
				}


			});
			//*** scan for save_as_one
			if (save_as_one.length !== 0) {
				jQuery.each(save_as_one, function(key, value) {
					if (value.length !== 0) {
						var tmp = ' ' + key + '="';
						for (var i = 0; i < value.length; i++) {
							if (i > 0) {
								tmp += '^';
							}
							tmp += value[i];
						}
						tmp += '"';
						begin_string += tmp;
					}
				});
			}

			var shortcode_text = begin_string + ']' + content + end_string;
			self.insert_html_in_buffer(shortcode_text);
		},
		google_table_changer: function(shortcode) {
			var items = jQuery("#tmm_shortcode_template .js_shortcode_template_changer");
			var begin_string = "[" + shortcode;
			var end_string = "[/" + shortcode + "]";
			jQuery.each(items, function(key, value) {
				var shortcode_field = jQuery(value).attr('data-shortcode-field');
				if (shortcode_field) {
					begin_string = begin_string + " " + shortcode_field + '="' + jQuery(value).val() + '"';
				}

			});

			var heads_values = 'heads_values="';
			var heads = jQuery("#google_table_headers .google_table_cols > li").find(".google_table_col");
			jQuery.each(heads, function(key, value) {
				if (key > 0) {
					heads_values = heads_values + '^';
				}
				var vals = value.value;
				vals = vals.replace(/\"/gi, "\'");

				heads_values = heads_values + vals;
			});
			heads_values = heads_values + '"';

			var head_items_types = 'heads_types="';
			var heads_types = jQuery("#google_table_headers .google_table_cols > li").find(".google_table_type");
			jQuery.each(heads_types, function(key, value) {
				if (key > 0) {
					head_items_types = head_items_types + '^';
				}
				head_items_types = head_items_types + value.value;
			});
			head_items_types = head_items_types + '"';
			//assemble table rows
			var table_rows = "";
			var rows = jQuery("#google_table > li");

			jQuery.each(rows, function(index, row) {
				var row_string = '';
				var cols = jQuery(row).find("li .google_table_col");
				jQuery.each(cols, function(i, col) {
					if (i > 0) {
						row_string = row_string + '^';
					}
					row_string = row_string + col.value;
				});
				//table_rows=table_rows+'[google_table_row '+head_items_types+']'+row_string+'[/google_table_row]<br />';
				if (index > 0) {
					table_rows += ('__GOOGLE_TABLE_ROW__' + row_string);
				} else {
					table_rows += row_string;
				}

			});

			var shortcode_text = begin_string + ' ' + heads_values + ' ' + head_items_types + ']' + table_rows + end_string;

			self.insert_html_in_buffer(shortcode_text);
		},
		price_table_changer: function(shortcode) {
			var items = jQuery("#tmm_shortcode_template .js_shortcode_template_changer");
			var begin_string = "[" + shortcode;
			var end_string = "[/" + shortcode + "]";

			jQuery.each(items, function(key, value) {
				var shortcode_field = jQuery(value).attr('data-shortcode-field');
				begin_string = begin_string + " " + shortcode_field + '="' + jQuery(value).val() + '"';
			});

			var content = "";
			var list = jQuery("#price_tables_list > li");
			jQuery.each(list, function(index, li) {
				var price_table_shortcode = '__PRICE_TABLE__ ';
				var title = jQuery(li).find(".price_table_title_row").val();
				title = title.replace(/\"/gi, "\'");
				price_table_shortcode = price_table_shortcode + 'title="' + title + '" ';
				var price = jQuery(li).find(".price_table_price_row").val();
				price = price.replace(/\"/gi, "\'");
				price_table_shortcode = price_table_shortcode + 'price="' + price + '" ';
				var period = jQuery(li).find(".price_table_period_row").val();
				period = period.replace(/\"/gi, "\'");
				price_table_shortcode = price_table_shortcode + 'period="' + period + '" ';
				var button_text = jQuery(li).find(".price_table_button_text").val();
				button_text = button_text.replace(/\"/gi, "\'");
				price_table_shortcode = price_table_shortcode + 'button_text="' + button_text + '" ';
				var button_link = jQuery(li).find(".price_table_button_link").val();
				button_link = button_link.replace(/\"/gi, "\'");
				price_table_shortcode = price_table_shortcode + 'button_link="' + button_link + '" ';
				var featured = jQuery(li).find(".featured_price_list").val();
				price_table_shortcode = price_table_shortcode + 'featured="' + featured + '"__PRICE_TABLE_CLOSE__';

				var features = jQuery(li).find("ul.features li input[type=text]");
				var features_string = "";
				jQuery.each(features, function(i, feature) {
					if (i > 0) {
						features_string = features_string + '^';
					}
					feature.value = feature.value.replace(/\"/gi, "\'");
					features_string = features_string + feature.value;
				});
				price_table_shortcode = price_table_shortcode + features_string + '__PRICE_TABLE_END__';
				content = content + price_table_shortcode;
			});

			var shortcode_text = begin_string + ']' + content + end_string;
			self.insert_html_in_buffer(shortcode_text);
		},
		list_changer: function(shortcode) {

			var begin_string = "[" + shortcode;
			var end_string = "[/" + shortcode + "]";
			//list_type: ul == 0

			if (list_type == 0) {
				var list_item_styles = 'styles="';

				jQuery.each(jQuery(".list_item_style"), function(key, value) {
					if (key > 0) {
						list_item_styles = list_item_styles + '^';
					}
					list_item_styles = list_item_styles + value.value;
				});
				list_item_styles = list_item_styles + '"';
			}

			var list_item_colors = 'colors="';
			jQuery.each(jQuery(".list_item_color"), function(key, value) {
				if (key > 0) {
					list_item_colors = list_item_colors + '^';
				}
				list_item_colors = list_item_colors + value.value;
			});
			list_item_colors = list_item_colors + '"';

			var list_item_content = "";
			jQuery.each(jQuery(".list_item_content"), function(key, value) {
				if (key > 0) {
					list_item_content = list_item_content + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				list_item_content = list_item_content + value.value;
			});

			var shortcode_text = "";
			if (list_type == 0) {
				shortcode_text = begin_string + ' ' + list_item_styles + ' ' + list_item_colors + ']' + list_item_content + end_string;
			} else {
				shortcode_text = begin_string + ' ' + list_item_colors + ']' + list_item_content + end_string;
			}
			self.insert_html_in_buffer(shortcode_text);
		},
		album_changer: function(shortcode) {

			var begin_string = "[" + shortcode;
			var end_string = "[/" + shortcode + "]";
			//list_type: ul == 0

			var list_item_content = "";
			jQuery.each(jQuery(".album_item_content"), function(key, value) {
				if (key > 0) {
					list_item_content = list_item_content + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				list_item_content = list_item_content + value.value;
			});

			var shortcode_text = begin_string + ' layout="' + jQuery('#album_layout').val() + '"]' + list_item_content + end_string;
			self.insert_html_in_buffer(shortcode_text);
		},
		services_changer: function(shortcode) {

			var begin_string = "[" + shortcode;
			var end_string = "[/" + shortcode + "]";
			var type = jQuery("#list_type").val();
			
			//icons
			var list_item_icons = 'icons="';

			jQuery.each(jQuery(".list_item_icon"), function(key, value) {
				if (key > 0) {
					list_item_icons = list_item_icons + ',';
				}
				list_item_icons = list_item_icons + value.value;
			});
			list_item_icons = list_item_icons + '"';
			
			//colors
			var list_item_colors = 'colors="';

			jQuery.each(jQuery(".list_item_color"), function(key, value) {
				if (key > 0) {
					list_item_colors = list_item_colors + ',';
				}
				list_item_colors = list_item_colors + value.value;
			});
			list_item_colors = list_item_colors + '"';
			
			//titles
			var list_item_titles = 'titles="';
			jQuery.each(jQuery(".list_item_title"), function(key, value) {
				if (key > 0) {
					list_item_titles = list_item_titles + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				list_item_titles = list_item_titles + value.value;
			});
			list_item_titles = list_item_titles + '"';
			
			//hover titles
			var list_item_hover_titles = 'hover_titles="';
			jQuery.each(jQuery(".list_item_hover_title"), function(key, value) {
				if (key > 0) {
					list_item_hover_titles = list_item_hover_titles + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				list_item_hover_titles = list_item_hover_titles + value.value;
			});
			list_item_hover_titles = list_item_hover_titles + '"';
			
			//links
			var list_item_links = 'links="';
			jQuery.each(jQuery(".list_item_link"), function(key, value) {
				if (key > 0) {
					list_item_links = list_item_links + '^';
				}
				list_item_links = list_item_links + value.value;
			});
			list_item_links = list_item_links + '"';
			
			//content
			var list_item_content = "";
			jQuery.each(jQuery(".list_item_content"), function(key, value) {
				if (key > 0) {
					list_item_content = list_item_content + '^';
				}
				list_item_content = list_item_content + value.value;
			});
			
			var shortcode_text = begin_string + ' ' + list_item_icons + ' ' + list_item_colors + ' ' + list_item_titles + ' ' + list_item_hover_titles + ' ' + list_item_links + ' type="' + type + '"]' + list_item_content + end_string;
			self.insert_html_in_buffer(shortcode_text);
		},
		accordion_changer: function(shortcode) {

			var begin_string = "[" + shortcode;
			if (jQuery("#ajax_navigation_side").length) {
				begin_string = "[" + shortcode + ' side="' + jQuery("#ajax_navigation_side").val() + '"';
			}

			var end_string = "[/" + shortcode + "]";

			var type_style = jQuery('#type_style').val();
			if (type_style === undefined) {
				type_style = "";
			}

			var type = jQuery('#type').val();
			if (type === undefined) {
				type = "";
			}

			var accordion_item_title = "";
			jQuery.each(jQuery(".accordion_item_title"), function(key, value) {
				if (key > 0) {
					accordion_item_title = accordion_item_title + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				accordion_item_title = accordion_item_title + value.value;
			});

			var accordion_item_content = "";
			jQuery.each(jQuery(".accordion_item_content"), function(key, value) {
				if (key > 0) {
					accordion_item_content = accordion_item_content + '^';
				}
				accordion_item_content = accordion_item_content + value.value;
			});

			var shortcode_text = begin_string + ' titles="' + accordion_item_title + '"' + ' type="' + type + '" ' + ' type_style="' + type_style + '"' + ']' + accordion_item_content + end_string;

			self.insert_html_in_buffer(shortcode_text);
		},
		clients_changer: function(shortcode) {

			var begin_string = "[" + shortcode;			

			var end_string = "[/" + shortcode + "]";	
                        
			var items_per_slide = jQuery('#items_per_slide').val();
			if (items_per_slide === undefined) {
				items_per_slide = "";
			}
                        
			var animation_type = jQuery('#animation_type').val();
			if (animation_type === undefined) {
				animation_type = "";
			}

			var accordion_item_title = "";
			jQuery.each(jQuery(".accordion_item_title"), function(key, value) {
				if (key > 0) {
						accordion_item_title = accordion_item_title + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				accordion_item_title = accordion_item_title + value.value;
			});
			
			var accordion_item_content = "";
			jQuery.each(jQuery(".accordion_item_content"), function(key, value) {
				if (key > 0) {
						accordion_item_content = accordion_item_content + '^';
				}
				accordion_item_content = accordion_item_content + value.value;
			});
			
			var shortcode_text = begin_string + ' items_per_slide="' + items_per_slide + '" animation_type="' + animation_type + '" titles="' + accordion_item_title + '"' + ']' + accordion_item_content + end_string;

			self.insert_html_in_buffer(shortcode_text);
		},
		gallery_changer : function(shortcode){
			var begin_string = "[" + shortcode;
			var end_string = "[/" + shortcode + "]";
			var images = "";

			jQuery.each(jQuery(".tmm-gallery-item-val"), function(key, value){
				if (key > 0) {
					images = images + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				images = images + value.value;
			});

			var effect = jQuery('#transition_effect').val();
			if (effect === undefined) {
				effect = "";
			}

			var shortcode_text = begin_string + ' images="' + images + '" effect="' + effect + '"]' + end_string;
			self.insert_html_in_buffer(shortcode_text);

		},
		menu_changer:function(shortcode){
			var begin_string = "[" + shortcode;
			var end_string = "[/" + shortcode + "]";

			var menu_titles = "";
			jQuery.each(jQuery(".link_text"), function(key, value) {
				if (key > 0) {
						menu_titles = menu_titles + '^';
					}
					value.value = value.value.replace(/\"/gi, "\'");
					menu_titles = menu_titles + value.value;
			});

			var menu_links = "";
			jQuery.each(jQuery(".link_url"), function(key, value) {
				if (key > 0) {
						menu_links = menu_links + '^';
					}
					value.value = value.value.replace(/\"/gi, "\'");
					menu_links = menu_links + value.value;
			});

			var menu_icons = "";
			jQuery.each(jQuery(".icon_type"), function(key, value) {
				if (key > 0) {
						menu_icons = menu_icons + '^';
					}
					value.value = value.value.replace(/\"/gi, "\'");
					menu_icons = menu_icons + value.value;
			});

			var shortcode_text = begin_string + ' menu_titles="' + menu_titles + '" menu_links="' + menu_links + '" menu_icons="' + menu_icons + '"]' + end_string;
			self.insert_html_in_buffer(shortcode_text);

		},
       text_slider_changer: function(shortcode) {

			var begin_string = "[" + shortcode;
			if (jQuery("#ajax_navigation_side").length) {
				begin_string = "[" + shortcode + ' side="' + jQuery("#ajax_navigation_side").val() + '"';
			}

			var end_string = "[/" + shortcode + "]";

			//***
			var type_style = jQuery('#type_style').val();
			if (type_style === undefined) {
				type_style = "";
			}

			var type = jQuery('#shortcode_slogan_slider_type').val();
			if (type === undefined) {
				type = "";
			}                        

			var h1_item = "";
			jQuery.each(jQuery(".h1_item"), function(key, value) {
				if (key > 0) {
					h1_item = h1_item + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				h1_item = h1_item + value.value;
			});
                        
			var h1_heading_type = "";
			jQuery.each(jQuery(".h1_heading_type"), function(key, value) {
				if (key > 0) {
					h1_heading_type = h1_heading_type + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				h1_heading_type = h1_heading_type + value.value;
			});
                        
			var h1_fade_in = "";
			jQuery.each(jQuery(".h1_fade_in"), function(key, value) {
				if (key > 0) {
					h1_fade_in = h1_fade_in + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				h1_fade_in = h1_fade_in + value.value;
			});
                        
			var h1_fade_out = "";
			jQuery.each(jQuery(".h1_fade_out"), function(key, value) {
				if (key > 0) {
					h1_fade_out = h1_fade_out + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				h1_fade_out = h1_fade_out + value.value;
			});
                        
			var h1_color = "";
			jQuery.each(jQuery(".h1_color"), function(key, value) {
				if (key > 0) {
					h1_color = h1_color + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				h1_color = h1_color + value.value;
			});
			
			//***
			var h2_item = "";
			jQuery.each(jQuery(".h2_item"), function(key, value) {
				if (key > 0) {
					h2_item = h2_item + '^';
				}
				h2_item = h2_item + value.value;
			});
                        
			var h2_heading_type = "";
			jQuery.each(jQuery(".h2_heading_type"), function(key, value) {
				if (key > 0) {
					h2_heading_type = h2_heading_type + '^';
				}
				h2_heading_type = h2_heading_type + value.value;
			});
                        
                        var h2_fade_in = "";
			jQuery.each(jQuery(".h2_fade_in"), function(key, value) {
				if (key > 0) {
					h2_fade_in = h2_fade_in + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				h2_fade_in = h2_fade_in + value.value;
			});
                        
			var h2_fade_out = "";
			jQuery.each(jQuery(".h2_fade_out"), function(key, value) {
				if (key > 0) {
					h2_fade_out = h2_fade_out + '^';
				}
				value.value = value.value.replace(/\"/gi, "\'");
				h2_fade_out = h2_fade_out + value.value;
			});
                        
			var h2_color = "";
			jQuery.each(jQuery(".h2_color"), function(key, value) {
				if (key > 0) {
					h2_color = h2_color + '^';
				}
				h2_color = h2_color + value.value;
			});
                        
			//***
			var shortcode_text = begin_string + ' type="' + type + '" h1_items="' + h1_item + '"' + ' h1_heading_type="' + h1_heading_type + '" h1_fade_in="' + h1_fade_in + '" h1_fade_out="' + h1_fade_out + '" h1_color="' + h1_color + '" h2_items="' + h2_item + '" h2_heading_type="' + h2_heading_type + '" h2_fade_in="' + h2_fade_in + '" h2_fade_out="' + h2_fade_out + '" h2_color="' + h2_color + '" ]' + end_string;

			self.insert_html_in_buffer(shortcode_text);
		}
	};
	return self;
};

var tmm_ext_shortcodes = null;
jQuery(document).ready(function() {
	tmm_ext_shortcodes = new TMM_APP_SHORTCODES();
	tmm_ext_shortcodes.init();
});


function colorizator() {
	var pickers = jQuery('.bgpicker');

	jQuery.each(pickers, function(key, picker) {

		var bg_hex_color = jQuery(picker).prev('.bg_hex_color');

		if (!jQuery(bg_hex_color).val()) {
			jQuery(bg_hex_color).val();
		}

		jQuery(picker).css('background-color', jQuery(bg_hex_color).val()).ColorPicker({
			color: jQuery(bg_hex_color).val(),
			onChange: function(hsb, hex, rgb) {
				jQuery(picker).css('backgroundColor', '#' + hex);
				jQuery(bg_hex_color).val('#' + hex);
				jQuery(bg_hex_color).trigger('change');
			}
		});

	});
}