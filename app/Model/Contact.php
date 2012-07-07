<?php

class Contact extends AppModel {
	
	var $name = 'Contact';
	
	var $belongsTo = array(
		'Lead' => array(
			'className' => 'Lead',
			'foreignKey' => 'lead_id',
			'dependant' => true	
		),
		'ContactType' => array(
			'className' => 'ContactType',
			'foreignKey' => 'contact_type_id',
			'dependant' => true	
		)
	);
}
?>