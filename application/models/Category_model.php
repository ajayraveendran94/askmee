<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    
    function get_categories(){  
        $this->db->reset_query();
        $this->db->select('*');
        $query = $this->db->get('as_categories')->result_array();
        return $query;
    }

    function get_category_data($id)
    {
        $this->db->reset_query();
        $this->db->select('*');
        $this->db->from('as_categories');
        $this->db->where('as_categories.c_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    // function get_product_data($id)
    // {
    //     $this->db->reset_query();
    //     $this->db->select('*');
    //     $this->db->from('as_products');
    //     $this->db->where('as_products.p_id', $id);
    //     $this->db->join('as_categories', 'as_categories.c_id = as_products.category_id', 'left');
    //     $query = $this->db->get();
    //     $result = $query->result();
    //     return $result;
    // }

    // function delete_product($id)
    // {
    //     $this->db->reset_query();
    //     $this->db->delete('as_product_images', array('product_id' => $id)); 
    //     $this->db->delete('as_products', array('p_id' => $id));
    //     // $this->db->select('*');
    //     // $this->db->where('as_product_images.product_id', $id);
    //     // $this->db->where('as_products.p_id', $id);
    //     // $query = $this->db->delete('as_product_images');
    //     // $query = $this->db->delete('as_products');
    //     // $result = $query->result();
    //     // return $result; 
    // }

    // function update_product($data, $id)
    // {
    //     $this->db->reset_query();
    //     $this->db->update('as_products', $data, array('p_id' => $id));
    // }
}

?>