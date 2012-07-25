<?php

class ActionLogsController extends AppController {

  var $name = 'ActionLogs';
   var $helpers = array('Time');

  function index() {
    $this->paginate = array(
        'conditions' => array(
          'ActionLog.action' => array(
            'add', 'edit', 'delete'
          )
        ),
        'order' => 'ActionLog.created DESC'
      );
    $data = $this->paginate('ActionLog');
    $this->set(compact('data'));
  }

}
?>
