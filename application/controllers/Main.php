<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Main extends MY_Controller {

    protected $access = "@";

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $this->load->view('includes/head.php');

        $this->load->model('Invoice_model');
        $data["next_order_no"] = $this->Invoice_model->get_last_order_no();
        $this->load->model('Profile_model');
        $data["profile"] = $this->Profile_model->get_profile();
        $data["discounts"] = $this->Profile_model->get_discounts();
        $this->load->model('Service_model');
        $data["washers"] = $this->Service_model->get_all_washers();
        $data["dryers"] = $this->Service_model->get_all_dryers();
        $data["addons"] = $this->Service_model->get_all_addons();

        $this->load->view('pages/pos.php', $data);
        $this->load->view('includes/footer.php');

    } 

    public function sales(){
        $this->load->view('includes/head.php');

        $this->load->model('Invoice_model');

        $date = new DateTime();
        $search = $date->format('m/d/Y');
        if($this->input->get("search") != ""){
            $search = $this->input->get("search");
        }

        $data["records"] = $this->Invoice_model->get_sales($search);

        $this->load->view('pages/sales_record.php',$data);
        $this->load->view('includes/footer.php');
    }

    public function save_sales(){
        if($this->input->is_ajax_request())
        {
            $this->load->model('Invoice_model');
            if($this->Invoice_model->save_order()){
                $data["message"] = "success";
            }else{
                $data["message"] = "oops something went wrong";
            }
        }
    }

    public function reload_account(){
        if($this->input->is_ajax_request())
        {
            $this->load->model('Invoice_model');
            if($this->Invoice_model->reload_account()){
                $data["message"] = "success";
            }else{
                $data["message"] = "oops something went wrong";
            }
        }
    }

    public function print_receipt(){
        if($this->input->get("id") != ""){
            $this->load->model('Invoice_model');
            $data["sales"] = $this->Invoice_model->receipt_sales($this->input->get("id"));
            $data["washer_receipt"] = $this->Invoice_model->receipt_washer($this->input->get("id"));
            $data["dryer_receipt"] = $this->Invoice_model->receipt_dryer($this->input->get("id"));
            $data["addon_receipt"] = $this->Invoice_model->receipt_addon($this->input->get("id"));
            $this->load->view('ajax-page/receipt.php', $data);
        }
    }                          
}
?>