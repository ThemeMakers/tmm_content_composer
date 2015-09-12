<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
$cols = explode('^', $content);
$heads_types = explode('^', $heads_types);
?>

<?php if (!empty($cols)): ?>
	[<?php
	foreach ($cols as $i => $val) {
		if ($i > 0) {
			echo ',';
		}
		if ($heads_types[$i] == 'string') {
			echo '"' . $val . '"';
		} else {
			echo "{v: {$val}, f: '{$val}'}";
		}
	}
	?>],
<?php endif; ?>
