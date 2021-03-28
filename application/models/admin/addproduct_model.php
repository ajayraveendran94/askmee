<?php
class Addproduct_model extends CI_Model{
 
    function get_category(){  
        $this->db->order_by('category_name', 'asc');
        $query= $this->db->query('SELECT id, category_name, category_url FROM as_categories');
        $result = $query->result();
        return $result;
    }  
    
    function get_product(){  
        $this->db->reset_query();
        $this->db->select("*");
        $this->db->from("as_products");
        $this->db->limit(4);
        $this->db->order_by('id',"DESC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    } 

    function save_upload($data){  
        $result= $this->db->insert('as_products ',$data);
        return $result;
    } 
}
?>