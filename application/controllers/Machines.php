<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Machines extends MY_Controller {

	protected $access = "@";
	
	public function __construct()
	{
		parent::__construct();
	}

        public function index(){
            $this->load->view('includes/head.php');
            $this->load->view('includes/navbar.php');

            $this->load->model('Service_model');
            $data["washers"] = $this->Service_model->get_all_washers();
            $data["dryers"] = $this->Service_model->get_all_dryers();
            $this->load->view('pages/machines.php', $data);
            $this->load->view('includes/footer.php');
            $this->load->view('includes/jscalls.php');
        }
        
        public function secured_switch(){
            if($this->input->is_ajax_request())
            {
                $this->load->model('Service_model');
                $data["washers"] = $this->Service_model->get_all_washers_by_transaction($this->input->post('q'));
                $data["dryers"] = $this->Service_model->get_all_dryers_by_transaction($this->input->post('q'));
                $this->load->view('ajax-page/switches.php', $data);
            }
        }
        
         public function switch_washer_on(){
            if($this->input->is_ajax_request())
            {
                $this->load->model('Machine_model');
                if($this->Machine_model->turn_on_washer()){
                    $data["message"] = "success";
                }else{
                    $data["message"] = "oops something went wrong";
                }
            }
        }
        
        public function switch_dryer_on(){
           if($this->input->is_ajax_request())
            {
                $this->load->model('Machine_model');
                if($this->Machine_model->turn_on_dryer()){
                    $data["message"] = "success";
                }else{
                    $data["message"] = "oops something went wrong";
                }
            } 
        }
        
        public function switch_washer_on_advance(){
            if($this->input->is_ajax_request())
            {
                $this->load->model('Machine_model');
                if($this->Machine_model->turn_on_washer_advance()){
                    $data["message"] = "success";
                }else{
                    $data["message"] = "oops something went wrong";
                }
            }
        }
        
        public function switch_dryer_on_advance(){
           if($this->input->is_ajax_request())
            {
                $this->load->model('Machine_model');
                if($this->Machine_model->turn_on_dryer_advance()){
                    $data["message"] = "success";
                }else{
                    $data["message"] = "oops something went wrong";
                }
            } 
        }
    
}