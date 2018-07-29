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

	public static function get_video_control_buttons(){
		?>
		<li><a class="bt_play" data-click="pause" href="#"><span><i class="icon-play"></i></span><span><i class="icon-pause-2"></i></span></a></li>
		<li><a class="bt_mute" data-click="mute" href="#"><span><i class="icon-volume-up"></i></span><span><i class="icon-volume-off"></i></span></a></li>
		<?php
	}

	public static function get_video_control_panel(){
		?>
		<div class="video_control_panel">
			<ul class="control_buttons">
				<?php TMM_Layout_Constructor::get_video_control_buttons(); ?>
			</ul>
		</div>
		<?php
	}


	public static function display_rowbg_video($video_options) {

		if (TMM_Layout_Constructor::check_user_agent('mobile')){

			if (isset($video_options['bg_cover']) && !empty($video_options['bg_cover'])){
				?>
				<div style="<?php echo (!empty($video_options['bg_cover'])) ? 'background-image: url(' . $video_options['bg_cover'] . ');' : ''; ?>" class="full-bg-image full-bg-image-scroll"></div>
				<?php
			}

		}else{

			if (isset($video_options['video_url']) AND ! empty($video_options['video_url'])) {

				$mute = $video_options['mute'] ? 1 : 0;
				$loop = $video_options['loop'] ? 1 : 0;

				switch ($video_options['video_type']) {

					case 'youtube':
						$source_code = explode("?v=", $video_options['video_url']);
						$source_code = explode("&", $source_code[1]);
						if (is_array($source_code)) {
							$source_code = $source_code[0];
						}
						?>

						<div class="mb-wrapper">
							<div id="ytplayer" class="fitwidth"></div>
						</div>
						<script>

							var tag = document.createElement('script');
							tag.src = "https://www.youtube.com/player_api";
							var firstScriptTag = document.getElementsByTagName('script')[0];
							firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
							var player,
								playerVars,
								loop = <?php echo $loop ?>;

							if (loop){
								playerVars = {'autoplay': 1, 'controls': 0, 'wmode':'transparent', 'loop': true, 'playlist': '<?php echo $source_code ?>', 'showinfo': 0 }
							} else {
								playerVars = {'autoplay': 1, 'controls': 0, 'wmode':'transparent', 'showinfo': 0 }
							}

							function onYouTubePlayerAPIReady() {
								player = new YT.Player('ytplayer', {
									playerVars: playerVars,
									videoId: '<?php echo $source_code ?>',
									height: '100%',
									width: '100%',
									events: {
										'onReady': onPlayerReady
									}
								});
							}

							function onPlayerReady(event) {
								event.target.playVideo();
								var mute = <?php echo $mute; ?>;
								if (mute == 1){
									event.target.mute();
									jQuery('.bt_mute').attr({'data-click': 'unMute'});
									jQuery('.icon-volume-off').parent('span').hide();
									jQuery('.icon-volume-up').parent('span').show();
								}else{
									jQuery('.icon-volume-off').parent('span').show();
									jQuery('.icon-volume-up').parent('span').hide();
								}

								jQuery('.video_control_panel').show();

								jQuery('.icon-play').parent('span').hide();
								jQuery('.icon-pause-2').parent('span').show();

								jQuery('.bt_play').on('click', function(){
									var $this = jQuery(this),
										attrclick = $this.attr('data-click');

									if (attrclick == 'play'){
										$this.attr({'data-click': 'pause'});
										player.playVideo();
										jQuery('.icon-play').parent('span').hide();
										jQuery('.icon-pause-2').parent('span').show();
									}else{
										$this.attr({'data-click': 'play'});
										player.pauseVideo();
										jQuery('.icon-play').parent('span').show();
										jQuery('.icon-pause-2').parent('span').hide();
									}
									return false;
								});

								jQuery('.bt_mute').on('click', function(){
									var $this = jQuery(this),
										attrclick = $this.attr('data-click');

									if (attrclick == 'mute'){
										$this.attr({'data-click': 'unMute'});
										player.mute();
										jQuery('.icon-volume-off').parent('span').hide();
										jQuery('.icon-volume-up').parent('span').show();
									}else{
										$this.attr({'data-click': 'mute'});
										player.unMute();
										jQuery('.icon-volume-off').parent('span').show();
										jQuery('.icon-volume-up').parent('span').hide();
									}
									return false;
								});
							}

						</script>

						<?php
						break;

					case 'vimeo':
						$source_code = explode("/", $video_options['video_url']);
						if (is_array($source_code)) {
							$source_code = $source_code[count($source_code) - 1];
						}
						?>
						<div class="mb-wrapper">
							<iframe src="https://player.vimeo.com/video/<?php echo $source_code ?>?autoplay=1&loop=<?php echo $loop ?>&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							<script src="https://player.vimeo.com/api/player.js"></script>
						</div><!--/ .mb-wrapper-->
						<script>

							(function($) {
								$(function() {
									var iframe = $('#vimeo_player')[0];
									var player = $f(iframe);
									var status = $('.status');
									var mute = <?php echo $mute; ?>;

									// When the player is ready, add listeners for pause, finish, and playProgress
									player.addEvent('ready', function() {
										if (mute == 1){
											player.api('setVolume', '0');
											$('.bt_mute').attr({'data-click': 'unMute'});
											jQuery('.icon-volume-off').parent('span').hide();
											jQuery('.icon-volume-up').parent('span').show();
										}else{
											jQuery('.icon-volume-off').parent('span').show();
											jQuery('.icon-volume-up').parent('span').hide();
										}
									});

									jQuery('.icon-play').parent('span').hide();
									jQuery('.icon-pause-2').parent('span').show();
									jQuery('.video_control_panel').show();

									$('.bt_play').on('click', function() {
										var $this = $(this),
											attrclick = $(this).attr('data-click');

										if (attrclick == 'play'){
											$this.attr({'data-click': 'pause'});
											player.api('play');
											jQuery('.icon-play').parent('span').hide();
											jQuery('.icon-pause-2').parent('span').show();
										}else{
											$this.attr({'data-click': 'play'});
											player.api('pause');
											jQuery('.icon-play').parent('span').show();
											jQuery('.icon-pause-2').parent('span').hide();
										}
										return false;
									});

									$('.bt_mute').on('click', function() {
										var $this = $(this),
											attrclick = $(this).attr('data-click');

										if (attrclick == 'mute'){
											$this.attr({'data-click': 'unMute'});
											player.api('setVolume', '0');
											jQuery('.icon-volume-off').parent('span').hide();
											jQuery('.icon-volume-up').parent('span').show();
										}else{
											$this.attr({'data-click': 'mute'});
											player.api('setVolume', '1');
											jQuery('.icon-volume-off').parent('span').show();
											jQuery('.icon-volume-up').parent('span').hide();
										}
										return false;
									});

								});
							})(jQuery);

						</script>

						<?php break;

					case 'mp4': ?>
						<div class="mb-wrapper" data-mute="<?php echo $mute ?>" data-loop="<?php echo $loop ?>">
							<video class="mejsVideoBg" width="100%" height="100%" muted="muted">
								<source src="<?php echo $video_options['video_url'] ?>" type='video/mp4' />
							</video>
						</div>
						<?php
						wp_enqueue_script('mediaelement');

						break;

					case 'ogv':
						?>
						<div class="mb-wrapper" data-mute="<?php echo $mute ?>" data-loop="<?php echo $loop ?>">
							<video class="mejsVideoBg" width="100%" height="100%" muted="muted">
								<source src="<?php echo $video_options['video_url'] ?>" type='video/ogg' />
							</video>
						</div>
						<?php
						wp_enqueue_script('mediaelement');

						break;

					case 'webm':
						?>
						<div class="mb-wrapper" data-mute="<?php echo $mute ?>" data-loop="<?php echo $loop ?>">
							<video class="mejsVideoBg" width="100%" height="100%" muted="muted">
								<source src="<?php echo $video_options['video_url'] ?>" type='video/webm' />
							</video>
						</div>
						<?php
						wp_enqueue_script('mediaelement');

						break;

					default:
						$cover = $video_options['bg_cover'];
						$image_size = "2000*1345";
						if (!empty($cover)) {
							?>
							<div class="full-bg-image full-bg-image-scroll" style="background-image: url('<?php echo TMM_Content_Composer::resize_image_cover($cover, $image_size); ?>');"></div>

						<?php
						}else{
							esc_html_e('Unsupported video format', TMM_CC_TEXTDOMAIN);
						}
						break;
				}

				if (isset($video_options['panel']) && $video_options['panel']){

					TMM_Layout_Constructor::get_video_control_panel();

				}

			}
		}

	}

	public static function check_user_agent ( $type = NULL ) {
		$user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
		if ( $type == 'bot' ) {
			if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
				return true;
			}
		} else if ( $type == 'browser' ) {
			if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
				return true;
			}
		} else if ( $type == 'mobile' ) {
			if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
				return true;
			} else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
				return true;
			}
		}
		return false;
	}

}