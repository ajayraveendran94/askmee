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
    
    function update_category($data, $id)
    {
        $this->db->reset_query();
        $this->db->update('as_categories', $data, array('c_id' => $id));
    }
    function delete_category($id, $category_product)
    {
        $this->db->reset_query();
        foreach($category_product as $row){
            $this->db->delete('as_product_images', array('product_id' => $row->p_id)); 
            $this->db->delete('as_products', array('p_id' => $row->p_id));
        }
        $this->db->delete('as_categories', array('c_id' => $id));
    }

    function get_category_products($id)
    {
        $this->db->reset_query();
        $this->db->select('*');
        $this->db->from('as_product_master');
        $this->db->where('as_product_master.category_id', $id);
        $master_product_data = $this->db->get();
        $master_products = $master_product_data->result_array();
        $pro_id = array();  
        foreach ($master_products as $row)
        {    
            $pro_id[] = $row['id'];           
        }
        $this->db->reset_query();
        $this->db->select('*');
        $this->db->from('as_products');
        if(!empty($pro_id)){
            $this->db->where_in('as_products.master_product_id', $pro_id);
            $query = $this->db->get();
            $result = $query->result();
        }
        else{
            $result = null;
        }
        return $result;
    }
}

?>