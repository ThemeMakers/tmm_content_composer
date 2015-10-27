<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<?php
$unique_id = uniqid();
$heads_values = explode('^', $heads_values);
$heads_types = explode('^', $heads_types);
//parsing table data
$content = explode('__GOOGLE_TABLE_ROW__', $content);
$rows_shortcodes_content = "";
foreach ($content as $value) {
	$rows_shortcodes_content.='[google_table_row heads_types="' . implode('^', $heads_types) . '"]' . $value . '[/google_table_row]';
}
?>
<div id="table_<?php echo $unique_id; ?>" style="width: 100%; height: auto;" class="custom-table"></div>
<script type='text/javascript'>
	google.load('visualization', '1', {packages: ['table']});
	google.setOnLoadCallback(<?php echo "drawTable_" . $unique_id; ?>);
	//***
	function <?php echo "drawTable_" . $unique_id; ?>() {
		var data = new google.visualization.DataTable();
<?php if (!empty($heads_values)): ?>
	<?php foreach ($heads_values as $key => $value): ?>
				data.addColumn('<?php echo $heads_types[$key] ?>', '<?php echo $value ?>');
	<?php endforeach; ?>
<?php endif; ?>
		data.addRows([<?php echo str_replace(array('<br />', '<br>'), '', do_shortcode($rows_shortcodes_content)); ?>]);
		var table = new google.visualization.Table(document.getElementById('table_<?php echo $unique_id; ?>'));
		table.draw(data, {showRowNumber: <?php echo $show_row_number; ?>});
	}
</script>