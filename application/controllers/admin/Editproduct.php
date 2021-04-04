<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Editproduct extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('productlist_model');
    }

    public function view($page){
        $product_data = $this->productlist_model->get_product_data($page);
        $data['product'] = $product_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/editproduct_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }

}