<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>res/css/skeleton.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>res/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>res/css/modal_flat.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/litepicker.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>res/css/main.css">

    <!-- Scripts
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script type="text/javascript" src="<?php echo base_url(); ?>res/js/daypilot-modal-3.15.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>res/js/litepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>res/js/main.js"></script>

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>res/images/favicon.png">
</head>

<body>
	<!-- Main content
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div class="app_container" style="min-width: 1366px">
		<div style="width: 100%; height: 145px; margin-bottom: 10px"><?php $this->load->view($topbar); ?></div>
		<div style="flex:1; width: 100%; background-color: var(--app-secondary); border-radius: 30px; z-index: 10;  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);">
			<div style="padding: 30px;">
			<?php $this->load->view($main_content); ?>
			</div>
		</div>
	</div>
	<!-- END: Main content -->

	<!-- Form overlay
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div id="form_overlay"></div>
	<!-- END: Form overlay -->
	
	<!-- Background tiles
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<div style="position: fixed; top: -10px; left: 210px; pointer-events: none;">
	<?php $img = array('src' => 'res/images/tile_1.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: fixed; top: -20px; left: 60%; pointer-events: none;">
	<?php $img = array('src' => 'res/images/tile_2.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: fixed; top: 0px; right: -40px; pointer-events: none;">
	<?php $img = array('src' => 'res/images/tile_3.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: fixed; bottom: 0px; right: -40px; pointer-events: none;">
	<?php $img = array('src' => 'res/images/tile_4.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: fixed; bottom: 0px; right: 20%; pointer-events: none;">
	<?php $img = array('src' => 'res/images/tile_5.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: fixed; bottom: 0px; left: 20%; pointer-events: none;">
	<?php $img = array('src' => 'res/images/tile_6.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: fixed; bottom: 0px; left: 0; pointer-events: none;">
	<?php $img = array('src' => 'res/images/tile_7.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: fixed; top: 25%; left: 0; pointer-events: none;">
	<?php $img = array('src' => 'res/images/tile_8.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<!-- END: Background tiles -->
</body>
</html>
