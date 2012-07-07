<?php

class SearchController extends AppController {
	
	var $name = 'Search';
	
	var $fields = array('Lead.id', 'Lead.company', 'Lead.name', 'Lead.email', 'Lead.phone', 'Lead.product_name', 'Lead.created', 'Lead.status');
	var $order = array('Lead.id' => 'DESC');
	var $recursive = 2;
	
	function index() {
		if (!empty($this->data)) {
			switch ($this->data['model']) {
				case 'Note':
					$conditions = array(
						'conditions' => array(
							'Note.note LIKE' => '%'. $this->data['keyword'] .'%'	
						),
						'group' => array('Note.lead_id'),
						'fields' => $this->fields,
						'order' => $this->order,
						'recursive' => 0,
					);
					$this->Lead = new ClassRegistry::init('Lead');
					$this->Lead->Note->unbindModel(array('belongsTo' => array('User')));
					$data = this->LeadNote->find('all', $conditions);
					break;
				case 'Contact':
					$conditions = array(
						'conditions' => array(
							'OR' => array(
								'Contact.name LIKE' => '%'. $this->data['keyword'] .'%',
								'Contact.value LIKE' => '%'. $this->data['keyword'] .'%'	
							)
						),
						'group' => array('Contact.lead_id'),
						'fields' => $this->fields,
						'order' => $this->order,
						'recursive' => 0,
					);
					$this->Lead = new ClassRegistry::init('Lead');
					$data = $this->Lead->Contact->find('all', $conditions);
					break;
				case 'Lead':
					$conditions = array(
						'conditions' => array(
							'OR' => array(
								'Lead.company LIKE' => '%'. $this->data['keyword'] .'%',
								'Lead.name LIKE' => '%'. $this->data['keyword'] .'%',
								'Lead.email LIKE' => '%'. $this->data['keyword'] .'%',
								'Lead.phone LIKE' => '%'. $this->data['keyword'] .'%'
							)
						),
						'group' => array('Lead.id'),
						'fields' => $this->fields,
						'order' => $this->order,
						'recursive' => 0,
					);
					$this->Lead = new ClassRegistry::init('Lead');
					$data = $this->Lead->find('all', $conditions);
					break;
			}		
			$this->set(compact('data'));	
		}
		else {
			$this->redirect(array('controller' => 'leads'), null, true);
		}
	}
}
?>