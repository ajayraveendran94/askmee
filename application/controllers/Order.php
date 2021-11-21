<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Order extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('/login');
        }
        $this->load->model('cart_model');
    }

    public function index(){
        $this->load->model('order_model');
        $id = $_SESSION['user']['user_id'];
        $order_data = $this->order_model->get_user_orders($id);
        $data['order_data'] = $order_data;
        $this->load->view('templates/header');
        $this->load->view('order_view', $data);
        $this->load->view('templates/footer');
    }

    public function checkout(){
        $this->load->model('addproduct_model');
        $this->load->model('address_model');
        $id = $_SESSION['user']['user_id'];
        $category_name = $this->addproduct_model->get_category();
        $data['category'] = $category_name;
        $data['cart_data'] = $this->cart_model->get_cart($id);
        $data['address'] = $this->address_model->get_user_address($id);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar',$data);
        $this->load->view('checkout_view', $data);
        $this->load->view('templates/footer');
    }
    
    public function quick_order(){
        $this->load->model('address_model');
        $this->load->model('checkout_model');
        $id = $_SESSION['user']['user_id'];
        $data['cart_data'] = $this->checkout_model->get_checkout($id);
        $data['address'] = $this->address_model->get_user_address($id);
        $this->load->view('templates/header');
        $this->load->view('quick_order_view', $data);
        $this->load->view('templates/footer');
    }

    public function place_order(){
        $this->load->model('order_model');
        $this->load->model('address_model');
        $id = $_SESSION['user']['user_id'];
        $order_data = $this->cart_model->get_cart($id);
        $address_id = $this->input->post('userAddress');
        $total_price = 0;
        foreach($order_data as $data) {
            $total_price = $total_price + ($data['offer_price'] * $data['car_quantity']);
        }
        //print_r($order_data);
        $order_data_details = array(
                'address_id' => $address_id,
                'total_amount' => $total_price,
                'status_id' => 1,
                'order_from_admin' => false,
                'order_date' => date("Y-m-d H:i:s")
        );
        $order_id = $this->order_model->save_order($order_data_details);
        foreach($order_data as $data) {
            $single_order_data = array(
                    'order_id' => $order_id,
                    'or_product_id' => $data['p_id'],
                    'or_quantity' => $data['car_quantity'],
                    'individual_price' => $data['offer_price'],
                    'total_price' => $data['offer_price'] * $data['car_quantity']
                );
            $this->order_model->save_order_details($single_order_data);
            $this->cart_model->delete_user_cart($id);
        }
        $this->load->view('templates/header');
        $this->load->view('order_complete_view');
        $this->load->view('templates/footer');
    }

    public function quick_place_order(){
        $this->load->model('order_model');
        $this->load->model('address_model');
        $this->load->model('checkout_model');
        $id = $_SESSION['user']['user_id'];
        $order_data = $this->checkout_model->get_checkout($id);
        $address_id = $this->input->post('userAddress');
        $total_price = 0;
        foreach($order_data as $data) {
            $total_price = $total_price + ($data['offer_price'] * $data['ch_quantity']);
        }
        $order_data_details = array(
                'address_id' => $address_id,
                'total_amount' => $total_price,
                'status_id' => 1,
                'order_from_admin' => false,
                'order_date' => date("Y-m-d H:i:s")
        );
        $order_id = $this->order_model->save_order($order_data_details);
        foreach($order_data as $data) {
            $single_order_data = array(
                    'order_id' => $order_id,
                    'or_product_id' => $data['p_id'],
                    'or_quantity' => $data['ch_quantity'],
                    'individual_price' => $data['offer_price'],
                    'total_price' => $data['offer_price'] * $data['ch_quantity']
                );
            $this->order_model->save_order_details($single_order_data);
            $this->checkout_model->delete_checkout($id);
        }
        $this->load->view('templates/header');
        $this->load->view('order_complete_view');
        $this->load->view('templates/footer');
    }
    
}