<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model 
{
	public function getCurrentEvents()
	{
		// $event_date = strtotime(date('Y-m-d'));
		$event_date = 1729010189;

		$this->db->select('id, event_name, event_area, event_location, event_type, event_time, event_category, event_website, event_start_date, event_end_date, event_free_paid, event_entrance_fee');
		$this->db->from('events');
		$this->db->where('event_start_date >=', $event_date);
		$this->db->where('active', 1);
		$this->db->order_by('event_start_date', 'asc');
		$query = $this->db->get();
		
		return $query->result();
	}
}
