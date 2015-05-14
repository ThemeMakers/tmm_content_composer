<?php
$products_per_page = (int) $products_per_page;

if($type == 'top_rated_products'){
	$shortcode = '[top_rated_products per_page="'.$products_per_page.'" columns="'.$columns.'"]';
}else if($type == 'best_selling_products'){
	$shortcode = '[best_selling_products per_page="'.$products_per_page.'" columns="'.$columns.'"]';
}else if($type == 'sale_products'){
	$shortcode = '[sale_products per_page="'.$products_per_page.'" columns="'.$columns.'"]';
}else{
	$shortcode = '[featured_products per_page="'.$products_per_page.'" columns="'.$columns.'"]';
}

echo do_shortcode($shortcode);