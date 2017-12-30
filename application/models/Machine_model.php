<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
            
	class Machine_model extends CI_Model{
            
		public function __construct()
		{
			parent::__construct();
		}
                    
                public function turn_on_washer(){
                    
                    $status = array(
                    'status' => "1"
                    );
                        
                    $this->db->where('ID', $this->input->get('ID'));
                    $this->db->update('tbl_washers', $status);
                        
                }
                    
                public function turn_on_washer_advance(){
                   
                    $status2 = array(
                    'used' => "1"
                    );
                                           
                    $this->db->where('ID', $this->input->get('sales_id'));
                    $this->db->update('tbl_washer_transaction', $status2);
                    
                    passthru("python washer".$this->input->get('ID').".py");
                }
                    
                public function turn_on_dryer_advance(){
                    
                    $status2 = array(
                    'used' => "1"
                    );
                     
                    $this->db->where('ID', $this->input->get('sales_id'));
                    $this->db->update('tbl_dryer_transaction', $status2);
                    
                    passthru("python dryer".$this->input->get('ID').".py");
                        
                }
                    
                public function turn_on_dryer(){
                    
                    $status = array(
                    'status' => "1"
                    );
                        
                    $this->db->where('ID', $this->input->get('ID'));
                    $this->db->update('tbl_dryers', $status);
                        
                }
        }
            
?>