<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Categorylist extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('category_model');
    }

    public function index()  
    {  
        $category_data = $this->category_model->get_categories();
        $data['categories'] = $category_data;
        //print_r($data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/categorylist_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }
}
?>