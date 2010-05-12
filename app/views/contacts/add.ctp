<h1 class="tit">Add Contact</h1>
<h2>Client - <?=$html->link($this->data['Lead']['name'],'/leads/view/'. $this->data['Lead']['id']); ?></h2>
<?php if ($session->check('Message.flash')) $session->flash(); ?>

		<?=$form->create('Contact', array('url' => '/contacts/add/'. $this->data['Lead']['id']));?>
			<?=$form->input('Contact.lead_id', array('type' => 'hidden' ,'value' => $this->data['Lead']['id'])); ?>
			<fieldset>
				<table class="nostyle">
					<tbody>
					<tr>
						<td class="va-top">Contact Type:</td>
						<td><?=$form->input('Contact.contact_type_id', array('label' => '', 'options' => $types, 'type' => 'select', 'class' => 'input-text'));?></td>
					</tr>
					<tr>
						<td class="va-top">Name:</td>
						<td><?=$form->input('Contact.name', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Details:</td>
						<td><?=$form->input('Contact.value', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
					</tr>
				</tbody>				
			</table>
			</fieldset>
		<?=$form->end();?>