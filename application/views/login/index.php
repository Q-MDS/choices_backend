<?php echo form_open('login/validate', 'id="login_form" style="display: contents"'); ?>
<div>
	<?php 
	$img = array('src' => 'res/images/logo.png', 'style' => 'display: block; width: 200px' );	
	echo img($img); 
	?>
</div>
<div class="form_label" style="margin-top: 40px">Username</div>
<div class="form_data" style="background: transparent"><?php echo form_input('cred_1', '', 'id="cred_1" style="text-align: center" placeholder="Enter username"'); ?></div>
<div class="form_label" style="margin-top: 20px">Password</div>
<div class="form_data" style="background: transparent"><?php echo form_input('cred_2', '', 'id="cred_2" style="text-align: center" placeholder="Enter password"'); ?></div>
<div class="form_btn_on" style="margin-top: 30px" onclick="document.getElementById('login_form').submit()">Login</div>
<?php echo form_close(); ?>
