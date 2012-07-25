<h1 class="tit">Leads</h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>
<p>Leads Found: <?php echo count($data) ?></p>
<table id="index">
<?php

$headers = array(
    'ID', 
    'Company', 
    'Name', 
    'Email',
    'Phone', 
    'Created', 
    'Actions'
  );
  
echo $this->Html->tableHeaders($headers);
  
foreach ($data as $key => $value):   

  if (!empty($value['Product']['name'])) $product = $value['Product']['name'];
  else $product = $value['Lead']['product_name'];
  
  switch ($value['Lead']['status']) {
    case 1: $lead_status = ' converted'; break;
    case 2: $lead_status = ' cancelled'; break;
    default: $lead_status = '';
  }
   
    echo $this->Html->tableCells(
      array(
        $value['Lead']['id'],
        ucwords($value['Lead']['company']),
        ucwords($value['Lead']['name']),
        $this->Text->autoLinkEmails($value['Lead']['email']),
        $value['Lead']['phone'],
        $this->Time->nice($value['Lead']['created']),
        $this->Html->link($this->Html->image('icons/vcard.png'), array('controller' => 'leads', 'action'=>'vcard', $value['Lead']['id']), array('escape' => false), null, false) .' '.
        $this->Html->link($this->Html->image('icons/view.png'), array('controller' => 'leads', 'action'=>'view', $value['Lead']['id']), array('escape' => false), null, false) .' '.
        $this->Html->link($this->Html->image('icons/edit.png'), array('controller' => 'leads', 'action'=>'edit', $value['Lead']['id']), array('escape' => false), null, false) .' '.
        $this->Html->link($this->Html->image('icons/delete.png'), array('controller' => 'leads', 'action'=>'delete', $value['Lead']['id']), array('escape' => false), null, false)
      ),
      array('class'=>'row'. $lead_status),
      array('class'=>'altrow'. $lead_status)
    );



endforeach;


?>
</table>