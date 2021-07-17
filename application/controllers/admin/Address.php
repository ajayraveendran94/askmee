<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Address extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('address_model');
    }

    public function index()  
    {  
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/add_user_view');
        $this->load->view('admin/templates/footer_admin');  
    }

    public function add_new()
    {
            $address_data = array(
                'user_id' => $this->input->post('user_id'),
                'ad_title' => $this->input->post('ad_title'),
                'line_1' => $this->input->post('line_1'),
                'line_2' => $this->input->post('line_2'),
                'line_3' => $this->input->post('line_3'),
                'post' => $this->input->post('post'),
                'pin' => $this->input->post('pin'),
                'district' => $this->input->post('district'),
                'state' => $this->input->post('state'),
                'contact_number_1' => $this->input->post('contact_number_1'),
                'contact_number_2' => $this->input->post('contact_number_2')
            );
            $result= $this->address_model->save_address($address_data);
            $this->load->model('user_model');
            $user_data = $this->user_model->get_user_data($this->input->post('user_id'));
           $user_address = $this->address_model->get_user_address($this->input->post('user_id'));

            $data['user'] = $user_data;
            $data['address'] = $user_address;

            //print_r($data);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/nav_side_bar');
            $this->load->view('admin/edituser_view', $data);
            $this->load->view('admin/templates/footer_admin');
        //redirect('admin/adduser');
    }

    public function ajax_detail_update()
    {
        $this->load->model('user_model');
        $edited_address_data = array(
            'user_id' => $this->input->post('users_id'),
            'ad_title' => $this->input->post('ad_title'),
            'line_1' => $this->input->post('line_1'),
            'line_2' => $this->input->post('line_2'),
            'line_3' => $this->input->post('line_3'),
            'post' => $this->input->post('post'),
            'pin' => $this->input->post('pin'),
            'district' => $this->input->post('district'),
            'state' => $this->input->post('state'),
            'contact_number_1' => $this->input->post('contact_number_1'),
            'contact_number_2' => $this->input->post('contact_number_2')
        );
        
        $users_id = $this->input->post('users_id');
        $this->address_model->update_address(array('ad_id' => $this->input->post('address_id')), $edited_address_data);
        $user_data = $this->user_model->get_user_data( $this->input->post('users_id'));
        $user_address = $this->address_model->get_user_address( $this->input->post('users_id'));
        redirect('admin/Userlist/view/'.$users_id);
    }
}