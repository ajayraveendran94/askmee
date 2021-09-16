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
                    redirect(base_url(), 'refresh');
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

    public function registration($value = null)
    {
        print_r($value);
        $this->load->view('templates/header');
        $this->load->view('registration_view',$value);
        $this->load->view('templates/footer');  
    } 

    public function register()
    {
        $this->load->helper(array('form', 'url'));
        $value = null;
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_message('is_unique', 'Email already exists.');
        $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[as_user.email]');
        $this->form_validation->set_message('is_unique_mobile', 'Mobile already exists.');
        $this->form_validation->set_rules('mobile_num', 'Mobile', 'required|min_length[10]|is_unique_mobile[as_user.mobile_number]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url() . 'login/registration');
        }
        else {
                     $data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email_id'),
                        'mobile_number' => $this->input->post('mobile_num'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'user_status' => 1,
                        'user_type' => "U",
                        'created_date' => date('Y-m-d : h:m:s'),
                        'updated_date' => date('Y-m-d : h:m:s')
                    );
                    $result= $this->user_model->save_user($data);
                    if ($result) {
                        $this->session->set_flashdata('msg', 'Successfully Register, Login now!');
                        redirect(base_url() . 'login');
                    }
             }
    } 
    
    public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
}