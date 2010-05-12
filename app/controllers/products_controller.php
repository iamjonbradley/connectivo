<?php
class ProductsController extends AppController {

	var $name = 'Products';

	function add() {
		if (!empty($this->data)):
			if($this->Product->save($this->data)):
				$this->Session->setFlash('Product Added');
				$this->redirect('index', null, false);
			else:
				$this->Session->setFlash('Please check to make sure you have filled out all required fields');
			endif;		
		endif;
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Product Invalid');
			$this->redirect('index');
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash('Product Saved');
				$this->redirect('index');
			} else {
				$this->Session->setFlash('Product Not Saved');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
	}
	
	function delete($id = null) {
		if (!empty($id) && $id != null):
			$this->Product->delete($id);
			$this->Session->setFlash('Product Deleted');
			$this->redirect('index', null, false);
		else:
			$this->Session->setFlash('Invalid Product');
			$this->redirect('index', null, false);
		endif;
	}
	
	function index() {
		$this->paginate = array(
			'order' => array('Product.id'),
			'recursive' => -1,
			'limit' => 15	
		);
		$data = $this->paginate('Product');
		$this->set(compact('data'));
	}

}
?>
