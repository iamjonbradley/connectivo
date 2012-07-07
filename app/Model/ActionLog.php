<?php

class ActionLog extends AppModel {
	
	var $name = 'ActionLog';
	
	var $belongsTo = array(
		'User',
		'Lead' => array(
			'className' => 'Lead',
			'foreignKey' => 'params'	
		)
	);
	
}
?>