<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<style type="text/css">

	<?php if (!empty($first_box_icon_color)){ ?>
	.block-with-icons li:first-child a::before{
		color : <?php echo $first_box_icon_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_title_color)){ ?>
	.block-with-icons li:first-child h5{
		color : <?php echo $first_box_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_desc_color)){ ?>
	.block-with-icons li:first-child span{
		color : <?php echo $first_box_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_top_border)){ ?>
	.block-with-icons li:first-child{
		border-top-color : <?php echo $first_top_border ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_bg)){ ?>
	.block-with-icons li:first-child a{
		background : <?php echo $first_box_bg ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_hover_bg)){ ?>
	.block-with-icons li:first-child:hover a{
		background : <?php echo $first_box_hover_bg ?> ;
	}
	<?php } ?>


	<?php if (!empty($second_box_icon_color)){ ?>
	.block-with-icons li:nth-child(2) a::before{
		color : <?php echo $second_box_icon_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_title_color)){ ?>
	.block-with-icons li:nth-child(2) h5{
		color : <?php echo $second_box_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_desc_color)){ ?>
	.block-with-icons li:nth-child(2) span{
		color : <?php echo $second_box_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_top_border)){ ?>
	.block-with-icons li:nth-child(2){
		border-top-color : <?php echo $second_top_border ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_bg)){ ?>
	.block-with-icons li:nth-child(2) a{
		background : <?php echo $second_box_bg ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_hover_bg)){ ?>
	.block-with-icons li:nth-child(2):hover a{
		background : <?php echo $second_box_hover_bg ?> ;
	}
	<?php } ?>


	<?php if (!empty($third_box_icon_color)){ ?>
	.block-with-icons li:nth-child(3) a::before{
		color : <?php echo $third_box_icon_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_title_color)){ ?>
	.block-with-icons li:nth-child(3) h5{
		color : <?php echo $third_box_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_desc_color)){ ?>
	.block-with-icons li:nth-child(3) span{
		color : <?php echo $third_box_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_top_border)){ ?>
	.block-with-icons li:nth-child(3){
		border-top-color : <?php echo $third_top_border ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_bg)){ ?>
	.block-with-icons li:nth-child(3) a{
		background : <?php echo $third_box_bg ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_hover_bg)){ ?>
	.block-with-icons li:nth-child(3):hover a{
		background : <?php echo $third_box_hover_bg ?> ;
	}
	<?php } ?>
</style>

<ul class="block-with-icons">
	<li class="<?php echo $first_icon; ?>">
		<a href="#">
		<?php if (!empty($first_title)){ ?><h5><?php echo $first_title ?></h5><?php } ?>
		<?php if (!empty($first_description)){ ?><span><?php echo $first_description ?></span><?php } ?>
		</a>
	</li>
	<li  class="<?php echo $second_icon; ?>">
		<a href="#">
			<?php if (!empty($second_title)){ ?><h5><?php echo $second_title ?></h5><?php } ?>
			<?php if (!empty($second_description)){ ?><span><?php echo $second_description ?></span><?php } ?>
		</a>
	</li>
	<li class="<?php echo $third_icon; ?>">
		<a href="#">
			<?php if (!empty($third_title)){ ?><h5><?php echo $third_title ?></h5><?php } ?>
			<?php if (!empty($third_description)){ ?><span><?php echo $third_description ?></span><?php } ?>
		</a>
	</li>
</ul>