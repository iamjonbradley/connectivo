<h1 class="tit">Add Group</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>

		<?=$form->create('Group', array('edit'));?>
			<?=$form->input('Group.id', array('type' => 'hidden')); ?>
			<fieldset>
				<table class="nostyle">
					<tbody>
					<tr>
						<td class="va-top">Name:</td>
						<td><?=$form->input('Group.name', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
					</tr>
				</tbody></table>
			</fieldset>
		<?=$form->end();?>