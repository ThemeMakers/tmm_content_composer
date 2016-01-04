<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
wp_enqueue_style("thememakers_theme_mediaelementplayer_css", TMM_THEME_URI . '/js/mediaelement/mediaelementplayer.css');
$unique_id = uniqid();
switch ($type) {
    case 'youtube':
        ?>
        <div class="bordered">
            <figure class="add-border">
                <iframe  allowtransparency="true" width="<?php echo $width ?>" height="<?php echo $height ?>" src="http://www.youtube.com/embed/<?php echo $content ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
            </figure>
        </div>

        <?php
        return "";
        break;
    case 'vimeo':
        ?>
        <div class="bordered">
            <figure class="add-border">
                <iframe  width="<?php echo $width ?>" height="<?php echo $height ?>" src="http://player.vimeo.com/video/<?php echo $content ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
            </figure>
        </div>
        <?php
        break;

    default:
        ?>

        <?php
        if (empty($html5_poster)) {
            $html5_poster = TMM_THEME_URI . "/images/video_poster.jpg";
        }
        ?>

        <video id="video_<?php echo $unique_id ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" class="videoplayer" controls="controls" preload="none" style="width: 100%; height: 100%" poster="<?php echo $html5_poster ?>">


            <source src="<?php echo $html5_video_url ?>" type="video/mp4" />

            <!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
            <object width="<?php echo $width ?>" height="<?php echo $height ?>" type="application/x-shockwave-flash" data="<?php echo TMM_THEME_URI ?>/js/mediaelement/flashmediaelement.swf">
                <param name="movie" value="<?php echo TMM_THEME_URI ?>/js/mediaelement/flashmediaelement.swf" />
                <param name="flashvars" value="controls=true&file=<?php echo $html5_video_url ?>" />
                <img src="<?php echo $html5_poster ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" alt="<?php _e('No video playback capabilities', TMM_THEME_FOLDER_NAME); ?>" />
            </object>

        </video>

        <script type="text/javascript">
            jQuery(function() {
                jQuery('#video_<?php echo $unique_id ?>').mediaelementplayer(
                    {
                        // if the <video width> is not specified, this is the default
                        defaultVideoWidth: <?php echo $width ?>,
                        // if the <video height> is not specified, this is the default
                        defaultVideoHeight: <?php echo $height ?>

                    }
                );

            });


        </script>


        <?php
        break;
}

