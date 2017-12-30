<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Auth extends MY_Controller {	

	public function logged_in_check()
	{
		if ($this->session->userdata("logged_in") && $this->session->userdata('subs_type')) {
			redirect("Main");
		}
	}

	public function index()
	{	
		$this->logged_in_check();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
                
		if ($this->form_validation->run() == true) 
		{
                    
			$this->load->model('auth_model', 'auth');	

            // check the username & password of user
			$status = $this->auth->validate();
			if ($status == "ERR_INVALID_USERNAME") {
				$this->session->set_flashdata("error", "Username is invalid");
			}
			else if ($status == "ERR_INVALID_PASSWORD") {
				$this->session->set_flashdata("error", "Password is invalid");
			}
                        else
			{
                            
                            //if($this->input->post('hidLoginStatus') == "AUTHENTICATED"){
				// success
				// store the user data to session
				$this->session->set_userdata($this->auth->get_data());
				$this->session->set_userdata("logged_in", true);
				$this->session->set_userdata("user_id", $status["user_id"]);
                                $this->session->set_userdata("role", $status["role"]);
                                $this->session->set_userdata("washer_count", $status["washer_count"]);
                                $this->session->set_userdata("dryer_count", $status["dryer_count"]);
                                
				$this->session->set_userdata("subs_type", $status["subscription_type"]);
                                $this->session->set_userdata("subs_from", $status["subscription_from"]);
                                $this->session->set_userdata("subs_to", $status["subscription_to"]);
                                
                                
				//echo $this->session->userdata("user_id");
				// redirect to site
				redirect("Main");
//                            }else{
//                                die("<h4>You are using an aunthorized version. Please contact helpdesk@midpointsolutions.ph</h4>");
//                            }
			}
		}
                
		$this->load->view('pages/login.php');
	}

	public function logout()
	{
		$this->session->unset_userdata("logged_in");
                $this->session->unset_userdata("user_id");
		$this->session->sess_destroy();
		redirect("auth");
	}

}