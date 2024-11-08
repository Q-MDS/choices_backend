<?php echo form_open('login/validate', 'id="login_form" style="display: contents"'); ?>
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: #425D7D; border-radius: 30px; z-index: 10; padding: 70px 90px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);">
<div>
	<?php 
	$img = array('src' => 'res/images/choices_logo.svg', 'style' => 'display: block; width: 200px' );	
	echo img($img); 
	?>
</div>
<div class="form_label" style="margin-top: 40px">Username</div>
<div class="form_data" style="background: transparent"><?php echo form_input('cred_1', '', 'id="cred_1" style="text-align: center" placeholder="Enter username"'); ?></div>
<div class="form_label" style="margin-top: 20px">Password</div>
<div class="form_data" style="background: transparent"><?php echo form_input('cred_2', '', 'id="cred_2" style="text-align: center" placeholder="Enter password"'); ?></div>
<div class="form_btn_on" style="margin-top: 30px; background-color: #37495D; padding: 5px 20px; border-radius: 10px" onclick="document.getElementById('login_form').submit()">Login</div>
<?php echo form_close(); ?>
