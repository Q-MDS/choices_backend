const EVENTS = 
{
	setFilter: function(code, value)
	{
		let formData = 
		{
			"flt_name": document.getElementById("flt_name").value,
			"flt_start": document.getElementById("flt_start").value,
			"flt_end": document.getElementById("flt_end").value,
			"flt_type": document.getElementById("flt_type").value,
			"flt_time": document.getElementById("flt_time").value,
			"flt_category": document.getElementById("flt_category").value,
			"flt_free_paid": document.getElementById("flt_free_paid").value,
			"flt_area": document.getElementById("flt_area").value,
			"flt_address": document.getElementById("flt_address").value,
		};
		
		let phpUrl = baseUrl + "events/set_filter";
		
		sendData(phpUrl, formData)
		.then(result => 
		{ 
			console.log('Resut', result);
			window.location.reload(); 
		});
	},
	rptThisWeek: function()
	{
		let formData = { };
		
		let phpUrl = baseUrl + "events/rpt_this_week";
		
		sendData(phpUrl, formData)
		.then(result => 
		{ 
			console.log('Resut', result);
			window.location.reload(); 
		});
	},
	rptThisMonth: function()
	{
		let formData = { };
		
		let phpUrl = baseUrl + "events/rpt_this_month";
		
		sendData(phpUrl, formData)
		.then(result => 
		{ 
			console.log('Resut', result);
			window.location.reload(); 
		});
	},
	rptUpcoming: function()
	{
		let formData = { };
		
		let phpUrl = baseUrl + "events/rpt_upcoming";
		
		sendData(phpUrl, formData)
		.then(result => 
		{ 
			console.log('Resut', result);
			window.location.reload(); 
		});
	},
	rptPrevious: function()
	{
		let formData = { };
		
		let phpUrl = baseUrl + "events/rpt_previous";
		
		sendData(phpUrl, formData)
		.then(result => 
		{ 
			console.log('Resut', result);
			window.location.reload(); 
		});
	},
	resetFilter: function()
	{
		console.log('Reset Filter');
		let formData = {};
		
		let phpUrl = baseUrl + "events/reset_filter";
		
		sendData(phpUrl, formData)
		.then(result => { window.location.reload(); });
	},
	getAdd: function()
    {
        let formData = { };
		
        let phpUrl = baseUrl + "events/add";
        
        sendData(phpUrl, formData)
        .then(result => { this.setForm(result, 0); });
    },

    getEdit: function(event_id)
    {
        let formData = { "event_id": event_id };
		
        let phpUrl = baseUrl + "events/edit";
        
        sendData(phpUrl, formData)
        .then(result => { this.setForm(result, 1); });
    },

    setForm: function(ajaxData, mode)
    {
        showFormOverlay();
        
        let formOverlay = document.getElementById("form_overlay");
        formOverlay.innerHTML = "";
        formOverlay.innerHTML = ajaxData;

        const startPicker = new Litepicker({element: document.getElementById('evt_start'), format: 'YYYY-MM-DD'});
        const endPiicker = new Litepicker({element: document.getElementById('evt_end'), format: 'YYYY-MM-DD'});

        document.onkeydown=function(evt)
		{
			var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;

            if(keyCode == 27)
            {
                hideFormOverlay();
            }
            if(keyCode == 13)
            {

				EVENTS.validate(mode);
            }
        }
    },

	validate: function(mode)
	{
		let errCtr = 0;

		const evt_name = document.getElementById("evt_name").value;
		const evt_name_error = document.getElementById("evt_name_error");
		const evt_start = document.getElementById("evt_start").value;
		const evt_end = document.getElementById("evt_end").value;
		const evt_type = document.getElementById("evt_type").value;
		const evt_time = document.getElementById("evt_time").value;
		const evt_categoryxxx = document.getElementById("evt_category").value;
		const evt_free_paid = document.getElementById("evt_free_paid").value;
		const evt_entrance_fee = document.getElementById("evt_entrance_fee").value;
		const evt_area = document.getElementById("evt_area").value;
		const evt_location = document.getElementById("evt_location").value;
		const evt_website = document.getElementById("evt_website").value;

		if (evt_name == "")
		{
			errCtr++;
			evt_name_error.style.display = "block";
			evt_name_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_name_error.style.display = "none";
		}	
		if (evt_start == "")
		{
			errCtr++;
			evt_start_error.style.display = "block";
			evt_start_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_start_error.style.display = "none";
		}	
		if (evt_end == "")
		{
			errCtr++;
			evt_end_error.style.display = "block";
			evt_end_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_end_error.style.display = "none";
		}	
		
		if (evt_type == 0)
		{
			errCtr++;
			evt_type_error.style.display = "block";
			evt_type_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_type_error.style.display = "none";
		}	
		if (evt_time == 0)
		{
			errCtr++;
			evt_time_error.style.display = "block";
			evt_time_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_time_error.style.display = "none";
		}	
		if (evt_category == 0)
		{
			errCtr++;
			evt_category_error.style.display = "block";
			evt_category_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_category_error.style.display = "none";
		}	
		if (evt_free_paid == 0)
		{
			errCtr++;
			evt_free_paid_error.style.display = "block";
			evt_free_paid_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_free_paid_error.style.display = "none";
		}	
		if (evt_free_paid == 'Paid' && (evt_entrance_fee == 0 || evt_entrance_fee == ""))
		{
			errCtr++;
			evt_entrance_fee_error.style.display = "block";
			evt_entrance_fee_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_entrance_fee_error.style.display = "none";
		}
		if (evt_area == 0)
		{
			errCtr++;
			evt_area_error.style.display = "block";
			evt_area_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_area_error.style.display = "none";
		}	
		if (evt_location == 0)
		{
			errCtr++;
			evt_location_error.style.display = "block";
			evt_location_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_location_error.style.display = "none";
		}	
		if (evt_website == 0)
		{
			errCtr++;
			evt_website_error.style.display = "block";
			evt_website_error.innerHTML = "Required.";
		} 
		else 
		{
			evt_website_error.style.display = "none";
		}	

		if (errCtr == 0)
		{
			if (mode == 0)
			{
				this.saveForm();
			} 
			else 
			{
				this.updateForm();
			}
		}
	},

	validateClear: function(id)
	{
		const element = document.getElementById(id + "_error");
		element.style.display = 'none';
	},

	saveForm: function()
	{
		let formData = 
		{
			"evt_name": document.getElementById("evt_name").value,
			"evt_start": document.getElementById("evt_start").value,
			"evt_end": document.getElementById("evt_end").value,
			"evt_type": document.getElementById("evt_type").value,
			"evt_time": document.getElementById("evt_time").value,
			"evt_category": document.getElementById("evt_category").value,
			"evt_free_paid": document.getElementById("evt_free_paid").value,
			"evt_entrance_fee": document.getElementById("evt_entrance_fee").value,
			"evt_area": document.getElementById("evt_area").value,
			"evt_location": document.getElementById("evt_location").value,
			"evt_website": document.getElementById("evt_website").value
		};

		let phpUrl = baseUrl + "events/add_save";
		
		sendData(phpUrl, formData)
		.then(result => 
		{ 
			console.log('Resut', result); 
			hideFormOverlay();
			window.location.reload(); 

		});
	},

	updateForm: function()
	{
		let formData = 
		{
			"evt_id": document.getElementById("evt_id").value,
			"evt_name": document.getElementById("evt_name").value,
			"evt_start": document.getElementById("evt_start").value,
			"evt_end": document.getElementById("evt_end").value,
			"evt_type": document.getElementById("evt_type").value,
			"evt_time": document.getElementById("evt_time").value,
			"evt_category": document.getElementById("evt_category").value,
			"evt_free_paid": document.getElementById("evt_free_paid").value,
			"evt_entrance_fee": document.getElementById("evt_entrance_fee").value,
			"evt_area": document.getElementById("evt_area").value,
			"evt_location": document.getElementById("evt_location").value,
			"evt_website": document.getElementById("evt_website").value
		};

		let phpUrl = baseUrl + "events/edit_save";
		
		sendData(phpUrl, formData)
		.then(result => 
		{ 
			console.log('Resut', result); 
			hideFormOverlay();
			window.location.reload(); 

		});
	},

	deleteEvent: function(event_id)
	{
		DayPilot.Modal.confirm("Are you sure you want to delete this record ?", { theme: "modal_flat" })
        .then(function(args) 
        {
            if (args.result) 
            {
				let formData = { "event_id": event_id };
		
				let phpUrl = baseUrl + "events/delete";
				
				sendData(phpUrl, formData)
				.then(result => 
				{ 
					// console.log('Resut', result);	
					window.location.reload(); 
				});
            }
            else 
            {
                console.log("User clicked cancel");
            }
        });
	}
}
