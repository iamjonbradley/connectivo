<h1 class="tit">Products</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>
<p><?php echo $paginator->counter(array('format' => 'Products Found: %count%')); ?></p>
<?=$this->element('pagination');?>
<table id="index">
<?php

$headers = array(
		$paginator->sort('ID', 'id'),
		$paginator->sort('Name', 'name'),
		'Actions'
	);
	
echo $html->tableHeaders($headers);
	
foreach ($data as $key => $value):	  
		echo $html->tableCells(
			array(
				$value['Product']['id'],
				$value['Product']['name'],
				$html->link($html->image('icons/edit.png'), array('action'=>'edit', $value['Product']['id']), array('escape' => false), null, false) .' '.
				$html->link($html->image('icons/delete.png'), array('action'=>'delete', $value['Product']['id']), array('escape' => false), null, false)
			),
			array('class'=>'row'),
			array('class'=>'altrow')
		);



endforeach;


?>
</table>
<?=$this->element('pagination');?>