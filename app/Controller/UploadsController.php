<?php

// app/controllers/uploads_controller.php
class UploadsController extends AppController {

	var $name = 'Uploads';
	
    function add($id = null) {
        if (!empty($this->data) && is_uploaded_file($this->data['Upload']['File']['tmp_name'])) {
        	
        	// file information
        	$fileRead = fopen($this->data['Upload']['File']['tmp_name'], "r");
            $fileData = fread($fileRead, $this->data['Upload']['File']['size']);

			// set file information for the database
            $this->data['Upload']['name'] = $this->data['Upload']['File']['name'];
            $this->data['Upload']['type'] = $this->data['Upload']['File']['type'];
            $this->data['Upload']['size'] = $this->data['Upload']['File']['size'];
            $this->data['Upload']['data'] = $fileData;
            
            $this->Upload->save($this->data);

			$this->Session->setFlash('Uploaded File Was Saved');
            $this->redirect('/leads/view/'. $this->data['Upload']['lead_id'], null, false);
        }
        
    	$this->data['Upload']['lead_id'] = $id;
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