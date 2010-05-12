<h1 class="tit">Users</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>
<?=$this->element('pagination');?>
<table id="index">
<?php

$headers = array(
		$paginator->sort('ID', 'id'),
		$paginator->sort('Name', 'Group.name'),
		$paginator->sort('Name', 'User.name'),
		$paginator->sort('Name', 'username'),
		'Action'
	);
	
echo $html->tableHeaders($headers);
	
foreach ($data as $key => $value):	  
		echo $html->tableCells(
			array(
				$value['User']['id'],
				$value['Group']['name'],
				$value['User']['name'],
				$value['User']['username'],
				$html->link($html->image('icons/edit.png'), array('action'=>'edit', $value['User']['id']), array('escape' => false), null, false) .' '.
				$html->link($html->image('icons/delete.png'), array('action'=>'delete', $value['User']['id']), array('escape' => false), null, false)
			),
			array('class'=>'row'),
			array('class'=>'altrow')
		);



endforeach;


?>
</table>
<?=$this->element('pagination');?>