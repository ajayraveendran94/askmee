<?php  
//defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Userlist extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('admin/login');
        }
        $this->load->model('user_model');
    }

    public function index()  
    {  
        $user_data = $this->user_model->get_users();
        $data['users'] = $user_data;
        //print_r($data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/userlist_view', $data);
        $this->load->view('admin/templates/footer_admin');  
    }

    public function view($page)
    {
        $user_data = $this->user_model->get_user_data($page);
        $data['user'] = $user_data;
        //print_r($data);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/nav_side_bar');
        $this->load->view('admin/edituser_view', $data);
        $this->load->view('admin/templates/footer_admin');
    }

    public function edit_user()
    {
        $password = $this->input->post('password');
        if(!empty($password))
        {
            $user_data =  array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'user_type' => $this->input->post('user_type'),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'updated_date' => date('Y-m-d : h:m:s')
            );
        }
        else{
            $user_data =  array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'user_type' => $this->input->post('user_type'),
                'updated_date' => date('Y-m-d : h:m:s')
            );
        }
        $id = $this->input->post('user_id');
        $result = $this->user_model->update_user_data($user_data, $id);
        redirect('admin/userlist');
    }

    public function change_status()
    {
        $id = trim($this->input->post('id'));
        $result = $this->user_model->update_user_status($id, 0);
        redirect('admin/userlist');
    }

    public function change_status_active()
    {
        $id = trim($this->input->post('id'));
        $result = $this->user_model->update_user_status($id, 1);
        redirect('admin/userlist');
    }
}
?>