<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('addproduct_model');
    }

    public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('login_view');
		$this->load->view('templates/footer');
	}

    public function process()  
    {  
        $this->load->model('user_model');
        $user = $this->input->post('email');  
        $pass = $this->input->post('password'); 
        if(empty($user) || empty($pass)){
            $result['message'] = "Email or Password should not be empty"; 
            $this->load->view('templates/header');
		    $this->load->view('login_view',$result);
		    $this->load->view('templates/footer');
        }
        else {
            $data = array(
                'email' => $user,
                'password' => $pass,
                'user_type' => 'U' 
            ); 
            $user_data = $this->user_model->login($data);
            if($user_data){
                if($user_data['user_status'] == 1){
                    $this->session->set_userdata('user', $user_data);
                    $category_name = $this->addproduct_model->get_category();
		            $products = $this->addproduct_model->get_product();
                    $data['category'] = $category_name;
                    $data['products'] = $products;
		            //print_r($data);
		            $this->load->view('templates/header');
		            $this->load->view('welcome_message', $data);
		            $this->load->view('templates/footer');
                }
                else{
                    $result['message'] = "Your Account is blocked please contact admin";
                    $this->load->view('templates/header');
		            $this->load->view('login_view',$result);
		            $this->load->view('templates/footer');
                }
            }
            else{
                $result['message'] = "Incorrect Email or Password";
                $this->load->view('templates/header');
		        $this->load->view('login_view',$result);
		        $this->load->view('templates/footer'); 
            }
        } 
    }
    
    public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
}