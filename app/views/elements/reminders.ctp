<ul class="box">
	<li><a href="#">Upcoming Reminders</a>
		<ul>
		<? 
			foreach ($task as $key => $value):
				echo '<li>
					<a href="#">'. $key .'</a>';
					echo '<ul>';
					foreach ($task[$key] as  $key2 => $value):
						echo '<li><a href="/leads/view/'. $key2 .'">'. $value .'</a></li>';
					endforeach;
					echo '</ul>';
				echo '</li>';
			
			endforeach;
		
	?>
		</ul>
	</li>
</ul>