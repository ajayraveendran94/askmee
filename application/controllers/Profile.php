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
        $this->load->model('user_model');


    }

    public function index(){
        $id = $_SESSION['user']['user_id'];
        $cart_data = $this->cart_model->get_cart($id);
        $data['user_id'] = $id;
        $data['user_data'] =$this->user_model->get_user_data($id);
        $data['cart_data'] = $cart_data;
        $data['address'] = $this->address_model->get_user_address( $id);
        // print_r( $data['address']);exit();
        $this->load->view('templates/header');
        $this->load->view('profile_view', $data);
        $this->load->view('templates/footer');
    }

    public function add_new_address(){
        $address_data = array(
                'ad_user_id' => trim($this->input->post('user_id')),
                //'ad_title' => trim($this->input->post('ad_title')),
                'line_1' => trim($this->input->post('line_1')),
                'line_2' => trim($this->input->post('line_2')),
                'line_3' => trim($this->input->post('line_3')),
                //'post' => trim($this->input->post('post')),
                'pin' => trim($this->input->post('pin')),
                'district' => trim($this->input->post('district')),
                'state' => trim($this->input->post('state')),
                'contact_number_1' => trim($this->input->post('contact_number_1')),
                'contact_number_2' => trim($this->input->post('contact_number_2'))
            );
            $result= $this->address_model->save_address($address_data);
            echo($result);
    }
    
}