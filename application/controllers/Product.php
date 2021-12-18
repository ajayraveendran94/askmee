<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Product extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('productlist_model');
    }

    public function view($page){
        //$product_data = $this->productlist_model->get_product_data($page);
        $product_data = $this->productlist_model->get_product_data($page);
        $category_products = $this->productlist_model->get_category_data($product_data[0]->c_id);
        $data['products'] = $category_products;
        $data['product_data'] = $product_data;
        $this->load->view('templates/header');
        $this->load->helper('navbar');
        echo navbar_helper_ex();
		$this->load->view('product_view', $data);
		$this->load->view('templates/footer');
    }
    public function view_product($page){
        //$this->load->model('addproduct_model');
        //$product_data = $this->productlist_model->get_product_data($page);
        $category_products = $this->productlist_model->get_category_product_data($page);
        foreach($category_products as $key=>$value){
            $category_products[$key]['category_name'] = $value['product_name'];
        }
        $data['products'] = $category_products;
        $this->load->view('templates/header');
        $this->load->view('product_list', $data);
        $this->load->view('templates/footer');
    }

    public function get_product(){
        $product_data = $this->productlist_model->get_product_and_id(trim($this->input->post('category_id')));
        print_r(json_encode($product_data));
    }
}