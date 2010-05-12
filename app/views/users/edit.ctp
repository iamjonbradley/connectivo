<h1 class="tit">Edit User</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>

		<?=$form->create('User', array('edit'));?>
			<?=$form->input('User.id', array('type' => 'hidden')); ?>
			<fieldset>
				<table class="nostyle">
					<tbody>
					<tr>
						<td class="va-top">Name:</td>
						<td><?=$form->input('User.name', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Group:</td>
						<td><?=$form->input('User.group_id', array('label' => '', 'type' => 'select', 'options' => $groups, 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Username:</td>
						<td><?=$form->input('User.username', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="va-top">Password:</td>
						<td><?=$form->input('User.password', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
					</tr>
				</tbody></table>
			</fieldset>
		<?=$form->end();?>