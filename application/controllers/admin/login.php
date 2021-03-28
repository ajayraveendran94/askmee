<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Login extends CI_Controller {  
      
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
        if ($user=='admin@askmee.in' && $pass=='admin1234')   
        {  
            //declaring session  
            $this->session->set_userdata('user', $user);  
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
    public function logout()  
    {  
        //removing session  
        $this->session->unset_userdata('user');  
        redirect("Login");  
    }  
  
}  
?>  