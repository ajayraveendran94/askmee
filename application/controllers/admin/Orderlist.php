<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Orderlist extends CI_Controller {

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
        $order_status = $this->order_model->get_all_status();
        //print_r($product_data[0]['p_id']);
        $data['orders'] = $order_data;
        $data['status'] = $order_status;
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
    
    public function view($page){
        $order_data = $this->order_model->get_order_data($page);
        $data['order'] = $order_data;
        $status_data = $this->order_model->get_all_status();
        $data['status'] = $status_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        //print_r($data);
        $this->load->view('admin/order_details_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }

    public function status()
    {
        $order_data = $this->order_model->get_orders();
        $order_status = $this->order_model->get_all_status();
        //print_r($product_data[0]['p_id']);
        $data['orders'] = $order_data;
        $data['status'] = $order_status;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/statuslist_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }

    public function place_order()
    {
        $order_array = array();
        $placed_order = $this->input->post();
        $max_index = count($placed_order['order_product_id']);
        $order_data = array(
                'address_id' => $placed_order['address'],
                'total_amount' => $placed_order['net_amount'],
                'order_from_admin' => true,
                'order_date' => date("Y-m-d H:i:s")
        );
        $order_id =$this->order_model->save_order($order_data);
        for ($i=0; $i < $max_index; $i++){
            //$individual_price = 201;
                $data = array(
                    'order_id' => $order_id,
                    'or_product_id' => $placed_order['order_product_id'][$i],
                    'or_quantity' => $placed_order['quantity'][$i],
                    'status_id' => 1,
                    'individual_price' => $placed_order['offer_price'][$i],
                    'total_price' => $placed_order['offer_price'][$i] * $placed_order['quantity'][$i]
                );
            $this->order_model->save_order_details($data);
        }  
    }
    
}