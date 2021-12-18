<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Addproduct extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('addproduct_model');
    }

    public function index()  
    {  
        if($this->session->userdata('user_type') == 'A'){
            $category_name = $this->addproduct_model->get_category();
            $commission_name = $this->addproduct_model->get_commission();
            $data['category_name'] = $category_name;
            $data['commission_name'] = $commission_name;
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/nav_side_bar');
            $this->load->view('admin/add_product_view', $data);
            $this->load->view('admin/templates/footer_admin'); 
        }
        else{
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/nav_side_bar');
            $this->load->view('admin/templates/footer_admin'); 
        } 
    }

    public function vendor_product()
    {
        $this->load->model('masterproduct_model');
        $category_name = $this->addproduct_model->get_category();
        $product_list = $this->masterproduct_model->get_all_vendor_products();
        $data['category_name'] = $category_name;
        $data['product_list'] = $product_list;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/vendor_add_product_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }

    public function new_product()
    {
        $pr_id = $this->addproduct_model->last_insert();
        $count = count($_FILES['files']['name']);
        for($i=0;$i<$count;$i++){
            if(!empty($_FILES['files']['name'][$i])){
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
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/nav_side_bar');
                    $this->load->view('admin/add_product_view', $value);
                    $this->load->view('admin/templates/footer_admin');
                }
            }
        }
        $category_name = $this->addproduct_model->get_category();
        $value['category_name'] = $category_name; 
            $data = array('upload_data' => $this->upload->data());
 
            $product_data = array(
                'master_product_id' => $this->input->post('product_name'),
                'description' => $this->input->post('product_description'),
                'vendor_id' => $this->session->userdata('user_id'),
                'offer_price' => $this->input->post('offer_price'),
                'actual_price' => $this->input->post('actual_price'),
                'quantity' => $this->input->post('quantity'),
                'vendor_price' => $this->input->post('vendor_price')

            );
            $image_data = $_FILES['files']['name'];
            $result= $this->addproduct_model->save_upload($product_data, $image_data);
            if($result == 1){
                $value['result'] = 'product success';
            }
            else{
                $value['result'] = 'error';
            }
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/nav_side_bar');
            $this->load->view('admin/add_product_view', $value);
            $this->load->view('admin/templates/footer_admin');   
    }

    public function new_product_master()
    {
        $this->load->model('masterproduct_model');
        $pr_id = $this->masterproduct_model->last_insert();
        $category_name = $this->masterproduct_model->get_category();
        $commission_name = $this->addproduct_model->get_commission();
        $value['category_name'] = $category_name;
        $value['commission_name'] = $commission_name;
        $product_data = array(
            'product_name' => $this->input->post('product_name'),
            'category_id' => $this->input->post('product_category'),
            'commission_id' => $this->input->post('product_commission')
        );
        $result= $this->masterproduct_model->save_product($product_data);
        if($result == 1){
            $value['result'] = 'product success';
        }
        else{
            $value['result'] = 'error';
        }
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/add_product_view', $value);
        $this->load->view('admin/templates/footer_admin');
    }
}
?>