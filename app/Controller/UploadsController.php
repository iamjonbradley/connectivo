<?php

// app/controllers/uploads_controller.php
class UploadsController extends AppController {

  var $name = 'Uploads';
  
    function add($id = null) {
        if (!empty($this->request->data) && is_uploaded_file($this->request->data['Upload']['File']['tmp_name'])) {
          
          // file information
          $fileRead = fopen($this->request->data['Upload']['File']['tmp_name'], "r");
            $fileData = fread($fileRead, $this->request->data['Upload']['File']['size']);

      // set file information for the database
            $this->request->data['Upload']['name'] = $this->request->data['Upload']['File']['name'];
            $this->request->data['Upload']['type'] = $this->request->data['Upload']['File']['type'];
            $this->request->data['Upload']['size'] = $this->request->data['Upload']['File']['size'];
            $this->request->data['Upload']['data'] = $fileData;
            
            $this->Upload->save($this->request->data);

      $this->Session->setFlash('Uploaded File Was Saved');
            $this->redirect('/leads/view/'. $this->request->data['Upload']['lead_id'], null, false);
        }
        
      $this->request->data['Upload']['lead_id'] = $id;
    }
    
    function download($id) {
      Configure::write('debug', 0);
      $this->Upload->id = $id;
      $this->Upload->recursive = -1;
      $file = $this->Upload->read(null, $id);  
      header('Content-type: ' . $file['Upload']['type']);
      header('Content-length: ' . $file['Upload']['size']); 
      header('Content-Disposition: attachment; filename="'.$file['Upload']['name'].'"');
      echo $file['Upload']['data'];  
      exit();
  }
  
  function delete($id) {
    $this->Upload->id = $id;
    $data = $this->Upload->read(null, $id);
    $this->Upload->delete($id);
    $this->Session->setFlash('File deleted successfully');
        $this->redirect('/leads/view/'. $data['Upload']['lead_id'], null, false);
  }

}

?>