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
    public function update_profile(){
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
            $user_data = array(
               'name' => $this->input->post('name'),
               'email' => $this->input->post('email'),
               'mobile_number' => $this->input->post('mobile'),
           );
        $result = $this->user_model->update_user(array('user_id' => $this->input->post('user_id')),$user_data);
        echo json_encode(array("status" => TRUE));
    }

    public function index(){
        $id = $_SESSION['user']['user_id'];
        $cart_data = $this->cart_model->get_cart($id);
        $data['user_id'] = $id;
        $data['user_data'] =$this->user_model->get_user_data($id);
        $data['cart_data'] = $cart_data;
        $data['address'] = $this->address_model->get_user_address( $id);
        $this->load->helper('navbar');
        echo header_helper_ex();
        echo navbar_helper_ex();
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
                'post' => trim($this->input->post('post')),
                'pin' => trim($this->input->post('pin')),
                'district' => trim($this->input->post('district')),
                'state' => trim($this->input->post('state')),
                'contact_number_1' => trim($this->input->post('contact_number_1')),
                'contact_number_2' => trim($this->input->post('contact_number_2'))
            );
            $this->address_model->save_address($address_data);
            echo($result);
            echo json_encode(array("status" => TRUE));
    }

    public function ajax_new_address(){
       $address_data1 = array(
               'ad_user_id' => trim($this->input->post('users_id')),
               'line_1' => trim($this->input->post('line_1')),
               'line_2' => trim($this->input->post('line_2')),
               'line_3' => trim($this->input->post('line_3')),
               'post' => trim($this->input->post('post')),
               'pin' => trim($this->input->post('pin')),
               'district' => trim($this->input->post('district')),
               'state' => trim($this->input->post('state')),
               'contact_number_1' => trim($this->input->post('contact_number_1')),
               'contact_number_2' => trim($this->input->post('contact_number_2'))
           );
           $this->address_model->address_new($address_data1);
           echo json_encode(array("status" => TRUE));
   }

    public function ajax_address_update(){
        $address_data = array(
                'line_1' => trim($this->input->post('line_1')),
                'line_2' => trim($this->input->post('line_2')),
                'line_3' => trim($this->input->post('line_3')),
                'district' => trim($this->input->post('district')),
                'state' => trim($this->input->post('state')),
                'post' => trim($this->input->post('post')),
                'pin' => trim($this->input->post('pin')),
                'contact_number_1' => trim($this->input->post('contact_number_1')),
                'contact_number_2' => trim($this->input->post('contact_number_2'))
            );
            $this->address_model->address_detail_update(array('ad_id' => $this->input->post('ad_id')), $address_data);

            echo json_encode(array("status" => TRUE));
            // $result= $this->address_model->save_address($address_data);
            // echo($result);
    }

    
    
    

    public function ajax_address_edit($add_id) {
        $data = $this->address_model->get_by_address_id($add_id);
        echo json_encode($data);
    }
    
}