<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Dashboard extends CI_Controller {

    public function index()  
    {  
        //print_r($this->session->userdata('user'));
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/dashboard_view');
        $this->load->view('admin/templates/footer_admin');  
    }
    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
    }
}
?>