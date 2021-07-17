<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Order extends CI_Controller {

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
        $product_data = $this->order_model->get_products();
        $address_data = $this->order_model->get_all_address();
        //print_r($product_data[0]['p_id']);
        $data['product_list'] = $product_data;
        $data['address_list'] = $address_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/new_order_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }

     public function get_product_data()  
    {  
        $this->load->model('productlist_model');
        $id = trim($this->input->post('id'));
        $product_data = $this->productlist_model->get_product_data($id);
        $data['product'] = $product_data;
        echo json_encode($data);
    }
    
    public function place_order()
    {
        print_r($this->input->post());
    }
    
}