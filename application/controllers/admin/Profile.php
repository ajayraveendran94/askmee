<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Profile extends CI_Controller {

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
        $this->load->model('address_model');
        $data['profile'] = $this->user_model->get_user_data($_SESSION['user_id']);
        $data['address'] = $this->address_model->get_user_address($_SESSION['user_id']);
        print_r($data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/admin_profile_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }

}
?>