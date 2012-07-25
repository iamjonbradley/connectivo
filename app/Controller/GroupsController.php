<?php
class GroupsController extends AppController {

  var $name = 'Groups';
  var $helpers = array('Html', 'Form');

  function index() {
    $this->Group->recursive = 0;
    $this->set('data', $this->paginate());
  }

  function add() {
    if (!empty($this->request->data)) {
      $this->Group->create();
      if ($this->Group->save($this->request->data)) {
        $this->Session->setFlash('Group Saved');
        $this->redirect('index');
      } else {
        $this->Session->setFlash('Group Not Saved');
      }
    }
        // for the group parent listing     
        $groups = $this->Group->find('list');
        $this->set( 'parents', $groups );
  }

  function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Session->setFlash('Group Invalid');
    }
    if (!empty($this->request->data)) {
      if ($this->Group->save($this->request->data)) {
        $this->Session->setFlash('Group Saved');
        $this->redirect('index');
      } else {
        $this->Session->setFlash('Group Not Saved');
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Group->read(null, $id);
    }
    // for the parent group
        $groups = $this->Group->find('list');
        $this->set( 'parents', $groups );
  }

  function delete($id = null) {
    if (!$id) {
      $this->Session->setFlash('Group Invalid');
    }
    if ($this->Group->del($id)) {
      $this->Session->setFlash('Group Deleted');
      $this->redirect('index');
    }
  }
}
?>
