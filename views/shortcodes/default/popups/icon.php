<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->
	

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('URL', 'tmm_content_composer'),
			'shortcode_field' => 'url',
			'id' => 'url',
			'default_value' => TMM_Content_Composer::set_default_value('url', ''),
			'description' => __('Example: ', 'tmm_content_composer') . 'http://forums.webtemplatemasters.com/'
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">

		<?php

		$icon_css_class = TMM_Content_Composer::set_default_value('icon_css_class', 'icon-html5');
		?>	

		<input type="hidden" class="js_shortcode_template_changer" data-shortcode-field="icon_css_class" id="chooced_icon_type" value="<?php echo $icon_css_class ?>" />				
	
		
		<?php
		$icon_groups = array(
			'Fontelico' => __('Fontelico', 'tmm_content_composer'),
			'Font_Awesome' => __('Font Awesome', 'tmm_content_composer'),
			'Entypo' => __('Entypo', 'tmm_content_composer'),
			'Typicons' => __('Typicons', 'tmm_content_composer'),
			'Iconic' => __('Iconic', 'tmm_content_composer'),
			'New_Icons' => __('New Icons', 'tmm_content_composer'),
			'Web_Application_Icons' => __('Web Application Icons', 'tmm_content_composer'),
			'Text_Editor_Icons' => __('Text Editor Icons', 'tmm_content_composer'),
			'Directional_Icons' => __('Directional Icons', 'tmm_content_composer'),
			'Video_Player_Icons' => __('Video Player Icons', 'tmm_content_composer'),
			'Brand_Icons' => __('Brand Icons', 'tmm_content_composer'),
			'Medical_Icons' => __('Medical Icons', 'tmm_content_composer'),
		);

		$view_icon_group = TMM_Content_Composer::set_default_value('view_icon_group', 'New_Icons');
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('View icon group', 'tmm_content_composer'),
			'shortcode_field' => 'view_icon_group',
			'id' => 'view_icon_group',
			'options' => $icon_groups,
			'default_value' => $view_icon_group,
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->
	
	
	<div class="one-half">
		
	<?php
	TMM_Content_Composer::html_option(array(
		'type' => 'textarea',
		'title' => __('Optional Text', 'tmm_content_composer'),
		'shortcode_field' => 'text',
		'id' => 'url',
		'default_value' => TMM_Content_Composer::set_default_value('text', ''),
		'description' => ''
	));
	?>
		
	</div>

	<div class="fullwidth">

		<?php
		$icons_array = array();

		$fontelico = $icons_array['fontelico'] = array(
			'icon-emo-wink2',
			'icon-emo-unhappy',
			'icon-emo-sleep',
			'icon-emo-thumbsup',
			'icon-emo-devil',
			'icon-emo-surprised',
			'icon-emo-tongue',
			'icon-emo-coffee',
			'icon-emo-sunglasses',
			'icon-emo-displeased',
			'icon-emo-beer',
			'icon-emo-grin',
			'icon-emo-angry',
			'icon-emo-saint',
			'icon-emo-cry',
			'icon-emo-shoot',
			'icon-emo-squint',
			'icon-emo-laugh',
			'icon-spin1',
			'icon-spin2',
			'icon-spin3',
			'icon-spin4',
			'icon-spin5',
			'icon-spin6',
			'icon-firefox',
			'icon-chrome',
			'icon-opera',
			'icon-ie',
			'icon-crown',
			'icon-crown-plus',
			'icon-crown-minus',
			'icon-marquee'
		);

		$fontelico = $icons_array['fontelico'] = array_combine($fontelico, $fontelico);

		$font_awesome = $icons_array['font_awesome'] = array(
			'icon-glass',
			'icon-music',
			'icon-search',
			'icon-mail',
			'icon-mail-alt',
			'icon-heart',
			'icon-heart-empty',
			'icon-star',
			'icon-star-empty',
			'icon-star-half',
			'icon-star-half-alt',
			'icon-user',
			'icon-users',
			'icon-male',
			'icon-female',
			'icon-video',
			'icon-videocam',
			'icon-picture',
			'icon-camera',
			'icon-camera-alt',
			'icon-th-large',
			'icon-th',
			'icon-th-list',
			'icon-ok',
			'icon-ok-circled',
			'icon-ok-circled2',
			'icon-ok-squared',
			'icon-cancel',
			'icon-cancel-circled',
			'icon-cancel-circled2',
			'icon-plus',
			'icon-plus-circled',
			'icon-plus-squared',
			'icon-plus-squared-alt',
			'icon-minus',
			'icon-minus-circled',
			'icon-minus-squared',
			'icon-minus-squared-alt',
			'icon-help',
			'icon-help-circled',
			'icon-info-circled',
			'icon-info',
			'icon-home',
			'icon-link',
			'icon-unlink',
			'icon-link-ext',
			'icon-link-ext-alt',
			'icon-attach',
			'icon-lock',
			'icon-lock-open',
			'icon-lock-open-alt',
			'icon-pin',
			'icon-eye',
			'icon-eye-off',
			'icon-tag',
			'icon-tags',
			'icon-bookmark',
			'icon-bookmark-empty',
			'icon-flag',
			'icon-flag-empty',
			'icon-flag-checkered',
			'icon-thumbs-up',
			'icon-thumbs-down',
			'icon-thumbs-up-alt',
			'icon-thumbs-down-alt',
			'icon-download',
			'icon-upload',
			'icon-download-cloud',
			'icon-upload-cloud',
			'icon-reply',
			'icon-reply-all',
			'icon-forward',
			'icon-quote-left',
			'icon-quote-right',
			'icon-code',
			'icon-export',
			'icon-export-alt',
			'icon-pencil',
			'icon-pencil-squared',
			'icon-edit',
			'icon-print',
			'icon-retweet',
			'icon-keyboard',
			'icon-gamepad',
			'icon-comment',
			'icon-chat',
			'icon-comment-empty',
			'icon-chat-empty',
			'icon-bell',
			'icon-bell-alt',
			'icon-attention-alt',
			'icon-attention',
			'icon-attention-circled',
			'icon-location',
			'icon-direction',
			'icon-compass',
			'icon-trash',
			'icon-doc',
			'icon-docs',
			'icon-doc-text',
			'icon-doc-inv',
			'icon-doc-text-inv',
			'icon-folder',
			'icon-folder-open',
			'icon-folder-empty',
			'icon-folder-open-empty',
			'icon-box',
			'icon-rss',
			'icon-rss-squared',
			'icon-phone',
			'icon-phone-squared',
			'icon-menu',
			'icon-cog',
			'icon-cog-alt',
			'icon-wrench',
			'icon-basket',
			'icon-calendar',
			'icon-calendar-empty',
			'icon-login',
			'icon-logout',
			'icon-mic',
			'icon-mute',
			'icon-volume-off',
			'icon-volume-down',
			'icon-volume-up',
			'icon-headphones',
			'icon-clock',
			'icon-lightbulb',
			'icon-block',
			'icon-resize-full',
			'icon-resize-full-alt',
			'icon-resize-small',
			'icon-resize-vertical',
			'icon-resize-horizontal',
			'icon-move',
			'icon-zoom-in',
			'icon-zoom-out',
			'icon-down-circled2',
			'icon-up-circled2',
			'icon-left-circled2',
			'icon-right-circled2',
			'icon-down-dir',
			'icon-up-dir',
			'icon-left-dir',
			'icon-right-dir',
			'icon-down-open',
			'icon-left-open',
			'icon-right-open',
			'icon-up-open',
			'icon-angle-left',
			'icon-angle-right',
			'icon-angle-up',
			'icon-angle-down',
			'icon-angle-circled-left',
			'icon-angle-circled-up',
			'icon-angle-circled-down',
			'icon-angle-double-left',
			'icon-angle-double-right',
			'icon-angle-double-up',
			'icon-angle-double-down',
			'icon-down',
			'icon-left',
			'icon-right',
			'icon-up',
			'icon-down-big',
			'icon-left-big',
			'icon-right-big',
			'icon-up-big',
			'icon-right-hand',
			'icon-emo-wink',
			'icon-up-hand',
			'icon-down-hand',
			'icon-left-circled',
			'icon-right-circled',
			'icon-up-circled',
			'icon-down-circled',
			'icon-cw',
			'icon-ccw',
			'icon-arrows-cw',
			'icon-level-up',
			'icon-level-down',
			'icon-shuffle',
			'icon-exchange',
			'icon-expand',
			'icon-collapse',
			'icon-expand-right',
			'icon-collapse-left',
			'icon-play',
			'icon-play-circled',
			'icon-play-circled2',
			'icon-stop',
			'icon-pause',
			'icon-to-end',
			'icon-to-end-alt',
			'icon-to-start',
			'icon-to-start-alt',
			'icon-fast-fw',
			'icon-fast-bw',
			'icon-eject',
			'icon-target',
			'icon-signal',
			'icon-award',
			'icon-desktop',
			'icon-laptop',
			'icon-tablet',
			'icon-mobile',
			'icon-inbox',
			'icon-globe',
			'icon-sun',
			'icon-cloud',
			'icon-flash',
			'icon-moon',
			'icon-umbrella',
			'icon-flight',
			'icon-fighter-jet',
			'icon-leaf',
			'icon-font',
			'icon-bold',
			'icon-italic',
			'icon-text-height',
			'icon-text-width',
			'icon-align-left',
			'icon-align-center',
			'icon-align-right',
			'icon-align-justify',
			'icon-list',
			'icon-indent-left',
			'icon-indent-right',
			'icon-list-bullet',
			'icon-list-numbered',
			'icon-strike',
			'icon-underline',
			'icon-superscript',
			'icon-subscript',
			'icon-table',
			'icon-columns',
			'icon-crop',
			'icon-scissors',
			'icon-paste',
			'icon-briefcase',
			'icon-suitcase',
			'icon-ellipsis',
			'icon-ellipsis-vert',
			'icon-off',
			'icon-road',
			'icon-list-alt',
			'icon-qrcode',
			'icon-barcode',
			'icon-book',
			'icon-ajust',
			'icon-tint',
			'icon-check',
			'icon-check-empty',
			'icon-circle',
			'icon-circle-empty',
			'icon-dot-circled',
			'icon-asterisk',
			'icon-gift',
			'icon-fire',
			'icon-magnet',
			'icon-chart-bar',
			'icon-ticket',
			'icon-credit-card',
			'icon-floppy',
			'icon-megaphone',
			'icon-hdd',
			'icon-key',
			'icon-fork',
			'icon-rocket',
			'icon-bug',
			'icon-certificate',
			'icon-tasks',
			'icon-filter',
			'icon-beaker',
			'icon-magic',
			'icon-truck',
			'icon-money',
			'icon-euro',
			'icon-pound',
			'icon-dollar',
			'icon-rupee',
			'icon-yen',
			'icon-rouble',
			'icon-try',
			'icon-won',
			'icon-bitcoin',
			'icon-sort',
			'icon-sort-down',
			'icon-sort-up',
			'icon-sort-alt-up',
			'icon-sort-alt-down',
			'icon-sort-name-up',
			'icon-sort-name-down',
			'icon-sort-number-up',
			'icon-sort-number-down',
			'icon-hammer',
			'icon-gauge',
			'icon-sitemap',
			'icon-spinner',
			'icon-coffee',
			'icon-food',
			'icon-beer',
			'icon-user-md',
			'icon-stethoscope',
			'icon-ambulance',
			'icon-medkit',
			'icon-h-sigh',
			'icon-hospital',
			'icon-building',
			'icon-smile',
			'icon-frown',
			'icon-meh',
			'icon-anchor',
			'icon-terminal',
			'icon-eraser',
			'icon-puzzle',
			'icon-shield',
			'icon-extinguisher',
			'icon-bullseye',
			'icon-wheelchair',
			'icon-adn',
			'icon-android',
			'icon-apple',
			'icon-bitbucket',
			'icon-bitbucket-squared',
			'icon-css3',
			'icon-dribbble',
			'icon-dropbox',
			'icon-facebook',
			'icon-facebook-squared',
			'icon-flickr',
			'icon-foursquare',
			'icon-github',
			'icon-github-squared',
			'icon-github-circled',
			'icon-gittip',
			'icon-gplus-squared',
			'icon-gplus',
			'icon-html5',
			'icon-instagramm',
			'icon-linkedin-squared',
			'icon-linux',
			'icon-linkedin',
			'icon-maxcdn',
			'icon-pagelines',
			'icon-pinterest-circled',
			'icon-pinterest-squared',
			'icon-renren',
			'icon-skype',
			'icon-stackexchange',
			'icon-stackoverflow',
			'icon-trello',
			'icon-tumblr',
			'icon-tumblr-squared',
			'icon-twitter-squared',
			'icon-twitter',
			'icon-vimeo-squared',
			'icon-vkontakte',
			'icon-weibo',
			'icon-windows',
			'icon-xing',
			'icon-xing-squared',
			'icon-youtube',
			'icon-youtube-squared',
			'icon-youtube-play',
			'icon-blank',
			'icon-lemon'
		);

		$font_awesome = $icons_array['font_awesome'] = array_combine($font_awesome, $font_awesome);

		$entypo = $icons_array['entypo'] = array(
			'icon-note',
			'icon-note-beamed',
			'icon-music-1',
			'icon-search-1',
			'icon-flashlight',
			'icon-mail-1',
			'icon-heart-1',
			'icon-heart-empty-1',
			'icon-star-1',
			'icon-star-empty-1',
			'icon-user-1',
			'icon-users-1',
			'icon-user-add',
			'icon-video-1',
			'icon-picture-1',
			'icon-camera-1',
			'icon-layout',
			'icon-menu-1',
			'icon-check-1',
			'icon-cancel-1',
			'icon-cancel-circled-1',
			'icon-cancel-squared',
			'icon-plus-1',
			'icon-plus-circled-1',
			'icon-plus-squared-1',
			'icon-minus-1',
			'icon-minus-circled-1',
			'icon-minus-squared-1',
			'icon-help-1',
			'icon-help-circled-1',
			'icon-info-1',
			'icon-info-circled-1',
			'icon-back',
			'icon-home-1',
			'icon-link-1',
			'icon-attach-1',
			'icon-lock-1',
			'icon-lock-open-1',
			'icon-eye-1',
			'icon-tag-1',
			'icon-bookmark-1',
			'icon-bookmarks',
			'icon-flag-1',
			'icon-thumbs-up-1',
			'icon-thumbs-down-1',
			'icon-download-1',
			'icon-upload-1',
			'icon-upload-cloud-1',
			'icon-reply-1',
			'icon-reply-all-1',
			'icon-forward-1',
			'icon-quote',
			'icon-code-1',
			'icon-export-1',
			'icon-pencil-1',
			'icon-feather',
			'icon-print-1',
			'icon-retweet-1',
			'icon-keyboard-1',
			'icon-comment-1',
			'icon-chat-1',
			'icon-bell-1',
			'icon-attention-1',
			'icon-alert',
			'icon-vcard',
			'icon-address',
			'icon-location-1',
			'icon-map',
			'icon-direction-1',
			'icon-compass-1',
			'icon-cup',
			'icon-trash-1',
			'icon-doc-1',
			'icon-docs-1',
			'icon-doc-landscape',
			'icon-doc-text-1',
			'icon-doc-text-inv-1',
			'icon-newspaper',
			'icon-book-open',
			'icon-book-1',
			'icon-folder-1',
			'icon-archive',
			'icon-box-1',
			'icon-rss-1',
			'icon-phone-1',
			'icon-cog-1',
			'icon-tools',
			'icon-share',
			'icon-shareable',
			'icon-basket-1',
			'icon-bag',
			'icon-calendar-1',
			'icon-login-1',
			'icon-logout-1',
			'icon-mic-1',
			'icon-mute-1',
			'icon-sound',
			'icon-volume',
			'icon-clock-1',
			'icon-hourglass',
			'icon-lamp',
			'icon-light-down',
			'icon-light-up',
			'icon-adjust',
			'icon-block-1',
			'icon-resize-full-1',
			'icon-resize-small-1',
			'icon-popup',
			'icon-publish',
			'icon-window',
			'icon-arrow-combo',
			'icon-down-circled-1',
			'icon-left-circled-1',
			'icon-right-circled-1',
			'icon-up-circled-1',
			'icon-down-open-1',
			'icon-left-open-1',
			'icon-right-open-1',
			'icon-up-open-1',
			'icon-down-open-mini',
			'icon-left-open-mini',
			'icon-right-open-mini',
			'icon-up-open-mini',
			'icon-down-open-big',
			'icon-left-open-big',
			'icon-right-open-big',
			'icon-up-open-big',
			'icon-down-1',
			'icon-left-1',
			'icon-right-1',
			'icon-up-1',
			'icon-down-dir-1',
			'icon-left-dir-1',
			'icon-right-dir-1',
			'icon-down-dir-1',
			'icon-up-dir-1',
			'icon-down-bold',
			'icon-left-bold',
			'icon-right-bold',
			'icon-up-bold',
			'icon-down-thin',
			'icon-left-thin',
			'icon-right-thin',
			'icon-up-thin',
			'icon-ccw-1',
			'icon-cw-1',
			'icon-arrows-ccw',
			'icon-level-down-1',
			'icon-level-up-1',
			'icon-shuffle-1',
			'icon-loop',
			'icon-switch',
			'icon-play-1',
			'icon-stop-1',
			'icon-pause-1',
			'icon-record',
			'icon-to-end-1',
			'icon-to-start-1',
			'icon-fast-forward',
			'icon-fast-backward',
			'icon-progress-0',
			'icon-progress-1',
			'icon-progress-2',
			'icon-progress-3',
			'icon-target-1',
			'icon-palette',
			'icon-list-1',
			'icon-list-add',
			'icon-signal-1',
			'icon-trophy',
			'icon-battery',
			'icon-back-in-time',
			'icon-monitor',
			'icon-mobile-1',
			'icon-network',
			'icon-cd',
			'icon-inbox-1',
			'icon-install',
			'icon-globe-1',
			'icon-cloud-1',
			'icon-cloud-thunder',
			'icon-flash-1',
			'icon-moon-1',
			'icon-flight-1',
			'icon-paper-plane',
			'icon-leaf-1',
			'icon-lifebuoy',
			'icon-mouse',
			'icon-briefcase-1',
			'icon-suitcase-1',
			'icon-dot',
			'icon-dot-2',
			'icon-dot-3',
			'icon-brush',
			'icon-magnet-1',
			'icon-infinity',
			'icon-erase',
			'icon-chart-pie',
			'icon-chart-line',
			'icon-chart-bar-1',
			'icon-chart-area',
			'icon-tape',
			'icon-graduation-cap',
			'icon-language',
			'icon-ticket-1',
			'icon-water',
			'icon-droplet',
			'icon-air',
			'icon-credit-card-1',
			'icon-floppy-1',
			'icon-clipboard',
			'icon-megaphone-1',
			'icon-database',
			'icon-drive',
			'icon-bucket',
			'icon-thermometer',
			'icon-key-1',
			'icon-flow-cascade',
			'icon-flow-branch',
			'icon-flow-tree',
			'icon-flow-line',
			'icon-flow-parallel',
			'icon-rocket-1',
			'icon-gauge-1',
			'icon-traffic-cone',
			'icon-cc',
			'icon-cc-by',
			'icon-cc-nc',
			'icon-cc-nc-eu',
			'icon-cc-nc-jp',
			'icon-cc-sa',
			'icon-cc-nd',
			'icon-cc-pd',
			'icon-cc-zero',
			'icon-cc-share',
			'icon-cc-remix',
			'icon-github-1',
			'icon-github-circled-1',
			'icon-flickr-1',
			'icon-flickr-circled',
			'icon-vimeo',
			'icon-vimeo-circled',
			'icon-twitter-1',
			'icon-twitter-circled',
			'icon-facebook-1',
			'icon-facebook-circled',
			'icon-facebook-squared-1',
			'icon-gplus-1',
			'icon-gplus-circled',
			'icon-pinterest',
			'icon-pinterest-circled-1',
			'icon-tumblr-1',
			'icon-tumblr-circled',
			'icon-linkedin-1',
			'icon-linkedin-circled',
			'icon-dribbble-1',
			'icon-dribbble-circled',
			'icon-stumbleupon',
			'icon-stumbleupon-circled',
			'icon-lastfm',
			'icon-lastfm-circled',
			'icon-rdio',
			'icon-rdio-circled',
			'icon-spotify',
			'icon-spotify-circled',
			'icon-qq',
			'icon-instagram',
			'icon-dropbox-1',
			'icon-evernote',
			'icon-flattr',
			'icon-skype-1',
			'icon-skype-circled',
			'icon-renren-1',
			'icon-sina-weibo',
			'icon-paypal',
			'icon-picasa',
			'icon-soundcloud',
			'icon-mixi',
			'icon-behance',
			'icon-google-circles',
			'icon-vkontakte-1',
			'icon-smashing',
			'icon-sweden',
			'icon-db-shape',
			'icon-logo-db'
		);

		$entypo = $icons_array['entypo'] = array_combine($entypo, $entypo);

		$typicons = $icons_array['typicons'] = array(
			'icon-music-outline',
			'icon-music-2',
			'icon-search-outline',
			'icon-search-2',
			'icon-mail-2',
			'icon-heart-2',
			'icon-heart-filled',
			'icon-star-2',
			'icon-star-filled',
			'icon-user-outline',
			'icon-user-2',
			'icon-users-outline',
			'icon-users-2',
			'icon-user-add-outline',
			'icon-user-add-1',
			'icon-user-delete-outline',
			'icon-user-delete',
			'icon-video-2',
			'icon-videocam-outline',
			'icon-videocam-1',
			'icon-picture-outline',
			'icon-picture-2',
			'icon-camera-outline',
			'icon-camera-2',
			'icon-th-outline',
			'icon-th-1',
			'icon-th-large-outline',
			'icon-th-large-1',
			'icon-th-list-outline',
			'icon-th-list-1',
			'icon-ok-outline',
			'icon-ok-1',
			'icon-cancel-outline',
			'icon-cancel-2',
			'icon-cancel-alt',
			'icon-cancel-alt-filled',
			'icon-cancel-circled-outline',
			'icon-cancel-circled-2',
			'icon-plus-outline',
			'icon-plus-2',
			'icon-minus-outline',
			'icon-minus-2',
			'icon-divide-outline',
			'icon-divide',
			'icon-eq-outline',
			'icon-eq',
			'icon-info-outline',
			'icon-info-2',
			'icon-home-outline',
			'icon-home-2',
			'icon-link-outline',
			'icon-link-2',
			'icon-attach-outline',
			'icon-attach-2',
			'icon-lock-2',
			'icon-lock-filled',
			'icon-lock-open-2',
			'icon-lock-open-filled',
			'icon-pin-outline',
			'icon-pin-1',
			'icon-eye-outline',
			'icon-eye-2',
			'icon-tag-2',
			'icon-tags-1',
			'icon-bookmark-2',
			'icon-flag-2',
			'icon-flag-filled',
			'icon-thumbs-up-2',
			'icon-thumbs-down-2',
			'icon-download-outline',
			'icon-download-2',
			'icon-upload-outline',
			'icon-upload-2',
			'icon-upload-cloud-outline',
			'icon-upload-cloud-2',
			'icon-reply-outline',
			'icon-reply-2',
			'icon-forward-outline',
			'icon-forward-2',
			'icon-code-outline',
			'icon-code-2',
			'icon-export-outline',
			'icon-export-2',
			'icon-pencil-2',
			'icon-pen',
			'icon-feather-1',
			'icon-edit-1',
			'icon-print-2',
			'icon-comment-2',
			'icon-chat-2',
			'icon-chat-alt',
			'icon-bell-2',
			'icon-attention-2',
			'icon-attention-filled',
			'icon-warning-empty',
			'icon-warning',
			'icon-contacts',
			'icon-vcard-1',
			'icon-address-1',
			'icon-location-outline',
			'icon-location-2',
			'icon-map-1',
			'icon-direction-outline',
			'icon-direction-2',
			'icon-compass-2',
			'icon-trash-2',
			'icon-doc-2',
			'icon-doc-text-2',
			'icon-doc-add',
			'icon-doc-remove',
			'icon-news',
			'icon-folder-2',
			'icon-folder-add',
			'icon-folder-delete',
			'icon-archive-1',
			'icon-box-2',
			'icon-rss-outline',
			'icon-rss-2',
			'icon-phone-outline',
			'icon-phone-2',
			'icon-menu-outline',
			'icon-menu-2',
			'icon-cog-outline',
			'icon-cog-2',
			'icon-wrench-outline',
			'icon-wrench-1',
			'icon-basket-2',
			'icon-calendar-outlilne',
			'icon-calendar-2',
			'icon-mic-outline',
			'icon-mic-2',
			'icon-volume-off-1',
			'icon-volume-low',
			'icon-volume-middle',
			'icon-volume-high',
			'icon-headphones-1',
			'icon-clock-2',
			'icon-wristwatch',
			'icon-stopwatch',
			'icon-lightbulb-1',
			'icon-block-outline',
			'icon-block-2',
			'icon-resize-full-outline',
			'icon-resize-full-2',
			'icon-resize-normal-outline',
			'icon-resize-normal',
			'icon-move-outline',
			'icon-move-1',
			'icon-popup-1',
			'icon-zoom-in-outline',
			'icon-zoom-in-1',
			'icon-zoom-out-outline',
			'icon-zoom-out-1',
			'icon-popup-2',
			'icon-left-open-outline',
			'icon-left-open-2',
			'icon-right-open-outline',
			'icon-right-open-2',
			'icon-down-2',
			'icon-left-2',
			'icon-right-2',
			'icon-up-2',
			'icon-down-outline',
			'icon-left-outline',
			'icon-right-outline',
			'icon-up-outline',
			'icon-down-small',
			'icon-left-small',
			'icon-right-small',
			'icon-up-small',
			'icon-cw-outline',
			'icon-cw-2',
			'icon-arrows-cw-outline',
			'icon-arrows-cw-1',
			'icon-loop-outline',
			'icon-loop-1',
			'icon-loop-alt-outline',
			'icon-loop-alt',
			'icon-shuffle-2',
			'icon-play-outline',
			'icon-play-2',
			'icon-stop-outline',
			'icon-stop-2',
			'icon-pause-outline',
			'icon-pause-2',
			'icon-fast-fw-outline',
			'icon-fast-fw-1',
			'icon-rewind-outline',
			'icon-rewind',
			'icon-record-outline',
			'icon-record-1',
			'icon-eject-outline',
			'icon-eject-1',
			'icon-eject-alt-outline',
			'icon-eject-alt',
			'icon-bat1',
			'icon-bat2',
			'icon-bat3',
			'icon-bat4',
			'icon-bat-charge',
			'icon-plug',
			'icon-target-outline',
			'icon-target-2',
			'icon-wifi-outline',
			'icon-wifi',
			'icon-desktop-1',
			'icon-laptop-1',
			'icon-tablet-1',
			'icon-mobile-2',
			'icon-contrast',
			'icon-globe-outline',
			'icon-globe-2',
			'icon-globe-alt-outline',
			'icon-globe-alt',
			'icon-sun-1',
			'icon-sun-filled',
			'icon-cloud-2',
			'icon-flash-outline',
			'icon-flash-2',
			'icon-moon-2',
			'icon-waves-outline',
			'icon-waves',
			'icon-rain',
			'icon-cloud-sun',
			'icon-drizzle',
			'icon-snow',
			'icon-cloud-flash',
			'icon-cloud-wind',
			'icon-wind',
			'icon-plane-outline',
			'icon-plane',
			'icon-leaf-2',
			'icon-lifebuoy-1',
			'icon-briefcase-2',
			'icon-brush-1',
			'icon-pipette',
			'icon-power-outline',
			'icon-power',
			'icon-check-outline',
			'icon-check-2',
			'icon-gift-1',
			'icon-temperatire',
			'icon-chart-outline',
			'icon-chart',
			'icon-chart-alt-outline',
			'icon-chart-alt',
			'icon-chart-bar-outline',
			'icon-chart-bar-2',
			'icon-chart-pie-outline',
			'icon-chart-pie-1',
			'icon-ticket-2',
			'icon-credit-card-2',
			'icon-clipboard-1',
			'icon-database-1',
			'icon-key-outline',
			'icon-key-2',
			'icon-flow-split',
			'icon-flow-merge',
			'icon-flow-parallel-1',
			'icon-flow-cross',
			'icon-certificate-outline',
			'icon-certificate-1',
			'icon-scissors-outline',
			'icon-scissors-1',
			'icon-flask',
			'icon-wine',
			'icon-coffee-1',
			'icon-beer-1',
			'icon-anchor-outline',
			'icon-anchor-1',
			'icon-puzzle-outline',
			'icon-puzzle-1',
			'icon-tree',
			'icon-calculator',
			'icon-infinity-outline',
			'icon-infinity-1',
			'icon-pi-outline',
			'icon-pi',
			'icon-at',
			'icon-at-circled',
			'icon-looped-square-outline',
			'icon-looped-square-interest',
			'icon-sort-alphabet-outline',
			'icon-sort-alphabet',
			'icon-sort-numeric-outline',
			'icon-sort-numeric',
			'icon-dribbble-circled-1',
			'icon-dribbble-2',
			'icon-facebook-circled-1',
			'icon-facebook-2',
			'icon-flickr-circled-1',
			'icon-flickr-2',
			'icon-github-circled-2',
			'icon-github-2',
			'icon-lastfm-circled-1',
			'icon-lastfm-1',
			'icon-linkedin-circled-1',
			'icon-linkedin-2',
			'icon-pinterest-circled-2',
			'icon-pinterest-1',
			'icon-skype-outline',
			'icon-skype-2',
			'icon-tumbler-circled',
			'icon-tumbler',
			'icon-twitter-circled-1',
			'icon-twitter-2',
			'icon-vimeo-circled-1',
			'icon-vimeo-1'
		);

		$typicons = $icons_array['typicons'] = array_combine($typicons, $typicons);

		$iconic = $icons_array['iconic'] = array(
			'icon-meh',
			'icon-gamepad',
			'icon-keyboard',
			'icon-flag',
			'icon-flag-checkered',
			'icon-terminal',
			'icon-code',
			'icon-reply-all',
			'icon-crop',
			'icon-unlink',
			'icon-question',
			'icon-info',
			'icon-exclamation',
			'icon-superscript',
			'icon-subscript',
			'icon-eraser',
			'icon-shield',
			'icon-calendar-empty',
			'icon-rocket',
			'icon-maxcdn',
			'icon-html5',
			'icon-css3',
			'icon-anchor',
			'icon-bullseye',
			'icon-ticket',
			'icon-level-up',
			'icon-level-down'
		);

		$iconic = $icons_array['iconic'] = array_combine($iconic, $iconic);

		$new_icons = $icons_array['new_icons'] = array(
			'icon-meh',
			'icon-gamepad',
			'icon-keyboard',
			'icon-flag',
			'icon-flag-checkered',
			'icon-terminal',
			'icon-code',
			'icon-reply-all',
			'icon-crop',
			'icon-unlink',
			'icon-question',
			'icon-info',
			'icon-exclamation',
			'icon-superscript',
			'icon-subscript',
			'icon-eraser',
			'icon-shield',
			'icon-calendar-empty',
			'icon-rocket',
			'icon-maxcdn',
			'icon-html5',
			'icon-css3',
			'icon-anchor',
			'icon-bullseye',
			'icon-ticket',
			'icon-level-up',
			'icon-level-down'
		);

		$new_icons = $icons_array['new_icons'] = array_combine($new_icons, $new_icons);

		//***

		$web_application_icons = $icons_array['web_application_icons'] = array(
			'icon-adjust',
			'icon-anchor',
			'icon-asterisk',			
			'icon-barcode',
			'icon-beaker',
			'icon-beer',
			'icon-bell',			
			'icon-book',
			'icon-bookmark-empty',
			'icon-bookmark',
			'icon-briefcase',
			'icon-bullhorn',
			'icon-bullseye',
			'icon-calendar-empty',
			'icon-calendar',
			'icon-camera',			
			'icon-certificate',
			'icon-check-empty',			
			'icon-check',			
			'icon-circle',			
			'icon-cloud',			
			'icon-code',
			'icon-coffee',
			'icon-cog',
			'icon-cogs',			
			'icon-comment-alt',
			'icon-comment',			
			'icon-credit-card',
			'icon-crop',			
			'icon-desktop',
			'icon-download-alt',
			'icon-download',			
			'icon-edit',			
			'icon-eraser',
			'icon-exchange',			
			'icon-exclamation',			
			'icon-fighter-jet',			
			'icon-filter',			
			'icon-fire',			
			'icon-flag-checkered',
			'icon-flag',			
			'icon-folder-close',			
			'icon-folder-open',
			'icon-food',
			'icon-frown',
			'icon-gamepad',
			'icon-gift',
			'icon-glass',
			'icon-globe',
            'icon-globe-6',
			'icon-group',
			'icon-hdd',
			'icon-headphones',
			'icon-heart-empty',
			'icon-heart',
			'icon-home',
			'icon-inbox',			
			'icon-info',
			'icon-key',
			'icon-keyboard',
			'icon-laptop',
			'icon-leaf',			
			'icon-lemon',
			'icon-level-down',
			'icon-level-up',
			'icon-lightbulb',			
			'icon-lock',
			'icon-magic',
			'icon-magnet',			
			'icon-meh',			
			'icon-minus',			
			'icon-money',
			'icon-move',
			'icon-music',
			'icon-off',
			'icon-ok-circle',			
			'icon-ok',
			'icon-pencil',
			'icon-picture',
			'icon-plane',	
            'icon-paper-plane-2',            
            'icon-params',
            'icon-pencil-7',
			'icon-plus',
			'icon-print',			
			'icon-qrcode',			
			'icon-question',
			'icon-quote-left',
			'icon-quote-right',			
			'icon-reply-all',
			'icon-reply',
			'icon-resize-horizontal',
			'icon-resize-vertical',
			'icon-retweet',
			'icon-road',
			'icon-rocket',									
			'icon-search',
			'icon-share',			
			'icon-share',
			'icon-shield',						
			'icon-signal',			
			'icon-sitemap',
			'icon-smile',
			'icon-sort-down',
			'icon-sort-up',
			'icon-sort',
			'icon-spinner',
			'icon-star-empty',			
			'icon-star-half',
			'icon-star',
			'icon-tablet',
			'icon-tag',
			'icon-tags',
			'icon-tasks',
			'icon-terminal',
			'icon-thumbs-down',
			'icon-thumbs-up',
            'icon-thumbs-up-5',
			'icon-ticket',			
			'icon-tint',
			'icon-trash',
			'icon-trophy',
			'icon-truck',
			'icon-umbrella',			
			'icon-upload',
			'icon-user-md',
			'icon-user',
			'icon-volume-down',
			'icon-volume-off',
			'icon-volume-up',			
			'icon-wrench',
			'icon-zoom-in',
			'icon-zoom-out'
		);

		$web_application_icons = $icons_array['web_application_icons'] = array_combine($web_application_icons, $web_application_icons);

		//***

		$text_editor_icons = $icons_array['text_editor_icons'] = array(			
			'icon-paste',			
			'icon-undo',			
			'icon-text-height',
			'icon-text-width',
			'icon-align-left',
			'icon-align-center',
			'icon-align-right',
			'icon-align-justify',
			'icon-indent-left',
			'icon-indent-right',
			'icon-font',
			'icon-bold',
			'icon-italic',			
			'icon-underline',
			'icon-superscript',
			'icon-subscript',
			'icon-link',
			'icon-unlink',			
			'icon-eraser',
			'icon-columns',
			'icon-table',
			'icon-th-large',
			'icon-th',
			'icon-th-list',
			'icon-list',			
			'icon-list-alt'
		);

		$text_editor_icons = $icons_array['text_editor_icons'] = array_combine($text_editor_icons, $text_editor_icons);

		//***

		$directional_icons = $icons_array['directional_icons'] = array(
			'icon-angle-left',
			'icon-angle-right',
			'icon-angle-up',
			'icon-angle-down'			
		);
		$directional_icons = $icons_array['directional_icons'] = array_combine($directional_icons, $directional_icons);

		//***

		$video_player_icons = $icons_array['video_player_icons'] = array(			
			'icon-play',
			'icon-pause',
			'icon-stop',
			'icon-eject',
			'icon-backward',
			'icon-forward',
			'icon-fast-backward',
			'icon-fast-forward',
			'icon-step-backward',
			'icon-step-forward',			
			'icon-resize-full',
			'icon-resize-small'
		);

		$video_player_icons = $icons_array['video_player_icons'] = array_combine($video_player_icons, $video_player_icons);

		//***

		$brand_icons = $icons_array['brand_icons'] = array(
			'icon-css3',
			'icon-facebook',			
			'icon-twitter',			
			'icon-github',			
			'icon-html5',
			'icon-linkedin',			
			'icon-maxcdn',
			'icon-pinterest'			
		);

		$brand_icons = $icons_array['brand_icons'] = array_combine($brand_icons, $brand_icons);

		//***

		$medical_icons = $icons_array['medical_icons'] = array(
			'icon-ambulance',
			'icon-beaker',			
			'icon-hospital',
			'icon-medkit',			
			'icon-stethoscope',
			'icon-user-md'
		);

		$medical_icons = $icons_array['medical_icons'] = array_combine($medical_icons, $medical_icons);
		?>
		
		<br />

		<div class="container" id="icons_items">

			<div id="Fontelico" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Fontelico' ? 'block' : 'none') ?>">
				
				<h4><?php _e('Fontelico', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($fontelico as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icons_types_container-->

			<div id="Font_Awesome" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Font_Awesome' ? 'block' : 'none') ?>">

				<h4><?php _e('Font Awesome', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($font_awesome as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icons_types_container-->

			<div id="Entypo" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Entypo' ? 'block' : 'none') ?>">

				<h4><?php _e('Entypo', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($entypo as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icons_types_container-->

			<div id="Typicons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Typicons' ? 'block' : 'none') ?>">

				<h4><?php _e('Typicons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($typicons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icons_types_container-->

			<div id="Iconic" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Iconic' ? 'block' : 'none') ?>">

				<h4><?php _e('Iconic', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($iconic as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icons_types_container-->

			<div id="New_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'New_Icons' ? 'block' : 'none') ?>">

				<h4><?php _e('New Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($new_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icons_types_container-->

			<div id="Web_Application_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Web_Application_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Web Application Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($web_application_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->		

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Text_Editor_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Text_Editor_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Text Editor Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($text_editor_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Directional_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Directional_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Directional Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($directional_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Video_Player_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Video_Player_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Video Player Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($video_player_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Brand_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Social_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Brand Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($brand_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->	

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Medical_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Medical_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Medical Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($medical_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->		

				<div class="clear"></div>

			</div><!--/ .icon_type_container-->

		</div><!--/ #icons_items-->		

	</div><!--/ .fullwidth-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		colorizator();
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		var $iconGroup = jQuery('#view_icon_group');

		$iconGroup.on('change', function() {
			jQuery(".icon_types_container").hide();
			jQuery("#" + jQuery(this).val()).show();
		});

		jQuery("#icons_items").on('click', 'li', function(e) {
			var $target = jQuery(this);
			jQuery("#icons_items li").removeClass('chooced_icon_type');
			$target.addClass('chooced_icon_type');
			jQuery("#chooced_icon_type").val($target.find("i").attr('class'));
			tmm_ext_shortcodes.changer(shortcode_name);
			return false;
		});
		
	});
</script>

