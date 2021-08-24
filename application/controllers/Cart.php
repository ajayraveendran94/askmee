<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Cart extends CI_Controller {

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
        $id = $_SESSION['user']['user_id'];
        $cart_data = $this->cart_model->get_cart($id);
        $data['cart_data'] = $cart_data;
        $this->load->view('templates/header');
        $this->load->view('cart_view', $data);
        $this->load->view('templates/footer');
    }
    
    public function add_to_cart(){
        $cart_data = array(
                'car_pr_id' => trim($this->input->post('product_id')),
                'car_user_id' => trim($this->input->post('user_id')),
                'car_quantity' => trim($this->input->post('quantity'))
        );
        $category_products = $this->cart_model->add_to_cart($cart_data);
        echo $category_products;
    }
    public function delete_cart(){
        $cart_id = trim($this->input->post('cart_id'));
        $delete_cart = $this->cart_model->delete_cart($cart_id);
        echo $delete_cart;
    }
    public function delete_user_cart(){
        $user_id = trim($this->input->post('user_id'));
        $delete_cart = $this->cart_model->delete_user_cart($user_id);
        echo $delete_cart;
    }
}