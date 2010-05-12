<h1 class="tit">Add Note</h1>
<h2>Client - <?=$html->link($this->data['Lead']['name'],'/leads/view/'. $this->data['Lead']['id']); ?></h2>
<?php if ($session->check('Message.flash')) $session->flash(); ?>

		<?=$form->create('Note', array('url' => '/notes/add/'. $this->data['Lead']['id']));?>
			<?=$form->input('Note.id', array('type' => 'hidden')); ?>
			<?=$form->input('Note.lead_id', array('type' => 'hidden' ,'value' => $this->data['Lead']['id'])); ?>
			<?=$form->input('Note.user_id', array('type' => 'hidden' ,'value' => $session->read('Auth.User.id'))); ?>
			<fieldset>
				<table class="nostyle">
					<tbody>
					<tr>
						<td class="va-top">Note Type:</td>
						<td><?=$form->input('Note.type_id', array('label' => '', 'options' => array(0 => 'Reminder', 1 => 'Note'), 'type' => 'select', 'class' => 'input-text'));?></td>
					</tr>
					<tr>
						<td class="va-top">Note:</td>
						<td><?=$form->input('Note.note', array('type' => 'textarea', 'label' => '', 'rows' => '7', 'cols' => '75', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Date of Reminder:</td>
						<td><?=$form->input('Note.date', array('type' => 'date', 'label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
					</tr>
				</tbody>				
			</table>
			</fieldset>
		<?=$form->end();?>