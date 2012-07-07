<h1 class="tit">Products</h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>
<p><?php echo $paginator->counter(array('format' => 'Products Found: %count%')); ?></p>
<?php echo $this->element('pagination');?>
<table id="index">
<?php

$headers = array(
		$paginator->sort('ID', 'id'),
		$paginator->sort('Name', 'name'),
		'Actions'
	);
	
echo $this->Html->tableHeaders($headers);
	
foreach ($data as $key => $value):	  
		echo $this->Html->tableCells(
			array(
				$value['Product']['id'],
				$value['Product']['name'],
				$this->Html->link($this->Html->image('icons/edit.png'), array('action'=>'edit', $value['Product']['id']), array('escape' => false), null, false) .' '.
				$this->Html->link($this->Html->image('icons/delete.png'), array('action'=>'delete', $value['Product']['id']), array('escape' => false), null, false)
			),
			array('class'=>'row'),
			array('class'=>'altrow')
		);



endforeach;


?>
</table>
<?php echo $this->element('pagination');?>