<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Review extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('review_model');
    }

    public function index()  
    {  
        $review_data = $this->review_model->get_all_reviews();
        $data['review_data'] = $review_data;
        $data['headers'] = ['Review Id', 'Review','Rating(5)','User Name', 'Product Name', 'Review Status'];
        //print_r($data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/reviews_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }

}
?>