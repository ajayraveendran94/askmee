<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Upload_image extends CI_Controller {
 
 
    /**
    * Constructor of Controller
    *
    * @return Response
   */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/upload_model');
        $this->load->model('admin/addproduct_model');
    }
 
    function image_upload()  
 {  
    $this->load->view('image_upload');  
 }  
 
    function ajax_upload()  
    {  
        //print_r($_POST['file']);
      //if(isset($_FILES["file"]["name"]))  
      //{  
        $config['upload_path'] = './assets/images';  
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
 
            $title= $this->input->post('title');
            $image= $data['upload_data']['file_name']; 
 
            $result= $this->upload_model->save_upload($title,$image);
            if($result == 1){
                $value['result'] = 'success';
            }
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/nav_side_bar');
            $this->load->view('admin/add_product_view', $value);
            $this->load->view('admin/templates/footer_admin'); 
        }  
      //}  
    }  
}
 
?>