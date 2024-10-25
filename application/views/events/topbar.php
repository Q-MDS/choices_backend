
<div style="display: flex; flex-direction: row; align-items: center; column-gap: 95px; z-index: 999">
	<div>
		<?php 
		$img = array('src' => 'res/images/choices_logo.svg', 'style' => 'display: block; width: 183px' );
		echo img($img); 
		?>
	</div>
	<div style="flex: 1; display: flex; flex-direction: column; align-items: flex-start;">
		<div style="font-size: 22px; font-weight: bold">Events and Activities Management Console</div>
		<div style="display: flex; flex-direction: row; align-items: center; justify-content: center; column-gap: 5px; background-color: var(--app-secondary); border-radius: 10px; padding: 5px 20px; margin-top: 5px; z-index: 99;" onclick="EVENTS.getAdd()">
			<div>
				<?php 
				$img = array('src' => 'res/images/icon_add.svg', 'style' => 'display: block;' );
				echo img($img); 
				?>
			</div>
			<div>Create Event/Activity</div>
		</div>
	</div>
	<div style="flex: 1; display: flex; flex-direction: row; align-items: flex-end; justify-content: flex-end; column-gap: 30px; height: 100px">
		<div class="mini_menu_button">This Week</div>
		<div class="mini_menu_button">This Month</div>
		<div class="mini_menu_button">Upcoming</div>
		<div class="mini_menu_button">Previous</div>
		<div class="mini_menu_button">Logout</div>
	</div>
</div>

<style>
	.mini_menu_button 
	{
		color: white;
		font-size: 12px;
		text-transform: uppercase;
	}
</style>
