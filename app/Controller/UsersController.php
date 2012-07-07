<?php
class UsersController extends AppController {

	var $name = 'Users';
	
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function login() {
	}
    
    function logout() {
        $this->Session->setFlash('You have successfully logged out.');
        $this->redirect($this->Auth->logout());
    }

	function index() {
		$this->User->recursive = 0;
		$this->set('data', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash('invalid', 'index');
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			$this->__convertPasswords();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('User Saved');
				$this->redirect('index');
			} else {
				$this->Session->setFlash('User Not Saved');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash('invalid', 'index');
		}
		if (!empty($this->data)) {
			$this->__convertPasswords();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('User Saved');
				$this->redirect('index');
			} else {
				$this->Session->setFlash('User Not Saved');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('User Invalid');
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash('User Deleted');
			$this->redirect('index');
		}
	}
	
	function xmlLogin() {
	    // Verify request is from a webservice
	    if ($this->Session->check('webserviceRequest')) {
	        $this->Session->delete('webserviceRequest');
	
	        // Default response
	        $errorMessage = 'Login is required to acodeess this resource';
	        $errorCode = 'login_required';
	
	        // Check to see if data was posted
	        if (!empty($this->data)) {
	            // Parse the XML object into an array
	            $data = Set::reverse($this->data);
	
	            // Hash the passwords
	            $this->data = $this->Auth->hashPasswords($data['Users']);
	
	            // Login
	            if($this->Auth->login($this->data)) {
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

		
    /**
     * Hash submitted passwords according to the scheme used by the Auth component
	 *
	 * We need to keep a copy of the string submitted by the user, so we can
	 * use built-in validation rules on it.  However, we also need to convert this value
	 * to the hashed string that will be stored in the database.
	 *
	 * @access private
	 * @return null
     *
     */
	function __convertPasswords()
	{
	    if(!empty( $this->data['User']['new_password'] ) ){
            // we still want to validate the value entered in new_passwd
            // so we store the hashed value in a new data field which
            // we will later pass on to the passwd field in an 
            // afterSave() function 
		    $this->data['User']['password'] = $this->Auth->password( $this->data['User']['new_password'] );
		}
	}

}
?>
