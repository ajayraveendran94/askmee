<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Product extends CI_Controller {

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
        //$this->load->model('addproduct_model');
        //$product_data = $this->productlist_model->get_product_data($page);
        $product_data = $this->productlist_model->get_product_data($page);
        $data['product_data'] = $product_data;
        //print_r($data);
        $this->load->view('templates/header');
		$this->load->view('product_view', $data);
		$this->load->view('templates/footer');
    }
}