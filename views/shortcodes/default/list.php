<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$type_clasess = array();
for ($i = 1; $i <= 16; $i++) {
    $type_clasess[$i] = "type-" . $i;
}

//*****

$list_items = explode("^", $content);

if (!empty($list_items) AND is_array($list_items)) {
    $html = '<' . $type . ' class="list ' . $type_clasess[$style] . '">';
    foreach ($list_items as $list_item) {
        $html.="<li>" . $list_item . "</li>";
    }
    $html.='</' . $type . '>';
}

echo $html;


