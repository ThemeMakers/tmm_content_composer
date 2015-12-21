<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

    <div class="one-half">
        <?php
        /**
        * ---------------- Type ----------------
        */
        TMM_Content_Composer::html_option(array(
                'type' => 'select',
                'title' => __('Type', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'type',
                'id' => '',
                'options' => array(
                        'youtube' => __('Youtube', TMM_CC_TEXTDOMAIN),
                        'vimeo' => __('Vimeo', TMM_CC_TEXTDOMAIN),
                        'html5' => __('Html5', TMM_CC_TEXTDOMAIN),
                ),
                'default_value' => TMM_Content_Composer::set_default_value('type', ''),
                'description' => ''
        ));
        ?>

        <div id="youtube_or_vimeo_id_block">
            <?php
            /**
            * ---------------- Youtube or Vimeo id ----------------
            */
            TMM_Content_Composer::html_option(array(
                'type' => 'text',
                'title' => __('Youtube or Vimeo id', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'content',
                'id' => '',
                'default_value' => TMM_Content_Composer::set_default_value('content', ''),
                'description' => ''
            ));
            ?>
        </div><!--/ #youtube_or_vimeo_id_block-->

        <div id="html5_video_block" style="display: display;">
            <?php
            /**
            * ---------------- MP4 html5 file url ----------------
            */
            TMM_Content_Composer::html_option(array(
                'type' => 'upload_video',
                'title' => __('MP4 html5 file url', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'html5_video_url',
                'id' => '',
                'default_value' => TMM_Content_Composer::set_default_value('html5_video_url', ''),
                'description' => ''
            ));

            /**
            * ---------------- HTML5 poster ----------------
            */
            TMM_Content_Composer::html_option(array(
                'type' => 'upload',
                'title' => __('HTML5 poster', TMM_CC_TEXTDOMAIN),
                'shortcode_field' => 'html5_poster',
                'id' => '',
                'default_value' => TMM_Content_Composer::set_default_value('html5_poster', ''),
                'description' => ''
            ));
            ?>
        </div><!--/ #html5_video_block-->

    </div><!--/ .one-half-->

    <div class="one-half">
        <?php
        /**
        * ---------------- Width ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Width', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'width',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('width', '500'),
            'description' => ''
        ));

        /**
        * ---------------- Height ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Height', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'height',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('height', '500'),
            'description' => ''
        ));
        ?>
    </div><!--/ .one-half-->

</div><!--/ .thememakers_shortcode_template-->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">
	
	<script type="text/javascript">
        var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
        jQuery(function() {
            var shortcode_name = "video";
            tmm_ext_shortcodes.changer(shortcode_name);
            jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
                tmm_ext_shortcodes.changer(shortcode_name);
            });
        });

        function thememakers_app_shortcodes_video_block(selector_obj) {
            jQuery("#youtube_or_vimeo_id_block").hide(350);
            jQuery("#html5_video_block").hide(350);

            var val = jQuery(selector_obj).val();

            switch (val) {
                case 'youtube':
                case 'vimeo':
                    jQuery("#youtube_or_vimeo_id_block").show(350);
                    break;
                default:
                    jQuery("#html5_video_block").show(350);
                    break
            }

        }
	</script>
	
</div><!--/ .fullwidth-frame-->



