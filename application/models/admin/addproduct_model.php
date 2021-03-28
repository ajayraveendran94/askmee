<?php
class Addproduct_model extends CI_Model{
 
    function get_category(){  
        $this->db->order_by('category_name', 'asc');
        $query= $this->db->query('SELECT id, category_name FROM as_categories');
        $result = $query->result();
        return $result;
    }    

    function save_upload($data){  
        $result= $this->db->insert('as_products ',$data);
        return $result;
    } 
}
?>