<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$content = explode('^', $content);
$titles = explode('^', $titles);
$hover_titles = explode('^', $hover_titles);
$links = explode('^', $links);
$icons = explode(',', $icons);
$colors = explode(',', $colors);

switch($type){
    case '1':
        ?>
        <div class="content-boxes">
							
            <ul>
                <?php if (!empty($content)){ ?>
                    <?php foreach ($content as $key => $text){ ?>
                    <li>
                            <i class="content-icon <?php echo esc_attr($icons[$key]) ?>"></i>
                            <h2><?php echo $titles[$key] ?></h2>

                            <div class="hover-box" data-color="<?php echo esc_attr($colors[$key * 4]) ?>" data-color-state="<?php echo esc_attr($colors[$key * 4 + 1]) ?>" data-text-hover="<?php echo $colors[$key*4+2] ?>" data-color-hover="<?php echo $colors[$key*4+3] ?>"></div><!--/ .hover-box-->
                            <div class="extra-content">

                                    <div class="extra-table">
                                            <div class="extra-inner">
                                                    <h4><?php echo $hover_titles[$key] ?></h4>
                                                    <p>
                                                            <?php echo $text ?>
                                                    </p>
                                            </div><!--/ .extra-inner-->				
                                    </div>

                            </div><!--/ .extra-content-->
                    </li>  
                    <?php } ?>
                <?php } ?>

            </ul>

        </div><!--/ .content-boxes--> 
        
        <?php
        break;
    default:
        
        if (!empty($content)){ 
                     foreach ($content as $key => $text){ ?>
        
                    <div class="ca-shortcode">
                            <i class="ca-icon <?php echo $icons[$key] ?>"></i>
                            <div class="ca-content">
                                    <h4 class="ca-title"><?php echo $titles[$key] ?></h4>
                                    <p>
                                            <?php echo $text ?>
                                    </p>
                            </div>
                    </div><!--/ .ca-shortcode-->
        
        <?php 
                    }
        }
        break;     
}
?>

                
               