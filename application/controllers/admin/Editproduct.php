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
        $category_name = $this->addproduct_model->get_category();
        $product_data = $this->productlist_model->get_product_data($page);
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

    public function edit_master_product(){
        $this->load->model('masterproduct_model');
        $id = $this->input->post('product_id');
        $product_data =  array(
                'product_name' => $this->input->post('product_name'),
                'category_id' => $this->input->post('product_category'),
                'commission_id' => $this->input->post('product_commission')
        ); 
        $update_data = $this->masterproduct_model->update_master_product($product_data, $id);
        //$category_data = $this->category_model->get_categories();
        header('Location: '.base_url('/admin/productlist/edit_master_product/'.$id));
    }

    public function disableprod()
    {
        $id = trim($this->input->post('id'));
        $delete_data = $this->productlist_model->disable_product($id);
    }

    public function enableprod()
    {
        $id = trim($this->input->post('id'));
        $delete_data = $this->productlist_model->enable_prod($id);
    }

    
    public function edit_product()
    {
        $this->load->model('masterproduct_model');
        $pr_id = $this->input->post('product_id');
        if(!empty($_FILES['files']['name'])){
            $count = count($_FILES['files']['name']);
        }
        else{
            $count = 0;
        }
        $image_exist = false;
        if($count != 0){
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
        }
        if($image_exist){
            $data = array('upload_data' => $this->upload->data());
        }
        $product_data = array(
            'description' => $this->input->post('product_description'),
            'offer_price' => $this->input->post('offer_price'),
            'vendor_price' => $this->input->post('vendor_price'),
            'actual_price' => $this->input->post('actual_price'),
            'quantity' => $this->input->post('quantity')
        );
        $m_id = $this->input->post('master_product_id');
        $master_product_data = array(
            'product_name' => $this->input->post('product_name'),
            'category_id' => $this->input->post('product_category')
        );
        if(!empty($_FILES['files']['name'])){
            $image_data = $_FILES['files']['name'];
            $this->productlist_model->update_image_upload($pr_id, $image_data);
        }
        //print_r($id);
        $update_data = $this->productlist_model->update_product($product_data, $pr_id);
        $current_user = $this->session->userdata();
        if ($current_user['user_type'] == 'A') {
            $update_master_data = $this->masterproduct_model->update_product($master_product_data, $m_id);
        }
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