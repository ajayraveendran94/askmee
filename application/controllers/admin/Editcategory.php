<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Editcategory extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('category_model');
    }

    public function view($page){
        //$this->load->model('addproduct_model');
        //$product_data = $this->productlist_model->get_product_data($page);
        $category_name = $this->category_model->get_category_data($page);
        $data['category'] = $category_name;
        //print_r($data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/editcategory_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }
    public function delete()
    {
        $id = trim($this->input->post('id'));
        $category_product = $this->category_model->get_category_products($id);
        $delete_data = $this->category_model->delete_category($id, $category_product);
        foreach($category_product as $row){
          if (is_dir('./assets/images/newproducts/'.$row->id)) {
            delete_files('./assets/images/newproducts/'.$row->id, TRUE);
            rmdir('./assets/images/newproducts/'.$row->id);
            //echo 'Hello';
          }
        }
    }

    public function disablecat()
    {
        $id = trim($this->input->post('id'));
        $delete_data = $this->category_model->disablecat($id);
    }

    public function enablecat()
    {
        $id = trim($this->input->post('id'));
        $delete_data = $this->category_model->enablecat($id);
    }

    public function edit_category()
    {
        $id = $this->input->post('category_id');
        $config['upload_path'] = './assets/images/categories';  
        $config['allowed_types'] = 'jpg|jpeg|png|gif';  
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file'))  
        {  
            $category_data =  array(
                'category_name' => $this->input->post('category_name')
            ); 
        }  
        else  
        {  
            $image_data = array('upload_data' => $this->upload->data());
            $image= $image_data['upload_data']['file_name']; 
            $category_data =  array(
                'category_name' => $this->input->post('category_name'),
                'category_url' => $image
            ); 
        }
        $update_data = $this->category_model->update_category($category_data, $id);
        $category_data = $this->category_model->get_categories();
        $data['categories'] = $category_data;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/categorylist_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }

}