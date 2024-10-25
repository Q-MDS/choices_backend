<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('login_model');
    }

	public function validate()
	{
		$cred_1 = $_POST['cred_1'];
        $cred_2 = $_POST['cred_2'];

        $result = $this->login_model->validate($cred_1, $cred_2);

		if ($result == 1)
		{
			redirect('events/init');
		}
		else
		{
			// redirect('events/init');
			// redirect('login');
		}
	}

	public function index()
	{
		$data = array();
		
		$data['title'] = 'Login';
		$data['main_content'] = 'login/index';
		$this->load->view('includes/template_login', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect(base_url() . 'login');
	}
}
