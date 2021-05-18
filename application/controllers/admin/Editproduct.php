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
        $pr_id = $this->input->post('product_id');
        $count = count($_FILES['files']['name']);
        $image_exist = false;
        for($i=0;$i<$count;$i++){
            if(!empty($_FILES['files']['name'][$i])){
                $image_exist = true;
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                if (!is_dir('./assets/images/newproducts/'.$pr_id)) {
                    mkdir('./assets/images/newproducts/'.$pr_id, 0777, true);
                }
                $config['upload_path'] = './assets/images/newproducts/'.$pr_id;  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')) {
                    $value['result'] = 'error';
                    $product_data = $this->productlist_model->get_products();
                    $data['products'] = $product_data;
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/nav_side_bar');
                    $this->load->view('admin/productlist_view', $data);
                    $this->load->view('admin/templates/footer_admin');
                }
            }
        }
        if($image_exist){
            $data = array('upload_data' => $this->upload->data());
        }
        $product_data = array(
            'product_name' => $this->input->post('product_name'),
            'category_id' => $this->input->post('product_category'),
            'description' => $this->input->post('product_description'),
            'offer_price' => $this->input->post('offer_price'),
            'actual_price' => $this->input->post('actual_price'),
            'quantity' => $this->input->post('quantity')
        );
        $image_data = $_FILES['files']['name'];
        $this->productlist_model->update_image_upload($pr_id, $image_data);
        //print_r($id);
        $update_data = $this->productlist_model->update_product($product_data, $pr_id);
        $product_data = $this->productlist_model->get_products();
        // //print_r($product_data[0]['p_id']);
        $data['products'] = $product_data;
        redirect('admin/productlist'); 
    }

    public function delete_image()
    {
        $this->load->model('productimage_model');
        $img = trim($this->input->post('img'));
        $id = trim($this->input->post('id'));
        $delete_data = $this->productimage_model->delete_image_data($id, $img);
        if (is_dir('./assets/images/newproducts/'.$id)) {
            unlink(realpath('assets/newproducts/'.$id.'/'.$img));
            //delete_files('./assets/images/newproducts/'.$id.'/'.$img, TRUE);
            echo 'Hello';
        }
        else{
            echo 'HI';
        }
    }

}