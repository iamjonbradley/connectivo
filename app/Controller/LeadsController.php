<?php

App::import('Vendor', 'vcard');
class LeadsController extends AppController {

  var $name = 'Leads';
  var $helpers = array('Text', 'Dojo', 'Time');
  var $paginate = array(
      'fields' => array(
        'Lead.id', 'Lead.company', 'Lead.name', 'Lead.email', 'Lead.phone', 'Lead.product_name', 'Lead.created', 'Lead.status', 
        'Product.name'   
      ),
      'order' => array('Lead.id' => 'DESC'),
      'limit' => 30,
      'recursive' => 2,
    );
  
  function index() {
    $data = $this->paginate('Lead');
    $this->set(compact('data'));
  }
  
  function view($id = null) {
    if (!empty($id) && $id != null):  
      $conditions = array(
        'conditions' => array('Lead.id' => $id),
        'recursive' => 2  
      );
      $data = $this->Lead->find('first', $conditions);
      $this->set(compact('data'));
    else:
      $this->Session->setFlash('Invalid Lead');
      $this->redirect('index', null, false);
    endif;
  }

  function add() {
    if (!empty($this->request->data)):
      if($this->Lead->save($this->request->data)):
        $this->Session->setFlash('Lead Added');
        $this->redirect('index', null, false);
      else:
        $this->Session->setFlash('Please check to make sure you have filled out all required fields');
      endif;    
    endif;
    
    $this->set('products', ClassRegistry::init('Product')->getList());
  }

  function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Session->setFlash('Invalid Lead');
      $this->redirect('index', null, false);
    }
    if (!empty($this->request->data)) {
      if ($this->Lead->save($this->request->data['Lead'])) {
        $this->Session->setFlash('Lead Saved');
        $this->redirect(array('action' => 'view', $this->request->data['Lead']['id']));
      } else {
        $this->Session->setFlash('Lead Not Saved');
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Lead->read(null, $id);
    }
      
    $this->set('products', ClassRegistry::init('Product')->getList());
  }
  
  function delete($id = null) {
    if (!empty($id) && $id != null):
      $this->Lead->delete($id, true);
      ClassRegistry::init('Note')->del(array('conditions' => array('Note.lead_id' => $id)));
      $this->Session->setFlash('Lead Deleted');
      $this->redirect('index', null, false);
    else:
      $this->Session->setFlash('Invalid Lead');
      $this->redirect('index', null, false);
    endif;
  }
      
  
  function vcard($id) {
    $this->Lead->id = $id;
    $this->Lead->recursive = -1;
      $data = $this->Lead->read(null, $id);
      
      list($firstname, $lastname) = explode(' ', $data['Lead']['name']);
      
      $info = array(
      'fileName' => 'vcardx', //file name
      'saveTo' => 'upload',  //upload dir
      'vcard_birtda' => '',        
      'vcard_f_name' => $firstname,
      'vcard_s_name' => $lastname,                   
      'vcard_uri' =>  '',
      'vcard_nickna' => $data['Lead']['name'],
      'vcard_note' =>  '',
      'vcard_cellul' =>  '',
      'vcard_c_mobile' => '',
      'vcard_compan' => $data['Lead']['company'],
      'vcard_p_pager' =>  '',
      'vcard_h_addr' =>  '',
      'vcard_h_city' => '',
      'vcard_h_coun' => '',
      'vcard_h_fax' => '',
      'vcard_h_mail' =>  '',
      'vcard_h_phon' => '',
      'vcard_h_zip' => '',
      'vcard_h_uri' => '',
      'vcard_w_addr' => '',
      'vcard_w_city' => '',
      'vcard_w_coun' => '',
      'vcard_w_fax' => '',
      'vcard_w_mail' => $data['Lead']['email'],
      'vcard_w_phon' => $this->phone($data['Lead']['phone']),
      'vcard_w_role' => '',
      'vcard_w_titl' => '',
      'vcard_w_zip' => '',
      'vcard_w_uri'  => $data['Lead']['url']
    );
    
    $vcard = new vcard($info);
    $vcard->createVcard(); 
    $vcard->DownloadVcard(); 
    exit();
  }
}
?>
