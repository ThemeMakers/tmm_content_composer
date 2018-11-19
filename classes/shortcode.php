<?php
/**
 * Shortcodes Package
 */

class TMM_Shortcode {
	public static $shortcodes = array();
	public static $shortcodes_folders = array();
	public static $shortcodes_keys_by_folders = array();
	public static $external_shortcodes = array(); // other plugins shortcodes

	public static function register() {

		self::$external_shortcodes = array(
			'woocommerce' => 1,
			'seamless-donations' => 1,
			'tmm_events_calendar' => 1,
		);

		//collect shortcodes from folder "views"
		$handler = opendir(TMM_CC_DIR . "views/shortcodes/");
		while ($file = readdir($handler)) {
			if ($file != "." AND $file != "..") {

				if (isset(self::$external_shortcodes[$file])) {

					if($file === 'woocommerce' && !class_exists('WooCommerce')){
						continue;
					}

					if($file === 'seamless-donations' && !function_exists('dgx_donate_init')){
						continue;
					}

					if($file === 'tmm_events_calendar' && !class_exists('TMM_EventsPlugin')){
						continue;
					}

				} else if ($file !== 'default' && !class_exists('TMM')) {
					continue;
				}

				self::$shortcodes_folders[] = $file;
			}
		}

		$shortcodes = self::get_shortcodes_array();
		if (!empty($shortcodes)) {
			foreach ($shortcodes as $value) {
				$name = str_replace(array('tmm_', '_'), ' ', $value);
				$name = ucfirst(trim($name));

				self::$shortcodes[$value] = $name;
			}
		}

		self::$shortcodes['price_table'] = __('Price table', TMM_CC_TEXTDOMAIN);
		self::$shortcodes['google_table_row'] = __('Google table row', TMM_CC_TEXTDOMAIN);

		$shortcodes_keys = array_keys(self::$shortcodes);

		function tmm_do_shortcode($atts, $content = '', $shortcode_key) {
			if (is_array($atts) && isset($atts['content'])) {
				$atts["content"] = $content;
			}

			if (!is_array($atts)) {
				$atts = array();
				$atts["content"] = $content;
			}

			$atts["content"] = $content;

			if (isset($_REQUEST["shortcode_mode_edit"])) {
				$_REQUEST["shortcode_mode_edit"] = $atts;
			} else {
				return TMM_Shortcode::draw_html($shortcode_key, $atts);
			}
		}

		foreach ($shortcodes_keys as $shortcode_key) {
			$_REQUEST["shortcode_key"] = $shortcode_key;
			add_shortcode($shortcode_key, 'tmm_do_shortcode');
		}
	}

	public static function get_shortcodes_items() {
		$continue_array = array('google_table_row', 'price_table', 'pricing_tables', 'services');
		$result = array();

		global $pagenow;
		if ($pagenow != 'nav-menus.php'){
			$continue_array[] = 'menu';
		}
		if ($pagenow == 'nav-menus.php'){
			$continue_array = array('accordion', 'alert',
				'blockquote', 'button',
				'chart', 'divider',
				'dropcap', 'google_map',
				'google_table', 'highlight',
				'image', 'list',
				'our_contacts', 'socialicons',
				'tabs', 'testimonials',
				'title', 'tmm_audio',
				'tmm_video', 'tooltip',
				'archives', 'contact_form',
				'featured-boxes', 'slider',
				'google_table_row', 'price_table',
				'pricing_tables', 'services',
				'tmm_donate', 'tmm_events_list',
				'tmm_events_calendar',
			);
		}

		foreach (self::$shortcodes as $shortcode_key => $shortcode_name){

			if (in_array($shortcode_key, $continue_array)) {
				continue;
			}

			$result[] = array(
				'key' => $shortcode_key,
				'name' => $shortcode_name,
				'icon' => self::get_shortcode_icon($shortcode_key),
			);
		}

		return json_encode($result);
	}

	public static function draw_html($shortcode_key, $attributes = array()) {
		return self::render_html("views/shortcodes/" . self::get_shortcode_key_folder($shortcode_key) . "/" . $shortcode_key . ".php", $attributes);
	}

	public static function get_shortcode_icon($shortcode) {
		$icon_url = TMM_CC_URL . 'images/icons/' . $shortcode . '.png';
		if (file_exists(TMM_CC_DIR . 'images/icons/' . $shortcode . '.png')) {
			return $icon_url;
		}

		return TMM_CC_URL . 'images/icons/shortcode.png';
	}

	public static function get_shortcodes_array() {
		$results = array();

		foreach (self::$shortcodes_folders as $shortcode_folder) {
			$handler = opendir(TMM_CC_DIR . "views/shortcodes/" . $shortcode_folder . "/popups/");
			while ($file = readdir($handler)) {
				if ($file != "." AND $file != "..") {
					$results[] = $file;
				}
			}

			foreach ($results as $key => $value) {
				$value = explode(".", $value);
				if (!empty($value[0])) {
					$results[$key] = $value[0];
					self::$shortcodes_keys_by_folders[$shortcode_folder][] = $value[0];
				}
			}
			$results = array();
		}

		self::$shortcodes_keys_by_folders['default'][] = 'price_table';
		self::$shortcodes_keys_by_folders['default'][] = 'google_table_row';


		$results = array();
		$results_ext = array();
		if (!empty(self::$shortcodes_keys_by_folders)) {
			foreach (self::$shortcodes_keys_by_folders as $key => $value) {
				if ( isset(self::$external_shortcodes[$key]) ) {
					$results_ext = array_merge($results_ext, $value);
				} else {
					$results = array_merge($results, $value);
				}
			}
		}

		usort($results, array('TMM_Shortcode','usort'));

		$results = array_merge($results, $results_ext);

		return $results;
	}

	public static function usort($a, $b){
		if(strpos($a, 'tmm_') === 0){
			$a = str_replace('tmm_', '', $a);
		}
		if(strpos($b, 'tmm_') === 0){
			$b = str_replace('tmm_', '', $b);
		}
		return ($a < $b) ? -1 : 1;
	}

	//ajax
	public static function get_shortcode_template() {
		$data = array();
		if ($_REQUEST['mode'] == 'edit') {
			$_REQUEST['shortcode_mode_edit'] = array();
			$_REQUEST['shortcode_text'] = str_replace("\'", "'", $_REQUEST['shortcode_text']);
			$_REQUEST['shortcode_text'] = str_replace('\"', '"', $_REQUEST['shortcode_text']);
			do_shortcode($_REQUEST['shortcode_text']);
		}
		//***
		echo self::render_html('views/shortcodes/' . self::get_shortcode_key_folder($_REQUEST['shortcode_name']) . '/popups/' . $_REQUEST['shortcode_name'] . ".php", $data);
		exit;
	}

	public static function set_post_fonts() {
		$fonts = array();
		$pattern = '/font_family="([a-zA-Z ]*)"/i';
		$text = isset($_POST['content']) ? $_POST['content'] : '';
		$post_id = isset($_POST['post_ID']) ? $_POST['post_ID'] : 0;

		if(isset($_POST['tmm_layout_constructor']) && is_array($_POST['tmm_layout_constructor'])){
			foreach($_POST['tmm_layout_constructor'] as $row){
				if(is_array($row)){
					foreach($row as $column){
						if(is_array($column) && isset($column['content'])){
							$text .= $column['content'];
						}
					}
				}
			}
		}

		if (!empty($text) && !empty($post_id)) {
			$text = stripslashes($text);
			preg_match_all($pattern, $text, $fonts);
		}

		if(!empty($fonts) && !empty($fonts[1])){
			$result = serialize($fonts[1]);
		}else{
			$result = '';
		}

		update_post_meta($post_id, 'tmm_google_fonts', $result);
	}

	public static function get_shortcode_key_folder($shortcode_key) {
		foreach (self::$shortcodes_keys_by_folders as $folder => $shortcodes_keys) {
			if (in_array($shortcode_key, $shortcodes_keys)) {
				return $folder;
			}
		}
	}

	public static function render_html($pagepath, $data = array()) {
		$pagepath = TMM_CC_DIR . $pagepath;
		@extract($data);
		ob_start();
		include($pagepath);
		return ob_get_clean();
	}

	public static function remove_empty_tags($content){
		$tags = array(
			'<p>[' => '[',
			']</p>' => ']',
			']<br>' => ']',
			']<br />' => ']'
		);

		$content = strtr($content, $tags);
		return $content;
	}

}