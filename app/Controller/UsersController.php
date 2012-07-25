<?php


App::uses('Sanitize', 'Utility');
class UsersController extends AppController {

  var $name = 'Users';
  
  public function beforeFilter() {
  }
  
  public function login() {
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirect());
      } else {
        $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
      }
    }
  }
    
  public function logout() {
    $this->Session->setFlash('You have successfully logged out.');
    $this->redirect($this->Auth->logout());
  }

  public function index() {
    $this->User->recursive = 0;
    $this->set('data', $this->paginate());
  }

  public function view($id = null) {
    if (!$id) {
      $this->flash('invalid', 'index');
    }
    $this->set('user', $this->User->read(null, $id));
  }

  public function add() {

    if (!empty($this->request->data)) {
      $data = Sanitize::clean($this->request->data);
      $data['User']['password'] = self::__convertPasswords($data['User']['password'], null, true);
      if ($this->User->save($data)) {
        $this->Session->setFlash('User Saved');
        $this->redirect('index');
      } else {
        $this->Session->setFlash('User Not Saved');
      }
    }
    $groups = $this->User->Group->find('list');
    $this->set(compact('groups'));
  }

  public function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->flash('invalid', 'index');
    }
    if (!empty($this->request->data)) {
      $this->__convertPasswords();
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash('User Saved');
        $this->redirect('index');
      } else {
        $this->Session->setFlash('User Not Saved');
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->User->read(null, $id);
    }
    $groups = $this->User->Group->find('list');
    $this->set(compact('groups'));
  }

  public function delete($id = null) {
    if (!$id) {
      $this->Session->setFlash('User Invalid');
    }
    if ($this->User->del($id)) {
      $this->Session->setFlash('User Deleted');
      $this->redirect('index');
    }
  }
  
  public function xmlLogin() {
      // Verify request is from a webservice
      if ($this->Session->check('webserviceRequest')) {
          $this->Session->delete('webserviceRequest');
  
          // Default response
          $errorMessage = 'Login is required to acodeess this resource';
          $errorCode = 'login_required';
  
          // Check to see if data was posted
          if (!empty($this->request->data)) {
              // Parse the XML object into an array
              $data = Set::reverse($this->request->data);
  
              // Hash the passwords
              $this->request->data = $this->Auth->hashPasswords($data['Users']);
  
              // Login
              if($this->Auth->login($this->request->data)) {
                  $errorMessage = 'Logged in';
                  $errorCode    = 'auth_sucodeess';
              } else {
                  $errorMessage = 'Invalide username or password';
                  $errorCode = 'auth_fail';
              }
  
          }
  
          // Generate the response
          $this->cakeError('serviceResponse', array('errorMessage' => $errorMessage, 'errorCode' => $errorCode));
      }
  }
  
  private function __convertPasswords($password)
  {
     return Security::hash($password, null, true);
  }

}
?>
