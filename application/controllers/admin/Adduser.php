<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Adduser extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('user_model');
    }

    public function index()  
    {  
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/add_user_view');
        $this->load->view('admin/templates/footer_admin');  
    }

    public function new_user()
    {
        $check_user = $this->user_model->check_user($this->input->post('user_email'), $this->input->post('user_type'));
        if($check_user == false)
        {
            $data = array(
                'name' => $this->input->post('user_name'),
                'email' => $this->input->post('user_email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'user_status' => 1,
                'user_type' => $this->input->post('user_type'),
                'created_date' => date('Y-m-d : h:m:s'),
                'updated_date' => date('Y-m-d : h:m:s')
            );
            $result= $this->user_model->save_user($data);
            $value['result'] = 'user_success';
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/nav_side_bar');
            $this->load->view('admin/add_user_view', $value);
            $this->load->view('admin/templates/footer_admin');
        }
        else{
            $value['result'] = 'email_exist';
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/nav_side_bar');
            $this->load->view('admin/add_user_view', $value);
            $this->load->view('admin/templates/footer_admin');
        }
        //redirect('admin/adduser');
    }
}