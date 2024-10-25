<?php
$img_reset = array('src' => 'res/images/icon_reset.svg?v=1', 'style' => 'display: block;' );
$img_edit = array('src' => 'res/images/icon_edit.svg?v=1', 'style' => 'display: block;' );
$img_delete = array('src' => 'res/images/icon_delete.svg?v=1', 'style' => 'display: block;' );
$dd_event_category = array(0 => 'Select...', 'Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance', 'Theatre' => 'Theatre', 'Sports' => 'Sports', 'Food' => 'Food', 'Other' => 'Other');
$dd_event_price = array(0 => 'Select...', 'Free' => 'Free', 'Paid' => 'Paid');
$dd_event_area = array(0 => 'Select...', 'Klang Valley' => 'Klang Valley', 'Penang' => 'Penang', 'Johor' => 'Johor', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak', 'Perak' => 'Perak', 'Kedah' =>'Kedah');
$dd_event_time = array(0 => 'Select...', 'Morning' => 'Morning', 'Afternoon' => 'Afternoon', 'Evening' => 'Evening', 'Night' => 'Night');
$dd_event_type = array(0 => 'Select...', 'In-person' => 'In-person', 'Online' => 'Online');
?>
<!-- <div style="min-width: 1366px"> -->
<div style="font-size: 24px;">Events & Activities List: <span style="font-weight: bold"><?php echo $list_type; ?></span></div>
<div class="grid_container" style="grid-template-columns: 90px 90px 130px 150px 100px 1fr 80px 80px 80px 60px 60px 1px; column-gap: 15px; max-height: 660px; overflow: hidden; overflow-y: auto">
	<div class="title">Start Date</div>
	<div class="title">End Date</div>
	<div class="title">Category</div>
	<div class="title">Name</div>
	<div class="title">Area</div>
	<div class="title">Location</div>
	<div class="title">Address</div>
	<div class="title">Time</div>
	<div class="title">Price</div>
	<div class="title" style="justify-content: center;">Edit</div>
	<div class="title" style="justify-content: center;">Remove</div>
	<div class="title">&nbsp;</div>

	<!-- Filters -->
	<div class=""><?php echo form_input('flt_start', '', 'id="flt_start" class="filter" placeholder="Start Date" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class=""><?php echo form_input('flt_end', '', 'id="flt_end" class="filter" placeholder="End Date" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class=""><?php echo form_dropdown('flt_category', $dd_event_category, $event_filters[2], 'id="flt_category" class="filter" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class=""><?php echo form_input('flt_name', $event_filters[3], 'id="flt_name" class="filter" placeholder="Name" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class=""><?php echo form_dropdown('flt_area', $dd_event_area, $event_filters[4], 'id="flt_area" class="filter" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class=""><?php echo form_input('flt_address', $event_filters[5], 'id="flt_address" class="filter" placeholder="Address" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class=""><?php echo form_dropdown('flt_type', $dd_event_type, $event_filters[6], 'id="flt_type" class="filter" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class=""><?php echo form_dropdown('flt_time', $dd_event_time, $event_filters[7], 'id="flt_time" class="filter" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class=""><?php echo form_dropdown('flt_free_paid', $dd_event_price, $event_filters[8], 'id="flt_free_paid" class="filter" onchange="EVENTS.setFilter(0, this.value);"'); ?></div>
	<div class='button_alt_wrapper' style="grid-column: span 2;" onclick="EVENTS.resetFilter();">
		<div class="box">
			<div class='icon'><?php echo img($img_reset); ?></div>
			<div class='label'>Reset</div>
		</div>
	</div>
	<div class="title">&nbsp;</div>

	<?php
	foreach ($records as $row)
	{
		$price_type = $row['event_free_paid'];
		$event_start_date = $row['event_start_date'];
		$event_start_date = date('Y-m-d', $event_start_date);
		$event_end_date = $row['event_end_date'];
		$event_end_date = date('Y-m-d', $event_end_date);
		$active = $row['active'];
		

		echo '<div class="data_row">';
			echo '<div class="data">' . $event_start_date . '</div>';
			echo '<div class="data">' . $event_end_date . '</div>';
			echo '<div class="data">' . $row['event_category'] . '</div>';
			echo '<div class="data">' . $row['event_name'] . '</div>';
			echo '<div class="data">' . $row['event_area'] . '</div>';
			echo '<div class="data">' . $row['event_location'] . '</div>';
			echo '<div class="data">' . $row['event_type'] . '</div>';
			echo '<div class="data">' . $row['event_time'] . '</div>';
			if ($price_type == 'Free')
			{
				echo '<div class="data">' . $row['event_free_paid'] . '</div>';
			} 
			else 
			{
				echo '<div class="data">€ ' . $row['event_entrance_fee'] . '</div>';
			}
			echo '<div id="' . $row['id'] . '" class="data" style="justify-content: center; cursor: pointer" onclick="EVENTS.getEdit(this.id)">' . img($img_edit). '</div>';
			echo '<div id="' . $row['id'] . '" class="data" style="justify-content: center; cursor: pointer" onclick="EVENTS.deleteEvent(this.id)">' . img($img_delete). '</div>';
			echo '<div class="data">&nbsp;</div>';
		echo '</div>';
	}
	?>
	<!-- <div style="position: absolute; bottom: 30px;">Dah line</div> -->
</div>
<!-- </div> -->
<script>
	let isLitepickerChange = false;

	const startPicker = new Litepicker({
		element: document.getElementById('flt_start'),
		format: 'YYYY-MM-DD',
		setup: (picker) => {
			picker.on('selected', (date1, date2) => {
				if (!isLitepickerChange) {
					isLitepickerChange = true;
					const input = document.getElementById('flt_start');
					const event = new Event('change');
					input.dispatchEvent(event);
					isLitepickerChange = false;
				}
			});
		}
	});
	
	const endPicker = new Litepicker({
        element: document.getElementById('flt_end'),
        format: 'YYYY-MM-DD',
        setup: (picker) => {
            picker.on('selected', (date1, date2) => {
                if (!isLitepickerChange) {
                    isLitepickerChange = true;
                    const input = document.getElementById('flt_end');
                    const event = new Event('change');
                    input.dispatchEvent(event);
                    isLitepickerChange = false;
                }
            });
        }
    });
</script>
