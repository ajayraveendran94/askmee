<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Login extends CI_Controller {  
      
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index()  
    {  
        $this->load->view('admin/templates/header');
        $this->load->view('admin/login_view');
        $this->load->view('admin/templates/footer');  
    }  
    public function process()  
    {  
        $user = $this->input->post('email');  
        $pass = $this->input->post('password');
        $data = array(
            'email' => $user,
            'password' => $pass
        );
        $user_data = $this->user_model->login($data);  
        if ($user_data)   
        {  
            if($user_data['user_status'] == 1){
                if($user_data['user_type'] == 'A' || $user_data['user_type'] == 'V'){
            //declaring session  
                    $this->session->set_userdata('user', $user_data['email']);  
                    $this->session->set_userdata('user_type', $user_data['user_type']);  
                    $this->session->set_userdata('user_id', $user_data['user_id']);  
                    //$this->session->set_userdata('user', $user);  
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/nav_side_bar');
                    $this->load->view('admin/dashboard_view');
                    $this->load->view('admin/templates/footer_admin');
                }
                else{
                    $data['error'] = 'error'; 
                    $this->load->view('admin/templates/header'); 
                    $this->load->view('admin/login_view', $data); 
                    $this->load->view('admin/templates/footer');
                }
            }
            else{  
                $data['error'] = 'error'; 
                $this->load->view('admin/templates/header'); 
                $this->load->view('admin/login_view', $data); 
                $this->load->view('admin/templates/footer'); 
            }  
        }  
        else{  
            $data['error'] = 'error'; 
            $this->load->view('admin/templates/header'); 
            $this->load->view('admin/login_view', $data); 
            $this->load->view('admin/templates/footer'); 
        }  
    }  
    public function logout()  
    {  
        //removing session  
        $this->session->unset_userdata('user');  
        redirect("admin/login");  
    }  
  
}  
?>  