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
				__("ThemeMakers Layout Constructor", TMM_CC_TEXTDOMAIN),
				array('TMM_Layout_Constructor', 'draw_page_meta_box'),
				$post_type,
				'normal',
				'high'
			);
		}
	}

	public static function admin_enqueue_scripts() {
		global $pagenow;

		$screen = get_current_screen();

		if ($screen->base === 'toplevel_page_gf_edit_forms' || $pagenow === 'post-new.php' || $pagenow === 'post.php' || $pagenow === 'nav-menus.php' || $pagenow === 'widgets.php' ) {
			wp_enqueue_style('tmm_popup', TMM_CC_URL . 'css/popup.css');
			wp_enqueue_script('tmm_popup', TMM_CC_URL . 'js/admin/popup.js', array('jquery'));

			wp_enqueue_style('tmm_colorpicker', TMM_CC_URL . 'js/admin/colorpicker/colorpicker.css');
			wp_enqueue_script('tmm_colorpicker', TMM_CC_URL . 'js/admin/colorpicker/colorpicker.js', array('jquery'));

			wp_enqueue_style('tmm_shortcodes', TMM_CC_URL . 'css/shortcodes_admin.css');
			wp_enqueue_script('tmm_shortcodes', TMM_CC_URL . 'js/admin/shortcodes.js', array('jquery'), false, true);

			wp_enqueue_style('tmm_fontello', TMM_CC_URL . 'css/fontello.css');

			?>
			<script type="text/javascript">
				var tmm_cc_plugin_url = "<?php echo esc_js(TMM_CC_URL); ?>";
				var tmm_shortcodes_items_keys = /\[(<?php print join('|', array_keys(TMM_Shortcode::$shortcodes)); ?>)\s?([^\]]*)(?:\s*\/)?\](([^\[\]]*)\[\/\1\])?/g;
				var tmm_ext_shortcodes_items = <?php echo TMM_Shortcode::get_shortcodes_items(); ?>;

				if(!window.tmm_lang){
					var tmm_lang = {};
				}

				tmm_lang['loading'] = "<?php echo esc_js(__("Loading ...", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['close'] = "<?php echo esc_js(__("Close", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['apply'] = "<?php echo esc_js(__("Apply", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['shortcode_nooption'] = "<?php echo esc_js(__("There is no options for shortcode!", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['shortcode_updated'] = "<?php echo esc_js(__("Shortcode updated!", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['shortcode_insert'] = "<?php echo esc_js(__("Insert Shortcode", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['shortcode_edit'] = "<?php echo esc_js(__("Edit shortcode", TMM_CC_TEXTDOMAIN)); ?>";
			</script>
		<?php
		}
		if ( $pagenow === 'post-new.php' || $pagenow === 'post.php' ) {
			wp_enqueue_style('tmm_layout_constructor', TMM_CC_URL . 'css/layout_admin.css');
			wp_enqueue_script('tmm_layout_constructor', TMM_CC_URL . 'js/admin/layout.js', array('jquery', 'jquery-ui-core', 'jquery-ui-sortable'), false, true);

			?>
			<script type="text/javascript">
				tmm_lang['column_delete'] = "<?php echo esc_js(__("Sure about column deleting?", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['row_delete'] = "<?php echo esc_js(__("Sure about row deleting?", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['empty_title'] = "<?php echo esc_js(__("Empty title", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['column_popup_title'] = "<?php echo esc_js(__("Column content editor", TMM_CC_TEXTDOMAIN)); ?>";
				tmm_lang['row_popup_title'] = "<?php echo esc_js(__("Row editor", TMM_CC_TEXTDOMAIN)); ?>";
			</script>
			<?php
		}

	}

	public static function enqueue_scripts() {

		wp_deregister_style('mediaelement');
		wp_deregister_style('wp-mediaelement');
		wp_register_style('tmm_mediaelement', TMM_CC_URL . 'css/mediaelement/mediaelementplayer.css');
		wp_enqueue_style('tmm_fontello', TMM_CC_URL . 'css/fontello.css');

		if (!class_exists('TMM')) {

			wp_enqueue_script('tmm_modernizr', TMM_CC_URL . 'js/plugins/min/jquery.modernizr.min.js', array('jquery'));

			?>
			<script type="text/javascript">
				var ajaxurl = "<?php echo esc_js(admin_url('admin-ajax.php')); ?>";
			</script>
			<?php

			wp_enqueue_style('tmm_grid', TMM_CC_URL . 'css/grid.css');
			wp_enqueue_style('tmm_layout', TMM_CC_URL . 'css/shortcodes_layout.css');
			wp_enqueue_style('tmm_shortcodes', TMM_CC_URL . 'css/shortcodes_front.css');

		}
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

		$mce_css .= TMM_CC_URL . '/css/tinymce.css';

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
				'default' => __('Default', TMM_CC_TEXTDOMAIN),
				'default-white' => __('Default-white', TMM_CC_TEXTDOMAIN)
			);
		}
		return $buttons;
	}

	public static function get_theme_buttons_sizes() {
		if (class_exists('TMM_OptionsHelper')) {
			$button_sizes = TMM_OptionsHelper::get_theme_buttons_sizes();
		}else{
			$button_sizes = array(
				'small' => __('Small', TMM_CC_TEXTDOMAIN),
				'middle' => __('Middle', TMM_CC_TEXTDOMAIN),
				'large' => __('Large', TMM_CC_TEXTDOMAIN),
			);
		}
		return $button_sizes;
	}

	public static function get_post_categories() {
		$post_categories = array(
			0 => __('All Categories', TMM_CC_TEXTDOMAIN)
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
			0 => __('All Tags', TMM_CC_TEXTDOMAIN)
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
			'ID' => 'ID',
			'author' => 'Author',
			'title' => 'Title',
			'name' => 'Name',
			'date' => 'Date',
			'modified' => 'Modified',
			'parent' => 'Parent',
			'rand' => 'Rand',
			'comment_count' => 'Comment Count'
		);
	}

	public static function get_all_menu_items(){
		$all_menu_items = array('none' => '— Custom url —');
		$post_types = get_post_types(array('show_in_nav_menus'=>true), 'names');
		foreach ($post_types as $post_type){
			$args = array(
				'numberposts' => -1,
				'post_type' => $post_type,
				'suppress_filters' => false
			);
			$posts = get_posts($args);
			$post_titles=array();
			foreach ($posts as $post){
				$permalink = get_permalink($post->ID);
				$post_titles[$permalink] = $post->post_title;
			}
			$all_menu_items += $post_titles;
		}
		return $all_menu_items;
	}

	public static function get_def_value($val){
		$def_values = array(
			'left_indent' => '15',
			'right_indent' => '15',
		);
		return $def_values[$val];
	}

	public static function get_blog_type() {
		$types = array(
			'blog-classic' => __('Blog Classic', TMM_CC_TEXTDOMAIN),
			'blog-classic-alt' => __('Blog Classic Alternate', TMM_CC_TEXTDOMAIN),
			'blog-masonry' => __('Blog Masonry', TMM_CC_TEXTDOMAIN),
			'blog-first' => __('Type 1', TMM_CC_TEXTDOMAIN),
			'blog-second' => __('Type 2', TMM_CC_TEXTDOMAIN),
			'blog-third' => __('Type 3', TMM_CC_TEXTDOMAIN),
			'blog-fourth' => __('Type 4', TMM_CC_TEXTDOMAIN)
		);

		if (strpos($_SERVER['HTTP_REFERER'], 'nav-menus.php') !== false) {
			unset($types['blog-masonry']);
		}

		return $types;
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

	public static function html_option($data) {
		$css_class = isset($data['css_classes']) ? $data['css_classes'] : '';

		switch ($data['type']) {
			case 'textarea':

				if (!empty($data['title'])) {
					?>
					<h4 class="label" for="<?php echo esc_attr($data['id']); ?>"><?php echo esc_html($data['title']); ?></h4>
					<?php
				}
				?>

				<textarea id="<?php echo esc_attr($data['id']); ?>" class="js_shortcode_template_changer data-area <?php echo esc_attr($css_class); ?>" data-shortcode-field="<?php echo esc_attr($data['shortcode_field']); ?>"><?php echo esc_html($data['default_value']); ?></textarea>
				<span class="preset_description"><?php echo esc_html($data['description']); ?></span>

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
					<label class="sel">
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
					</label>
					<div class="preset_description"><?php echo $data['description']; ?></div>
					<?php
				}

				break;

			case 'text':
				?>
				<?php if (!empty($data['title'])): ?>
				<h4 class="label" for="<?php echo esc_attr($data['id']); ?>"><?php echo esc_html($data['title']); ?></h4>
			<?php endif; ?>

				<input type="text" value="<?php echo esc_attr($data['default_value']); ?>" <?php if (isset($data['placeholder'])): ?>placeholder="<?php echo esc_attr($data['placeholder']); ?>"<?php endif; ?> class="js_shortcode_template_changer data-input <?php echo esc_attr($css_class); ?>" data-shortcode-field="<?php echo esc_attr($data['shortcode_field']); ?>" id="<?php echo esc_attr($data['id']); ?>" />
				<span class="preset_description"><?php echo $data['description']; ?></span>
				<?php
				break;

			case 'color':
				?>
                <div class="list-item-color" <?php echo (isset($data['display']) && ($data['display']==0)) ? 'style="display:none"' : '' ?>>
					<?php if (!empty($data['title'])): ?>
						<h4 class="label" for="<?php echo esc_attr($data['id']); ?>"><?php echo esc_html($data['title']); ?></h4>
					<?php endif; ?>

					<input type="text" data-shortcode-field="<?php echo esc_attr($data['shortcode_field']); ?>" value="<?php echo esc_attr($data['default_value']); ?>" class="bg_hex_color text small js_shortcode_template_changer <?php echo esc_attr($css_class); ?>" id="<?php echo esc_attr($data['id']); ?>">
					<div style="<?php echo $data['default_value'] ? 'background-color:'.$data['default_value'].';' : ''; ?>" class="bgpicker"></div>
					<span class="preset_description"><?php echo esc_html($data['description']); ?></span>
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
					<?php esc_html_e('Browse', TMM_CC_TEXTDOMAIN); ?>
				</a>
				<span class="preset_description"><?php echo esc_html($data['description']); ?></span>
				<?php
				break;

			case 'checkbox':
				?>
				<div class="radio-holder">
					<input <?php if ($data['is_checked']): ?>checked=""<?php endif; ?> type="checkbox" value="<?php if ($data['is_checked']): ?>1<?php else: ?>0<?php endif; ?>" id="<?php echo esc_attr($data['id']); ?>" class="js_shortcode_template_changer js_shortcode_checkbox_self_update data-check" data-shortcode-field="<?php echo esc_attr($data['shortcode_field']); ?>">
					<label for="<?php echo esc_attr($data['id']); ?>"><span></span><i class="description"><?php if (!empty($data['title'])): ?><?php echo esc_html($data['title']); ?><?php endif; ?></i></label>
				</div><!--/ .radio-holder-->
				<?php
				break;

			case 'radio':
				?>
				<?php if (!empty($data['title'])): ?>
				<h4 class="label" for="<?php echo esc_attr($data['id']); ?>"><?php echo esc_html($data['title']); ?></h4>
			<?php endif; ?>

				<div class="radio-holder">
					<input <?php if ($data['values'][0]['checked'] == 1): ?>checked=""<?php endif; ?> type="radio" name="<?php echo esc_attr($data['name']); ?>" id="<?php echo esc_attr($data['values'][0]['id']); ?>" value="<?php echo esc_attr($data['values'][0]['value']); ?>" class="js_shortcode_radio_self_update" />
					<label for="<?php echo esc_attr($data['values'][0]['id']); ?>" class="label-form"><span></span><?php echo esc_attr($data['values'][0]['title']); ?></label>

					<input <?php if ($data['values'][1]['checked'] == 1): ?>checked=""<?php endif; ?> type="radio" name="<?php echo esc_attr($data['name']); ?>" id="<?php echo esc_attr($data['values'][1]['id']); ?>" value="<?php echo esc_attr($data['values'][1]['value']); ?>" class="js_shortcode_radio_self_update" />
					<label for="<?php echo esc_attr($data['values'][1]['id']); ?>" class="label-form"><span></span><?php echo esc_html($data['values'][1]['title']); ?></label>

					<input type="hidden" id="<?php echo esc_attr(@$data['hidden_id']); ?>" value="<?php echo esc_attr($data['value']); ?>" class="js_shortcode_template_changer" data-shortcode-field="<?php echo esc_attr($data['shortcode_field']); ?>" />
				</div><!--/ .radio-holder-->
				<span class="preset_description"><?php echo esc_html($data['description']); ?></span>
				<?php
				break;

			case 'slider':
				?>

				<input data-default-value="<?php echo esc_attr(@$data['default_value']); ?>" type="text" id="<?php echo esc_attr($data['id']); ?>" name="<?php echo esc_attr($data['name']); ?>" value="<?php echo esc_attr($data['value']); ?>" data-min-value="<?php echo esc_attr($data['min']); ?>" data-max-value="<?php echo esc_attr($data['max']); ?>" class="ui_slider_item" />

				<span class="preset_description"><?php echo esc_html($data['description']); ?></span>

				<?php
				break;
		}
	}

}
