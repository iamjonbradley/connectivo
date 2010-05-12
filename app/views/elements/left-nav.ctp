				<? 
					switch ($this->params['controller']):
						case 'tasks':
						case 'notes':
						case 'uploads':
						case 'search':
							$link = 'leads';
							$controller = 'leads';
							break;
						default:
							$link = $this->params['controller'];
							$controller = $this->params['controller'];
					
					endswitch;
					echo '<p id="btn-create" class="box"><a href="/'. $link .'/add"><span>Create a new '. $link .'</span></a></p>';
				?>

			<?php 
			switch ($session->read('Auth.User.group_id')) {
				case 1:	
			?>
					<ul class="box">
						<li <? if ($controller == 'leads') echo ' id="submenu-active"'; ?>> <a href="/leads">Leads</a> </li>
						<li <? if ($controller == 'products') echo ' id="submenu-active"'; ?>> <a href="/products">Products</a> </li>
						<li <? if ($controller == 'users') echo ' id="submenu-active"'; ?>> <a href="/users">Users</a> </li>
						<li <? if ($controller == 'action_logs') echo ' id="submenu-active"'; ?>> <a href="/action_logs">Logs</a> </li>
					</ul>
			<?php
					break;
				default: 
			?>
					<ul class="box">
						<li <? if ($controller == 'leads') echo ' id="submenu-active"'; ?>> <a href="/leads">Leads</a> </li>
					</ul>
			
			
			<? } ?>
			
			
			