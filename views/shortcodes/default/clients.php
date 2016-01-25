<?php
$images = explode('^', $titles);
$links = explode('^', $content);
?>

<?php if (!empty($images)): ?>
    <ul class="clients-items clearfix">
        <?php foreach ($images as $key => $img_src): ?>
            <li class="<?php if ($animation) echo $animation ?>">
                <a href="<?php echo(!empty($links[$key]) ? $links[$key] : '#') ?>"><img alt="" src="<?php echo TMM_Helper::resize_image($img_src, '') ?>"></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>