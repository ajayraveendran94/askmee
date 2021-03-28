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
        $this->load->model('admin/addproduct_model');
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
        $config['upload_path'] = './assets/images/products';  
        $config['allowed_types'] = 'jpg|jpeg|png|gif';  
        $this->load->library('upload', $config);
        $category_name = $this->addproduct_model->get_category();
        $value['category_name'] = $category_name;
        if(!$this->upload->do_upload('file'))  
        {  
            $value['result'] = 'error';
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/nav_side_bar');
            $this->load->view('admin/add_product_view', $value);
            $this->load->view('admin/templates/footer_admin');  
        }  
        else  
        {  
            $data = array('upload_data' => $this->upload->data());
 
            $product_data = array(
                'product_name' => $this->input->post('product_name'),
                'category_id' => $this->input->post('product_category'),
                'description' => $this->input->post('product_description'),
                'offer_price' => $this->input->post('offer_price'),
                'actual_price' => $this->input->post('actual_price'),
                'quantity' => $this->input->post('quantity'),
                'image_url' => $data['upload_data']['file_name']

            );
            $result= $this->addproduct_model->save_upload($product_data);
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
}
?>