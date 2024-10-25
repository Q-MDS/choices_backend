<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{
	public function validate($chk_cred_1, $chk_cred_2)
    {
        $result = '0';
        $cred_list = $this->getCreds();

        //$cred_hash = password_hash($chk_cred_2, PASSWORD_DEFAULT);
        
        foreach ($cred_list as $cred)
        {
            $id = $cred['id'];
            $cred_1 = $cred['cred_1'];
            $cred_2 = $cred['cred_2'];

			if ($chk_cred_1 == $cred_1)
			{
				if (password_verify($chk_cred_2, $cred_2))
				{
					$this->session->set_userdata('authenticated', '1');
					$result = 1;
				}
			} 
        }
        
        return $result;
    }

	private function getCreds()
    {
        $data = array();
        
        $query = $this->db->query("SELECT * FROM `ap_users` WHERE `active` = " . $this->db->escape("1") . " ORDER BY `cred_1` ASC");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $id = $row['id'];
                $cred_1 = $row['cred_1'];
                $cred_2 = $row['cred_2'];
                
                $data[] = array('id' => $id, 'cred_1' => $cred_1, 'cred_2' => $cred_2);
            }
        }
        $query->free_result();
       
        return $data;
    }

	// App reset
	public function setAppForgotReset($forgot_reset, $ft)
	{
		$user_id = 0;
		$now = date("Y-m-d");
		
		$query = $this->db->query("SELECT id FROM app_users WHERE forgot_token = " . $this->db->escape($ft) . " AND forgot_expires >= $now");
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$user_id = $row['id'];
			}
		}
		$query->free_result();
		
		if ($user_id != 0)
		{
			$forgot_reset_hash = password_hash($forgot_reset, PASSWORD_DEFAULT);
			$this->db->query("UPDATE `app_users` SET `cred_2` = " . $this->db->escape($forgot_reset_hash) . " WHERE `forgot_token` = " . $this->db->escape($ft) . "");
		}

		return $user_id;
	}

	public function clearAppToken($user_id)
	{
		$this->db->query("UPDATE `app_users` SET `forgot_token` = '', `forgot_expires` = Now() WHERE id = " . $this->db->escape($user_id) . "");
	}

}
