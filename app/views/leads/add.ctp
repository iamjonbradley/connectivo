<h1 class="tit">Add Lead</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>

		<?=$form->create('Leads');?>
			<?=$form->input('Lead.id', array('type' => 'hidden')); ?>
			<fieldset>
				<table class="nostyle">
					<tbody>
					<tr>
						<td class="va-top">Status:</td>
						<td><?=$form->input('Lead.status', array('label' => '', 'options' => array(0 => 'Lead', 1 => 'Converted to Sales Rep', 2 => 'Cancelled'), 'type' => 'select', 'class' => 'input-text'));?></td>
					</tr>
					<tr>
						<td style="width: 90px;">Name:</td>
						<td><?=$form->input('Lead.name', array('label' => '', 'size' => '40', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Company:</td>
						<td><?=$form->input('Lead.company', array('label' => '', 'size' => '40', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$form->input('Lead.email', array('label' => '', 'size' => '40', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Phone:</td>
						<td><?=$form->input('Lead.phone', array('label' => '', 'size' => '20', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Website:</td>
						<td><?=$form->input('Lead.url', array('label' => '', 'size' => '40', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Lead Source:</td>
						<td><?=$form->input('Lead.source', array('label' => '', 'size' => '30', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Product:</td>
						<td><?=$form->input('Lead.product_id', array('label' => '', 'options' => $products, 'type' => 'select', 'class' => 'input-text'));?></td>
					</tr>
					<tr>
						<td class="va-top">Other:</td>
						<td><?=$form->input('Lead.product_name', array('label' => '', 'size' => '30', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
					</tr>
				</tbody>				
			</table>
			</fieldset>
		<?=$form->end();?>