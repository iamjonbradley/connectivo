<?php

class Note extends AppModel {
  
  var $name = 'Note';
  
  var $actAs = array('Containable');
  
  var $belongsTo = array('Lead', 'User');
  
  var $validate = array(
    'note' => 'notEmpty',
  );
   
  
  function getTasks() {    
    $tasks = $this->find('all', array(
      'conditions' => array(
        'AND' => array(
          'Note.date >=' =>  date('Y-m-d'),
          'Note.date <=' => date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")+3, date("y"))),
          'Note.type_id' => 0
        )  
      ),
      'order' => array('Note.date' => 'ASC'),
      'fields' => array('Lead.id','Lead.name','Note.date')
    ));
    
    if (!empty($tasks)) {
      foreach ($tasks as $key => $value) {
        $task[$value['Note']['date']][$value['Lead']['id']] = ucwords(strtolower($value['Lead']['name']));
      }
      return $task;
    }
    else return false;
    
    
  }
  
}
?>