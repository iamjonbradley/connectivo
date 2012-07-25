<h1 class="tit">Groups</h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>
<?php echo $this->element('pagination');?>
<table id="index">
<?php

$headers = array(
    $this->Paginator->sort('ID', 'id'),
    $this->Paginator->sort('Name', 'name'),
    'Edit', 'Delete'
  );
  
echo $this->Html->tableHeaders($headers);
  
foreach ($data as $key => $value):    
    echo $this->Html->tableCells(
      array(
        $value['Group']['id'],
        $value['Group']['name'],
        $this->Html->link($this->Html->image('/design/ico-info.gif'), array('controller'=>'groups', 'action'=>'edit', $value['Group']['id']), null, null, false),
        $this->Html->link($this->Html->image('/design/ico-delete.gif'), array('controller'=>'groups', 'action'=>'delete', $value['Group']['id']), null, null, false)
      ),
      array('class'=>'row'),
      array('class'=>'altrow')
    );



endforeach;


?>
</table>
<?php echo $this->element('pagination');?>