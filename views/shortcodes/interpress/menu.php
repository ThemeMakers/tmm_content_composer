<?php
$titles = explode('^',$menu_titles);
$links = explode('^', $menu_links);
$icons = explode('^', $menu_icons);
?>
<?php if (!empty($titles)){ 
    
     foreach ($titles as $key=>$title){
        ?>    
        <li class="menu-item <?php echo (isset($icons[$key])&&($icons[$key]!='none')) ? 'menu_item_icon' : ''; ?>">
            <a href="<?php echo $links[$key] ?>"><?php if (isset($icons[$key])&&($icons[$key]!='none')){ ?><i class="<?php echo $icons[$key] ?>"></i><?php } ?><?php echo $title ?></a>
        </li>    
        <?php 
        }
        
    }