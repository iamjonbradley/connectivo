<?php
class User extends AppModel {

	var $name = 'User';
	var $actsAs = array('cakeservice');
	
	var $validate = array(
           'new_password' => array(
		       'equalTo' => array(
			       'rule' => array('equalTo', 'confirm_password' ),
				   'message' => 'Please re-enter your password twice so that the values match',
				   'allowEmpty' => true
				   )
				)
        );
        
	var $belongsTo = array(
			'Group' => array('className' => 'Group',
								'foreignKey' => 'group_id'
			)
	);
	
	function beforeSave(){
	    $this->setNewPassword();
		return true;
	}
	
	function setNewPassword() {
	    if( !empty( $this->data['User']['new_passwd_hash'] ) ){
		    $this->data['User']['password'] = $this->data['User']['new_passwd_hash'];
		}
		return TRUE;
	}
	
	function equalTo( $field=array(), $compare_field=null ) {
		foreach( $field as $key => $value ){
			$v1 = $value;
			$v2 = $this->data[$this->name][ $compare_field ];
            if($v1 !== $v2) {
			    return FALSE;
		    } else {
		       continue;
		    }
		}
		return TRUE;

    }

}
?>
