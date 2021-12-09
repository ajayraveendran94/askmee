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
        $data['products'] = $product_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/productlist_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }

    public function master_product_list()
    {
        $this->load->model('masterproduct_model');
        $master_product_data = $this->masterproduct_model->get_product();
        $data['master_product_data'] = $master_product_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/master_product_list_view', $data);
        //print_r($data);
        $this->load->view('admin/templates/footer_admin'); 
    }

    public function edit_master_product($id)
    {
        $this->load->model('masterproduct_model');
        $this->load->model('category_model');
        $master_product = $this->masterproduct_model->get_master_data($id);
        $category = $this->category_model->get_categories();
        $commission = $this->masterproduct_model->get_commission();
        $data['master_product'] = $master_product;
        $data['category_name'] = $category;
        $data['commission'] = $commission;
        //print_r($data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/edit_master_product_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }
}
?>