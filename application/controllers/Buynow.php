<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Buynow extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('/login');
        }
        $this->load->model('cart_model');
    }

    public function view($id){
        $cart_data = $this->cart_model->get_product_data($id);
        $data['cart_data'] = $cart_data;
        $this->load->view('templates/header');
        $this->load->view('buy_now_view', $data);
        $this->load->view('templates/footer');
    }
    
}