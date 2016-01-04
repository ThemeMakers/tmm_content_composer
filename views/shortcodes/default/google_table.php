<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
$unique_id = uniqid();
$heading = explode(',', $heading);
$content = explode('~', $content);
if (isset($content[0]) && '^' != substr( $content[0] , 0 , 1 )) {
    $content[0] = '^' . $content[0];
}
?>



<div id="table_<?php echo $unique_id; ?>" style="width: 100%; height: auto;" class="custom-table"></div>



<script type='text/javascript'>

	google.load('visualization', '1', {packages: ['table']});


	google.setOnLoadCallback(<?php echo "drawTable_" . $unique_id; ?>);


	function <?php echo "drawTable_" . $unique_id; ?>() {

		var data = new google.visualization.DataTable();
		<?php if (!empty($heading)): ?>
		<?php foreach ($heading as $key => $value):$data = explode(':', $value); ?>
		data.addColumn('<?php echo $data[0] ?>', '<?php echo @$data[1] ?>');
		<?php endforeach; ?>
		<?php endif; ?>

		data.addRows([
			<?php if (!empty($content)): ?>
			<?php foreach ($content as $key => $value):$data = explode('~', $value); ?>
			[<?php echo str_replace('^', "'", $value) ?>],
			<?php endforeach; ?>
			<?php endif; ?>
		]);
		var table = new google.visualization.Table(document.getElementById('table_<?php echo $unique_id; ?>'));
		table.draw(data, {showRowNumber: <?php echo $show_row_number; ?>});
		//*****
	}


</script>

