<div class="single-product">

<?php
if($sku !== ''){
	$shortcode = '[product sku="'.$sku.'"]';
}else{
	$shortcode = '[product id="'.$product_id.'"]';
}

echo do_shortcode($shortcode);
?>

</div>