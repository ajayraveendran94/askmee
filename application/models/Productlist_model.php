<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productlist_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    
    function get_products(){  
        // $this->db->reset_query();
        // $this->db->select('a.*,b.*,c.*');
        // $this->db->from('as_products a');
        // $this->db->join('as_product_images c', 'a.id = c.product_id', 'left');
        // $this->db->join('as_categories b', 'b.id = a.category_id', 'left');
        
        // $query = $this->db->get();
        // $result = $query->result();
        // return $result;
        $this->db->reset_query();
        $this->db->select('p_id, product_name, category_id, actual_price, offer_price, description, quantity, product_status, category_name');
        $this->db->join('as_categories', 'c_id = category_id');
        //$this->db->join('brands', 'brand_id = prod_brand');
        $query = $this->db->get('as_products')->result_array();
        foreach($query as $i=>$product) {
          $this->db->where('product_id', $product['p_id']);
          $images_query = $this->db->get('as_product_images')->result_array();
          $query[$i]['product_images'] = $images_query;
        }
        return $query;
    }

    function get_product_data($id)
    {
        $this->db->reset_query();
        $this->db->select('*');
        $this->db->from('as_products');
        $this->db->where('as_products.p_id', $id);
        $this->db->join('as_categories', 'as_categories.c_id = as_products.category_id', 'left');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function delete_product($id)
    {
        $this->db->reset_query();
        $this->db->delete('as_product_images', array('product_id' => $id)); 
        $this->db->delete('as_products', array('p_id' => $id));
        // $this->db->select('*');
        // $this->db->where('as_product_images.product_id', $id);
        // $this->db->where('as_products.p_id', $id);
        // $query = $this->db->delete('as_product_images');
        // $query = $this->db->delete('as_products');
        // $result = $query->result();
        // return $result; 
    }

    function update_product($data, $id)
    {
        $this->db->reset_query();
        $this->db->update('as_products', $data, array('p_id' => $id));
    }
}

?>