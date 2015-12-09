(function($){
	var tmm_layout_constructor = function() {
		var self = {
			columns: null,
			active_editor_id: null,
			init: function() {

				$.fn.life = function(types, data, fn) {
					"use strict";
					$(this.context).on(types, this.selector, data, fn);
					return this;
				};

				self.columns = [
					{
						'value': '1/4',
						'name': 'col-md-3',
						'css_class': 'col-md-3',
						'front_css_class': 'col-md-3'
					},
					{
						'value': '1/3',
						'name': 'col-md-4',
						'css_class': 'col-md-4',
						'front_css_class': 'col-md-4'
					},
					{
						'value': '5/12',
						'name': 'col-md-5',
						'css_class': 'col-md-5',
						'front_css_class': 'col-md-5'
					},
					{
						'value': '1/2',
						'name': 'col-md-6',
						'css_class': 'col-md-6',
						'front_css_class': 'col-md-6'
					},
					{
						'value': '7/12',
						'name': 'col-md-7',
						'css_class': 'col-md-7',
						'front_css_class': 'col-md-7'
					},
					{
						'value': '2/3',
						'name': 'col-md-8',
						'css_class': 'col-md-8',
						'front_css_class': 'col-md-8'
					},
					{
						'value': '3/4',
						'name': 'col-md-9',
						'css_class': 'col-md-9',
						'front_css_class': 'col-md-9'
					},
					{
						'value': '5/6',
						'name': 'col-md-10',
						'css_class': 'col-md-10',
						'front_css_class': 'col-md-10'
					},
					{
						'value': '11/12',
						'name': 'col-md-11',
						'css_class': 'col-md-11',
						'front_css_class': 'col-md-11'
					},
					{
						'value': 'Fullwidth',
						'name': 'col-md-12',
						'css_class': 'col-md-12',
						'front_css_class': 'col-md-12'
					}
				];

				/* Preload layout constructor editor */
				var data = {
						action: "get_lc_editor",
						content: '',
						editor_id: 'layout_constructor_editor'
					},
					lc_editor = '';

				$.post(ajaxurl, data, function(response) {
					lc_editor = response;
				});

				/* Init sortable items */
				$('#tmm_lc_rows').sortable();
				$('.tmm-lc-columns').sortable();

				/* Events handlers */
				$('.tmm-lc-add-row').life('click', function(){
					self.add_row();
					return false;
				});

				$('.tmm-lc-add-column').life('click', function(){
					self.add_column($(this).data('row-id'));
					return false;
				});

				$('.tmm-lc-copy-row').life('click', function(){
					self.copy_row($(this).data('row-id'));
					var tmm_buffer = localStorage.getItem('tmm_buffer');
					if (tmm_buffer){
						$('.tmm-lc-paste-row').removeClass('disabled');
					}
					return false;
				});

				var tmm_buffer = localStorage.getItem('tmm_buffer');
				if (!tmm_buffer){
					$('.tmm-lc-paste-row').addClass('disabled');
				}

				$('.tmm-lc-paste-row').life('click', function(){
					var tmm_buffer = localStorage.getItem('tmm_buffer');
					if (tmm_buffer){
						self.paste_row();
					}
					return false;
				});

				$('.tmm-lc-edit-row').life('click', function(){
					self.edit_row($(this).data('row-id'));
					return false;
				});

				$('.tmm-lc-delete-row').life('click', function(){
					self.delete_row($(this).data('row-id'));
					return false;
				});

				$(".tmm-lc-delete-column").life('click', function() {
					if (confirm(tmm_lang['column_delete'])) {
						$("#item_" + $(this).data('item-id')).remove();
					}
					return false;
				});

				$(".tmm-lc-edit-column").life('click', function() {

					if ($(".tmm-lc-column-title-input").length > 0) {
						return;
					}

					tmm_info_popup_show(tmm_lang['loading'], false);

					var default_id = 'content',
						ed = tinymce.get( default_id ),
						wrap_id = 'wp-' + default_id + '-wrap',
						DOM = tinymce.DOM;

					if (!ed) {
						tinymce.init(tinyMCEPreInit.mceInit[default_id]);

						DOM.removeClass( wrap_id, 'html-active' );
						DOM.addClass( wrap_id, 'tmce-active' );
						setUserSetting( 'editor', 'tmce' );
					}

					var item_id = $(this).data('item-id'),
						title = $("#item_" + item_id).find('.tmm-lc-column-title').html(),
						text = $("#item_" + item_id).find('.js_content').text(),
						popup_params = {};

					if (title === tmm_lang['empty_title']) {
						title = "";
					}

					popup_params = {
						content: lc_editor,
						title: tmm_lang['column_popup_title'],
						popup_class: '',
						open: function() {
							self.active_editor_id = 'layout_constructor_editor';
							/* setup tinyMCE */
							tinyMCE.execCommand('mceAddEditor', false, self.active_editor_id);
							if(tinyMCE.get(self.active_editor_id)){
								tinyMCE.execCommand('mceSetContent', false, text);
							}else{
								setTimeout(function(){
									tinyMCE.execCommand('mceSetContent', false, text);
								}, 1000);
							}
							/* setup Editor Text tab buttons */
							quicktags(self.active_editor_id);
							QTags._buttonsInit();
							/* add custom elements */
							var lc_title = '<input type="text" placeholder="' + tmm_lang['empty_title'] + '" value="' + title + '" class="tmm-lc-column-title-input" /><br />',
								lc_column_options = '<span class="tmm_lc_column_options"></span>';
							$('#wp-'+self.active_editor_id+'-editor-tools').prepend(lc_title).find('#wp-'+self.active_editor_id+'-media-buttons').append(lc_column_options);
							/* column options settings */
							$('.tmm_lc_column_options').append($('#tmm_lc_column_effects').html());
							$('.tmm-lc-column-effects-selector').val($("#item_" + item_id).find('.js_effect').val());
							$('.tmm-lc-column-effects-selector').change(function() {
								$("#item_" + item_id).find('.js_effect').val($(this).val());
							});
							tmm_info_popup_hide();
						},
						close: function() {
							tinyMCE.execCommand('mceRemoveEditor', false, self.active_editor_id);
							self.active_editor_id = null;
							$(".tmm-lc-column-title-input").remove();
							/* column options settings */
							$('.tmm-lc-column-effects-selector').val('');
						},
						save: function() {
							var new_title = $(".tmm-lc-column-title-input").val(),
								active_tab = $('#wp-'+self.active_editor_id+'-wrap').hasClass('tmce-active') ? 'tmce' : 'html',
								content = '';

							if (new_title.length == 0) {
								new_title = tmm_lang['empty_title'];
							}

							if(active_tab === 'tmce'){
								content = tinyMCE.get(self.active_editor_id).getContent();
							}else{
								content = $('#' + self.active_editor_id).val();
							}

							$("#item_" + item_id)
								.find('.js_title').val(new_title == tmm_lang['empty_title'] ? "" : new_title)
								.end().find('.tmm-lc-column-title').html(new_title)
								.end().find('.js_content').text(content);
						}
					};

					/* open popup if layout constructor editor already loaded */
					if(lc_editor === ''){
						var interval_id = setInterval(function(){
							if(lc_editor !== ''){
								popup_params.content = lc_editor;
								clearInterval(interval_id);
								$.tmm_popup(popup_params);
							}
						}, 500)
					}else{
						$.tmm_popup(popup_params);
					}

				});

				$(".tmm-lc-column-size-plus").life('click', function() {
					var item_id = $(this).data('item-id');

					self.change_column_size(item_id, 1);

					return false;
				});

				$(".tmm-lc-column-size-minus").life('click', function() {
					var item_id = $(this).data('item-id');

					self.change_column_size(item_id, -1);

					return false;
				});

				self._is_rows_exists();

			},
			change_column_size: function (item_id, diff) {
				var item = $("#item_" + item_id),
					current_value = item.find('.js_value').val(),
					css_class = '',
					front_css_class = '',
					value = '';

				for(i in self.columns){
					i = parseInt(i);
					if(self.columns[i]['value'] === current_value && self.columns[i+diff]){
						value = self.columns[i+diff]['value'];
						css_class = self.columns[i+diff]['css_class'];
						front_css_class = self.columns[i+diff]['front_css_class'];

						item.parent().removeAttr('class').addClass('tmm-lc-column-wrapper').addClass(css_class);
						item.find('.js_front_css_class').val(front_css_class);
						item.find('.js_css_class').val(css_class);
						item.find('.tmm-lc-column-size').html(value);
						item.find('.js_value').val(value);
						break;
					}
				}

			},
			add_column: function(row_id) {
				var html = $("#tmm_lc_column_item").html();
				var unique_id = tmm_uniqid();
				html = html.replace(/__UNIQUE_ID__/gi, unique_id);
				html = html.replace(/__ROW_ID__/gi, row_id);
				$("#tmm_lc_columns_" + row_id).append(html);
				$('#tmm_lc_rows').sortable();
			},
			add_row: function() {
				var html = $("#tmm_lc_row_wrapper").html();
				var row_id = tmm_uniqid();
				html = html.replace(/__ROW_ID__/gi, row_id);
				$("#tmm_lc_rows").append(html);
				$('.tmm-lc-columns').sortable();
				self._is_rows_exists();
				self.colorizator();
			},
			copy_row: function(row_id){
				if (self.isLocalStorageAvailable){
					var html = $('#tmm_lc_row_'+row_id).html();
					html = html.split(row_id).join('__ROW_ID__');
					var items = $(html).find("[id ^= 'item_']");

					items.each(function(){
						var id = $(this).attr('id');
						id = id.split('item_');
						id = id['1'];
						var item_id = tmm_uniqid();
						html = html.split(id).join(item_id);
					});

					localStorage.setItem('tmm_buffer', html);
					tmm_info_popup_show('Row is copied!', true);
				}
			},
			paste_row: function(){
				if (self.isLocalStorageAvailable){
					var row_id = tmm_uniqid();
					var cur_row = $('<li id="tmm_lc_row_' + row_id + '" class="tmm-lc-row"></li>');
					var html = localStorage.getItem('tmm_buffer');
					if (html){
						html = html.replace(/__ROW_ID__/gi, row_id);
						cur_row.append(html);
						$("#tmm_lc_rows").append(cur_row);
						$('.tmm-lc-columns').sortable();
						self._is_rows_exists();
						self.colorizator();
					}

				}
			},
			isLocalStorageAvailable: function() {
				try {
					return 'localStorage' in window && window['localStorage'] !== null;
				} catch (e) {
					return false;
				}
			},
			edit_row: function(row_id) {

				var template_wrapper = $('#tmm_lc_row_edit_options'),
					template_html = template_wrapper.html();

				var popup_params = {
					content: template_html,
					title: tmm_lang['row_popup_title'],
					popup_class: 'tmm-popup-edit-row',
					open: function() {
						template_wrapper.empty();

						var cur_popup = $('.tmm-popup-edit-row'),
							box_full_width  = cur_popup.find('.row_full_width_box'),
							box_color = cur_popup.find('#row_bg_color_box'),
							box_image = cur_popup.find('#row_bg_image_box'),
							box_overlay = cur_popup.find('#row_bg_overlay_box'),
							box_video = cur_popup.find('#row_bg_video_box'),
							current_values = {},
							option,
							temp;

						for (option in tmm_cc_row_options) {

							current_values[option] = $('#row_' + option + '_' + row_id).val();
							temp = cur_popup.find('#row_' + option);

							if (temp.length) {
								temp.val(current_values[option]);
							}

							if (option === 'bg_overlay' && current_values[option] === '1'){
								temp.attr('checked', 'checked').val('1');
								box_overlay.show();
							}

							if (option === 'bg_overlay_opacity'){
								cur_popup.find('.slider-text.row_bg_overlay_opacity').val(current_values[option]);
							}

						}

						if (current_values['lc_displaying'] == 'full_width' || current_values['lc_displaying'] == 'before_full_width'){
							box_full_width.show();
						}

						if (current_values['bg_type'] === 'color'){
							box_color.show();
						}
						if ((current_values['bg_type'] === 'image')){
							box_image.show();
						}
						if (current_values['bg_type'] === 'video'){
							box_video.show();
						}

						self.colorizator();
						self.ui_slider();

						/* events handlers */
						//cur_popup.find('#row_bg_overlay_opacity').on('change', function(){
						//	cur_popup.find('.slider-text.row_bg_overlay_opacity').val( $(this).val() );
						//});
						//
						//cur_popup.find('.slider-text.row_bg_overlay_opacity').on('change', function(){
						//	cur_popup.find('#row_bg_overlay_opacity').val( $(this).val() );
						//});

						cur_popup.find('#row_lc_displaying').on('change', function(){

							var val = $(this).val();

							if (val === 'full_width' || val === 'before_full_width') {
								box_full_width.slideDown();
							} else {
								box_full_width.slideUp();
							}

						});

						cur_popup.find('#row_bg_overlay').on('click', function(){

							if ( $(this).is(':checked')) {
								box_overlay.slideDown();
							} else {
								box_overlay.slideUp();
							}

						});

						cur_popup.find('#row_bg_type').on('change', function() {
							var val = $(this).val();

							if (val === 'none') {
								box_color.slideUp();
								box_image.slideUp();
								box_video.slideUp();
							} else {

								if (val === 'color'){
									box_color.slideDown();
									box_image.slideUp();
									box_video.slideUp();
								}
								if (val === 'image'){
									box_image.slideDown();
									box_color.slideUp();
									box_video.slideUp();
								}
								if (val === 'video'){
									box_video.slideDown();
									box_color.slideUp();
									box_image.slideUp();
								}
							}

						});

						cur_popup.find('.tmm_button_upload').on('click', function() {
							var input_object = $(this).prev('input, textarea'),
								type = $(this).data('type'),
								title = wp.media.view.l10n.chooseImage;

							if (!type) {
								type = 'image';
							} else if (type === 'audio') {
								title = wp.media.view.l10n.audioAddSourceTitle;
							} else if (type === 'video') {
								title = wp.media.view.l10n.videoAddSourceTitle;
							}

							var frame = wp.media({
								title: title,
								multiple: false,
								library: { type: type }
							});

							frame.on( 'select', function() {
								var selection = frame.state().get('selection');
								selection.each(function(attachment) {
									var url = attachment.attributes.url;
									input_object.val(url).trigger('change');
								});
							});

							frame.open();

							return false;
						});

						cur_popup.find('.tmm-popup-content input[type=checkbox]').on('click', function() {
							var is_checked = $(this).is(':checked');
							if (is_checked) {
								$(this).attr('checked', 'checked');
							} else {
								$(this).removeAttr('checked');
							}
						});

					},
					close:function(){
						template_wrapper.html(template_html);
						/* remove events handlers */
						var cur_popup = $('.tmm-popup-edit-row');
						//cur_popup.find('#row_bg_overlay_opacity').off('change');
						//cur_popup.find('.slider-text.row_bg_overlay_opacity').off('change');
						cur_popup.find('#row_lc_displaying').off('change');
						cur_popup.find('#row_bg_type').off('change');
						cur_popup.find('#row_bg_overlay').off('click');
						cur_popup.find('.tmm_button_upload').off('click');
						cur_popup.find('.tmm-popup-content input[type=checkbox]').off('click');
					},
					save: function() {
						var cur_popup = $('.tmm-popup-edit-row'),
							option,
							temp;

						for (option in tmm_cc_row_options) {

							temp = cur_popup.find('#row_' + option).val();
							$('#row_' + option + '_' + row_id).val( temp );

						}

					}
				};
				$.tmm_popup(popup_params);

			},
			delete_row: function(row_id) {

				if (confirm(tmm_lang['row_delete'])) {
					$("#tmm_lc_row_" + row_id).remove();
				}

				self._is_rows_exists();
			},
			_is_rows_exists: function() {

				var rows_wrapper = $("#tmm_lc_rows"),
					rows_count = rows_wrapper.find('li').size();
				if (rows_count === 0) {
					rows_wrapper.hide();
				} else {
					rows_wrapper.show();
				}

				return rows_count;
			},
			colorizator: function() {

				var pickers = $('.bgpicker');

				$.each(pickers, function(key, picker) {

					var bg_hex_color = $(picker).next('.bg_hex_color');

					if (!$(bg_hex_color).val()) {
						$(bg_hex_color).val();
					}

					$(picker).css('background-color', $(bg_hex_color).val()).ColorPicker({
						color: $(bg_hex_color).val(),
						onChange: function(hsb, hex, rgb) {

							$(picker).css('backgroundColor', '#' + hex);
							$(bg_hex_color).val('#' + hex);
							$(bg_hex_color).trigger('change');
						}
					});

				});
			},
			ui_slider: function() {

				$('.tmm-popup-edit-row').find('.ui-slider-item').each(function (key, item) {
					var max_value = $(item).data('max-value'),
						min_value = $(item).data('min-value'),
						id = $(item).find('.range-amount-value-hidden').attr('id'),
						value = $(item).find('.range-amount-value-hidden').attr('value');

					var slider = $(item).find('.' + id).slider({
						range: 'max',
						animate: true,
						value: parseFloat(value, 10),
						step: 1,
						min: parseInt(min_value, 10),
						max: parseInt(max_value, 10),
						slide: function (event, ui) {
							$(item).find('.range-amount-value').val(ui.value);
							$(item).find('.range-amount-value-hidden').val(ui.value);
						}
					});

					$(item).find('.range-amount-value').val(value);

					$(item).find('.range-amount-value').life('change', function () {
						var value = parseFloat($(this).val(), 10);
						slider.slider("value", value);
						$(item).find('.range-amount-value-hidden').val(value);
					});


				});

			}

		};

		return self;
	};

	$(function() {

		var layout_constructor = new tmm_layout_constructor();
		layout_constructor.init();
		if(window.QTags){
			QTags.addButton( 'eg_paragraph', 'p', '<p>', '</p>', 'p', '', 1 );
		}
	});

}(jQuery));