<?php
$products_per_page = (int) $products_per_page;
$shortcode = '[recent_products per_page="'.$products_per_page.'" columns="'.$columns.'"]';

if($category){
	$shortcode = '[product_category per_page="'.$products_per_page.'" columns="'.$columns.'" category="'.$category.'"]';
}
echo do_shortcode($shortcode);