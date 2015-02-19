<?php
/**
 * Layout Constructor
 */

class TMM_Layout_Constructor {

	public static function get_lc_editor() {
		$content = $_REQUEST['content'];
		$editor_id = $_REQUEST['editor_id'];
		$settings = array(
			'default_editor'   => 'tinymce',
			'dfw'              => true,
			'drag_drop_upload' => false,
			'editor_height'    => 360,
			'tinymce'          => true,
		);
		wp_editor($content, $editor_id, $settings);
		exit;
	}

	public static function the_content($content) {
		if (is_single() || is_page()) {
			global $post;
			$content = $content . self::get_front_html($post->ID);
		}

		return $content;
	}

	public static function draw_front($post_id, $row_displaying) {
		$tmm_layout_constructor = get_post_meta($post_id, 'thememakers_layout_constructor', true);
		if (!empty($tmm_layout_constructor)) {
			$data = array();
			$data['row_displaying'] = $row_displaying;
			$data['tmm_layout_constructor'] = $tmm_layout_constructor;
			$data['tmm_layout_constructor_row'] = get_post_meta($post_id, 'thememakers_layout_constructor_row', true);

			if (!is_array($data['tmm_layout_constructor_row'])) {
				$data['tmm_layout_constructor_row'] = array();
			}

			echo TMM::draw_free_page(TMM_CC_DIR . '/views/front_output.php', $data);
		}
	}

	public static function draw_page_meta_box() {
		$data = array();
		global $post;
		$data['post_id'] = $post->ID;
		$data['tmm_layout_constructor'] = get_post_meta($post->ID, 'thememakers_layout_constructor', true);
		$data['tmm_layout_constructor_row'] = get_post_meta($post->ID, 'thememakers_layout_constructor_row', true);
		echo self::render_html('views/meta_panel.php', $data);
	}

	public static function draw_column_item($col_data) {
		global $post;
		$col_data['post_id'] = $post->ID;
		echo self::render_html('views/column_item.php', $col_data);
	}

	public static function save_post() {
		if (!empty($_POST) && isset($_POST['tmm_layout_constructor'])) {
			global $post;
			unset($_POST['tmm_layout_constructor']['__ROW_ID__']); //unset column html template
			unset($_POST['tmm_layout_constructor_row']['__ROW_ID__']); //unset column html template
			update_post_meta($post->ID, 'thememakers_layout_constructor', $_POST['tmm_layout_constructor']);
			update_post_meta($post->ID, 'thememakers_layout_constructor_row', $_POST['tmm_layout_constructor_row']);
		}
	}

	public static function get_front_html($post_id) {
		$tmm_layout_constructor = get_post_meta($post_id, 'thememakers_layout_constructor', true);
		if (!empty($tmm_layout_constructor)) {
			$data = array();
			$data['row_displaying'] = 'default';
			$data['tmm_layout_constructor'] = $tmm_layout_constructor;
			$data['tmm_layout_constructor_row'] = get_post_meta($post_id, 'thememakers_layout_constructor_row', true);

			if (!is_array($data['tmm_layout_constructor_row'])) {
				$data['tmm_layout_constructor_row'] = array();
			}

			return self::render_html('views/front_output.php', $data);
		}

		return "";
	}

	public static function get_row_bg($tmm_layout_constructor_row, $row) {
		$style = array('style_border' => '', 'style_custom' => '', 'bg_type' => 'default');
		if (isset($tmm_layout_constructor_row[$row])) {
			$data = $tmm_layout_constructor_row[$row];

			if (isset($data['border_color'])) {
				if ($data['border_width'] != 0) {
					$style['style_border'] = 'border-top:' . $data['border_width'] . 'px ' . $data['border_type'] . ' ' . $data['border_color'] . ';' . 'border-bottom:' . $data['border_width'] . 'px ' . $data['border_type'] . ' ' . $data['border_color'] . ';';
				}
			}

			if (isset($data['bg_type'])) {
				switch ($data['bg_type']) {
					case 'custom':
						$style['style_custom_color'] = 'background-color:' . $data['bg_color'] . ' ;' . $style['style_border'];
						$style['style_custom_image'] = 'background-image: url(' . $data['bg_image'] . ');';
						$style['bg_type'] = 'custom';
						break;
					default:
						break;
				}
			}
		}

		return $style;
	}

	public static function render_html($pagepath, $data = array()) {
		$pagepath = TMM_CC_DIR . '/' . $pagepath;
		@extract($data);
		ob_start();
		include($pagepath);
		return ob_get_clean();
	}

	public static function get_video_type($source_url) {
		if (strpos($source_url, 'youtube') > 0) {
			return 'youtube';
		} elseif (strpos($source_url, 'vimeo') > 0) {
			return 'vimeo';
		} elseif (strpos($source_url, '.mp4') > 0) {
			return 'mp4';
		}elseif (strpos($source_url, '.ogv') > 0) {
			return 'ogv';
		}elseif (strpos($source_url, '.webm') > 0) {
			return 'webm';
		}
	}

	public static function display_rowbg_video($video_options) {
		?>
		<?php if (isset($video_options['video_url']) AND ! empty($video_options['video_url'])) {
            
			switch ($video_options['video_type']) {
                
				case 'youtube':
					$source_code = explode("?v=", $video_options['video_url']);
					$source_code = explode("&", $source_code[1]);
					if (is_array($source_code)) {
						$source_code = $source_code[0];
					}
					?>
					<div class="mb-wrapper">
						<iframe  class="fitwidth" type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/<?php echo $source_code ?>?wmode=transparent&autoplay=1&controls=0&loop=1"  allowfullscreen></iframe>
					</div>
					<?php break; 

				case 'vimeo':
                    $source_code = explode("/", $video_options['video_url']);
                    if (is_array($source_code)) {
                        $source_code = $source_code[count($source_code) - 1];
                    }
                    ?>
                    <div class="mb-wrapper">
                        <iframe src="http://player.vimeo.com/video/<?php echo $source_code ?>?autoplay=1&loop=1&portrait=0&controls=0&showinfo=0&autohide=1&rel=0&wmode=transparent"></iframe>
                    </div><!--/ .mb-wrapper-->
				<?php break; 
                
                case 'mp4': ?>
                    <div class="mb-wrapper">
                        <video id="example_video" class="" width="100%" height="100%" >
                            <source src="<?php echo $video_options['video_url'] ?>" type='video/mp4' />
                        </video>
                    </div>
                    <?php
                    wp_enqueue_style('tmm_mediaelement');
                    wp_enqueue_script('mediaelement');
				break;
            
                case 'ogv': ?>
                    <div class="mb-wrapper">
                        <video id="example_video" class="" width="100%" height="100%" >
                            <source src="<?php echo $video_options['video_url'] ?>" type='video/ogg' />
                        </video>
                    </div>
                    <?php
                    wp_enqueue_style('tmm_mediaelement');
                    wp_enqueue_script('mediaelement');
				break;
            
                case 'webm': ?>
                    <div class="mb-wrapper">
                        <video id="example_video" class="" width="100%" height="100%" >
                            <source src="<?php echo $video_options['video_url'] ?>" type='video/webm' />
                        </video>
                    </div>
                    <?php
                    wp_enqueue_style('tmm_mediaelement');
                    wp_enqueue_script('mediaelement');
				break;
            
				default:
					_e('Unsupported video format', TMM_CC_TEXTDOMAIN);
					break;
			}

		}

	}

}