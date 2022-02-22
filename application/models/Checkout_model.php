<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Checkout_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_checkout($id){  
        $this->db->reset_query();
        $this->db->select('ch_id, p_id, product_name, offer_price, actual_price, name, vendor_id, quantity, ch_quantity, description');
        $this->db->join('as_products', 'p_id = ch_pr_id');
        $this->db->join('as_product_master', 'id = master_product_id');
        $this->db->join('as_categories', 'c_id = category_id');
        $this->db->join('as_user', 'user_id = vendor_id');
        $this->db->where('ch_user_id', $id);
        $query = $this->db->get('as_checkout')->result_array();
        foreach($query as $i=>$product) {
          $this->db->where('product_id', $product['p_id']);
          $images_query = $this->db->get('as_product_images')->result_array();
          $query[$i]['product_images'] = $images_query;
        }
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

    function add_to_checkout($data){  
        $this->db->reset_query();
        $max_product_id = $this->get_maximum_limit($data['ch_pr_id']);
        if($max_product_id < $data['ch_quantity']){
            return $max_product_id;
        }
        else{
            $this->db->delete('as_checkout', array('ch_user_id' => $data['ch_user_id']));
            $this->db->where(array('ch_pr_id'=> $data['ch_pr_id'], 'ch_user_id'=> $data['ch_user_id']));
            $query = $this->db->get('as_checkout');
            $this->db->reset_query();
            $result = $this->db->insert('as_checkout',$data);
            return $result;
        }
    } 
    
    function delete_checkout($id){
        $this->db->reset_query();
        $result = $this->db->delete('as_checkout', array('ch_user_id' => $id));
        return $result;
    }
}
?>