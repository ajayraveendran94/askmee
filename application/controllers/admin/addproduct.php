<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
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
        $category_name = $this->addproduct_model->get_category();
        $data['category_name'] = $category_name;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/add_product_view', $data);
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
                'product_name' => $this->input->post('product_name'),
                'category_id' => $this->input->post('product_category'),
                'description' => $this->input->post('product_description'),
                'offer_price' => $this->input->post('offer_price'),
                'actual_price' => $this->input->post('actual_price'),
                'quantity' => $this->input->post('quantity')

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
}
?>