<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<?php
$unique_id = uniqid();

$chart_titles_js = "";
$chart_titles = explode(',', $chart_titles);
if (!empty($chart_titles)) {
	foreach ($chart_titles as $key => $value) {
		if ($key > 0) {
			$chart_titles_js.=',';
		}
		$chart_titles_js.="'" . $value . "'";
	}
}
$title = htmlspecialchars($title);
?>
<div id="chart_<?php echo $unique_id; ?>" style="width: <?php echo $width ?>px; height: <?php echo $height ?>px;"></div>
<?php
switch ($type) {
	case 'pie':
		$content = explode(',', $content);
		?>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(<?php echo "drawPieChart" . $unique_id; ?>);
			function <?php echo "drawPieChart" . $unique_id; ?>() {
				var data = google.visualization.arrayToDataTable([
		<?php if (!empty($content)): ?>
						[<?php echo $chart_titles_js; ?>],
			<?php foreach ($content as $key => $value) : $data = explode(':', $value); ?>
								[<?php
				if (!empty($data)) {
					foreach ($data as $kk => $val) {
						if ($kk > 0) {
							echo ',';
						}

						if ($kk == 0) {
							echo "'";
						}
						echo $val;
						if ($kk == 0) {
							echo "'";
						}
					}
				}
				?>],
			<?php endforeach; ?>
		<?php endif; ?>
					]);
					var options = {
						title: '<?php echo $title ?>',
						backgroundColor:'<?php echo $bgcolor ?>',
						fontName:'<?php echo $font_family ?>',
						fontSize: '<?php echo $font_size ?>',
					};
					var chart = new google.visualization.PieChart(document.getElementById('chart_<?php echo $unique_id; ?>'));
					chart.draw(data, options);
				}

		</script>


		<?php
		break;

	case 'bar':case 'column':
		$content = explode(',', $content);
		?>

		<script type="text/javascript">
				google.load("visualization", "1", {packages:["corechart"]});
				google.setOnLoadCallback(<?php echo "drawBarChart" . $unique_id; ?>);
				function <?php echo "drawBarChart" . $unique_id; ?>() {
					var data = google.visualization.arrayToDataTable([
		<?php if (!empty($content)): ?>
							[<?php echo $chart_titles_js; ?>],
			<?php foreach ($content as $key => $value) : $data = explode(':', $value); ?>
									[<?php
				if (!empty($data)) {
					foreach ($data as $kk => $val) {
						if ($kk > 0) {
							echo ',';
						}

						if ($kk == 0) {
							echo "'";
						}
						echo $val;
						if ($kk == 0) {
							echo "'";
						}
					}
				}
				?>],
			<?php endforeach; ?>
		<?php endif; ?>
						]);
						var options = {
							title: '<?php echo $title ?>',
							backgroundColor:'<?php echo $bgcolor ?>',
							fontName:'<?php echo $font_family ?>',
							fontSize: '<?php echo $font_size ?>',
		<?php if ($type == 'bar'): ?>
								vAxis: {title: '<?php echo $chart_titles[0] ?>'},
		<?php else: ?>
								hAxis: {title: '<?php echo $chart_titles[0] ?>'},
		<?php endif; ?>
						}



		<?php if ($type == 'bar'): ?>
							var chart = new google.visualization.BarChart(document.getElementById('chart_<?php echo $unique_id; ?>'));
		<?php else: ?>
							var chart = new google.visualization.ColumnChart(document.getElementById('chart_<?php echo $unique_id; ?>'));
		<?php endif; ?>

						chart.draw(data, options);
					}

		</script>


		<?php
		break;


	case 'geochart':
		$content = explode(',', $content);
		?>

		<script type="text/javascript">
					google.load('visualization', '1', {'packages': ['geochart']});
					google.setOnLoadCallback(<?php echo "drawRegionsMap" . $unique_id; ?>);
					function <?php echo "drawRegionsMap" . $unique_id; ?>() {
						var data = google.visualization.arrayToDataTable([
		<?php if (!empty($content)): ?>
								[<?php echo $chart_titles_js; ?>],
			<?php foreach ($content as $key => $value) : $data = explode(':', $value); ?>
										[<?php
				if (!empty($data)) {
					foreach ($data as $kk => $val) {
						if ($kk > 0) {
							echo ',';
						}

						if ($kk == 0) {
							echo "'";
						}
						echo $val;
						if ($kk == 0) {
							echo "'";
						}
					}
				}
				?>],
			<?php endforeach; ?>
		<?php endif; ?>
							]);
							var options = {};
							var chart = new google.visualization.GeoChart(document.getElementById('chart_<?php echo $unique_id; ?>'));
							chart.draw(data, options);
						}

		</script>


		<?php
		break;




	case 'line': case 'area':
		$content = explode(',', $content);
		?>

		<script type="text/javascript">
						google.load("visualization", "1", {packages:["corechart"]});
						google.setOnLoadCallback(<?php echo "drawChart" . $unique_id; ?>);
						function <?php echo "drawChart" . $unique_id; ?>() {
							var data = google.visualization.arrayToDataTable([
		<?php if (!empty($content)): ?>
									[<?php echo $chart_titles_js; ?>],
			<?php foreach ($content as $key => $value) : $data = explode(':', $value); ?>
											[<?php
				if (!empty($data)) {
					foreach ($data as $kk => $val) {
						if ($kk > 0) {
							echo ',';
						}

						if ($kk == 0) {
							echo "'";
						}
						echo $val;
						if ($kk == 0) {
							echo "'";
						}
					}
				}
				?>],
			<?php endforeach; ?>
		<?php endif; ?>
								]);
								var options = {
									title: '<?php echo $title ?>',
									backgroundColor:'<?php echo $bgcolor ?>',
									fontName:'<?php echo $font_family ?>',
									fontSize: '<?php echo $font_size ?>',
		<?php if ($type == 'area'): ?>
										hAxis: {title: '<?php echo $chart_titles[0] ?>'},
		<?php endif; ?>
								}



		<?php if ($type == 'line'): ?>
									var chart = new google.visualization.LineChart(document.getElementById('chart_<?php echo $unique_id; ?>'));
		<?php else: ?>
									var chart = new google.visualization.AreaChart(document.getElementById('chart_<?php echo $unique_id; ?>'));
		<?php endif; ?>
								chart.draw(data, options);
							}

		</script>


		<?php
		break;


	case 'combo':
		$content = explode(',', $content);
		?>

		<script type="text/javascript">
							google.load('visualization', '1', {'packages': ['corechart']});
							google.setOnLoadCallback(<?php echo "drawVisualization" . $unique_id; ?>);
							function <?php echo "drawVisualization" . $unique_id; ?>() {
								var data = google.visualization.arrayToDataTable([
		<?php if (!empty($content)): ?>
										[<?php echo $chart_titles_js; ?>],
			<?php foreach ($content as $key => $value) : $data = explode(':', $value); ?>
												[<?php
				if (!empty($data)) {
					foreach ($data as $kk => $val) {
						if ($kk > 0) {
							echo ',';
						}

						if ($kk == 0) {
							echo "'";
						}
						echo $val;
						if ($kk == 0) {
							echo "'";
						}
					}
				}
				?>],
			<?php endforeach; ?>
		<?php endif; ?>
									]);
									var options = {
										title : '<?php echo $title ?>',
										backgroundColor:'<?php echo $bgcolor ?>',
										fontName:'<?php echo $font_family ?>',
										fontSize: '<?php echo $font_size ?>',
										//vAxis: {title: "Cups"},
										//hAxis: {title: "Month"},
										seriesType: "bars",
										series: {5: {type: "line"}}
									};
									var chart = new google.visualization.ComboChart(document.getElementById('chart_<?php echo $unique_id; ?>'));
									chart.draw(data, options);
								}

		</script>



		<?php
		break;


	case 'table':
		$content = explode('~', $content);
		?>

		<script type='text/javascript'>
								google.load('visualization', '1', {packages:['table']});
								google.setOnLoadCallback(<?php echo "drawTable_" . $unique_id; ?>);
								function <?php echo "drawTable_" . $unique_id; ?>() {
									var data = new google.visualization.DataTable();
		<?php if (!empty($chart_titles) AND is_array($chart_titles)): ?>
			<?php foreach ($chart_titles as $key => $value):$data = explode(':', $value); ?>
												data.addColumn('<?php echo $data[0] ?>', '<?php echo $data[1] ?>');
			<?php endforeach; ?>
		<?php endif; ?>

									data.addRows([
		<?php if (!empty($content)): ?>
			<?php foreach ($content as $key => $value):$data = explode('~', $value); ?>
													[<?php echo $value ?>],
			<?php endforeach; ?>
		<?php endif; ?>
									]);
									var table = new google.visualization.Table(document.getElementById('chart_<?php echo $unique_id; ?>'));
									table.draw(data, {showRowNumber: true});
								}
		</script>



		<?php
		break;


	default:
		break;
}
