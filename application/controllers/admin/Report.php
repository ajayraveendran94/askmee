<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Report extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('order_model');
    }

    public function index()  
    {  
        $this->load->model('user_model');
        $vendor_data = $this->user_model->get_vendors();
        $order_status = $this->order_model->get_all_status();
        // $address_data = $this->order_model->get_all_address();
        // //print_r($product_data[0]['p_id']);
        // $data['product_list'] = $product_data;
        $data['vendor_data'] = $vendor_data;
        $data['status_data'] = $order_status;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/new_report_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }

    public function new_report()
    {  
        $filter_data['from_date'] = $this->input->post('from_date');
        $filter_data['status'] = $this->input->post('report_status');
        $filter_data['to_date'] = $this->input->post('to_date');
        $filter_data['report_type'] = $this->input->post('report_type');
        $filter_data['vendor_id'] = $this->input->post('report_vendor');
        $data = null;
        if($this->input->post('report_type') == 'sales_report'){
            $data['headers'] = ['Order Id', 'Order Date', 'Product','Quantity','Ordered By', 'Address', 'Vendor Name', 'Order Status', 'Amount'];
            $sales_data = $this->order_model->get_order_details($filter_data);
            $data['sales_data'] = $sales_data;
            $vendor_data = $this->order_model->get_vendor_details($filter_data);
            $data['vendor_data'] = $vendor_data;
        }
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/show_report_view', $data);
        $this->load->view('admin/templates/footer_admin'); 
    }
}
?>