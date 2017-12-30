<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Invoice_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_last_order_no(){
        $sql = "SELECT COALESCE(MAX(invoice_no),0)+1 as new_number FROM `tbl_sales_group`";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }

    public function receipt_sales($id){

        $sql = "SELECT discount_desc, discount_value, tax, tax_value, subtotal, total FROM `tbl_sales_group` WHERE ID = ".$id;

        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }


    public function receipt_washer($id){

        $sql = "SELECT COUNT(main.ID) as qty, SUM(main.price) as subtotal, main.`price`,machine.description FROM `tbl_washer_transaction` main"
        . " INNER JOIN tbl_washers machine on machine.ID = main.washer_id WHERE sales_group_id = ".$id." GROUP BY washer_id";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }

    public function receipt_dryer($id){

        $sql = "SELECT COUNT(main.ID) as qty, SUM(main.price) as subtotal, main.`price`,machine.description FROM `tbl_dryer_transaction` main"
        . " INNER JOIN tbl_dryers machine on machine.ID = main.dryer_id WHERE sales_group_id = ".$id." GROUP BY dryer_id";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }

    public function receipt_addon($id){

        $sql = "SELECT COUNT(main.ID) as qty, main.`price`, SUM(main.price) as subtotal ,machine.description FROM `tbl_addon_sales` main"
        . " INNER JOIN tbl_addons machine on machine.ID = main.addons_id WHERE sales_group_id = ".$id." GROUP BY addons_id";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }

    public function get_sales($date){

        list($month,$day,$year) = explode("/",$date);
        $bill_date = $year."-".$month."-".$day;

        $sql = "SELECT main.`ID`, `invoice_no`, `full_invoice_no`, `customer_id`, `customer_name`, CONCAT(emp.firstname, ', ', emp.lastname) as employee, CONCAT(member.firstname, ', ', member.lastname) as member_name, `total`, `payment`, main.`points`, `points_used`, 
        DATE_FORMAT( main.`date_created` ,  '%m/%d/%Y') as date_created, CASE WHEN points_used > 0 THEN 'POINTS' ELSE 'CASH' END as payment_type, CASE WHEN discount_value != 0 THEN discount_desc ELSE '---' END as discount_desc
        FROM `tbl_sales_group` main
        LEFT OUTER JOIN tbl_employee emp on emp.ID = main.user_id
        LEFT OUTER JOIN tbl_members member on member.ID = main.customer_id WHERE main.`date_created` = '".$bill_date."' ORDER BY ID DESC";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }

    public function get_load_sales($date){

        list($month,$day,$year) = explode("/",$date);
        $bill_date = $year."-".$month."-".$day;

        $sql = "SELECT main.ID,CONCAT(mem.firstname,' ,',mem.lastname) as member_name, mem.card_number as card_no, amount as total,main.date_created FROM `tbl_account_reload_log` main 
        INNER JOIN tbl_members mem on mem.ID = main.customer_id WHERE main.`date_created` = '".$bill_date."' ORDER BY main.ID DESC";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
    }


    public function reload_account(){

        $reload = array(
            'current_load' => $this->input->post('amount')
        );

        $this->db->where('ID', $this->input->post('customer_id'));
        $this->db->update('tbl_members', $reload);

        $log = array(
            'customer_id' => $this->input->post('customer_id'),
            'amount' => $this->input->post('amount'),
            'date_created' => date("Y-m-d")
        );

        $this->db->insert('tbl_account_reload_log', $log);

    }

    public function save_order(){

        $invoice_no = "";
        if($this->input->post('invoice_no'))
            $invoice_no = ltrim($this->input->post('invoice_no'), '0');

        //Insert sales group
        $new_sales_group = array(
            'invoice_no' => $invoice_no,
            'user_id' => $this->session->userdata("user_id"),
            'full_invoice_no' => $this->input->post('full_invoice_no'),
            'customer_id' => $this->input->post('customer_id'),
            'customer_name' => $this->input->post('customer_name'),
            'tax' => $this->input->post('tax'),
            'tax_value' => $this->input->post('tax_value'),
            'discount_desc' => $this->input->post('discount_desc'),
            'discount_value' => $this->input->post('discount'),
            'subtotal' => $this->input->post('subtotal'),
            'total' => $this->input->post('total'),
            'payment' => $this->input->post('payment'),
            'points' => $this->input->post('earned_points'),
            'points_used' => $this->input->post('points_used'),
            'date_created' => date("Y-m-d")
        );

        $group_id = 0;
        if($this->db->insert('tbl_sales_group', $new_sales_group) ){
            $group_id = $this->db->insert_id();
        }

        $stocks = $this->input->post('addon_stocks');

        if(count($this->input->post('addon_stocks')) > 0){
            $addon = array();
            for ($j = 0; $j < count($this->input->post('addon_stocks')); $j++)
            {
                $pieces = explode("_",$stocks[$j]);              

                $addon_stocks = array(
                    'stocks' => $pieces[1]
                );    
                $this->db->where('ID',$pieces[0]);
                $this->db->update('tbl_addons',$addon_stocks);
            }
        }


        //Insert sales detail
        if($group_id > 0){

            //POINTS System
            if($this->input->post('customer_id') != "0"){
                if(floatVal($this->input->post('points_used')) == 0){ 
                    //Fire only when customer is not using points to pay
                    $points_update = $this->input->post('new_points');

                    $this->db->set('current_load', 'current_load-'.$this->input->post('payment'), FALSE)->set('points', $points_update, FALSE)
                    ->where('ID',$this->input->post('customer_id'))->update('tbl_members');
                }else{
                    //Fire only when customer is using points to pay
                    $points_used = $this->input->post('points_used');
                    $this->db->set('points', 'points-'.$points_used, FALSE)
                    ->where('ID',$this->input->post('customer_id'))->update('tbl_members');
                } 
            }

            //Washer transactions
            $washer_id = $this->input->post('washer_id');
            $washer_price = $this->input->post('washer_price');

            if(count($this->input->post('washer_id')) > 0){
                $washer = array();
                for ($i = 0; $i < count($this->input->post('washer_id')); $i++)
                {
                    $washer[$i] = array(
                        'sales_group_id' => $group_id,
                        'washer_id' => $washer_id[$i],
                        'price' => $washer_price[$i],
                        'date_created' => date("Y-m-d")
                    );	
                }

                $this->db->insert_batch('tbl_washer_transaction', $washer);
            }

            //Dryer transactions
            $dryer_id = $this->input->post('dryer_id');
            $dryer_price = $this->input->post('dryer_price');

            if(count($this->input->post('dryer_id')) > 0){
                $dryer = array();
                for ($j = 0; $j < count($this->input->post('dryer_id')); $j++)
                {
                    $dryer[$j] = array(
                        'sales_group_id' => $group_id,
                        'dryer_id' => $dryer_id[$j],
                        'price' => $dryer_price[$j],
                        'date_created' => date("Y-m-d")
                    );	
                }

                $this->db->insert_batch('tbl_dryer_transaction', $dryer);
            }
            //Addons transactions
            $addons_id = $this->input->post('addons_id');
            $addons_price = $this->input->post('addons_price');
            if(count($this->input->post('addons_id')) > 0){
                $addon = array();
                for ($j = 0; $j < count($this->input->post('addons_id')); $j++)
                {
                    $addon[$j] = array(
                        'sales_group_id' => $group_id,
                        'addons_id' => $addons_id[$j],
                        'price' => $addons_price[$j],
                        'date_created' => date("Y-m-d")
                    );	
                }

                $this->db->insert_batch('tbl_addon_sales', $addon);
            }
        }


    }                                 
}

?>