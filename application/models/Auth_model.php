<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	private $table = "obs_user";
	private $_data = array();

	public function validate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$sql = "SELECT config.ID as config_id,main.ID as user_id, username, password,role,config.washer_count, config.dryer_count
                    FROM `obs_user` main
                    INNER JOIN obs_config config on config.ID = main.config_id
		 WHERE username = ?";
	                                
                $query = $this->db->query($sql, $username);

		if ($query->num_rows()) 
		{
			// found row by username	
			$row = $query->row_array();

			// now check for the password
			//if ($row['password'] == sha1($password)) 
            
			if ($row['password'] == sha1($password))
			{
				// we not need password to store in session
				unset($row['password']);
				$this->_data = $row;
				return $row;
			}

			// password not match
			return "ERR_INVALID_PASSWORD";
		}
		else {
			// not found
			return "ERR_INVALID_USERNAME";
		}
	}

	public function get_data()
	{
		return $this->_data;
	}

}