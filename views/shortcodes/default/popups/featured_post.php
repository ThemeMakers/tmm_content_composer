<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Select Type', TMM_THEME_FOLDER_NAME);*/?></h4>
		<?php
/*		$all_posts = get_posts(array('numberposts' => -1));
		$post_select_array = array();
		foreach ($all_posts as $post) {
			$post_select_array[$post->ID] = $post->post_title;
		}
		*/?>
		<div class="sel">
			<select class="js_shortcode_template_changer data-select" data-shortcode-field="post_id">
				<?php /*if (!empty($post_select_array)): */?>
					<?php /*foreach ($post_select_array as $term_id => $name) : */?>
						<option <?php /*if (TMM_Content_Composer::set_default_value('post_id', '') == $term_id) echo 'selected'*/?> value="<?php /*echo $term_id */?>"><?php /*echo $name */?></option>
					<?php /*endforeach; */?>
				<?php /*endif; */?>
			</select>
		</div>

	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Select Type ----------------
        */
        $all_posts = get_posts( array('numberposts' => -1) );
        $post_select_array = array();
        $select_type_options_array = array();

        foreach ($all_posts as $post) {
            $post_select_array[$post->ID] = $post->post_title;
        }

        if ( !empty($post_select_array) ) {
            foreach ( $post_select_array as $term_id => $name ) {
                $select_type_options_array[$term_id] = __($name, TMM_CC_TEXTDOMAIN);
            }
        }

        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Select Type', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'post_id',
            'id' => '',
            'options' => $select_type_options_array,
            'default_value' => TMM_Content_Composer::set_default_value('post_id', ''),
            'description' => ''
        ));
        ?>
    </div><!--/ .one-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Content', TMM_THEME_FOLDER_NAME); */?></h4>
		<input  <?php /*echo (TMM_Content_Composer::set_default_value('content', '')=='1') ?  "checked=''" : ''; */?> type="radio" name="content" id="content_radio_1" value="1" class="js_shortcode_radio_self_update data-radio" />
		<label for="content_radio_1" class="label-form"><span></span><?php /*_e('Content', TMM_THEME_FOLDER_NAME); */?></label>
		<input <?php /*echo (TMM_Content_Composer::set_default_value('content', '')=='0') ?  "checked=''" : ''; */?> type="radio" name="content" id="content_radio_0" value="0" class="js_shortcode_radio_self_update" />
		<label for="content_radio_0" class="label-form"><span></span><?php /*_e('Excerpt', TMM_THEME_FOLDER_NAME); */?></label>
        <input type="hidden" value="<?php /*echo TMM_Content_Composer::set_default_value('content', '') */?>" class="js_shortcode_template_changer" data-shortcode-field="content" />
	</div>--><!--/ .one-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Content ----------------
        */
        $value_type = TMM_Content_Composer::set_default_value('content', '');
        $contentChecked = ('1' == $value_type ) ? true : false ;
        $excerptChecked = ('0' == $value_type ) ? true : false ;

        TMM_Content_Composer::html_option(array(
            'type' => 'radio',
            'title' => __('Content', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'content',
            'id' => '',
            'name' => 'content',
            'values' => array(
                1 => array(
                    'title' => __('Content', TMM_CC_TEXTDOMAIN),
                    'id' => 'content_radio_1',
                    'value' => 1,
                    'checked' => $contentChecked
                ),
                0 => array(
                    'title' => __('Excerpt', TMM_CC_TEXTDOMAIN),
                    'id' => 'content_radio_0',
                    'value' => 0,
                    'checked' => $excerptChecked
                )
            ),
            'value' => $value_type,
            'description' => '',
            'hidden_id' => 'show_row_number'
        ));

        TMM_Content_Composer::html_option(array(
            'type' => 'hidden',
            'shortcode_field' => 'content',
            'id' => 'show_row_number',
            'default_value' => TMM_Content_Composer::set_default_value('content', ''),
            'description' => ''
        ));
        ?>
    </div><!--/ .one-half-->

                <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Excerpt Char Count', TMM_THEME_FOLDER_NAME); */?></h4>
		<input type="text" value="<?php /*echo TMM_Content_Composer::set_default_value('char_count', '140') */?>" class="js_shortcode_template_changer data-input" data-shortcode-field="char_count">
	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Excerpt Char Count ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Excerpt Char Count', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'char_count',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('char_count', '140'),
            'description' => ''
        ));
        ?>
    </div><!--/ .on-half-->

	            <!--<div class="one-half">
            <h4 class="label"><?php /*_e('Featured Image', TMM_THEME_FOLDER_NAME); */?></h4>
            <div class="sel">
                <select class="js_shortcode_template_changer data-select" data-shortcode-field="show_featured_image">
                    <option <?php /*if (TMM_Content_Composer::set_default_value('show_featured_image', '') == '0') echo 'selected' */?> value="0"><?php /*_e('No image', TMM_THEME_FOLDER_NAME); */?></option>
                    <option <?php /*if (TMM_Content_Composer::set_default_value('show_featured_image', '') == '1') echo 'selected' */?>  value="1"><?php /*_e('Show featured image', TMM_THEME_FOLDER_NAME); */?></option>
                    <option <?php /*if (TMM_Content_Composer::set_default_value('show_featured_image', '') == '2') echo 'selected' */?> value="2"><?php /*_e('Use custom image link', TMM_THEME_FOLDER_NAME); */?></option>
                    <option <?php /*if (TMM_Content_Composer::set_default_value('show_featured_image', '') == '3') echo 'selected' */?> value="3"><?php /*_e('Show image in fancybox', TMM_THEME_FOLDER_NAME); */?></option>
                </select>
		    </div>

	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Featured Image ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Featured Image', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'show_featured_image',
            'id' => '',
            'options' => array(
                '0' => __('No image', TMM_CC_TEXTDOMAIN),
                '1' => __('Show featured image', TMM_CC_TEXTDOMAIN),
                '2' => __('Use custom image link', TMM_CC_TEXTDOMAIN),
                '3' => __('Show image in fancybox', TMM_CC_TEXTDOMAIN),
            ),
            'default_value' => TMM_Content_Composer::set_default_value('show_featured_image', '0'),
            'description' => ''
        ));
        ?>
    </div><!--/ .on-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Custom Image Link', TMM_THEME_FOLDER_NAME); */?></h4>
		<input type="text" value="<?php /*echo TMM_Content_Composer::set_default_value('custom_image_link', '#') */?>" class="js_shortcode_template_changer data-input" data-shortcode-field="custom_image_link">
	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Custom Image Link ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Custom Image Link', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'custom_image_link',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('custom_image_link', '#'),
            'description' => ''
        ));
        ?>
    </div><!--/ .on-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Thumb Width', TMM_THEME_FOLDER_NAME); */?></h4>
		<input type="text" value="<?php /*echo TMM_Content_Composer::set_default_value('thumb_width', '150') */?>" class="js_shortcode_template_changer data-input" data-shortcode-field="thumb_width">
	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Thumb Width ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Thumb Width', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'thumb_width',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('thumb_width', '150'),
            'description' => ''
        ));
        ?>
    </div><!--/ .on-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Thumb Height', TMM_THEME_FOLDER_NAME); */?></h4>
		<input type="text" value="<?php /*echo TMM_Content_Composer::set_default_value('thumb_height', '150') */?>" class="js_shortcode_template_changer data-input" data-shortcode-field="thumb_height">
	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Thumb Height ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Thumb Height', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'thumb_height',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('thumb_height', '150'),
            'description' => ''
        ));
        ?>
    </div><!--/ .on-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Read More Button', TMM_THEME_FOLDER_NAME); */?></h4>
		<input <?php /*echo (TMM_Content_Composer::set_default_value('show_readmore_button', '')=='0') ?  "checked=''" : ''; */?> type="radio" name="show_readmore_button" id="show_button_0" value="0" class="js_shortcode_radio_self_update data-radio" />
		<label for="show_button_0" class="label-form"><span></span><?php /*_e('No readmore button', TMM_THEME_FOLDER_NAME); */?></label>
		<input <?php /*echo (TMM_Content_Composer::set_default_value('show_readmore_button', '')=='1') ?  "checked=''" : ''; */?> type="radio" name="show_readmore_button" id="show_button_1" value="1" class="js_shortcode_radio_self_update" />
		<label for="show_button_1" class="label-form"><span></span><?php /*_e('Show readmore button', TMM_THEME_FOLDER_NAME); */?></label>
                <input type="hidden" value="<?php /*echo TMM_Content_Composer::set_default_value('show_readmore_button', '') */?>" class="js_shortcode_template_changer" data-shortcode-field="show_readmore_button" />
	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Read More Button ----------------
        */
        $value_type = TMM_Content_Composer::set_default_value('show_readmore_button', '');
        $showChecked = ('1' == $value_type ) ? true : false ;
        $hideChecked = ('0' == $value_type ) ? true : false ;

        TMM_Content_Composer::html_option(array(
            'type' => 'radio',
            'title' => __('Read More Button', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'show_readmore_button',
            'id' => '',
            'name' => 'show_readmore_button',
            'values' => array(
                1 => array(
                    'title' => __('Show readmore button', TMM_CC_TEXTDOMAIN),
                    'id' => 'show_button_1',
                    'value' => 1,
                    'checked' => $showChecked
                ),
                0 => array(
                    'title' => __('No readmore button', TMM_CC_TEXTDOMAIN),
                    'id' => 'show_button_0',
                    'value' => 0,
                    'checked' => $hideChecked
                )
            ),
            'value' => $value_type,
            'description' => '',
            'hidden_id' => 'show_readmore_button'
        ));

        TMM_Content_Composer::html_option(array(
            'type' => 'hidden',
            'shortcode_field' => 'content',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('show_readmore_button', ''),
            'description' => ''
        ));
        ?>
    </div><!--/ .one-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Button Color', TMM_THEME_FOLDER_NAME); */?></h4>
		<?php /*$colors = TMM_Content_Composer::get_theme_buttons(); */?>
		<div class="sel">
			<select class="js_shortcode_template_changer data-select" data-shortcode-field="button_color">
				<?php /*if (!empty($colors)): */?>
					<?php /*foreach ($colors as $key => $name) : */?>
						<option value="<?php /*echo $key */?>"><?php /*echo $name */?></option>
					<?php /*endforeach; */?>
				<?php /*endif; */?>

			</select>
		</div>

	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Button Color ----------------
        */
        $colors = TMM_Content_Composer::get_theme_buttons();
        $select_color_options_array = array();

        if ( !empty($colors) ) {
            foreach ( $colors as $key => $name ) {
                $select_color_options_array[$key] = __($name, TMM_CC_TEXTDOMAIN);
            }
        }

        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Button Color', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'button_color',
            'id' => '',
            'options' => $select_color_options_array,
            'default_value' => TMM_Content_Composer::set_default_value('button_color', ''),
            'description' => ''
        ));
        ?>
    </div><!--/ .one-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Button Size', TMM_THEME_FOLDER_NAME); */?></h4>
		<?php /*$size = TMM_Content_Composer::get_theme_buttons_sizes() */?>
		<div class="sel">
			<select class="js_shortcode_template_changer data-select" data-shortcode-field="button_size">

				<?php /*if (!empty($size)): */?>
					<?php /*foreach ($size as $key => $name) : */?>
						<option value="<?php /*echo $key */?>"><?php /*echo $name */?></option>
					<?php /*endforeach; */?>
				<?php /*endif; */?>

			</select>
		</div>

	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Button Size ----------------
        */
        $sizes = TMM_Content_Composer::get_theme_buttons_sizes();
        $select_size_options_array = array();

        if ( !empty($sizes) ) {
            foreach ( $sizes as $key => $name ) {
                $select_size_options_array[$key] = __($name, TMM_CC_TEXTDOMAIN);
            }
        }

        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Button Size', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'button_size',
            'id' => '',
            'options' => $select_size_options_array,
            'default_value' => TMM_Content_Composer::set_default_value('button_size', ''),
            'description' => ''
        ));
        ?>
    </div><!--/ .one-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Title Align', TMM_THEME_FOLDER_NAME); */?></h4>
		<div class="sel">
			<select class="js_shortcode_template_changer data-select" data-shortcode-field="title_align">
				<option value="left"><?php /*_e('Left', TMM_THEME_FOLDER_NAME); */?></option>
				<option value="center"><?php /*_e('Center', TMM_THEME_FOLDER_NAME); */?></option>
				<option value="right"><?php /*_e('Right', TMM_THEME_FOLDER_NAME); */?></option>
			</select>
		</div>
	</div>--><!--/ .on-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Title Align ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Title Align', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'title_align',
            'id' => '',
            'options' => array(
                'left' => __('Left', TMM_CC_TEXTDOMAIN),
                'center' => __('Center', TMM_CC_TEXTDOMAIN),
                'right' => __('Right', TMM_CC_TEXTDOMAIN),
            ),
            'default_value' => TMM_Content_Composer::set_default_value('title_align', 'center'),
            'description' => ''
        ));
        ?>
    </div><!--/ .on-half-->

	            <!--<div class="one-half">
		<h4 class="label"><?php /*_e('Text Align', TMM_THEME_FOLDER_NAME); */?></h4>
		<div class="sel">
			<select class="js_shortcode_template_changer data-select" data-shortcode-field="text_align">
				<option value="left"><?php /*_e('Left', TMM_THEME_FOLDER_NAME); */?></option>
				<option value="center"><?php /*_e('Center', TMM_THEME_FOLDER_NAME); */?></option>
				<option value="right"><?php /*_e('Right', TMM_THEME_FOLDER_NAME); */?></option>
			</select>
		</div>
	</div>--><!--/ .one-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Text Align ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'select',
            'title' => __('Text Align', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'text_align',
            'id' => '',
            'options' => array(
                'left' => __('Left', TMM_CC_TEXTDOMAIN),
                'center' => __('Center', TMM_CC_TEXTDOMAIN),
                'right' => __('Right', TMM_CC_TEXTDOMAIN),
            ),
            'default_value' => TMM_Content_Composer::set_default_value('text_align', 'center'),
            'description' => ''
        ));
        ?>
    </div><!--/ .on-half-->

</div><!--/ .thememakers_shorcode_template-->


<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">

	
	<?php //$frame_uri = Thememakers_Application_Events::get_application_uri() . "/preview.php"; ?>
	<?php// $frame_uri = TMM_CC_URL . "views/shortcodes/preview.php"; ?>

	<script type="text/javascript">

		//var thememakers_app_shortcodes_preview_url = "<?php //echo $frame_uri ?>";
		var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

		jQuery(function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});
		});


	</script>

</div><!--/ .fullwidth-frame-->



