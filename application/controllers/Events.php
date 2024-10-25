<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();

		if ($this->session->userdata('authenticated') != 1) 
		{
			redirect('login');
		}

        $this->load->model('events_model');
    }
	
	public function set_filter()
	{
		$ajax_data = file_get_contents("php://input");
		$json_data = json_decode($ajax_data);

		$flt_start = $json_data->flt_start;
		$flt_end = $json_data->flt_end;
		$flt_category = $json_data->flt_category;
		$flt_name = $json_data->flt_name;
		$flt_area = $json_data->flt_area;
		$flt_address = $json_data->flt_address;
		$flt_type = $json_data->flt_type;
		$flt_time = $json_data->flt_time;
		$flt_free_paid = $json_data->flt_free_paid;

		$where = array();
		$params = array();

		$event_filters = array($flt_start, $flt_end, $flt_category, $flt_name, $flt_area, $flt_address, $flt_type, $flt_time, $flt_free_paid);
		
		if ($flt_start != '')
		{
			$where[] = 'event_start_date = ?';
			$params[] = strtotime($flt_start);
		}
		
		if ($flt_end != '')
		{
			$where[] = 'event_end_date = ?';
			$params[] = strtotime($flt_end);
		}
		
		if ($flt_category != '' && $flt_category != '0')
		{
			$where[] = 'event_category = ?';
			$params[] = $flt_category;
		}
		
		if ($flt_name != '')
		{
			$where[] = 'event_name LIKE ?';
			$params[] = '%' . $flt_name . '%';
		}

		if ($flt_area != '' && $flt_area != '0')
		{
			$where[] = 'event_area = ?';
			$params[] = $flt_area;
		}

		if ($flt_address != '')
		{
			$where[] = 'event_location LIKE ?';
    		$params[] = '%' . $flt_address . '%';
		}

		if ($flt_type != '' && $flt_type != '0')
		{
			$where[] = 'event_type = ?';
			$params[] = $flt_type;
		}

		if ($flt_time != '' && $flt_time != '0')
		{
			$where[] = 'event_time = ?';
			$params[] = $flt_time;
		}

		if ($flt_free_paid != '' && $flt_free_paid != '0')
		{
			$where[] = 'event_free_paid = ?';
			$params[] = $flt_free_paid;
		}

		$where_clause = '';
		
		if (count($where) > 0)
		{
			$where_clause = 'WHERE ' . implode(' AND ', $where);
		}

		$this->session->set_userdata('list_type', '[Filtered]');
        $this->session->set_userdata('event_where', $where_clause);
        $this->session->set_userdata('event_params', $params);
        $this->session->set_userdata('event_filters', $event_filters);
	}

	public function rpt_this_week()
	{
		// Get timestamp of beginning of week
		$beginning_of_week = strtotime('last monday', strtotime('tomorrow'));
		$end_of_week = strtotime('next sunday', $beginning_of_week);

		$event_filters = array('', '', '0', '', '0', '', '0', '0', '0');

		$where = array();
		$params = array();

		$where[] = 'event_start_date >= ?';
		$params[] = $beginning_of_week;
		
		$where[] = 'event_end_date <= ?';
		$params[] = $end_of_week;

		$where_clause = '';
		
		if (count($where) > 0)
		{
			$where_clause = 'WHERE ' . implode(' AND ', $where);
		}

		$this->session->set_userdata('list_type', '[This Week]');
        $this->session->set_userdata('event_where', $where_clause);
        $this->session->set_userdata('event_params', $params);
        $this->session->set_userdata('event_filters', $event_filters);
	}

	public function rpt_this_month()
	{
		// Get timestamp of beginning of current month and last day of current month
		$beginning_of_month = strtotime('first day of this month');
		$end_of_month = strtotime('last day of this month');

		$event_filters = array('', '', '0', '', '0', '', '0', '0', '0');

		$where = array();
		$params = array();

		$where[] = 'event_start_date >= ?';
		$params[] = $beginning_of_month;
		
		$where[] = 'event_end_date <= ?';
		$params[] = $end_of_month;

		$where_clause = '';
		
		if (count($where) > 0)
		{
			$where_clause = 'WHERE ' . implode(' AND ', $where);
		}

		$this->session->set_userdata('list_type', '[This Month]');
        $this->session->set_userdata('event_where', $where_clause);
        $this->session->set_userdata('event_params', $params);
        $this->session->set_userdata('event_filters', $event_filters);
	}

	public function rpt_upcoming()
	{
		// Get upcoming events
		$today = strtotime('today');

		$event_filters = array('', '', '0', '', '0', '', '0', '0', '0');

		$where = array();
		$params = array();

		$where[] = 'event_start_date > ?';
		$params[] = $today;

		$where_clause = '';
		
		if (count($where) > 0)
		{
			$where_clause = 'WHERE ' . implode(' AND ', $where);
		}

		$this->session->set_userdata('list_type', '[Upcoming]');
        $this->session->set_userdata('event_where', $where_clause);
        $this->session->set_userdata('event_params', $params);
        $this->session->set_userdata('event_filters', $event_filters);
	}

	public function rpt_previous()
	{
		// Get upcoming events
		$today = strtotime('today');

		$event_filters = array('', '', '0', '', '0', '', '0', '0', '0');

		$where = array();
		$params = array();

		$where[] = 'event_start_date < ?';
		$params[] = $today;

		$where_clause = '';
		
		if (count($where) > 0)
		{
			$where_clause = 'WHERE ' . implode(' AND ', $where);
		}

		$this->session->set_userdata('list_type', '[Previous]');
        $this->session->set_userdata('event_where', $where_clause);
        $this->session->set_userdata('event_params', $params);
        $this->session->set_userdata('event_filters', $event_filters);
	}

	public function reset_filter()
	{
		$params = array();
		$event_filters = array('', '', '0', '', '0', '', '0', '0', '0');

		$this->session->set_userdata('list_type', '[All]');
		$this->session->set_userdata('event_where', '');
		$this->session->set_userdata('event_params', $params);
		$this->session->set_userdata('event_filters', $event_filters);
	}

	public function init()
	{
		$this->reset_filter();

		redirect('events');
	}

	public function index()
	{
		$data =array();

		$list_type = $this->session->userdata('list_type');
		$where_clause = $this->session->userdata('event_where');
        $params = $this->session->userdata('event_params');
		$event_filters = $this->session->userdata('event_filters');

		// echo "Where clause: " . $where_clause . "<br>";
		// print_r($params);

		$records = $this->events_model->get_events($where_clause, $params);

		$data['title']	= 'Choices: Events and Activities';
		$data['topbar'] = 'events/topbar';
		$data['main_content'] = 'events/index';
		$data['records'] = $records;
		$data['event_filters'] = $event_filters;
		$data['list_type']	= $list_type;

		$this->load->view('includes/template', $data);
	}

	public function add()
    {
        $data = array();

        echo $this->load->view('events/add', $data, TRUE);
    }

    public function add_save()
    {
        $ajax_data = file_get_contents("php://input");
        $json_data = json_decode($ajax_data);

		$evt_name = $json_data->evt_name;
		$evt_start = $json_data->evt_start;
		$evt_end = $json_data->evt_end;
		$evt_type = $json_data->evt_type;
		$evt_time = $json_data->evt_time;
		$evt_category = $json_data->evt_category;
		$evt_free_paid = $json_data->evt_free_paid;
		$evt_entrance_fee = $json_data->evt_entrance_fee;
		$evt_area = $json_data->evt_area;
		$evt_location = $json_data->evt_location;
		$evt_website = $json_data->evt_website;

		echo "Poo";

        $result = '0';
		
        $result = $this->events_model->addSave($evt_name, $evt_start, $evt_end, $evt_type, $evt_time, $evt_category, $evt_free_paid, $evt_entrance_fee, $evt_area, $evt_location, $evt_website);

        echo $result;
    }

	public function edit()
    {
        $data = array();

		$ajax_data = file_get_contents("php://input");
        $json_data = json_decode($ajax_data);

        $event_id = $json_data->event_id;

		$data['record'] = $this->events_model->get_event($event_id);

        echo $this->load->view('events/edit', $data, TRUE);
    }

	public function edit_save()
	{
		$ajax_data = file_get_contents("php://input");
        $json_data = json_decode($ajax_data);

		$evt_id = $json_data->evt_id;
		$evt_name = $json_data->evt_name;
		$evt_start = $json_data->evt_start;
		$evt_end = $json_data->evt_end;
		$evt_type = $json_data->evt_type;
		$evt_time = $json_data->evt_time;
		$evt_category = $json_data->evt_category;
		$evt_free_paid = $json_data->evt_free_paid;
		$evt_entrance_fee = $json_data->evt_entrance_fee;
		$evt_area = $json_data->evt_area;
		$evt_location = $json_data->evt_location;
		$evt_website = $json_data->evt_website;

		echo "Poo";

        $result = '0';
		
        $result = $this->events_model->editSave($evt_id, $evt_name, $evt_start, $evt_end, $evt_type, $evt_time, $evt_category, $evt_free_paid, $evt_entrance_fee, $evt_area, $evt_location, $evt_website);

        echo $result;
	}

	public function delete()
	{
		$ajax_data = file_get_contents("php://input");
        $json_data = json_decode($ajax_data);

		$event_id = $json_data->event_id;

		$result = '0';

		$result = $this->events_model->deleteEvent($event_id);

		echo $result;
	}
}
