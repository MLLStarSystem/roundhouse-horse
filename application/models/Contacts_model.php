<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
            
	class Contacts_model extends CI_Model{
            
		public function __construct()
		{
			parent::__construct();
		}
                    
                function get_all_members($search, $limit, $start)
                {
                    $sql = "SELECT `ID`, CONCAT(`firstname`,', ', `lastname`) as fullname,card_number,current_load, address,phone, mobile, email, points
                            FROM `tbl_members` as main".
                            $search." ORDER BY main.ID DESC LIMIT ". $start .",". $limit;

                    $query = $this->db->query($sql);

                    if($query->num_rows() > 0)
                    {
                        return $query->result_array();
                    }
                }
                
                function get_member_details($id)
                {
                    $sql = "SELECT `ID`, firstname, lastname,card_number,current_load, address,phone, mobile, email, points
                            FROM `tbl_members` as main WHERE ID = ".$id;

                    $query = $this->db->query($sql);

                    if($query->num_rows() > 0)
                    {
                        return $query->result_array();
                    }
                }
                
                function save_member(){
                    $new_contact_data = array(
                                'card_number' => $this->input->post('txtCardNo'),
				'firstname' => $this->input->post('txtFirstname'),
				'lastname' => $this->input->post('txtLastname'),
				'address' => $this->input->post('txtAddress'),
				'phone' => $this->input->post('txtPhone'),
				'mobile' => $this->input->post('txtMobile'),
				'email' => $this->input->post('txtEmail'),
				'current_load' => $this->input->post('txtLoad'),
				'date_created' => date("Y-m-d")				
			);

			$this->db->insert('tbl_members', $new_contact_data);
                }
                
                 function update_member(){
                    $gdata = array(
                                'firstname' => $this->input->post('txtFirstname'),
				'lastname' => $this->input->post('txtLastname'),
				'address' => $this->input->post('txtAddress'),
				'phone' => $this->input->post('txtPhone'),
				'mobile' => $this->input->post('txtMobile'),
				'email' => $this->input->post('txtEmail')
			);

			$this->db->where('ID', $this->input->post('hidMemberId'));
                        $this->db->update('tbl_members', $gdata);
                }
                
                function get_customer_autocomplete($user_input)
                {
                    $sql = "SELECT (SELECT `points_percentage` FROM `tbl_company_profile`) as poits_percentage, `ID`, CONCAT(`firstname`,', ', `lastname`) as fullname,card_number,current_load, address,phone, mobile, email, points
                                    FROM `tbl_members` WHERE card_number LIKE '%".$user_input."%'";
                                        
                                        
                    $query = $this->db->query($sql);
                        
                    if($query->num_rows() > 0)
                    {
                            return $query->result();
                    }
                }
        }
            
?>