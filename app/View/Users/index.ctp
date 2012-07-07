<h1 class="tit">Users</h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>
<?php echo $this->element('pagination');?>
<table id="index">
<?php

$headers = array(
		$paginator->sort('ID', 'id'),
		$paginator->sort('Name', 'Group.name'),
		$paginator->sort('Name', 'User.name'),
		$paginator->sort('Name', 'username'),
		'Action'
	);
	
echo $this->Html->tableHeaders($headers);
	
foreach ($data as $key => $value):	  
		echo $this->Html->tableCells(
			array(
				$value['User']['id'],
				$value['Group']['name'],
				$value['User']['name'],
				$value['User']['username'],
				$this->Html->link($this->Html->image('icons/edit.png'), array('action'=>'edit', $value['User']['id']), array('escape' => false), null, false) .' '.
				$this->Html->link($this->Html->image('icons/delete.png'), array('action'=>'delete', $value['User']['id']), array('escape' => false), null, false)
			),
			array('class'=>'row'),
			array('class'=>'altrow')
		);



endforeach;


?>
</table>
<?php echo $this->element('pagination');?>