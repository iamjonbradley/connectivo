<h1 class="tit">Add Upload</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>

		<?=$form->create('Upload', array('action' => 'add', 'type' => 'file'));?>
			<?=$form->input('id', array('type' => 'hidden')); ?>
			<?=$form->input('lead_id', array('type' => 'hidden')); ?>
			<?=$form->input('user_id', array('type' => 'hidden', 'value' => $session->read('Auth.User.id'))); ?>
			<fieldset>
				<table class="nostyle">
					<tbody><tr>
						<td style="width: 90px;">Description:</td>
						<td><?=$form->input('description', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td>Select File:</td>
						<td><?=$form->file('File', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
					</tr>
				</tbody></table>
			</fieldset>
		<?=$form->end();?>