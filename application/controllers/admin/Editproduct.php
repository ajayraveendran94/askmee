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
        $this->load->model('addproduct_model');
        $product_data = $this->productlist_model->get_product_data($page);
        $category_name = $this->addproduct_model->get_category();
        $data['category_name'] = $category_name;
        $data['product'] = $product_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/editproduct_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }
    public function delete()
    {
        $id = trim($this->input->post('id'));
        $delete_data = $this->productlist_model->delete_product($id);
        if (is_dir('./assets/images/newproducts/'.$id)) {
            delete_files('./assets/images/newproducts/'.$id, TRUE);
            rmdir('./assets/images/newproducts/'.$id);
            echo 'Hello';
        }
        else{
            echo 'HI';
        }
    }
    public function edit_product()
    {
        $product_data = array(
            'product_name' => $this->input->post('product_name'),
            'category_id' => $this->input->post('product_category'),
            'description' => $this->input->post('product_description'),
            'offer_price' => $this->input->post('offer_price'),
            'actual_price' => $this->input->post('actual_price'),
            'quantity' => $this->input->post('quantity')
        );
        $id = $this->input->post('product_id');
        $update_data = $this->productlist_model->update_product($product_data, $id);
        $product_data = $this->productlist_model->get_products();
        //print_r($product_data[0]['p_id']);
        $data['products'] = $product_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/productlist_view', $data);
        $this->load->view('admin/templates/footer_admin'); 
    }

}