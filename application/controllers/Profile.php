<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('/login');
        }
        $this->load->model('cart_model');
        $this->load->model('address_model');

    }

    public function index(){
        $id = $_SESSION['user']['user_id'];
        $cart_data = $this->cart_model->get_cart($id);
        $data['user_id'] = $id;
        $data['cart_data'] = $cart_data;
        $data['address'] = $this->address_model->get_user_address( $id);
        // print_r( $data['address']);exit();
        $this->load->view('templates/header');
        $this->load->view('profile_view', $data);
        $this->load->view('templates/footer');
    }
    
}