<h1 class="tit">Action Logs</h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>
<?php echo $this->element('pagination');?>
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
	
echo $this->Html->tableHeaders($headers);
	
foreach ($data as $key => $value):	  
	
	switch ($value['ActionLog']['action']) {
		case 'edit':
		case 'view':
			if ($value['ActionLog']['controller'] == 'settings'):
				$link = $this->Html->link($this->Html->image('icons/view.png'), array('controller' => $value['ActionLog']['controller'], 'action'=>'index'), array('escape' => false), null, false);
			else:
				$link = $this->Html->link($this->Html->image('icons/view.png'), array('controller' => $value['ActionLog']['controller'], 'action'=>'view', $value['ActionLog']['params']), array('escape' => false), null, false);
			endif;
			break;
		default:
			$link = '';
	}
		
		echo $this->Html->tableCells(
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
<?php echo $this->element('pagination');?>