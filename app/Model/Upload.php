<?php

// app/models/upload.php
class Upload extends AppModel {
	
    var $name = 'Upload';
    var $belongsTo = array('Lead', 'User');
}

?>