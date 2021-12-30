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
        $filter_data['status'] = $this->input->post('to_date');
        $filter_data['to_date'] = $this->input->post('to_date');
        $filter_data['to_date'] = $this->input->post('to_date');
        if($this->input->post('report_type') == 'sales_report'){
            $sales_data['headers'] = ['Order Id', 'Order Date', 'Product','Quantity','Ordered By', 'Vendor Name', 'Order Status', 'Amount'];
            $sales_data = $this->order_model->get_order_details($filter_data);
            $data['sales_data'] = $sales_data;
        }
        //print_r($data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/show_report_view');
        $this->load->view('admin/templates/footer_admin'); 
    }

    // public function edit_master_product($id)
    // {
    //     $this->load->model('masterproduct_model');
    //     $this->load->model('category_model');
    //     $master_product = $this->masterproduct_model->get_master_data($id);
    //     $category = $this->category_model->get_categories();
    //     $commission = $this->masterproduct_model->get_commission();
    //     $data['master_product'] = $master_product;
    //     $data['category_name'] = $category;
    //     $data['commission'] = $commission;
    //     //print_r($data);
    //     $this->load->view('admin/templates/header');
    //     $this->load->view('admin/templates/nav_side_bar');
    //     $this->load->view('admin/edit_master_product_view', $data);
    //     $this->load->view('admin/templates/footer_admin');
    // }

    // public function commission()
    // {
    //     $this->load->model('commission_model');
    //     $order_status = $this->commission_model->get_all_commission();
    //     //print_r($product_data[0]['p_id']);
    //     $data['commission'] = $order_status;
    //     $this->load->view('admin/templates/header');
    //     $this->load->view('admin/templates/nav_side_bar');
    //     $this->load->view('admin/commission_view', $data);
    //     $this->load->view('admin/templates/footer_admin');
    // }
    // public function get_all_commission(){
    //     $this->load->model('commission_model');
    //     $result = $this->commission_model->get_all_commission();
    //     echo json_encode($result);
    // }
    // public function create_new_commission(){
    //     $this->load->model('commission_model');
    //     $com_data = array(
    //                     'com_name' => trim($this->input->post('com_name')),
    //                     'com_amount' => trim($this->input->post('com_amount')),
    //                     'com_percent' => trim($this->input->post('com_percent'))
    //                 );
    //     $result = $this->commission_model->save_commission($com_data);
    //     echo json_encode($result);
    // }

    // public function update_commission()
    // {
    //     $this->load->model('commission_model');
    //     $com_data = array(
    //                     'com_name' => trim($this->input->post('com_name')),
    //                     'com_amount' => trim($this->input->post('com_amount')),
    //                     'com_percent' => trim($this->input->post('com_percent'))
    //                 );
    //     $com_id = trim($this->input->post('com_id'));
    //     $result = $this->commission_model->update_commission($com_data, $com_id);
    //     echo json_encode($result);

    // }
}
?>