<?php
class Group extends AppModel {

	var $name = 'Group';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'group_id',
								'dependent' => false
			)
	);

	var $validate = array( 
	   'name' => 'notEmpty',
	);
	
	function parentNode(){
    
        // This should be the alias of the parent $model::$id
        $data = $this->read();
    
        // This needs to be unique    
        return 'Group:'.$data['Group']['parent_id'];
    }

}
?>
