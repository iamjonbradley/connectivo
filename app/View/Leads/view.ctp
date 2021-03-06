
<h1 class="tit">Lead  <?php echo $data['Lead']['id']?>: <? echo ucwords($data['Lead']['company'])?> </h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>

<h2>Contact Information - <?php echo $this->Html->link('Edit', array('action'=>'edit', $data['Lead']['id']), null, null, false);?></h2>
<table id="index">
<?php
  
echo $this->Html->tableHeaders(
  array('ID', 'Name', 'Company', 'Email', 'Phone', 'Website', 'Source', 'Product')
  ); 

if (!empty($data['Product']['name'])) $product = $data['Product']['name'];
else {
  if (!empty($data['Lead']['product_name'])) $product = $data['Lead']['product_name'];
  else $product = '';
}
    
echo $this->Html->tableCells(
    array(
      $data['Lead']['id'],
      $data['Lead']['name'],
      $data['Lead']['company'],
      $this->Text->autoLinkEmails($data['Lead']['email']),
      $this->Dojo->phone($data['Lead']['phone']),
      $this->Text->autoLinkUrls($data['Lead']['url'], array('target' => 'new')),
      $data['Lead']['source'],
      $product,
    )
  );
?>
</table>
<table id="index">
  <tr>
    <td style="font-weight: bold; text-align: right; text-valign: middle" colspan="8">
      <?php echo $this->Html->link('Add Contact', array('controller'=>'contacts', 'action'=>'add', $data['Lead']['id']), null, null, false)?>
    </td>
  </tr>
<?php
  echo $this->Html->tableHeaders(
    array('ID', 'Contact Type', 'Name', 'Detials', 'Created', 'Modified', 'Actions')
  ); 
    
if (!empty($data['Contact'])) {
  foreach ($data['Contact'] as $key => $value) {
    echo $this->Html->tableCells(
      array(
        $value['id'],
        $value['ContactType']['name'],
        $value['name'],
        $value['value'],
        $this->Time->nice($value['created']),
        $this->Time->nice($value['modified']),
        $this->Html->link($this->Html->image('icons/edit.png'), array('controller' => 'contacts', 'action'=>'edit', $value['id']), null, null, false) .' '.
        $this->Html->link($this->Html->image('icons/delete.png'), array('controller' => 'contacts', 'action'=>'delete', $value['id'], $value['lead_id']), null, null, false)
      )
    );
  }
}
echo '</table>';
?>
<table id="index">
  <tr>
    <td style="font-weight: bold; text-align: right; text-valign: middle" colspan="8">
      <?php echo $this->Html->link('Add Note', array('controller'=>'notes', 'action'=>'add', $data['Lead']['id']), null, null, false)?>
    </td>
  </tr>
<?php
  echo $this->Html->tableHeaders(
    array('ID', 'Added By', 'Type', 'Note', 'Due Date', 'Created', 'Modified', 'Actions')
    ); 
if (!empty($data['Note'])) {
  foreach ($data['Note'] as $key => $value) {
  if ($value['type_id'] == 0) {
    $type = "Reminder";
    $date = $this->Time->niceShort($value['date']);
  }
  else {
    $type = "Note";
    $date = 'N/A';
  } 
  echo $this->Html->tableCells(
      array(
        $value['id'],
        $value['User']['name'],
        $type,
        $value['note'],
        $date,
        $this->Time->nice($value['created']),
        $this->Time->nice($value['modified']),
        $this->Html->link($this->Html->image('icons/edit.png'), array('controller' => 'notes', 'action'=>'edit', $value['id']), null, null, false) .' '.
        $this->Html->link($this->Html->image('icons/delete.png'), array('controller' => 'notes', 'action'=>'delete', $value['id'], $value['lead_id']), null, null, false)
      )
    );
  }
}
echo '</table>';
?>
<table id="index">
  <tr>
    <td style="font-weight: bold; text-align: right; text-valign: middle" colspan="8">
      <?php echo $this->Html->link('Add File', array('controller'=>'uploads', 'action'=>'add', $data['Lead']['id']), null, null, false)?>
    </td>
  </tr>
<?php
  echo $this->Html->tableHeaders(
    array('ID', 'Added By', 'Description', 'FileName', 'Type', 'Size', 'Created', 'Actions')
    ); 
if (!empty($data['Upload'])) {
  foreach ($data['Upload'] as $key => $value) {
    
    switch ($value['type']) {
      case 'application/pdf': $icon = 'doc_pdf'; break;
      case 'image/pdf': $icon = 'doc_pdf'; break;
      case 'application/msword': $icon = 'doc_word'; break;
      case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': $icon = 'doc_excel'; break;
      default: $icon = 'view'; break;
    }

    echo $this->Html->tableCells(
      array(
        $value['id'],
        $value['User']['name'],
        $value['description'],
        $value['name'],
        $value['type'],
        $this->Dojo->filesize($value['size']),
        $this->Time->nice($value['created']),
        $this->Html->link($this->Html->image('icons/'. $icon .'.png'), array('controller' => 'uploads', 'action'=>'download', $value['id']), null, null, false) .' '.
        $this->Html->link($this->Html->image('icons/delete.png'), array('controller' => 'uploads', 'action'=>'delete', $value['id']), null, null, false)
      )
    );
  }
}
echo '</table>';
?>


