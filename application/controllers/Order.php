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
        $id = $_SESSION['user']['user_id'];
        $cart_data = $this->cart_model->get_cart($id);
        $data['cart_data'] = $cart_data;
        $this->load->view('templates/header');
        $this->load->view('order_view', $data);
        $this->load->view('templates/footer');
    }
    
}