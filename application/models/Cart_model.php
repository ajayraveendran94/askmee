<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_cart($id){  
        $this->db->reset_query();
        $this->db->select('car_id, p_id, product_name, offer_price, actual_price, name, vendor_id, quantity, car_quantity, description');
        $this->db->join('as_products', 'p_id = car_pr_id');
        $this->db->join('as_product_master', 'id = master_product_id');
        $this->db->join('as_categories', 'c_id = category_id');
        $this->db->join('as_user', 'user_id = vendor_id');
        $this->db->where('car_user_id', $id);
        $query = $this->db->get('as_user_cart')->result_array();
        return $query;
    }   
    
    public function get_maximum_limit($product_id){
        $this->db->reset_query();
        $this->db->reset_query();
        $this->db->select('*');
        $this->db->from('as_products');
        $this->db->where('as_products.p_id', $product_id);
        $query = $this->db->get();
        $result_value = $query->row_array();
        return $result_value['quantity'];
    }
    
    function add_to_cart($data){  
        $this->db->reset_query();
        $max_product_id = $this->get_maximum_limit($data['car_pr_id']);
        if($max_product_id < $data['car_quantity']){
            return $max_product_id;
        }
        else{
            $this->db->where(array('car_pr_id'=> $data['car_pr_id'], 'car_user_id'=> $data['car_user_id']));
            $query = $this->db->get('as_user_cart');
            if($query->num_rows() > 0){
              $this->db->where('car_id', $query->row()->car_id);
              $result =  $this->db->update('as_user_cart', $data);
            }
            else{
              $this->db->reset_query();
              $result = $this->db->insert('as_user_cart',$data);
            }
            return $result;
        }
    } 
    
}
?>