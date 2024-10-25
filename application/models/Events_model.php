<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model 
{
	public function get_events($where_clause, $params)
	{
		$data = array();
		
		$query = $this->db->query("SELECT * FROM events $where_clause ORDER BY event_start_date DESC", $params);

		// echo $this->db->last_query();
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$query->free_result();
		
		return $data;

	}

	public function get_events_all()
	{
		$data = array();
		
		$num_recs = 0;
		
		$query = $this->db->query("SELECT * FROM events WHERE active = 1 ORDER BY event_start_date DESC");
		
		if ($query->num_rows() > 0)
		{
			$num_recs = $query->num_rows();
		
			foreach ($query->result_array() as $row)
			{
				$data[] = $row;
			}
		}
		$query->free_result();
		
		return $data;
	}

	public function addSave($evt_name, $evt_start, $evt_end, $evt_type, $evt_time, $evt_category, $evt_free_paid, $evt_entrance_fee, $evt_area, $evt_location, $evt_website)
	{
		$evt_start = strtotime($evt_start);
		$evt_end = strtotime($evt_end);

		$this->db->query("INSERT INTO events SET event_name = ?, event_start_date = ?, event_end_date = ?, event_type = ?, event_time = ?, event_category = ?, event_free_paid = ?, event_entrance_fee = ?, event_area = ?, event_location = ?, event_website = ?, active = ?", array($evt_name, $evt_start, $evt_end, $evt_type, $evt_time, $evt_category, $evt_free_paid, $evt_entrance_fee, $evt_area, $evt_location, $evt_website, 1));

		return $this->db->affected_rows();
	}

	public function get_event($event_id)
	{
		$data = array();
		
		$query = $this->db->query("SELECT * FROM events WHERE id = ?", array($event_id));
		
		if ($query->num_rows() > 0)
		{
			$data = $query->row_array();
		}
		$query->free_result();
		
		return $data;
	}

	public function editSave($evt_id, $evt_name, $evt_start, $evt_end, $evt_type, $evt_time, $evt_category, $evt_free_paid, $evt_entrance_fee, $evt_area, $evt_location, $evt_website)
	{
		$evt_start = strtotime($evt_start);
		$evt_end = strtotime($evt_end);

		$this->db->query("UPDATE events SET event_name = ?, event_start_date = ?, event_end_date = ?, event_type = ?, event_time = ?, event_category = ?, event_free_paid = ?, event_entrance_fee = ?, event_area = ?, event_location = ?, event_website = ? WHERE id = ?", array($evt_name, $evt_start, $evt_end, $evt_type, $evt_time, $evt_category, $evt_free_paid, $evt_entrance_fee, $evt_area, $evt_location, $evt_website, $evt_id));

		return $this->db->affected_rows();
	}

	public function deleteEvent($event_id)
	{
		$this->db->query("UPDATE events SET active = ? WHERE id = ?", array(0, $event_id));

		return $this->db->affected_rows();
	}
}
