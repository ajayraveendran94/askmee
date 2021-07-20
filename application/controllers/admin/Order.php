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

    public function list()
    {
        $order_data = $this->order_model->get_orders();
        //print_r($product_data[0]['p_id']);
        $data['orders'] = $order_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/orderlist_view', $data);
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
        $order_array = array();
        $placed_order = $this->input->post();
        $max_index = count($placed_order['order_product_id']);
        $order_data = array(
                'address_id' => $placed_order['address'],
                'total_amount' => $placed_order['net_amount'],
                'status_id' => 1,
                'order_from_admin' => true,
                'order_date' => date("Y-m-d H:i:s")
        );
        $order_id =$this->order_model->save_order($order_data);
        for ($i=0; $i < $max_index; $i++){
            //$individual_price = 201;
                $data = array(
                    'order_id' => $order_id,
                    'product_id' => $placed_order['order_product_id'][$i],
                    'quantity' => $placed_order['quantity'][$i],
                    'individual_price' => $placed_order['offer_price'][$i],
                    'total_price' => $placed_order['offer_price'][$i] * $placed_order['quantity'][$i]
                );
            $this->order_model->save_order_details($data);
        }  
    }
    
}