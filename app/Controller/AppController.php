<?php

App::uses('Controller', 'Controller');
App::uses('Security', 'Utility');

class AppController extends Controller {
  
  public $components = array(
    'Auth', 
    'RequestHandler', 
    'Session', 
  );
  public $passed = null;
  public $replace = array(
      'phone' => array('+', '-', '(', ')', ' ')
    );

  public function beforeFilter() {  

    Security::setHash('sha256');
    
    // auth component stuff
    $this->Auth->loginAction      = array('controller' => 'users', 'action' => 'login');
    $this->Auth->loginRedirect    = array('controller' => 'leads', 'action' => 'index');
    
    // if the user is logged in and see if they have open timeclocks and projects
    if ($this->Auth->user()) {      
      // log the user's actions
      foreach ($this->request->params['pass'] as $pass) {
        $this->passed .= $pass . ',';
      }
      
      $this->passed = rtrim($this->passed, ",");
      // $this->logAction();
    }
    
    // set our default page title into our view based off the current controller name
    $this->pageTitle = Inflector::humanize($this->request->params['controller']) . ' : ' . Inflector::humanize($this->request->params['action']);
  }
  
  // this function tracks our user's actions
  public function logAction () {
    // prepare the data variable
    $this->request->data['ActionLog']['user_id']    = $this->Auth->user('id');
    $this->request->data['ActionLog']['controller'] = $this->request->params['controller'];
    $this->request->data['ActionLog']['action']     = $this->request->params['action'];
    $this->request->data['ActionLog']['params']     = $this->passed;
    
    // insert new log
    Controller::loadModel('ActionLog');
    $this->ActionLog->create();
    $this->ActionLog->save($this->request->data);
    
    unset($this->request->data['ActionLog']);
  }

  public function beforeRender() {  
    if ($this->Auth->user()) {      
       $this->set('task', ClassRegistry::init('Note')->getTasks());
    }
  }
    
  /**
   * Phone Format Utility for 10 digit US Phone numbers
   */
  public function phone($data = '') {
    $data = str_replace($this->replace['phone'], '', $data);
    $data = ereg_replace("[^0-9]",'',$data);
    if(strlen($data) == 10) $data = '('. substr($data,0,3) .') '. substr($data,3,3) .'-'. substr($data,6,4);
    else $data = '('. substr($data,1,3) .') '. substr($data,4,3) .'-'. substr($data,7,4);
    return($data);
  }
}