<h1 class="tit">Add Lead</h1>
<?php if ($this->Session->check('Message.flash')) $this->Session->flash(); ?>
		<?php echo $this->Form->create('Leads', array('action' => 'edit'));?>
			<?php echo $this->Form->input('Lead.id', array('type' => 'hidden')); ?>
			<fieldset>
				<table class="nostyle">
					<tbody>
					<tr>
						<td class="va-top">Status:</td>
						<td><?php echo $this->Form->input('Lead.status', array('label' => '', 'options' => array(0 => 'Lead', 1 => 'Converted to Sales Rep', 2 => 'Cancelled'), 'type' => 'select', 'class' => 'input-text'));?></td>
					</tr>
					<tr>
						<td style="width: 90px;">Name:</td>
						<td><?php echo $this->Form->input('Lead.name', array('label' => '', 'size' => '40', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Company:</td>
						<td><?php echo $this->Form->input('Lead.company', array('label' => '', 'size' => '40', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?php echo $this->Form->input('Lead.email', array('label' => '', 'size' => '40', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Phone:</td>
						<td><?php echo $this->Form->input('Lead.phone', array('label' => '', 'size' => '20', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Website:</td>
						<td><?php echo $this->Form->input('Lead.url', array('label' => '', 'size' => '40', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Lead Source:</td>
						<td><?php echo $this->Form->input('Lead.source', array('label' => '', 'size' => '30', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Product:</td>
						<td><?php echo $this->Form->input('Lead.product_id', array('label' => '', 'options' => $products, 'type' => 'select', 'class' => 'input-text'));?></td>
					</tr>
					<tr>
						<td class="va-top">Other:</td>
						<td><?php echo $this->Form->input('Lead.product_name', array('label' => '', 'size' => '30', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
					</tr>
				</tbody>				
			</table>
			</fieldset>
		<?php echo $this->Form->end();?>