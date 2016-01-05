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
		                        var input_object = jQuery(this).prev('input, textarea'),
			                        frame = wp.media({
				                        title: wp.media.view.l10n.chooseImage,
				                        multiple: false,
				                        library: { type: 'image, audio' }
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

	                        cur_popup.find('.tmm_button_upload_video').on('click', function() {
		                        var input_object = jQuery(this).prev('input, textarea'),
			                        frame = wp.media({
				                        title: wp.media.view.l10n.addMedia,
				                        multiple: false,
				                        library: { type: 'video, audio' }
			                        });

		                        frame.on( 'select', function() {
			                        var selection = frame.state().get('selection');
			                        selection.each(function(attachment) {
				                        var url = attachment.attributes.url;
				                        input_object.val(url).trigger('change');
			                        });
		                        });

		                        frame.open();
	                        });

                        },
                        close: function() {
                            if($.isFunction(params.onclose)){
                                params.onclose();
                            }
                            /* remove events handlers */
	                        var cur_popup = $('.tmm-popup-single-shortcode');
	                        cur_popup.find('.tmm_button_upload').off('click');
	                        cur_popup.find('.tmm_button_upload_video').off('click');
                        },
                        save: function() {
                            var shortcode = tmm_ext_shortcodes.get_html_from_buffer();
                            shortcode = shortcode.replace(/'/gi, '"' );

                            // [column_post] fix
                            if(shortcode.indexOf('column_post') + 1) {
                                shortcode = shortcode.replace(/column_post/g ,"featured_post");
                            }

                            if (mode == 'edit') {                                                                       
                                shortcode = self.toHTML(shortcode);
                                tinyMCE.activeEditor.selection.setContent(shortcode);
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
                if (key && 'undefined' == typeof val)
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
            /**
             *
             * @param str
             * @returns {Array} Contains arrays (parent shrotcodes, child shrotcodes, and nested  structure).
             */
            parseNestedShortcodes: function(str) {
                if ('' == str) {
                    return false;
                }
                // Regexp for shortcode "Html tag with content or shortcode in square brackets"
                var shortcodePattern = /((<.*?>)?[\/?[\w\s\t="/.':;#-\/]+.*?](<\/?.*?>)?|(.*?)?)|(<.*?>(\.)|(.*?)<\/?.*?>)/gi,
                    shortcodesArray = str.match(shortcodePattern),
                    openTag = '',
                    closeTag = '',
                    level = 1,
                    index = 0,
                    parents = [],
                    children = [],
                    nested = [];

                if (null == shortcodesArray) {
                    return str;
                }

                shortcodesArray.forEach(function (item, i, arr) {
                    // Regexp for shortcode "Name of opening shortcode tag"
                    if ( item.match(/\[([^\/]\S\w+.*?)/i) ) {
                        var arr = Array.prototype.slice.call(item.match(/\[([^\/]\S\w+.*?)/i))
                        if (1 == level) {
                            openTag = arr[1];
                            nested[index] = item;
                            parents[index] = item;
                            level++;
                        } else {
                            if ('undefined' == typeof children[index]) {
                                children[index] = '';
                            }
                            nested[index] += item;
                            children[index] += item;
                        }
                    }
                    // Regexp for shortcode "Name of closing shortcode tag"
                    else if ( item.match(/\[\/(\w+)]/i) ) {
                        var arr = Array.prototype.slice.call(item.match(/\[\/(\w+)]/i));
                        closeTag = arr[1];
                        if (openTag == closeTag) {
                            nested[index] += item;
                            parents[index] += item;
                            index++;
                            level--;
                        } else {
                            if ('undefined' == typeof children[index]) {
                                children[index] = '';
                            }
                            nested[index] += item;
                            children[index] += item;
                        }
                    }
                    else {
                        if (1 == level) {
                            if ('undefined' == typeof parents[index]) {
                                parents[index] = '';
                            }
                            nested[index] = item;
                            parents[index] += item;
                            index++;
                        }else {
                            if ('undefined' == typeof children[index]) {
                                children[index] = '';
                            }
                            nested[index] += item;
                            children[index] += item;
                        }
                    }
                });
                var result = [parents, children, nested];
                return result;
            },
            toHTML: function(str) {
                // [column_post] fix (replace it by [featured_post])
                if (str.indexOf('column_post') + 1) {
                    str = str.replace(/column_post/g ,"featured_post");
                }
                var shortcodesArray = self.parseNestedShortcodes(str),
                    htmlOutput = '';

                if (!shortcodesArray) {
                    return htmlOutput;
                } else if ('string' == typeof shortcodesArray) {
                    return shortcodesArray;
                }
                var parents = shortcodesArray[0],
                    nested = shortcodesArray[2],
                    // Regexp for shortcode "Wordpress shortcode for audio/video content"
                    avPattern = /<p [^>]*?data-wpview-marker="([^"]+)"[^>]*>[\s\S]*?<\/p>/gi;

                parents.forEach(function (item, i, arr) {
                    htmlOutput += item.replace(tmm_shortcodes_items_keys,
                        function(c, tag, properties, rawconts, conts) {
                            var props = self.parseProperties(properties);
                            if (props.sc_id === undefined) {
                                props.sc_id = self.getId();
                                properties += ' sc_id="' + props.sc_id + '"';
                            }

                            //get image for editor
                            var _properties = properties.replace(/ sc_id="[^"]+"/, '').replace(/="([^"]+)"/g, ': $1;');
                            var shortcode_icon_url = self.get_shortcode_icon_url(tag);

                            var shortcodeImg = '<img src="' + shortcode_icon_url + '" data-mce-placeholder="true" data-tag="' + tag + '" ' +
                                'data-scid="' + props.sc_id + '" class="shortcode-placeholder mceItem scid-'
                                + props.sc_id + '" title="' + tag.toUpperCase() + ' ' + _properties + '"/>';

                            var toCahe = nested[i].replace( avPattern, function(str) {
                                return window.decodeURIComponent(jQuery(str).attr('data-wpview-marker'));
                            });

                            // save shortcode to cache
                            if('[' == toCahe.substr(0, 1)) {
                                self.cache(props.sc_id, toCahe );
                            } else if ('<p>[' == toCahe.substr(0, 4)) {
                                self.cache(props.sc_id, toCahe );
                            } else {
                                var split = toCahe.split('[', 2);
                                toCahe = toCahe.substr(split[0].length);
                                self.cache(props.sc_id, toCahe );
                            }

                            return shortcodeImg;
                        });
                });
                return htmlOutput;
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