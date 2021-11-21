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
        $this->load->model('addproduct_model');
        //$product_data = $this->productlist_model->get_product_data($page);
        $category_products = $this->productlist_model->get_category_data($page);
        $category_name = $this->addproduct_model->get_category();
        $data['products'] = $category_products;
        $data['category'] = $category_name;
        //print_r($data);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar',$data);
		$this->load->view('product_list', $data);
		$this->load->view('templates/footer');
    }
}