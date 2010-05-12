<h1 class="tit">Leads</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>
<p><?php echo $paginator->counter(array('format' => 'Clients Found: %count%')); ?></p>
<?=$this->element('pagination');?>
<table id="index">
<?php

$headers = array(
		$paginator->sort('ID', 'id'),
		$paginator->sort('Company', 'company'),
		$paginator->sort('Name', 'name'),
		$paginator->sort('Email', 'email'),
		$paginator->sort('Phone', 'phone'),
		$paginator->sort('Product', 'product'),
		$paginator->sort('Created', 'created'),
		'Actions'
	);
	
echo $html->tableHeaders($headers);
	
foreach ($data as $key => $value):	 

	if (!empty($value['Product']['name'])) $product = $value['Product']['name'];
	else $product = $value['Lead']['product_name'];
	
	switch ($value['Lead']['status']) {
		case 1: $lead_status = ' converted'; break;
		case 2: $lead_status = ' cancelled'; break;
		default: $lead_status = '';
	}
	 
		echo $html->tableCells(
			array(
				$value['Lead']['id'],
				ucwords($value['Lead']['company']),
				ucwords($value['Lead']['name']),
				$text->autoLinkEmails($value['Lead']['email']),
				$dojo->phone($value['Lead']['phone']),
				$product,
				$time->nice($value['Lead']['created']),
				$html->link($html->image('icons/vcard.png'), array('action'=>'vcard', $value['Lead']['id']), array('escape' => false), null, false) .' '.
				$html->link($html->image('icons/view.png'), array('action'=>'view', $value['Lead']['id']), array('escape' => false), null, false) .' '.
				$html->link($html->image('icons/edit.png'), array('action'=>'edit', $value['Lead']['id']), array('escape' => false), null, false) .' '.
				$html->link($html->image('icons/delete.png'), array('action'=>'delete', $value['Lead']['id']), array('escape' => false), null, false)
			),
			array('class'=>'row'. $lead_status),
			array('class'=>'altrow'. $lead_status)
		);



endforeach;


?>
</table>
<?=$this->element('pagination')?>