<?php
class NotesController extends AppController {

	var $name = 'Notes';
	var $uses = array('Note', 'Lead');

	function add($id = null) {
		if (!empty($this->data)):
			if($this->Note->save($this->data)):
				$this->Session->setFlash('Note Added');
				$this->redirect('/leads/view/'. $id, null, false);
			else:
				$this->Session->setFlash('Please check to make sure you have filled out all required fields');
			endif;		
		endif;
		
		$this->Lead->id = $id;
		$this->data = $this->Lead->read(null, $id);
	}
	
	function edit($id = null) {
		if (!empty($this->data)):
			if($this->Note->save($this->data)):
				$this->Session->setFlash('Note Added');
				$this->redirect('/leads/view/'. $this->data['Note']['lead_id'], null, false);
			else:
				$this->Session->setFlash('Please check to make sure you have filled out all required fields');
			endif;		
		endif;
		
		$this->Note->id = $id;
		$this->data = $this->Note->read(null, $id);
	}
	
	function delete($id = null, $lead) {
		if (!empty($id) && $id != null):
			$this->Note->delete($id);
			$this->Session->setFlash('Lead Deleted');
			$this->redirect(array('controller' => 'leads', 'action' => 'view', $lead), null, false);
		else:
			$this->Session->setFlash('Invalid Lead');
			$this->redirect('index', null, false);
		endif;
	}

}
?>
