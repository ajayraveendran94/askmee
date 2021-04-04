<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addproduct_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
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

    function save_upload($data, $image_data){  
        $result= $this->db->insert('as_products ',$data);
        $product_id = $this->db->insert_id();
        foreach($image_data as $image){
            $product_data = array(
                'product_id' => $product_id,
                'image_url' => $image
            );
         $this->db->insert('as_product_images',$product_data); 
        }
        return $result;
    } 
    function last_insert(){
        $next = $this->db->query("SHOW TABLE STATUS LIKE 'as_products'");
        $next = $next->row(0);
        return $next->Auto_increment;
        // $this->db->reset_query();
        // $query = $this->db->query('SELECT id FROM as_products ORDER BY id DESC LIMIT 1');
        //return $cur_auto_id;
    }
}
?>