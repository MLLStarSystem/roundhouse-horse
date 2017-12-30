<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Members extends MY_Controller {

	protected $access = "@";
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
             $subs_type = "";
             if($this->session->userdata('subs_type') == "3")
                $subs_type = "advance/";
        
            $this->load->view($subs_type.'includes/head.php');
            $this->load->view($subs_type.'includes/navbar.php');
            
            $search = "";
            $qry_status = "";

            if($this->input->get('q')){
              $search = " WHERE (main.card_number LIKE '".$this->input->get('q')."%' OR main.`firstname` LIKE '".$this->input->get('q')."%' OR main.`lastname` LIKE '".$this->input->get('q')."%')";
              $config['suffix'] = "?q=".$this->input->get('q');
            }

            $search = $qry_status.$search;

            $config['base_url'] = site_url('Members/index');
            $query = $this->db->query("SELECT main.`ID` FROM `tbl_members` main ".$search);

            $config['total_rows'] = $query->num_rows();

            $config['per_page'] = "100";
            $config["uri_segment"] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);

            //config for bootstrap pagination class integration
            $config['suffix'] = "?q=".$this->input->get("q");
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            //call the model function to get the department data
            $this->load->model('Contacts_model');
            $data["records"] = $this->Contacts_model->get_all_members($search, $config["per_page"], $data['page']);

            $data['pagination'] = $this->pagination->create_links();
            $data['search'] = $this->input->get("q");

        $this->load->view($subs_type.'pages/members.php', $data);
        $this->load->view($subs_type.'includes/footer.php');
        $this->load->view($subs_type.'includes/jscalls.php');
        }
        
        public function new_member(){
            $subs_type = "";
             if($this->session->userdata('subs_type') == "3")
                $subs_type = "advance/";
             
            $this->load->view($subs_type.'includes/head.php');
            $this->load->view($subs_type.'includes/navbar.php');
            $this->load->view($subs_type.'pages/create_new_member.php');
            $this->load->view($subs_type.'includes/footer.php');
            $this->load->view($subs_type.'includes/jscalls.php');
        }
        
        public function view_member(){
             $subs_type = "";
             if($this->session->userdata('subs_type') == "3")
                $subs_type = "advance/";
             
            $this->load->view($subs_type.'includes/head.php');
            $this->load->view($subs_type.'includes/navbar.php');
            if($this->input->get('q')){
                $id = $this->input->get('q');

                $this->load->model('Contacts_model');
                $data["records"] = $this->Contacts_model->get_member_details($id);

                $this->load->view($subs_type.'pages/edit_member.php',$data);
            }
            $this->load->view($subs_type.'includes/footer.php');
            $this->load->view($subs_type.'includes/jscalls.php');
        }
        
        function save_member(){
            if($this->input->is_ajax_request())
            {
                $this->load->model('Contacts_model');
                if($this->Contacts_model->save_member()){
                    $data["message"] = "success";
                }else{
                    $data["message"] = "oops something went wrong";
                }
            }
        }
        
         function update_member(){
            if($this->input->is_ajax_request())
            {
                $this->load->model('Contacts_model');
                if($this->Contacts_model->update_member()){
                    $data["message"] = "success";
                }else{
                    $data["message"] = "oops something went wrong";
                }
            }
        }
        
        public function customer_autocomplete()
        {

            if($this->input->get('q')){
                $user_input = $this->input->get('q');

                $this->load->model('Contacts_model');
                $clients = $this->Contacts_model->get_customer_autocomplete($user_input);

                $customer_list = array();
                foreach($clients as $myVal)
                {
                    $result = $myVal; 
                    array_push($customer_list , $result);
                }

                $json = json_encode($customer_list);
                echo $json;
            }
        }
}
?>