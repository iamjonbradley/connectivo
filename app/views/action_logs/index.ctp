<h1 class="tit">Action Logs</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>
<?=$this->element('pagination');?>
<table id="index">
<?php

$headers = array(
		$paginator->sort('ID', 'id'),
		$paginator->sort('User', 'user_id'),
		$paginator->sort('Controller', 'controller'),
		$paginator->sort('Action', 'action'),
		$paginator->sort('ID', 'params'),
		$paginator->sort('Date', 'created'),
		$paginator->sort('When', 'created'),
		'View',
	);
	
echo $html->tableHeaders($headers);
	
foreach ($data as $key => $value):	  
	
	switch ($value['ActionLog']['action']) {
		case 'edit':
		case 'view':
			if ($value['ActionLog']['controller'] == 'settings'):
				$link = $html->link($html->image('icons/view.png'), array('controller' => $value['ActionLog']['controller'], 'action'=>'index'), array('escape' => false), null, false);
			else:
				$link = $html->link($html->image('icons/view.png'), array('controller' => $value['ActionLog']['controller'], 'action'=>'view', $value['ActionLog']['params']), array('escape' => false), null, false);
			endif;
			break;
		default:
			$link = '';
	}
		
		echo $html->tableCells(
			array(
				$value['ActionLog']['id'],
				ucwords($value['User']['name']),
				ucwords($value['ActionLog']['controller']),
				ucwords($value['ActionLog']['action']),
				ucwords($value['ActionLog']['params']),
				$time->nice($value['ActionLog']['created']),
				$time->timeAgoInWords($value['ActionLog']['created']),
				$link
			),
			array('class'=>'row'),
			array('class'=>'altrow')
		);



endforeach;


?>
</table>
<?=$this->element('pagination');?>