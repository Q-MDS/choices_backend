<?php 
$img_save = array('src' => 'res/images/icon_save.svg?v=1', 'style' => 'display: block;' );
$img_close = array('src' => 'res/images/icon_close.svg?v=1', 'style' => 'display: block;' );
// $dd_event_price = array(0 => 'Select...', 'Free' => 'Free', 'Paid' => 'Paid');
// $dd_event_category = array(0 => 'Select...', 'Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance', 'Theatre' => 'Theatre', 'Sports' => 'Sports', 'Food' => 'Food', 'Other' => 'Other');
// $dd_event_area = array(0 => 'Select...', 'Klang Valley' => 'Klang Valley', 'Penang' => 'Penang', 'Johor' => 'Johor', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak', 'Perak' => 'Perak', 'Kedah' =>'Kedah');
// $dd_event_time = array(0 => 'Select...', 'Morning' => 'Morning', 'Afternoon' => 'Afternoon', 'Evening' => 'Evening', 'Night' => 'Night');
// $dd_event_type = array(0 => 'Select...', 'In-person' => 'In-person', 'Online' => 'Online');
?>
<div class="form_container" style="position: relative;">
    
    <div class="title">Edit Event/Activity</div>

	<!-- ROW 1 -->
	<!-- Event/activity name -->
	<div class="input_container">
		<div class="input_wrapper" style="grid-column: span 4; margin-top: 10px;">
			<div class="label">Name or description of event</div>
			<div>
				<?php
				echo form_input('evt_name', $record['event_name'], 'id="evt_name" class="editview" placeholder="Enter event name or description" onclick="EVENTS.validateClear(this.id);"');
				?>
			</div>
			<div id="evt_name_error" class="error_message" style="position: absolute; display: none; top: 48%; right: 0px"></div>
		</div>
		
		<!-- ROW 2 -->
		<!-- Start date -->
		<div class="input_wrapper">
			<div class="label">Start Date</div>
			<div>
				<?php
				$start_date = date('Y-m-d', $record['event_start_date']);
				echo form_input('evt_start', $start_date, 'id="evt_start" class="editview" placeholder="Enter start date" onclick="EVENTS.validateClear(this.id);"');
				?>
			</div>
			<div id="evt_start_error" class="error_message" style="position: absolute; display: none; top: 48%; right: 0px"></div>
		</div>
		<!-- End date -->
		<div class="input_wrapper">
			<div class="label">End Date</div>
			<div>
				<?php
				$end_date = date('Y-m-d', $record['event_end_date']);
				echo form_input('evt_end', $end_date, 'id="evt_end" class="editview" placeholder="Enter end date" onclick="EVENTS.validateClear(this.id);"');
				?>
			</div>
			<div id="evt_end_error" class="error_message" style="position: absolute; display: none; top: 48%; right: 0px"></div>
		</div>
		<!-- Event Type -->
		<div class="input_wrapper">
			<div class="label">Event Type</div>
			<div>
				<?php
				echo form_dropdown('evt_type', $dd_event_type, $record['event_type'], 'id="evt_type" class="filterview" onclick="EVENTS.validateClear(this.id);"');
				?>
			</div>
			<div id="evt_type_error" class="error_message" style="position: absolute; display: none; top: 48%; right: 0px"></div>
		</div>
		<!-- Event Time -->
		<div class="input_wrapper">
			<div class="label">Event Time</div>
			<div>
				<?php
				echo form_dropdown('evt_time', $dd_event_time, $record['event_time'], 'id="evt_time" class="filterview" onclick="EVENTS.validateClear(this.id);"');
				?>
			</div>
			<div id="evt_time_error" class="error_message" style="position: absolute; display: none; top: 48%; right: 0px"></div>
		</div>

		<!-- ROW 3 -->
		<!-- Event Time -->
		<div style="grid-column: span 2" style="position: relative;">
			<div class="input_wrapper">
				<div class="label">Event Category</div>
				<div>
					<?php
					echo form_dropdown('evt_category', $dd_event_category, $record['event_category'], 'id="evt_category" class="filterview" onclick="EVENTS.validateClear(this.id);"');
					?>
				</div>
				<div id="evt_category_error" class="error_message" style="position: absolute; display: none; top: 48%; right: 0px"></div>
			</div>
		</div>
		<!-- Free/paid -->
		<div class="input_wrapper">
			<div class="label">Free/Paid</div>
			<div>
				<?php
				echo form_dropdown('evt_free_paid', $dd_event_price, $record['event_free_paid'], 'id="evt_free_paid" class="filterview" onclick="EVENTS.validateClear(this.id);"');
				?>
			</div>
			<div id="evt_free_paid_error" class="error_message" style="position: absolute; display: none; top: 48%; right: 0px"></div>
		</div>
		<!-- Entrance fee -->
		<div class="input_wrapper">
			<div class="label">Entrance fee</div>
			<div>
				<?php
				echo form_input('evt_entrance_fee', $record['event_entrance_fee'], 'id="evt_entrance_fee" class="editview" placeholder="Enter entrance fee" onclick="EVENTS.validateClear(this.id);"');
				?>
			</div>
			<div id="evt_entrance_fee_error" class="error_message" style="position: absolute; display: none; top: 48%; right: 0px"></div>
		</div>

		<!-- ROW 4 -->
		<!-- Area -->
		<div style="grid-column: span 2">
			<div class="input_wrapper">
				<div class="label">Area</div>
				<div>
					<?php
					echo form_dropdown('evt_area', $dd_event_area, $record['event_area'], 'id="evt_area" class="filterview" onclick="EVENTS.validateClear(this.id);"');
					?>
				</div>
				<div id="evt_area_error" class="error_message" style="position: absolute; display: none; top: 47%; right: 0px"></div>
			</div>
		</div>
		<div style="grid-column: span 2">
			<div class="input_wrapper">
				<div class="label">Address</div>
				<div>
					<?php
					echo form_input('evt_location', $record['event_location'], 'id="evt_location" class="editview" placeholder="Enter location" onclick="EVENTS.validateClear(this.id);"');
					?>
				</div>
				<div id="evt_location_error" class="error_message" style="position: absolute; display: none; top: 47%; right: 0px"></div>
			</div>
		</div>

		<!-- ROW 5 -->
		<!-- Website -->
		<div style="grid-column: span 4">
			<div class="input_wrapper">
				<div class="label">Website address</div>
				<div>
					<?php
					echo form_input('evt_website', $record['event_website'], 'id="evt_website" class="editview" placeholder="Enter website address" onclick="EVENTS.validateClear(this.id);"');
					?>
				</div>
				<div id="evt_website_error" class="error_message" style="position: absolute; display: none; top: 47%; right: 0px"></div>
			</div>
		</div>

	</div>

	<div class="button_bar">
		<div style="display: grid; grid-template-columns: 1fr auto auto 1fr; column-gap: 10px;">
			<div><?php echo form_input('evt_website', $record['id'], 'id="evt_id" style="display: none;"');?></div>
			<div class='button_wrapper' onclick="EVENTS.validate(1);">
				<div class='icon'><?php echo img($img_save); ?></div>
				<div class='label'>Update</div>
			</div>
			<div class='button_wrapper' onclick="hideFormOverlay();">
				<div class='icon'><?php echo img($img_close); ?></div>
				<div class='label'>cancel</div>
			</div>
			<div>&nbsp;</div>
		</div>
	</div>

	<div style="position: absolute; bottom: 0px; left: 0px; pointer-events: none;">
	<?php $img = array('src' => 'res/images/form_tile_1.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: absolute; top: 0px; right: 30px; pointer-events: none;">
	<?php $img = array('src' => 'res/images/form_tile_2.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	<div style="position: absolute; bottom: 0px; right: 0; pointer-events: none;">
	<?php $img = array('src' => 'res/images/form_tile_3.svg', 'style' => 'display: block;' ); echo img($img); ?>
	</div>
	
</div>

