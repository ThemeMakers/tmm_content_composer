<?php
if (!defined('ABSPATH')) exit;

$content = explode('^', $content);

if ($list_style === 'unordered') {
	$list_style = 'ul';
} else {
	$list_style = 'ol';
}

$list_html = '<'.$list_style.' class="list '.$list_type.'">';

if (!empty($content)) {

	foreach ($content as $key => $text) {

		$list_html .= '<li>'.$text.'</li>';

	}
}

$list_html .= '</'.$list_style.'>';

echo $list_html;
