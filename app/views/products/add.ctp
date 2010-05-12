<h1 class="tit">Add Product</h1>
<?php if ($session->check('Message.flash')) $session->flash(); ?>

		<?=$form->create('Product');?>
			<fieldset>
				<table class="nostyle">
					<tbody>
					<tr>
						<td class="va-top">Name:</td>
						<td><?=$form->input('Product.name', array('label' => '', 'class' => 'input-text')); ?></td>
					</tr>
					<tr>
						<td class="t-right" colspan="2"><input type="submit" value="Submit" class="input-submit"/></td>
					</tr>
				</tbody></table>
			</fieldset>
		<?=$form->end();?>