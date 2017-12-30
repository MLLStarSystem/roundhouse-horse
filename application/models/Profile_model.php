<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
            
	class Profile_model extends CI_Model{
            
            public function __construct()
            {
                parent::__construct();
            }
                
            public function get_profile(){
		$sql = "SELECT `company`, `address`, `phone`, `mobile`, `email`, `tin_no`, `points_percentage`,vat FROM `tbl_company_profile`";
                    
	        $query = $this->db->query($sql);
                    
                    if($query->num_rows() > 0)
                    {
                            return $query->result_array();
                    }
            }   
            
            public function get_access(){
		$sql = "SELECT username, password FROM `obs_user`";
                    
	        $query = $this->db->query($sql);
                    
                    if($query->num_rows() > 0)
                    {
                        return $query->result_array();
                    }
            }   
            
            public function get_discounts(){
		$sql = "SELECT `ID`, `discount`, `discount_value` FROM `tbl_discounts`";
                    
	        $query = $this->db->query($sql);
                    
                    if($query->num_rows() > 0)
                    {
                            return $query->result_array();
                    }
            }   
                
            public function save_profile(){
                
                        $gdata = array(
                                'company' => $this->input->post('txtCompany'),
				'tin_no' => $this->input->post('txtTin'),
				'address' => $this->input->post('txtAddress'),
				'phone' => $this->input->post('txtPhone'),
				'mobile' => $this->input->post('txtMobile'),
				'email' => $this->input->post('txtEmail'),
                                'points_percentage' => $this->input->post('txtPoints'),
                                'vat' => $this->input->post('txtVat')
			);

                        $this->db->update('tbl_company_profile', $gdata);
            }
            
             public function save_access(){
                
                        $gdata = array(
                                'username' => $this->input->post('txtUsername'),
				'password' => sha1($this->input->post('txtPassword'))
			);

                        $this->db->update('obs_user', $gdata);
            }
            
            public function save_discount(){
                
                $desc = $this->input->post('txtDesc');
                    $dc = $this->input->post('txtPerentage');
                        
                      $this->db->truncate('tbl_discounts');
				$gdata = array();
				for ($j = 0; $j < count($this->input->post('txtDesc')); $j++)
				{
                                    $gdata[$j] = array(
                                            'discount' => $desc[$j],
					    'discount_value' => $dc[$j]
				    );	
				}
                                
                        $this->db->insert_batch('tbl_discounts', $gdata);
                            
            }
                
        }
?>