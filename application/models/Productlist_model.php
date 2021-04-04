<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productlist_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    
    function get_products(){  
        $this->db->reset_query();
        $this->db->select('a.*,b.*');
        $this->db->from('as_products a');
        $this->db->join('as_categories b', 'b.id = a.category_id', 'left');
        // $this->db->select("*");
        // $this->db->from("as_products");
        // $this->db->order_by('id',"DESC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function get_product_data($id)
    {
        $this->db->reset_query();
        $this->db->select('*');
        $this->db->from('as_products');
        $this->db->where('as_products.id', $id);
        $this->db->join('as_categories', 'as_categories.id = as_products.category_id', 'left');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}

?>