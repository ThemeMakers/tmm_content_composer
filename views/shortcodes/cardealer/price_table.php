<?php if (!defined('ABSPATH')) die('No direct access allowed');

$currency = class_exists('TMM_Ext_Car_Dealer') && isset(TMM_Ext_Car_Dealer::$default_currency['symbol']) ? TMM_Ext_Car_Dealer::$default_currency['symbol'] : '$';
?>

<div class="col <?php if ($featured == 1) echo 'featured' ?>">

	<header class="header">

		<?php  $split_title = explode(' ', $title); ?>
		<?php foreach ($split_title as $key => $text) : ?>
			<?php if ($key < 1): ?>
				<h2 class="title"><?php echo $text ?></h2>
			<?php else: ?>
				<h3 class="description"><?php echo $text ?></h3>
			<?php endif; ?>
		<?php endforeach; ?>
		
	</header><!--/ .header -->

	<div class="heading">

		<dl>
			<span class="currency"><?php echo $currency ?></span>

			<?php $split_price = explode('.', $price);  ?>
			
			<?php foreach ($split_price as $key => $text) :  ?>
				<dd>
				<?php if ($key < 1): ?>
					<span class="int <?php if (strlen($text) > 2 && strlen($text) < 4): ?>size-medium<?php elseif (strlen($text) > 3): ?> size-small<?php endif; ?>"><?php echo $text ?></span>
				<?php else: ?>
					<span data-month="p/m" class="sup <?php if (strlen($text) == 3): ?>size-medium<?php endif; ?>"><?php echo $text ?></span>
				<?php endif; ?>
				</dd>
			<?php endforeach; ?>
		</dl>

	</div><!--/ .price-->

	<?php $content = explode('^', $content); ?>
	<?php if (!empty($content)): ?>
		<ul class="features">
			<?php foreach ($content as $text) : ?>
				<li><span><?php echo $text ?></span></li>
			<?php endforeach; ?>
		</ul><!-- .features -->
	<?php endif; ?>

	<footer class="footer">
		<a href="<?php echo $button_link ?>" class="button orange"><?php echo $button_text ?></a>
	</footer><!--/.footer -->


</div>


