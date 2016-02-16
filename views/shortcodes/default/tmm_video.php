<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$allows_array = array('youtube.com', 'vimeo.com', '.mp4', '.ogv', '.webm');
$video_type = '';
foreach ($allows_array as $key => $needle) {
       $count = strpos($content, $needle);
       if ($count !== FALSE) {
               $video_type = $allows_array[$key];
       }
   }
   
$image_size = "1036*576";

global $is_iphone;
$is_mobiles = wp_is_mobile() || $is_iphone || stripos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false;

if (isset($cover_id)) {
    if ($is_mobiles) {
        $cover_id = (int) $cover_id;
    } else {
        $cover_id = '';
    }

} else {
    $cover_id = '';
}

if (isset($cover_image_on_mobiles) && $cover_image_on_mobiles === '1') {
    if (isset($cover_image) && !$is_mobiles) {
        $cover_image = '';
    }
}

$style = "height: 100%;";

if(($video_type != $allows_array[0]) && ($video_type != $allows_array[1] )){
    $style .= " display:none;";
}

$style = 'style="' . $style . '"';

$controls = (isset($control_panel) && $control_panel ) ? '1' : '0';

?>

<div class="video_wrapper" <?php echo $style; ?>>

<?php
switch ($video_type) {
	case $allows_array[0]:	
        
        $source_code = explode("?v=", $content);
        $source_code = explode("&", $source_code[1]);
        if (is_array($source_code)) {
            $source_code = $source_code[0];
        }
		?>
		<iframe  class="<?php echo (!isset($width) || empty($width)) ? 'fitwidth' : '' ?>" <?php echo (isset($width) && !empty($width)) ? 'width="'.$width.'"' : ''; ?> <?php echo (!isset($width) || empty($width) || !isset($height)) ? '' : 'height="'.$height.'"';  ?> src="http://www.youtube.com/embed/<?php echo $source_code ?>?wmode=transparent&amp;rel=0&amp;controls=<?php echo $controls ?>&amp;showinfo=0"></iframe>
        <?php

		break;
        
	case $allows_array[1]:
        
		$source_code = explode("/", $content);
		if (is_array($source_code)) {
			$source_code = $source_code[count($source_code) - 1];
		}
		?>
        <iframe class="<?php echo (!isset($width) || empty($width)) ? 'fitwidth' : '' ?>" width="<?php echo $width ?>" height="<?php echo (!isset($width) || empty($width)) ? '' : $height ?>" src="http://player.vimeo.com/video/<?php echo $source_code ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f6e200"></iframe>
		<?php
		break;
        
    case $allows_array[2]: 
        
        $source_code = $content;
        
        $cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, $image_size) : ''; 
        $cover = isset($cover_image) ? $cover_image : $cover;
        ?>
            
            <video poster="<?php echo esc_url($cover) ?>" controls="controls" <?php echo (isset($width) && !empty($width)) ? 'width="'.$width.'"' : ''; ?> <?php echo (isset($height) && !empty($height)) ? 'height="'.$height.'"' : ''; ?>>
                <source type="video/mp4" src="<?php echo esc_url($source_code) ?>" />
            </video>
           
        <?php    
        
	    wp_enqueue_script('mediaelement');
        break;
    
    case $allows_array[3]: 
        
        $source_code = $content;
        
        $cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, $image_size) : ''; 
        $cover = isset($cover_image) ? $cover_image : $cover;
        ?>
            
            <video poster="<?php echo esc_url($cover) ?>" controls="controls" <?php echo (isset($width) && !empty($width)) ? 'width="'.$width.'"' : ''; ?> <?php echo (isset($height) && !empty($height)) ? 'height="'.$height.'"' : ''; ?>>
                <source type="video/ogg" src="<?php echo esc_url($source_code) ?>" />
            </video>
           
        <?php
	    wp_enqueue_script('mediaelement');
        break;
    
    case $allows_array[4]: 
        
        $source_code = $content;
        $cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, $image_size) : ''; 
        $cover = isset($cover_image) ? $cover_image : $cover;
        ?>
            
            <video poster="<?php echo esc_url($cover) ?>" controls="controls" <?php echo (isset($width) && !empty($width)) ? 'width="'.$width.'"' : ''; ?> <?php echo (isset($height) && !empty($height)) ? 'height="'.$height.'"' : ''; ?>>
                <source type="video/webm" src="<?php echo esc_url($source_code) ?>" />
            </video>
           
        <?php
	    wp_enqueue_script('mediaelement');
        break;

	default:
        $cover = isset($cover_id) && (has_post_thumbnail($cover_id)) ? TMM_Content_Composer::get_post_featured_image($cover_id, '') : ''; 
        if (!empty($cover)) {            
            ?>
             <img src="<?php echo esc_url(TMM_Content_Composer::resize_image_cover($cover, $image_size)); ?>" alt="<?php esc_attr_e('Unsupported video format', TMM_CC_TEXTDOMAIN) ?>" />
             <?php 
        }else{
            esc_html_e('Unsupported video format', TMM_CC_TEXTDOMAIN);
        }		
		break;
}
?>

</div>