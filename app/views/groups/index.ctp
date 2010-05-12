<h1 class="tit">Groups</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>
<?=$this->element('pagination');?>
<table id="index">
<?php

$headers = array(
		$paginator->sort('ID', 'id'),
		$paginator->sort('Name', 'name'),
		'Edit', 'Delete'
	);
	
echo $html->tableHeaders($headers);
	
foreach ($data as $key => $value):	  
		echo $html->tableCells(
			array(
				$value['Group']['id'],
				$value['Group']['name'],
				$html->link($html->image('/design/ico-info.gif'), array('controller'=>'groups', 'action'=>'edit', $value['Group']['id']), null, null, false),
				$html->link($html->image('/design/ico-delete.gif'), array('controller'=>'groups', 'action'=>'delete', $value['Group']['id']), null, null, false)
			),
			array('class'=>'row'),
			array('class'=>'altrow')
		);



endforeach;


?>
</table>
<?=$this->element('pagination');?>