<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
            
	class Service_model extends CI_Model{
            
		public function __construct()
		{
			parent::__construct();
		}
                    
                function get_all_washers()
                {
                    $sql = "SELECT `ID`, `description`, `price`, `members_price`, `pin`, `status` FROM `tbl_washers`";
	        
                    $query = $this->db->query($sql);

                    if($query->num_rows() > 0)
                    {
                            return $query->result_array();
                    }
                }
                
                function get_all_washers_by_transaction($id){
                    $sql = "SELECT main.`ID`, `description`, main.`price`, main.`members_price`, `pin`, `status`,
                    sec.used,sec.ID as sales_id
                    FROM `tbl_washers` main
                    INNER JOIN `tbl_washer_transaction` sec on sec.washer_id = main.ID
                    WHERE sec.sales_group_id = ".$id;
                    
                    $query = $this->db->query($sql);

                    if($query->num_rows() > 0)
                    {
                        return $query->result_array();
                    }
                }
                
                 function get_all_dryers()
                {
                    $sql = "SELECT `ID`, `description`, `price`, `members_price`, `pin`, `status` FROM `tbl_dryers`";
	        
                    $query = $this->db->query($sql);

                    if($query->num_rows() > 0)
                    {
                            return $query->result_array();
                    }
                }
                
                 function get_all_dryers_by_transaction($id){
                    $sql = "SELECT main.`ID`, `description`, main.`price`, main.`members_price`, `pin`, `status`,sec.ID as sales_id,sec.used FROM `tbl_dryers` main
                    INNER JOIN `tbl_dryer_transaction` sec on sec.dryer_id = main.ID
                    WHERE sec.sales_group_id = ".$id;
                    
                    $query = $this->db->query($sql);

                    if($query->num_rows() > 0)
                    {
                        return $query->result_array();
                    }
                }
                
                function get_all_addons(){
                   $sql = "SELECT `ID`, `description`, `price`, `members_price`, `with_inventory`, `stocks`, `stocks_alert` FROM `tbl_addons`";
	        
                    $query = $this->db->query($sql);

                    if($query->num_rows() > 0)
                    {
                            return $query->result_array();
                    }   
                }
                
                function update_washer(){
                    
                    $desc = $this->input->post('txtDesc');
                    $price = $this->input->post('txtPrice');
                    $members_price = $this->input->post('txtMembersPrice');
                    $pin = $this->input->post('txtPin');
			    
                      $this->db->truncate('tbl_washers');
				$gdata = array();
                                echo count($this->input->post('txtPin'));
				for ($j = 1; $j < count($this->input->post('txtPin')); $j++)
				{
                                    $gdata[$j] = array(
                                            'description' => $desc[$j],
					    'price' => $price[$j],
					    'members_price' => $members_price[$j],
					    'pin' => $pin[$j]
				    );	
				}
                       print_r($gdata);
                        $this->db->insert_batch('tbl_washers', $gdata);
                }
                
                function update_dryer(){
                    
                     $desc = $this->input->post('txtDesc');
                    $price = $this->input->post('txtPrice');
                    $members_price = $this->input->post('txtMembersPrice');
                    $pin = $this->input->post('txtPin');
			    
                      $this->db->truncate('tbl_dryers');
				$gdata = array();
                                echo count($this->input->post('txtPin'));
				for ($j = 1; $j < count($this->input->post('txtPin')); $j++)
				{
                                    $gdata[$j] = array(
                                            'description' => $desc[$j],
					    'price' => $price[$j],
					    'members_price' => $members_price[$j],
					    'pin' => $pin[$j]
				    );	
				}
                       print_r($gdata);
                        $this->db->insert_batch('tbl_dryers', $gdata);
                }
                
                 function update_addon(){
                    
                     $desc = $this->input->post('txtDesc');
                    $price = $this->input->post('txtPrice');
                    $members_price = $this->input->post('txtMembersPrice');
			    
                      $this->db->truncate('tbl_addons');
				$gdata = array();
				for ($j = 0; $j < count($this->input->post('txtDesc')); $j++)
				{
                                    $gdata[$j] = array(
                                            'description' => $desc[$j],
					    'price' => $price[$j],
					    'members_price' => $members_price[$j]
				    );	
				}
                       print_r($gdata);
                        $this->db->insert_batch('tbl_addons', $gdata);
                }
                
        }
            
?>