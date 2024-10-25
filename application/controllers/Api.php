<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('api_model');
    }

	public function get_events()
	{
		$events = $this->api_model->getCurrentEvents();

		echo json_encode($events);
	}
}
