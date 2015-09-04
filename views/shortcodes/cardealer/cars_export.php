<?php

global $wpdb;
$query = "SELECT make,model FROM VehicleModelYear";
$RES = $wpdb->get_results($query, ARRAY_A);
$cars = array();

if (!empty($RES)) {
	foreach ($RES as $car) {
		if(!isset($cars[ucfirst($car['make'])])){
			$cars[ucfirst($car['make'])]=array();
		}
		if (!in_array($car['model'],$cars[ucfirst($car['make'])])) {
			$cars[ucfirst($car['make'])][] = $car['model'];
		}
	}
}
//***
if(!empty($cars)){
	foreach ($cars as $make => $model) {
		sort($model);
		$cars[$make]=$model;
	}
}
/*
if(!empty($cars)){
	foreach ($cars as $make => $models) {
		$t=wp_insert_term($make, 'carproducer');
		$parent_term_id=$t['term_id'];
		if(!empty($models)){
			foreach ($models as $model) {
				wp_insert_term($model, 'carproducer',array('parent'=>$parent_term_id));
			}
		}
		
	}
}
*/