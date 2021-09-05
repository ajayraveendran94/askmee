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

    public function checkout_now(){
        $this->load->model('checkout_model');
        $checkout_data = array(
                'ch_pr_id' => trim($this->input->post('product_id')),
                'ch_user_id' => trim($this->input->post('user_id')),
                'ch_quantity' => trim($this->input->post('quantity'))
        );
        $checkout_products = $this->checkout_model->add_to_checkout($checkout_data);
        echo $checkout_products;
    }
    
}