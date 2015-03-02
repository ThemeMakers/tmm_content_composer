<?php
if (!defined('ABSPATH')) die('No direct access allowed');

$iconssweets = array(
	'iconsweets-marker' => __('Icon Marker', TMM_THEME_TEXTDOMAIN),
	'iconsweets-home' => __('Icon Home', TMM_THEME_TEXTDOMAIN),
	'iconsweets-home2' => __('Icon Home2', TMM_THEME_TEXTDOMAIN),
	'iconsweets-image' => __('Icon Image', TMM_THEME_TEXTDOMAIN),
	'iconsweets-images' => __('Icon Images', TMM_THEME_TEXTDOMAIN),
	'iconsweets-microphone' => __('Icon Microphone', TMM_THEME_TEXTDOMAIN),
	'iconsweets-sound' => __('Icon Sound', TMM_THEME_TEXTDOMAIN),
	'iconsweets-megafone' => __('Icon Megafone', TMM_THEME_TEXTDOMAIN),
	'iconsweets-sign-post' => __('Icon Sign Post', TMM_THEME_TEXTDOMAIN),
	'iconsweets-pencil' => __('Icon Pencil', TMM_THEME_TEXTDOMAIN),
	'iconsweets-brush' => __('Icon Brush', TMM_THEME_TEXTDOMAIN),
	'iconsweets-user' => __('Icon User', TMM_THEME_TEXTDOMAIN),
	'iconsweets-users' => __('Icon Users', TMM_THEME_TEXTDOMAIN),
	'iconsweets-group' => __('Icon Group', TMM_THEME_TEXTDOMAIN),
	'iconsweets-user2' => __('Icon User2', TMM_THEME_TEXTDOMAIN),
	'iconsweets-users2' => __('Icon Users2', TMM_THEME_TEXTDOMAIN),
	'iconsweets-group2' => __('Icon Group2', TMM_THEME_TEXTDOMAIN),
	'iconsweets-folder' => __('Icon Folder', TMM_THEME_TEXTDOMAIN),
	'iconsweets-heart' => __('Icon Heart', TMM_THEME_TEXTDOMAIN),
	'iconsweets-cog' => __('Icon Cog', TMM_THEME_TEXTDOMAIN),
	'iconsweets-cog2' => __('Icon Cog2', TMM_THEME_TEXTDOMAIN),
	'iconsweets-cog3' => __('Icon Cog3', TMM_THEME_TEXTDOMAIN),
	'iconsweets-settings' => __('Icon Settings', TMM_THEME_TEXTDOMAIN),
	'iconsweets-tools' => __('Icon Tools', TMM_THEME_TEXTDOMAIN),
	'iconsweets-walking-man' => __('Icon Walking Man', TMM_THEME_TEXTDOMAIN),
	'iconsweets-running-man' => __('Icon Running Man', TMM_THEME_TEXTDOMAIN),
	'iconsweets-man' => __('Icon Man', TMM_THEME_TEXTDOMAIN),
	'iconsweets-woman' => __('Icon Woman', TMM_THEME_TEXTDOMAIN),
	'iconsweets-chemical' => __('Icon Chemical', TMM_THEME_TEXTDOMAIN),
	'iconsweets-repeat' => __('Icon Repeat', TMM_THEME_TEXTDOMAIN),
	'iconsweets-refresh' => __('Icon Refresh', TMM_THEME_TEXTDOMAIN),
	'iconsweets-refresh2' => __('Icon Refresh2', TMM_THEME_TEXTDOMAIN),
	'iconsweets-shuffle' => __('Icon Shuffle', TMM_THEME_TEXTDOMAIN),
	'iconsweets-bended-arrow-left' => __('Icon Bended Arrow Left', TMM_THEME_TEXTDOMAIN),
	'iconsweets-bended-arrow-right' => __('Icon Bended Arrow Right', TMM_THEME_TEXTDOMAIN),
	'iconsweets-locked' => __('Icon Locked', TMM_THEME_TEXTDOMAIN),
	'iconsweets-unlocked' => __('Icon Unlocked', TMM_THEME_TEXTDOMAIN),
	'iconsweets-mail' => __('Icon Mail', TMM_THEME_TEXTDOMAIN),
	'iconsweets-note' => __('Icon Note', TMM_THEME_TEXTDOMAIN),
	'iconsweets-write' => __('Icon Write', TMM_THEME_TEXTDOMAIN),
	'iconsweets-shopping-cart' => __('Icon Shopping Cart', TMM_THEME_TEXTDOMAIN),
	'iconsweets-globe' => __('Icon Globe', TMM_THEME_TEXTDOMAIN),
	'iconsweets-calendar' => __('Icon Calendar', TMM_THEME_TEXTDOMAIN)
);
?>

<style type="text/css">
	@font-face {
		font-family: 'iconSweetsRegular';
		src: url('<?php echo TMM_THEME_URI; ?>/fonts/iconsweets-webfont.eot');
		src: url('<?php echo TMM_THEME_URI; ?>/fonts/iconsweets-webfont.eot?#iefix') format('embedded-opentype'),
		url('<?php echo TMM_THEME_URI; ?>/fonts/iconsweets-webfont.woff') format('woff'),
		url('<?php echo TMM_THEME_URI; ?>/fonts/iconsweets-webfont.ttf') format('truetype'),
		url('<?php echo TMM_THEME_URI; ?>/fonts/iconsweets-webfont.svg#iconSweetsRegular') format('svg');
		font-weight: normal;
		font-style: normal;
	}

	.iconsweets {
		font: 400 35px/35px "iconsweetsRegular", sans-serif;
		margin-top: 20px;
	}

	.iconsweets-marker:after 			{content: '`';}
	.iconsweets-home:after 				{content: '0';}
	.iconsweets-home2:after 			{content: '1';}
	.iconsweets-image:after 			{content: '2';}
	.iconsweets-images:after 			{content: '3';}
	.iconsweets-microphone:after 		{content: '4';}
	.iconsweets-sound:after 			{content: '5';}
	.iconsweets-megafone:after 			{content: '6';}
	.iconsweets-sign-post:after 		{content: '7';}
	.iconsweets-pencil:after 			{content: '8';}
	.iconsweets-brush:after 			{content: '9';}
	.iconsweets-user:after 				{content: 'a';}
	.iconsweets-users:after 			{content: 'b';}
	.iconsweets-group:after 			{content: 'c';}
	.iconsweets-user2:after 			{content: 'd';}
	.iconsweets-users2:after 			{content: 'e';}
	.iconsweets-group2:after 			{content: 'f';}
	.iconsweets-folder:after 			{content: 'g';}
	.iconsweets-heart:after 			{content: 'h';}
	.iconsweets-cog:after 				{content: 'i';}
	.iconsweets-cog2:after 				{content: 'j';}
	.iconsweets-cog3:after 				{content: 'k';}
	.iconsweets-settings:after 			{content: 'l';}
	.iconsweets-tools:after 			{content: 'm';}
	.iconsweets-walking-man:after 		{content: 'n';}
	.iconsweets-running-man:after 		{content: 'o';}
	.iconsweets-man:after 				{content: 'p';}
	.iconsweets-woman:after 			{content: 'q';}
	.iconsweets-chemical:after 			{content: 'r';}
	.iconsweets-repeat:after 			{content: 's';}
	.iconsweets-refresh:after 			{content: 't';}
	.iconsweets-refresh2:after 			{content: 'u';}
	.iconsweets-shuffle:after 			{content: 'v';}
	.iconsweets-bended-arrow-left:after {content: 'w';}
	.iconsweets-bended-arrow-right:after{content: 'x';}
	.iconsweets-locked:after 			{content: 'y';}
	.iconsweets-unlocked:after 			{content: 'z';}
	.iconsweets-mail:after 				{content: 'A';}
	.iconsweets-note:after 				{content: 'B';}
	.iconsweets-write:after 			{content: 'C';}
	.iconsweets-shopping-cart:after 	{content: 'D';}
	.iconsweets-shopping-cart2:after 	{content: 'E';}
	.iconsweets-camera:after 			{content: 'F';}
	.iconsweets-globe:after 			{content: 'G';}
	.iconsweets-download:after 			{content: 'H';}
	.iconsweets-upload:after 			{content: 'I';}
	.iconsweets-iphone:after 			{content: 'J';}
	.iconsweets-ipad:after 				{content: 'K';}
	.iconsweets-archive:after 			{content: 'L';}
	.iconsweets-cabinet:after 			{content: 'M';}
	.iconsweets-gmap:after 				{content: 'N';}
	.iconsweets-download-comp:after 	{content: 'O';}
	.iconsweets-link:after 				{content: 'P';}
	.iconsweets-link2:after 			{content: 'Q';}
	.iconsweets-calendar:after 			{content: 'R';}
	.iconsweets-clock:after 			{content: 'S';}
	.iconsweets-plane:after 			{content: 'T';}
	.iconsweets-cut:after 				{content: 'U';}
	.iconsweets-print:after 			{content: 'V';}
	.iconsweets-star:after 				{content: 'W';}
	.iconsweets-close:after 			{content: 'X';}
	.iconsweets-flag:after 				{content: 'Y';}
	.iconsweets-flag2:after 			{content: 'Z';}
	.iconsweets-mail:after 				{content: '@';}
	.iconsweets-alert:after 			{content: '!';}
	.iconsweets-bubble:after 			{content: '#';}
	.iconsweets-shop-basket:after 		{content: '$';}
	.iconsweets-shop-basket2:after 		{content: '%';}
	.iconsweets-bookmark:after 			{content: '&';}
	.iconsweets-bookmark2:after 		{content: '`';}
	.iconsweets-price-tag:after 		{content: '(';}
	.iconsweets-price-tagfaces:after 	{content: ')';}
	.iconsweets-star2:after 			{content: '*';}
	.iconsweets-plus:after 				{content: '+';}
	.iconsweets-umbrella:after 			{content: ',';}
	.iconsweets-minus:after 			{content: '-';}
	.iconsweets-tag:after 				{content: '.';}
	.iconsweets-tags:after 				{content: '/';}
	.iconsweets-bubbles:after 			{content: '"';}
	.iconsweets-small-brush:after 		{content: ':';}
	.iconsweets-big-brush:after 		{content: ';';}
	.iconsweets-arr-left:after 			{content: '<';}
	.iconsweets-check:after 			{content: '=';}
	.iconsweets-arr-right:after 		{content: '>';}
	.iconsweets-info:after 				{content: '?';}
	.iconsweets-arr-up:after 			{content: '[';}
	.iconsweets-arr-down:after 			{content: ']';}
	.iconsweets-universal-access:after 	{content: '';}
	.iconsweets-list-w-image:after 		{content: '{';}
	.iconsweets-list:after 				{content: '}';}
	.iconsweets-list-w-images:after 	{content: '|';}
	.iconsweets-coverflow:after 		{content: '~';}
	.iconsweets-alarm-bell:after 		{content: '^';}
	.iconsweets-alarm-bell2:after 		{content: '_';}
</style>

<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="fullwidth">

        <h4><?php _e('First Box:',TMM_CC_TEXTDOMAIN); ?></h4>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title',TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'first_title',
			'id' => 'first_title',
			'default_value' => TMM_Content_Composer::set_default_value('first_title', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Description', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'first_description',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('first_description', ''),
			'description' => ''
		));
		?>

    </div><!--/ .fullwidth-->

    <br><br>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'color',
			'title' => __('Title Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'first_box_title_color',
			'id' => 'first_box_title_color',
			'default_value' => TMM_Content_Composer::set_default_value('first_box_title_color', '#1C7FBD'),
			'description' => '',
			'display' => 1
		));
		?>

	</div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Mouseover Title Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'first_box_hover_title_color',
		    'id' => 'first_box_hover_title_color',
		    'default_value' => TMM_Content_Composer::set_default_value('first_box_hover_title_color', '#F0F3F6'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'color',
			'title' => __('Description Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'first_box_desc_color',
			'id' => 'first_box_desc_color',
			'default_value' => TMM_Content_Composer::set_default_value('first_box_desc_color', '#6D7A7E'),
			'description' => '',
			'display' => 1
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'color',
			'title' => __('Mouseover Description Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'first_box_hover_desc_color',
			'id' => 'first_box_hover_desc_color',
			'default_value' => TMM_Content_Composer::set_default_value('first_box_hover_desc_color', '#BACBD7'),
			'description' => '',
			'display' => 1
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'color',
			'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'first_box_bg',
			'id' => 'first_box_bg',
			'default_value' => TMM_Content_Composer::set_default_value('first_box_bg', '#F5F4F6'),
			'description' => '',
			'display' => 1
		));
		?>

	</div><!--/ .one-half-->

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'color',
			'title' => __('Mouseover Background Color', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'first_box_hover_bg',
			'id' => 'first_box_hover_bg',
			'default_value' => TMM_Content_Composer::set_default_value('first_box_hover_bg', '#17517A'),
			'description' => '',
			'display' => 1
		));
		?>

	</div><!--/ .one-half-->

    <br><br>

    <div class="one-half">

	    <?php
	    $view_icon_group = TMM_Content_Composer::set_default_value('first_icon', 'iconsweets-group');
	    TMM_Content_Composer::html_option(array(
		    'type' => 'select',
		    'title' => __('Icon', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'first_icon',
		    'id' => 'first_icon',
		    'options' => $iconssweets,
		    'default_value' => $view_icon_group,
		    'description' => ''
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <div class="iconsweets first_icon <?php echo $view_icon_group; ?>"></div>

    </div><!--/ .one-half-->

    <br><br>

	<div class="fullwidth">

	    <h4><?php _e('Second Box:',TMM_CC_TEXTDOMAIN); ?></h4>
                
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title',TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'second_title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('second_title', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Description', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'second_description',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('second_description', ''),
			'description' => ''
		));
		?>

	</div><!--/ .fullwidth-->

    <br><br>

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Title Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'second_box_title_color',
		    'id' => 'second_box_title_color',
		    'default_value' => TMM_Content_Composer::set_default_value('second_box_title_color', '#1C7FBD'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Mouseover Title Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'second_box_hover_title_color',
		    'id' => 'second_box_hover_title_color',
		    'default_value' => TMM_Content_Composer::set_default_value('second_box_hover_title_color', '#F0F3F6'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Description Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'second_box_desc_color',
		    'id' => 'second_box_desc_color',
		    'default_value' => TMM_Content_Composer::set_default_value('second_box_desc_color', '#6D7A7E'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Mouseover Description Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'second_box_hover_desc_color',
		    'id' => 'second_box_hover_desc_color',
		    'default_value' => TMM_Content_Composer::set_default_value('second_box_hover_desc_color', '#BACBD7'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'second_box_bg',
		    'id' => 'second_box_bg',
		    'default_value' => TMM_Content_Composer::set_default_value('second_box_bg', '#F5F4F6'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Mouseover Background Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'second_box_hover_bg',
		    'id' => 'second_box_hover_bg',
		    'default_value' => TMM_Content_Composer::set_default_value('second_box_hover_bg', '#17517A'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <br><br>

    <div class="one-half">

	    <?php
	    $view_icon_group = TMM_Content_Composer::set_default_value('second_icon', 'iconsweets-globe');
	    TMM_Content_Composer::html_option(array(
		    'type' => 'select',
		    'title' => __('Icon', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'second_icon',
		    'id' => 'second_icon',
		    'options' => $iconssweets,
		    'default_value' => $view_icon_group,
		    'description' => ''
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <div class="iconsweets second_icon <?php echo $view_icon_group; ?>"></div>

    </div><!--/ .one-half-->

    <br><br>


	<div class="fullwidth">

	    <h4><?php _e('Third Box:',TMM_CC_TEXTDOMAIN); ?></h4>
                
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title',TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'third_title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('third_title', ''),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'textarea',
			'title' => __('Description', TMM_CC_TEXTDOMAIN),
			'shortcode_field' => 'third_description',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('third_description', ''),
			'description' => ''
		));
		?>

	</div><!--/ .fullwidth-->

    <br><br>

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Title Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'third_box_title_color',
		    'id' => 'third_box_title_color',
		    'default_value' => TMM_Content_Composer::set_default_value('third_box_title_color', '#1C7FBD'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Mouseover Title Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'third_box_hover_title_color',
		    'id' => 'third_box_hover_title_color',
		    'default_value' => TMM_Content_Composer::set_default_value('third_box_hover_title_color', '#F0F3F6'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Description Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'third_box_desc_color',
		    'id' => 'third_box_desc_color',
		    'default_value' => TMM_Content_Composer::set_default_value('third_box_desc_color', '#6D7A7E'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Mouseover Description Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'third_box_hover_desc_color',
		    'id' => 'third_box_hover_desc_color',
		    'default_value' => TMM_Content_Composer::set_default_value('third_box_hover_desc_color', '#BACBD7'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Background Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'third_box_bg',
		    'id' => 'third_box_bg',
		    'default_value' => TMM_Content_Composer::set_default_value('third_box_bg', '#F5F4F6'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <?php
	    TMM_Content_Composer::html_option(array(
		    'type' => 'color',
		    'title' => __('Mouseover Background Color', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'third_box_hover_bg',
		    'id' => 'third_box_hover_bg',
		    'default_value' => TMM_Content_Composer::set_default_value('third_box_hover_bg', '#17517A'),
		    'description' => '',
		    'display' => 1
	    ));
	    ?>

    </div><!--/ .one-half-->

    <br><br>

    <div class="one-half">

	    <?php
	    $view_icon_group = TMM_Content_Composer::set_default_value('third_icon', 'iconsweets-calendar');
	    TMM_Content_Composer::html_option(array(
		    'type' => 'select',
		    'title' => __('Icon', TMM_CC_TEXTDOMAIN),
		    'shortcode_field' => 'third_icon',
		    'id' => 'third_icon',
		    'options' => $iconssweets,
		    'default_value' => $view_icon_group,
		    'description' => ''
	    ));
	    ?>

    </div><!--/ .one-half-->

    <div class="one-half">

	    <div class="iconsweets third_icon <?php echo $view_icon_group; ?>"></div>

    </div><!--/ .one-half-->

</div><!--/ .tmm_shortcode_template->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});

		jQuery("#tmm_shortcode_template select").on('change', function() {
			var block_class = jQuery(this).data('shortcode-field');
			jQuery('.' + block_class).removeClass().addClass(jQuery(this).val() + ' iconsweets ' + block_class);
		});

		colorizator();

	});
</script>
