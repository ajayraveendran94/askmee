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

    public function commission()
    {
        $this->load->model('commission_model');
        $order_status = $this->commission_model->get_all_commission();
        //print_r($product_data[0]['p_id']);
        $data['commission'] = $order_status;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/commission_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }
    public function get_all_commission(){
        $this->load->model('commission_model');
        $result = $this->commission_model->get_all_commission();
        echo json_encode($result);
    }
    public function create_new_commission(){
        $this->load->model('commission_model');
        $com_data = array(
                        'com_name' => trim($this->input->post('com_name')),
                        'com_amount' => trim($this->input->post('com_amount')),
                        'com_percent' => trim($this->input->post('com_percent'))
                    );
        $result = $this->commission_model->save_commission($com_data);
        echo json_encode($result);
    }

    public function update_commission()
    {
        $this->load->model('commission_model');
        $com_data = array(
                        'com_name' => trim($this->input->post('com_name')),
                        'com_amount' => trim($this->input->post('com_amount')),
                        'com_percent' => trim($this->input->post('com_percent'))
                    );
        $com_id = trim($this->input->post('com_id'));
        $result = $this->commission_model->update_commission($com_data, $com_id);
        echo json_encode($result);

    }
}
?>