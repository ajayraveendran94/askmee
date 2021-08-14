<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Addproduct_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_category(){
        $this->db->order_by('category_name', 'asc');
        $query= $this->db->query('SELECT c_id, category_name, category_url FROM as_categories WHERE c_status=1');
        $result = $query->result();
        return $result;
    }  
    
    function get_product(){ 

       $this->db->where('product_status', 1);
       $this->db->select('id, p_id, product_name, actual_price, offer_price, description, quantity, product_status, category_id, category_name');
        $this->db->join('as_product_master', 'id = master_product_id');
        $this->db->join('as_categories', 'c_id = category_id');
        $this->db->limit(4);
        //$this->db->join('brands', 'brand_id = prod_brand');
        $query = $this->db->get('as_products')->result_array();
        foreach($query as $i=>$product) {
          $this->db->where('product_id', $product['p_id']);
          $images_query = $this->db->get('as_product_images')->result_array();
          $query[$i]['product_images'] = $images_query;
        }
        return $query;
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