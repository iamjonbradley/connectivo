<?php

class Lead extends AppModel {
  
  var $name = 'Lead';
  
  var $belongsTo = array('Product');
  
  var $hasMany = array(
    'Note' => array(
      'className' => 'Note',
      'foreignKey' => 'lead_id',
      'dependant' => true  
    ),
    'Upload' => array(
      'className' => 'Upload',
      'foreignKey' => 'lead_id',
      'dependant' => true  
    ),
    'Contact' => array(
      'className' => 'Contact',
      'foreignKey' => 'lead_id',
      'dependant' => true  
    )
  );
  var $validate = array(
    'name' => 'notEmpty',
    'company' => 'notEmpty',
    'email' => 'email',
  );
}
?>