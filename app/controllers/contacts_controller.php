<?php

class ContactsController extends AppController {
	
	var $name = 'Contacts';
	
	function add($id = null) {
		if (!empty($this->data)):
			if($this->Contact->save($this->data)):
				$this->Session->setFlash('Contact Added');
				$this->redirect('/leads/view/'. $id, null, false);
			else:
				$this->Session->setFlash('Please check to make sure you have filled out all required fields');
			endif;		
		endif;
		
		$this->Lead->id = $id;
		$this->data = $this->Lead->read(null, $id);
		$this->set('types', ClassRegistry::init('ContactType')->find('list'));
	}
	
	function edit($id = null) {
		if (!empty($this->data)):
			if($this->Contact->save($this->data)):
				$this->Session->setFlash('Note Added');
				$this->redirect('/leads/view/'. $this->data['Contact']['lead_id'], null, false);
			else:
				$this->Session->setFlash('Please check to make sure you have filled out all required fields');
			endif;		
		endif;
		
		$this->Contact->id = $id;
		$this->data = $this->Contact->read(null, $id);
		$this->set('types', ClassRegistry::init('ContactType')->find('list'));
	}
	
	function delete($id = null, $lead) {
		if (!empty($id) && $id != null):
			$this->Contact->delete($id);
			$this->Session->setFlash('Contact Deleted');
			$this->redirect(array('controller' => 'leads', 'action' => 'view', $lead), null, false);
		else:
			$this->Session->setFlash('Invalid Contact');
			$this->redirect('index', null, false);
		endif;
	}
	
}
?>