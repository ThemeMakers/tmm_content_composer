<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<style type="text/css">

	.simple-pricing-table.col-3 .column {
		margin-left: 0;
	}

	<?php if (!empty($first_box_title_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:first-child h2{
		color : <?php echo $first_box_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_desc_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:first-child span{
		color : <?php echo $first_box_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_hover_title_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:first-child:hover h2{
		color : <?php echo $first_box_hover_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_hover_desc_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:first-child:hover span{
		color : <?php echo $first_box_hover_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_bg)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:first-child .featured-box{
		background : <?php echo $first_box_bg ?> ;
	}
	<?php } ?>
	<?php if (!empty($first_box_hover_bg)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:first-child:hover .featured-box{
		background : <?php echo $first_box_hover_bg ?> ;
	}
	<?php } ?>

	<?php if (!empty($second_box_title_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(2) h2{
		color : <?php echo $second_box_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_desc_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(2) span{
		color : <?php echo $second_box_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_hover_title_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(2):hover h2{
		color : <?php echo $second_box_hover_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_hover_desc_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(2):hover span{
		color : <?php echo $second_box_hover_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_bg)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(2) .featured-box{
		background : <?php echo $second_box_bg ?> ;
	}
	<?php } ?>
	<?php if (!empty($second_box_hover_bg)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(2):hover .featured-box{
		background : <?php echo $second_box_hover_bg ?> ;
	}
	<?php } ?>

	<?php if (!empty($third_box_title_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(3) h2{
		color : <?php echo $third_box_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_desc_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(3) span{
		color : <?php echo $third_box_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_hover_title_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(3):hover h2{
		color : <?php echo $third_box_hover_title_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_hover_desc_color)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(3):hover span{
		color : <?php echo $third_box_hover_desc_color ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_bg)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(3) .featured-box{
		background : <?php echo $third_box_bg ?> ;
	}
	<?php } ?>
	<?php if (!empty($third_box_hover_bg)){ ?>
	.tmm-featured-boxes .simple-pricing-table.col-3 .column:nth-child(3):hover .featured-box{
		background : <?php echo $third_box_hover_bg ?> ;
	}
	<?php } ?>
</style>

<section class="container row featured-area tmm-featured-boxes">
		
	<div class="simple-pricing-table col-3">

		<div class="column omega">
			<a href="#" class="featured-box">
				<i class="<?php echo $first_icon; ?> iconsweets-5x"></i>
                <?php if (!empty($first_title)){ ?><h2><?php echo $first_title ?></h2><?php } ?>
                <?php if (!empty($first_description)){ ?><span><?php echo $first_description ?></span><?php } ?>
			</a>
		</div><!-- /one-third -->

		<div class="column alpha omega">
			<a href="#" class="featured-box">
				<i class="<?php echo $second_icon; ?> iconsweets-5x"></i>
                <?php if (!empty($second_title)){ ?><h2><?php echo $second_title ?></h2><?php } ?>
                <?php if (!empty($second_description)){ ?><span><?php echo $second_description ?></span><?php } ?>
			</a>
		</div><!-- /one-third -->

		<div class="column alpha">
			<a href="#" class="featured-box">
				<i class="<?php echo $third_icon; ?> iconsweets-5x"></i>
                <?php if (!empty($third_title)){ ?><h2><?php echo $third_title ?></h2><?php } ?>
                <?php if (!empty($third_description)){ ?><span><?php echo $third_description ?></span><?php } ?>
			</a>
		</div><!-- /one-third -->

	</div>

</section><!-- /featured-area -->