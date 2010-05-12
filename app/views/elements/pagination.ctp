<table class="pagination">
	<tr>
		<td class="align-left">Showing Page <?php echo $paginator->counter()?></td>
		<td class="align-right">
			<?php
				echo $paginator->prev().'&nbsp;';
				echo $paginator->numbers().'&nbsp;';
				echo $paginator->next();
			?>
		</td>		
	</tr>
</table>