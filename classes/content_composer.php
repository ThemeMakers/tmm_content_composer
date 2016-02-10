<?php
/**
 * TMM_Content_Composer class
 */

class TMM_Content_Composer {

	protected static $instance = null;

	private function __construct() {

		add_action('add_meta_boxes', array(__CLASS__, 'add_meta_box'));

		add_filter('mce_buttons', array(__CLASS__, 'mce_buttons'));
		add_filter('mce_external_plugins', array(__CLASS__, 'mce_add_plugin'));
		add_filter('mce_css', array(__CLASS__, 'mce_css'));

		add_action('admin_enqueue_scripts', array(__CLASS__, 'admin_enqueue_scripts'), 1);
		add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_scripts'), 1);

		add_action('save_post', array('TMM_Shortcode', 'set_post_fonts'));
		add_action('save_post', array('TMM_Layout_Constructor', 'save_post'));

		add_action('wp_ajax_app_shortcodes_get_shortcode_template', array('TMM_Shortcode', 'get_shortcode_template'));
		add_action('wp_ajax_get_lc_editor', array('TMM_Layout_Constructor', 'get_lc_editor'));

		/* if not TMM theme */
		if (!class_exists('TMM')) {
			add_filter('the_content', array('TMM_Layout_Constructor', 'the_content'), 999);
		}

		TMM_Shortcode::register();
	}

	private function __clone() {}

	public static function get_instance() {
		if ( self::$instance === null) {
			self::$instance = new self;
		}

		return self::$instance;
	}


	public static function add_meta_box($post_type) {
		$post_types = array('post', 'page');

		if (class_exists('TMM_Portfolio')) {
			$post_types[] = TMM_Portfolio::$slug;
		}

		if ( in_array( $post_type, $post_types )) {
			add_meta_box(
				'tmm_layout_constructor',
				__("ThemeMakers Layout Constructor", 'tmm_content_composer'),
				array('TMM_Layout_Constructor', 'draw_page_meta_box'),
				$post_type,
				'normal',
				'high'
			);
		}
	}

	public static function admin_enqueue_scripts() {

		wp_deregister_style('tmm_theme_popup');
		wp_deregister_script('tmm_popup');
		wp_dequeue_style('tmm_theme_popup');
		wp_dequeue_script('tmm_popup');

		global $pagenow;
		$screen = get_current_screen();

		echo 'Pagenow='.$pagenow;

		if ( $screen->base === 'toplevel_page_gf_edit_forms' || $pagenow === 'post-new.php' || $pagenow === 'post.php' || $pagenow === 'nav-menus.php' ||  $pagenow === 'widgets.php' || $pagenow == 'customize.php') {
			wp_enqueue_style('tmm_layout_constructor', TMM_CC_URL . 'css/style-lc-admin.css');
			wp_enqueue_script('tmm_popup', TMM_CC_URL . 'js/admin/popup.js', array('jquery'));
			wp_enqueue_script('tmm_colorpicker', TMM_CC_URL . 'js/admin/colorpicker.js', array('jquery'));
			wp_enqueue_script('tmm_shortcodes', TMM_CC_URL . 'js/admin/shortcodes.js', array('jquery'), false, true);


				?>
				<script type="text/javascript">
					var tmm_cc_plugin_url = "<?php echo TMM_CC_URL; ?>";
					var tmm_shortcodes_items_keys = /\[(<?php print join('|', array_keys(TMM_Shortcode::$shortcodes)); ?>)\s?([^\]]*)(?:\s*\/)?\](([^\[\]]*)\[\/\1\])?/g;
					var tmm_ext_shortcodes_items = <?php echo TMM_Shortcode::get_shortcodes_items() ?>;

					if(!window.tmm_lang){
						var tmm_lang = {};
					}

					tmm_lang['loading'] = "<?php _e("Loading ...", 'tmm_content_composer') ?>";
					tmm_lang['close'] = "<?php _e("Close", 'tmm_content_composer') ?>";
					tmm_lang['apply'] = "<?php _e("Apply", 'tmm_content_composer') ?>";
					tmm_lang['shortcode_nooption'] = "<?php _e("There is no options for shortcode!", 'tmm_content_composer') ?>";
					tmm_lang['shortcode_updated'] = "<?php _e("Shortcode updated!", 'tmm_content_composer') ?>";
					tmm_lang['shortcode_insert'] = "<?php _e("Insert Shortcode", 'tmm_content_composer') ?>";
					tmm_lang['shortcode_edit'] = "<?php _e("Edit shortcode", 'tmm_content_composer') ?>";
				</script>
			<?php


		}
		if ( $pagenow === 'post-new.php' || $pagenow === 'post.php' ) {
			wp_enqueue_script('tmm_layout_constructor', TMM_CC_URL . 'js/admin/layout.js', array('jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'jquery-ui-slider'), false, true);

			global $tmm_row_options;
			wp_localize_script('tmm_layout_constructor', 'tmm_cc_row_options', $tmm_row_options);
			?>
			<script type="text/javascript">
				tmm_lang['column_delete'] = "<?php _e("Sure about column deleting?", 'tmm_content_composer') ?>";
				tmm_lang['row_delete'] = "<?php _e("Sure about row deleting?", 'tmm_content_composer') ?>";
				tmm_lang['empty_title'] = "<?php _e("Empty title", 'tmm_content_composer') ?>";
				tmm_lang['column_popup_title'] = "<?php _e("Column content editor", 'tmm_content_composer') ?>";
				tmm_lang['row_popup_title'] = "<?php _e("Section editor", 'tmm_content_composer') ?>";
			</script>
			<?php
		}

	}

	public static function enqueue_scripts() {
		wp_deregister_style('wp-mediaelement');


		wp_enqueue_style('tmm_layout_constructor', TMM_CC_URL . 'css/style-lc.css');

		?>
		<script type="text/javascript">
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			var lang_enter_correctly = "<?php echo esc_js(__('Please enter correct', 'tmm_content_composer')); ?>";
			var lang_sended_succsessfully = "<?php echo esc_js(__('Your message has been sent successfully!', 'tmm_content_composer')); ?>";
			var lang_server_failed = "<?php echo esc_js(__('Server failed. Send later', 'tmm_content_composer')); ?>";
			var capcha_image_url = "<?php echo esc_js(get_template_directory_uri()) ?>/helper/capcha/image.php/";
		</script>
		<?php

		if (!class_exists('TMM')) {

			wp_enqueue_script('tmm_modernizr', TMM_CC_URL . 'js/plugins/min/jquery.modernizr.min.js', array('jquery'), false, true);

			wp_register_script('tmm_tooltipster', TMM_CC_URL . 'js/plugins/min/jquery.tooltipster.min.js', array('jquery'), false, true);   // TODO: concatenate to front.js

			wp_register_script('tmm_progressbar', TMM_CC_URL . 'js/plugins/min/jquery.progressBar.min.js', array('jquery'), false, true);

			wp_enqueue_style('tmm_grid', TMM_CC_URL . 'css/grid.css');

		}

		wp_register_script('tmm_cycle', TMM_CC_URL . 'js/plugins/min/jquery.cycle.min.js', array('jquery'), false, true);

		wp_enqueue_script('tmm_layout_constructor', TMM_CC_URL . 'js/front.min.js', array('jquery'), false, true);
	}

	public static function mce_buttons($buttons) {
		$buttons[] = 'tmm_shortcodes';
		$buttons[] = 'code';
		return $buttons;
	}

	public static function mce_add_plugin($plugin_array) {
		$plugin_array['tmm_tiny_shortcodes'] = TMM_CC_URL . '/js/admin/editor.js';
		return $plugin_array;
	}


	public static function mce_css( $mce_css ) {
		if ( ! empty( $mce_css ) )
			$mce_css .= ',';

		$mce_css .= TMM_CC_URL . '/css/admin-tinymce.css';

		return $mce_css;
	}

	public static function the_layout_content($post_id, $row_type = 'default') {
		TMM_Layout_Constructor::draw_front($post_id, $row_type);
	}

	public static function get_shortcodes_array() {
		return TMM_Shortcode::get_shortcodes_array();
	}

	public static function resize_image($src, $size) {
		if (class_exists('TMM_Helper')) {
			return TMM_Helper::resize_image($src, $size);
		}
		return $src;
	}

	public static function get_post_featured_image($post_id, $size) {
		if (class_exists('TMM_Helper')) {
			return TMM_Helper::get_post_featured_image($post_id, $size);
		}
		$src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'single-post-thumbnail');
		return $src[0];
	}

	public static function display_share_buttons($style, $post_id, $buttons) {
		if (class_exists('TMM_Helper')) {
			TMM_Helper::display_share_buttons($style, $post_id, $buttons);
		}
	}

	public static function get_theme_buttons() {
		if (class_exists('TMM_OptionsHelper')) {
			$buttons = TMM_OptionsHelper::get_theme_buttons();
		}else{
			$buttons = array(
				'default' => __('Default', 'tmm_content_composer'),
				'default-white' => __('Default-white', 'tmm_content_composer')
			);
		}
		return $buttons;
	}

	public static function get_theme_image_sizes()
	{
		$data = array();

		$data['100*80'] = array();
		$data['100*80']['name'] = '100*80';
		$data['100*80']['width'] = 100;
		$data['100*80']['height'] = 80;
		$data['100*80']['crop'] = true;

		$data['125*125'] = array();
		$data['125*125']['name'] = '125*125';
		$data['125*125']['width'] = 125;
		$data['125*125']['height'] = 125;
		$data['125*125']['crop'] = true;

		$data['146*88'] = array();
		$data['146*88']['name'] = '146*88';
		$data['146*88']['width'] = 146;
		$data['146*88']['height'] = 88;
		$data['146*88']['crop'] = true;

		$data['318*244'] = array();
		$data['318*244']['name'] = '318*244';
		$data['318*244']['width'] = 318;
		$data['318*244']['height'] = 244;
		$data['318*244']['crop'] = true;

		$data['350*215'] = array();
		$data['350*215']['name'] = '350*215';
		$data['350*215']['width'] = 350;
		$data['350*215']['height'] = 215;
		$data['350*215']['crop'] = true;

		$data['475*356'] = array();
		$data['475*356']['name'] = '475*356';
		$data['475*356']['width'] = 475;
		$data['475*356']['height'] = 356;
		$data['475*356']['crop'] = true;

		$data['641*448'] = array();
		$data['641*448']['name'] = '641*448';
		$data['641*448']['width'] = 641;
		$data['641*448']['height'] = 448;
		$data['641*448']['crop'] = true;

		$data['730*90'] = array();
		$data['730*90']['name'] = '730*90';
		$data['730*90']['width'] = 730;
		$data['730*90']['height'] = 90;
		$data['730*90']['crop'] = true;

		$data['741*448'] = array();
		$data['741*448']['name'] = '741*448';
		$data['741*448']['width'] = 741;
		$data['741*448']['height'] = 448;
		$data['741*448']['crop'] = true;

		$data['1130*600'] = array();
		$data['1130*600']['name'] = '1130*600';
		$data['1130*600']['width'] = 1130;
		$data['1130*600']['height'] = 600;
		$data['1130*600']['crop'] = true;


		return $data;
	}

	public static function get_theme_buttons_sizes() {
		if (class_exists('TMM_OptionsHelper')) {
			$button_sizes = TMM_OptionsHelper::get_theme_buttons_sizes();
		}else{
			$button_sizes = array(
				'small' => __('Small', 'tmm_content_composer'),
				'middle' => __('Middle', 'tmm_content_composer'),
				'large' => __('Large', 'tmm_content_composer'),
			);
		}
		return $button_sizes;
	}

	public static function get_theme_image_sizes_aliases($min_width = 0, $max_width = 0){

		$sizes = self::get_theme_image_sizes();
		$result = array();

		foreach ($sizes as $key => $value) {

			//filter alias with small sizes
			if ($min_width > 0) {
				if ($value['width'] < $min_width) {
					continue;
				}
			}

			//filter alias with big sizes
			if ($max_width > 0) {
				if ($value['width'] > $max_width) {
					continue;
				}
			}

			$result[$key] = $value['name'];
		}

		//***
		$result = array('' => __('Full size', 'tmm_content_composer')) + $result;

		return $result;

	}

	public static function get_post_categories() {
		$post_categories = array(
			0 => __('All Categories', 'tmm_content_composer')
		);

		$args = 	array(
			'orderby' => 'name',
			'order' => 'ASC',
			'style' => 'list',
			'show_count' => 0,
			'hide_empty' => 0,
			'use_desc_for_title' => 1,
			'child_of' => 0,
			'hierarchical' => true,
			'title_li' => '',
			'show_option_none' => '',
			'number' => NULL,
			'echo' => 0,
			'depth' => 0,
			'current_category' => 0,
			'pad_counts' => 0,
			'taxonomy' => 'category',
			'walker' => 'Walker_Category'
		);

		$categories = get_categories($args);


		foreach ($categories as $value) {
			$post_categories[$value->term_id] = $value->name;
		}

		return $post_categories;
	}

	public static function get_post_tags() {
		$post_tags = array(
			0 => __('All Tags', 'tmm_content_composer')
		);

		$args = array(
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty' => 0,
			'child_of' => 0,
			'hierarchical' => true,
			'number' => NULL
		);

		$tags = get_tags($args);

		foreach ($tags as $value) {
			$post_tags[$value->term_id] = $value->name;
		}

		return $post_tags;
	}

	public static function get_post_sort_array() {
		return array(
			'ID' => 'ID', 'date' => 'date', 'post_date' => 'post_date', 'title' => 'title',
            'post_title' => 'post_title', 'name' => 'name', 'post_name' => 'post_name', 'modified' => 'modified',
            'post_modified' => 'post_modified', 'modified_gmt' => 'modified_gmt', 'post_modified_gmt' => 'post_modified_gmt',
            'menu_order' => 'menu_order', 'parent' => 'parent', 'post_parent' => 'post_parent',
            'rand' => 'rand', 'comment_count' => 'comment_count', 'author' => 'author', 'post_author' => 'post_author'
		);
	}
    
     public static function get_blog_type() {
		return array(
			'blog-classic' => __('Blog Classic', 'tmm_content_composer'),
			'blog-medium' => __('Blog Medium', 'tmm_content_composer'),
			'blog-masonry' => __('Blog Masonry', 'tmm_content_composer'),
			'blog-grid' => __('Blog Grid', 'tmm_content_composer'),
			'blog-grid-overlay' => __('Grid Overlay', 'tmm_content_composer'),
			'blog-grid-layout' => __('Grid Multi Layout', 'tmm_content_composer')
		);
	}

	public static function set_default_value($key, $default_value = '') {
		if (isset($_REQUEST["shortcode_mode_edit"]) AND !empty($_REQUEST["shortcode_mode_edit"])) {
			if (is_array($_REQUEST["shortcode_mode_edit"])) {
				if (isset($_REQUEST["shortcode_mode_edit"][$key])) {
					return $_REQUEST["shortcode_mode_edit"][$key];
				}
			}
		}

		return $default_value;
	}

	public static function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
		$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
		$rgbArray = array();
		if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation.
			$colorVal = hexdec($hexStr);
			$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
			$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
			$rgbArray['blue'] = 0xFF & $colorVal;
		} elseif (strlen($hexStr) == 3) { //if shorthand notation
			$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
			$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
			$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
		} else {
			return false; //Invalid hex color code
		}
		return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
	}

	public static function html_option($data) {
		$css_class = isset($data['css_classes']) ? $data['css_classes'] : '';

		switch ($data['type']) {
			case 'textarea':

				if (!empty($data['title'])) {
					?>
					<h4 class="label" for="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></h4>
					<?php
				}
				?>

				<textarea id="<?php echo $data['id'] ?>" class="js_shortcode_template_changer data-area <?php echo $css_class; ?>" data-shortcode-field="<?php echo $data['shortcode_field'] ?>"><?php echo $data['default_value'] ?></textarea>
				<span class="preset_description"><?php echo $data['description'] ?></span>

				<?php
				break;

			case 'select':
				if (!isset($data['display'])) {
					$data['display'] = 1;
				}

				if (!empty($data['title'])) {
					?>
					<h4 class="label" for="<?php echo isset($data['id']) ? esc_attr($data['id']) : '' ?>"><?php echo esc_html($data['title']); ?></h4>
				<?php
				}

				if (!isset($data['multiple'])) {
					$data['multiple'] = false;
				}

				if (!empty($data['options'])) {
					if ($data['multiple']){
						$default_value = explode(',', $data['default_value']);
					}
					?>
					<select <?php if ($data['multiple']) echo 'multiple'; ?> <?php if ($data['display'] == 0){ ?>style="display: none;"<?php } ?> class="js_shortcode_template_changer data-select <?php echo esc_attr($css_class); ?>" data-shortcode-field="<?php echo esc_attr($data['shortcode_field']); ?>" id="<?php echo isset($data['id']) ? esc_attr($data['id']) : ''; ?>">
						<?php foreach ($data['options'] as $key => $text) {

							$selected = '';
							if ($data['multiple']) {
								foreach ($default_value as $value) {
									if (selected($value, $key)) {
										$selected = selected($value, $key, false);
									}
								}
							}else{
								$selected = selected($data['default_value'], $key, false);
							}
							?>
							<option <?php echo $selected; ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($text); ?></option>

						<?php } ?>
					</select>
					<div class="preset_description"><?php echo esc_html($data['description']); ?></div>
				<?php
				}

				break;

			case 'text':
				?>
				<?php if (!empty($data['title'])): ?>
				<h4 class="label" for="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></h4>
			<?php endif; ?>

				<input type="text" value="<?php echo $data['default_value'] ?>" <?php if (isset($data['placeholder'])): ?>placeholder="<?php echo $data['placeholder'] ?>"<?php endif; ?> class="js_shortcode_template_changer data-input <?php echo $css_class; ?>" data-shortcode-field="<?php echo $data['shortcode_field'] ?>" id="<?php echo $data['id'] ?>" />
				<span class="preset_description"><?php echo $data['description'] ?></span>
				<?php
				break;

			case 'color':
				?>
                <div class="list-item-color" <?php echo (isset($data['display']) && ($data['display']==0)) ? 'style="display:none"' : '' ?>>
					<?php if (!empty($data['title'])): ?>
						<h4 class="label" for="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></h4>
					<?php endif; ?>

					<input type="text" data-shortcode-field="<?php echo $data['shortcode_field'] ?>" value="<?php echo $data['default_value'] ?>" class="bg_hex_color text small js_shortcode_template_changer <?php echo $css_class; ?>" id="<?php echo $data['id'] ?>">
					<div style="<?php echo $data['default_value'] ? 'background-color:'.$data['default_value'].';' : ''; ?>" class="bgpicker"></div>
					<span class="preset_description"><?php echo $data['description'] ?></span>
				</div>
				<?php
				break;

			case 'upload':
			case 'upload_video':
			case 'upload_audio':
				if ($data['type'] === 'upload_video') {
					$type = 'video';
				} else if ($data['type'] === 'upload_audio') {
					$type = 'audio';
				} else {
					$type = 'image';
				}
				?>

				<?php if (!empty($data['title'])): ?>
				<h4 class="label" for="<?php echo esc_attr($data['id']); ?>"><?php echo esc_html($data['title']); ?></h4>
			<?php endif; ?>

				<input type="text" id="<?php echo esc_attr($data['id']); ?>" value="<?php echo esc_attr($data['default_value']); ?>" class="js_shortcode_template_changer data-input data-upload <?php echo esc_attr($css_class); ?>" data-shortcode-field="<?php echo esc_attr($data['shortcode_field']); ?>" />
				<a title="" class="button tmm_button_upload" data-type="<?php echo esc_attr($type); ?>" href="#">
					<?php esc_html_e('Browse', 'tmm_content_composer'); ?>
				</a>
				<span class="preset_description"><?php echo esc_html($data['description']); ?></span>
				<?php
				break;

			case 'checkbox':
				?>
				<div class="radio-holder">
					<input <?php if ($data['is_checked']): ?>checked=""<?php endif; ?> type="checkbox" value="<?php if ($data['is_checked']): ?>1<?php else: ?>0<?php endif; ?>" id="<?php echo $data['id'] ?>" class="js_shortcode_template_changer js_shortcode_checkbox_self_update data-check" data-shortcode-field="<?php echo $data['shortcode_field'] ?>">
					<label for="<?php echo $data['id'] ?>"><span></span><i class="description"><?php if (!empty($data['title'])): ?><?php echo $data['title'] ?><?php endif; ?></i></label>
				</div><!--/ .radio-holder-->
				<?php
				break;

			case 'radio':
				?>
				<?php if (!empty($data['title'])): ?>
				<h4 class="label" for="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></h4>
			<?php endif; ?>
				<div class="radio-holder">
					<?php if (is_array($data['values'])) { ?>
						<?php foreach ($data['values'] as $k => $v) { ?>
							<input <?php checked($v['checked'], 1); ?> type="radio" id="<?php echo $v['id'] ?>" name="<?php echo $data['name'] ?>" value="<?php echo $v['value'] ?>" class="js_shortcode_radio_self_update" />
							<label for="<?php echo $v['id'] ?>" class="label-form"><span></span><?php echo $v['title'] ?></label>
						<?php } ?>
					<?php } ?>

					<input type="hidden" id="<?php echo @$data['hidden_id'] ?>" value="<?php echo $data['value'] ?>" class="js_shortcode_template_changer" data-shortcode-field="<?php echo $data['shortcode_field'] ?>" />
				</div><!--/ .radio-holder-->
				<span class="preset_description"><?php echo $data['description'] ?></span>
				<?php
				break;

			case 'slider':
				?>
				<?php if (!empty($data['title'])): ?>
					<h4 class="label" for="<?php echo esc_attr($data['id']); ?>"><?php echo esc_html($data['title']); ?></h4>
				<?php endif; ?>
				<div class="clearfix ui-slider-item" data-min-value="<?php echo $data['min'] ?>" data-max-value="<?php echo $data['max'] ?>">
					<input type="text" readonly class="range-amount-value" value="<?php echo @$data['default_value'] ?>" />
					<input type="hidden" value="<?php echo $data['default_value'] ?>" class="range-amount-value-hidden" id="<?php echo $data['id'] ?>" />
					<div class="slider-range <?php echo $data['id'] ?>"></div>
				</div>
				<?php if (!empty($data['description'])) { ?>
					<div class="preset_description"><?php echo $data['description'] ?></div>
				<?php } ?>
				<?php
				break;
		}
	}

} 
