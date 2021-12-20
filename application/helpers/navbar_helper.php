<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if(!function_exists('navbar_helper_ex')){
    function navbar_helper_ex(){
        $CI = get_instance();
        $CI->load->model('addproduct_model');
        $category_name = $CI->addproduct_model->get_category();
        $data['category'] = $category_name;
        $CI->load->view('templates/navbar',$data);
    }
    function notification_helper_ex(){
        $CI = get_instance();
        $CI->load->model('notification_model');
        $notification = $CI->notification_model->get_unread_notification();
        $data['notification'] = $notification;
        $CI->load->view('admin/templates/nav_side_bar',$data);
    }
}
?>