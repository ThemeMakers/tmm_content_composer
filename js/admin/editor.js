(function($) {

    $(function() {
        var self;

        tinymce.create("tinymce.plugins.tmm_tiny_shortcodes", {
            sc_info: {},
            init: function(ed, url) {
                self = this;

                ed.addButton('tmm_shortcodes', {                    
                    title: tmm_lang['shortcode_insert'],
                    classes:'tmm_shortcode_button widget btn last',
                    image: tmm_cc_plugin_url + "images/shortcodes_button.png",
                    icons: false,
                    onPostRender: function() {
                        
                        var ctrl = this;
                        ed.on('NodeChange', function(e) {
                            ctrl.active(e.element.nodeName == 'IMG');
                        });
                        
                    },
                    onclick: function() {
                        
                        var popup_params = {
                            content: '<ul id="tmm_shortcodes_list"></ul>',
                            title: 'ThemeMakers Shortcodes Package',
                            popup_class: 'tmm-popup-shortcodes-list',
                            open: function() {
                                
                                var html = '',
                                    shortcodes_list =  $('#tmm_shortcodes_list');
                            
                                $.each(tmm_ext_shortcodes_items, function(key, value) {
                                    html += '<li><a href="#" data-shortcode="'+value.key+'" title="'+value.name+'"><img src="'+value.icon+'"></a>';
                                });
                                                                                                
                                shortcodes_list.append(html)
                                    .on('click.tmm_shortcodes_icon', 'a', function() {
                                
                                        if(!shortcodes_list.find('a').hasClass('active')){
                                            $(this).addClass('active');
                                       
                                            var data = {
                                                    name: $(this).data('shortcode'),
                                                    mode: 'new',
                                                    title: $(this).attr('title'),
                                                    text: '',
                                                    onsave: function(){
                                                       $('.tmm-popup-shortcodes-list').find('.tmm-popup-close').eq(0).trigger('click');
                                                    },
                                                    onclose: function(){
                                                       shortcodes_list.find('a').removeClass('active');
                                                    }
                                                };
                                            self.open_shortcode_popup(data);
                                        }
                                        return false;
                                    });
                                
                            },
                            close: function() {
                                $('#tmm_shortcodes_list a').off('click.tmm_shortcodes_icon');
                            }
                        };
                        $.tmm_popup(popup_params);
                    }
                   
                });

                ed.on("dblClick", function(e) {
                    
                    var tag = $(e.target).data('tag');
                    var sc_id = $(e.target).data('scid');

                    if ((tag != undefined) && (sc_id != undefined)) {
                        window.parent.tinyMCE.get(self.get_active_editor()).plugins.tmm_tiny_shortcodes.edit_shortcode(tag, sc_id);
                    } else {
                        return false;
                    }

                });

                ed.on("BeforeSetContent", function(ed, o) {
                    ed.content = self.toHTML(ed.content);

                });

                ed.on("PostProcess", function(ed, o) {
                    if (ed.get) {
                        ed.content = self.toText(ed.content);
                    }
                });

            },
            open_shortcode_popup: function(params) {

                var mode = 'new',
                    text = '',
                    title = '',
                    name = params.name;
            
                if (params.mode !== undefined) {
                    mode = params.mode;
                }
                if (mode == 'edit') {
                    text = params.text;
                }
                if (params.title !== undefined) {
                    title = params.title;
                }

	            tmm_info_popup_show(tmm_lang['loading'], false);

                var data = {
                    action: "app_shortcodes_get_shortcode_template",
                    shortcode_name: name,
                    mode: mode,
                    shortcode_text: text
                };
                $.post(ajaxurl, data, function(html) {


                    var popup_params = {
                        content: html,
                        title: title,
                        popup_class: 'tmm-popup-single-shortcode',
                        open: function() {
	                        var cur_popup = $('.tmm-popup-single-shortcode');

                            /* events handlers */
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

                        },
                        close: function() {
                            if($.isFunction(params.onclose)){
                                params.onclose();
                            }
                            /* remove events handlers */
	                        var cur_popup = $('.tmm-popup-single-shortcode');
	                        cur_popup.find('.tmm_button_upload').off('click');
                        },
                        save: function() {
                            var shortcode = tmm_ext_shortcodes.get_html_from_buffer();

                            if (mode == 'edit') {                                                                       
                                shortcode = self.toHTML(shortcode);                                                
                                tinyMCE.activeEditor.selection.setContent(shortcode);
                                tinyMCE.execCommand('mceSetContent', false, tinyMCE.activeEditor.getContent());
	                            tmm_info_popup_show(tmm_lang['shortcode_updated'], true);
                            } else {
                                if (window.tinyMCE) {
                                    tinyMCE.execCommand('mceInsertContent', false, $.trim(shortcode));                                                    
                                    tinyMCE.execCommand('mceSetContent', false, tinyMCE.activeEditor.getContent());
                                }
                            }
                            if($.isFunction(params.onsave)){
                                params.onsave();
                            }
                            
                        }
                    };

	                /* If shortcode without content */
	                if(html === ''){
		                var active = $('#tmm_shortcodes_list').find('a.active').eq(0);
		                if(active.length){
			                tmm_ext_shortcodes.changer(active.data('shortcode'));
			                active.removeClass('active');
			                popup_params.save();
		                }
		                tmm_info_popup_show(tmm_lang['shortcode_nooption'], 1000);
		                return false;
	                }

                    /* Prevent opening multiple shortcode popups */
                    var shortcode_popups = $('.tmm-popup-single-shortcode');
                    if(shortcode_popups.length){
                        shortcode_popups.remove();
                    }
                    $.tmm_popup(popup_params);

	                tmm_info_popup_hide();

                });
              
            },
            get_active_editor: function() {     
                return tinyMCE.activeEditor.id;
            },

            cache: function(key, val) {
                if (key && !val)
                    return self.sc_info[key] || null;
                if (key && val) {
                    self.sc_info[key] = val;
                    return true;
                }
                return false;
            },
            toText: function(str) {

                return str.replace(/<img [^>]*\bclass="[^"]*shortcode-placeholder\b[^"]* scid-([^\s"]+)[^>]+>/g, function(a, id) {
                    return self.cache(id);
                });
            },
            parseProperties: function(str) {
                var parts = str.split(/\"/), props = {};
                for (var i = 0; i < parts.length; i += 2) {
                    if (typeof parts[i] != 'string' || typeof parts[i + 1] != 'string') {
                        continue;
                    }

                    var n = parts[i].replace(/^\s+|\s+$/g, '').replace('=', ''), v = parts[i + 1];
                    if (n && v) {
                        props[n] = v;
                    }

                }
                return props;
            },
            toHTML: function(str) {
                return str.replace(tmm_shortcodes_items_keys,
                        function(str, tag, properties, rawconts, conts) {
                            var props = self.parseProperties(properties);
                            if (props.sc_id === undefined) {
                                props.sc_id = self.getId();
                                properties += ' sc_id="' + props.sc_id + '"';
                            }
                            self.cache(props.sc_id, '[' + tag + ' ' + properties + (conts ? ']' + conts + '[/' + tag + ']' : ']'));
                            var _properties = properties.replace(/ sc_id="[^"]+"/, '').replace(/="([^"]+)"/g, ': $1;');
                            var shortcode_icon_url = self.get_shortcode_icon_url(tag);
                            return '<img src="' + shortcode_icon_url + '" data-mce-placeholder="true" data-tag="' + tag + '" data-scid="' + props.sc_id + '" class="shortcode-placeholder mceItem scid-' + props.sc_id + '" title="' + tag.toUpperCase() + ' ' + _properties + '" />';

                        });
            },
            get_shortcode_icon_url: function(tag) {
                var icon_url = "";
                $.each(tmm_ext_shortcodes_items, function(key, value) {
                    if (value.key == tag) {
                        icon_url = value.icon;
                        return;
                    }
                });

                return icon_url;
            },
            edit_shortcode: function(tag, sc_id) {                    
                var shortcode_text = self.cache(sc_id),
                    name = '',
                    i;
            
                for(i in tmm_ext_shortcodes_items){
                    if(tmm_ext_shortcodes_items[i]['key'] == tag){
                        name = tmm_ext_shortcodes_items[i]['name'];
                    }
                }
                
                self.open_shortcode_popup({name: tag, title: tmm_lang['shortcode_edit'] + ': ' + name, mode: 'edit', text: shortcode_text, sc_id: sc_id});

            },
            getId: function() {
                return 'sc' + tmm_uniqid();
            }
            
        });

        tinymce.PluginManager.add("tmm_tiny_shortcodes", tinymce.plugins.tmm_tiny_shortcodes);

    });

}(jQuery));