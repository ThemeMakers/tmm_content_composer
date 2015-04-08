<?php
$titles = explode('^',$menu_titles);
$links = explode('^', $menu_links);
$icons = explode('^', $menu_icons);
?>
<?php if (!empty($titles)){ 
    
     foreach ($titles as $key=>$title){
        ?>    
        <li class="menu-item <?php echo (isset($icons[$key])&&($icons[$key]!='none')) ? 'menu_item_icon' : ''; ?>">
            <a href="<?php echo esc_url($links[$key]); ?>"><?php if (isset($icons[$key])&&($icons[$key]!='none')){ ?><i class="<?php echo esc_attr($icons[$key]) ?>"></i><?php } ?><?php echo esc_html($title) ?></a>
        </li>    
        <?php 
        }
        
    }