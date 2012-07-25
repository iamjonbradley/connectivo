<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
  
  var $components = array('Auth', 'RequestHandler', 'Session', 'DebugKit.Toolbar');
  var $passed = null;
  var $replace = array(
      'phone' => array('+', '-', '(', ')', ' ')
    );

   function beforeFilter() {  
    // auth component stuff
    $this->Auth->loginRedirect    = array('controller' => 'leads', 'action' => 'index');
    $this->Auth->allowedActions   = array('*');
    
    // if the user is logged in and see if they have open timeclocks and projects
    if ($this->Auth->user()) {      
      // log the user's actions
      foreach ($this->request->params['pass'] as $pass) {
        $this->passed .= $pass . ',';
      }
      
      $this->passed = rtrim($this->passed, ",");
      $this->logAction();
      }
      else {
          if ($this->request->params['action'] != 'login') $this->redirect('/users/login');
      }
    
    // set our default page title into our view based off the current controller name
    $this->pageTitle = Inflector::humanize($this->request->params['controller']) . ' : ' . Inflector::humanize($this->request->params['action']);
  }
  
  // this function tracks our user's actions
  function logAction () {
    // prepare the data variable
    $this->request->data['ActionLog']['user_id']    = $this->Auth->user('id');
    $this->request->data['ActionLog']['controller'] = $this->request->params['controller'];
    $this->request->data['ActionLog']['action']     = $this->request->params['action'];
    $this->request->data['ActionLog']['params']     = $this->passed;
    
    // insert new log
    $this->ActionLog = ClassRegistry::init('ActionLog');
    $this->ActionLog->create();
    $this->ActionLog->save($this->request->data);
    
    unset($this->request->data['ActionLog']);
  }

  function beforeRender() {  
    if ($this->Auth->user()) {      
       $this->set('task', ClassRegistry::init('Note')->getTasks());
    }
  }
    
  /**
   * Phone Format Utility for 10 digit US Phone numbers
   */
  function phone($data = '') {
    $data = str_replace($this->replace['phone'], '', $data);
    $data = ereg_replace("[^0-9]",'',$data);
    if(strlen($data) == 10) $data = '('. substr($data,0,3) .') '. substr($data,3,3) .'-'. substr($data,6,4);
    else $data = '('. substr($data,1,3) .') '. substr($data,4,3) .'-'. substr($data,7,4);
    return($data);
  }
}
?>