<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Review_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_all_reviews(){
        $this->db->reset_query();
        $this->db->select('ur_id, ur_review, ur_rating, ur_enabled, product_name, name');
        $this->db->join('as_order_detail', 'or_detail_id = ur_order_detail_id ');
        $this->db->join('as_orders', 'or_id = order_id ');
        $this->db->join('as_address', 'ad_id = address_id');
        $this->db->join('as_products', 'p_id = or_product_id ');
        $this->db->join('as_product_master', 'id = master_product_id ');
        $this->db->join('as_user', 'user_id = ad_user_id ');
        $query = $this->db->get('as_user_reviews')->result_array();
        return $query;
    }

    function disable_review($id){
        $this->db->reset_query();
        $this->db->update('as_user_reviews', array('ur_enabled' => 0));
    }

    function add_review($data){
        $result = $this->db->insert('as_user_reviews',$data);
        return $result;
    }

    function enable_review($id){
        $this->db->reset_query();
        $this->db->update('as_user_reviews', array('ur_enabled' => 1));
    }
}
?>