<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if(!function_exists('navbar_helper_ex')){
    function navbar_helper_ex(){
        $CI = get_instance();
        $CI->load->model('addproduct_model');
        $category_name = $CI->addproduct_model->get_category();
        $data['category'] = $category_name;
        $CI->load->view('templates/navbar',$data);
    }
}
?>