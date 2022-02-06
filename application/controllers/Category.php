<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Category extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // if ( ! $this->session->userdata('user'))
        // { 
        //     redirect('admin/login');
        // }
        $this->load->model('productlist_model');
    }

    public function view($page){
        //$product_data = $this->productlist_model->get_product_data($page);
        $category_products = $this->productlist_model->get_category_data($page);
        $data['products'] = $category_products;
        //print_r($data);
        $this->load->helper('navbar');
        echo header_helper_ex();
        echo navbar_helper_ex();
		$this->load->view('product_list', $data);
		$this->load->view('templates/footer');
    }
}