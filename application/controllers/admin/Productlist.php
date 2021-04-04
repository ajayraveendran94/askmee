<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Productlist extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('productlist_model');
    }

    public function index()  
    {  
        $product_data = $this->productlist_model->get_products();
        //print_r($product_data);
        $data['products'] = $product_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/productlist_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }
}
?>