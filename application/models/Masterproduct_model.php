<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Masterproduct_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_category(){  
        $this->db->order_by('category_name', 'asc');
        $query= $this->db->query('SELECT c_id, category_name, category_url FROM as_categories');
        $result = $query->result();
        return $result;
    }  
    
    function get_product(){  
        $this->db->select('id, product_name, category_id, category_name');
        $this->db->join('as_categories', 'c_id = category_id');
        //$this->db->limit(4);
        //$this->db->join('brands', 'brand_id = prod_brand');
        $query = $this->db->get('as_product_master')->result_array();
        // foreach($query as $i=>$product) {
        //   $this->db->where('product_id', $product['p_id']);
        //   $images_query = $this->db->get('as_product_images')->result_array();
        //   $query[$i]['product_images'] = $images_query;
        // }
        return $query;
    } 
    
    function get_all_vendor_products(){
        $this->db->reset_query();
        $vendor_id = $this->session->userdata('user_id');
        $sql = "SELECT `master_product_id` FROM `as_products` WHERE `vendor_id` = $vendor_id";
        $query_data = $this->db->query($sql);
        $array = $query_data->result_array();
        $ids = array_column($array,"master_product_id");
        $this->db->reset_query();
        if(!empty($ids)){
            $this->db->where_not_in('as_product_master.id', $ids);
        }
        //$this->db->order_by('product_name', 'asc');
        $this->db->join('as_commission', 'com_id = commission_id');
        $this->db->select('id, product_name, category_id, commission_id, com_amount, com_percent');
        $query = $this->db->get('as_product_master')->result();
        return $query;
    }

    function save_product($data){  
        $result= $this->db->insert('as_product_master ',$data);
        $product_id = $this->db->insert_id();
        return $result;
    } 

    function last_insert(){
        $next = $this->db->query("SHOW TABLE STATUS LIKE 'as_product_master'");
        $next = $next->row(0);
        return $next->Auto_increment;
    }

    function update_product($data, $id)
    {
        $this->db->reset_query();
        $this->db->update('as_product_master', $data, array('id' => $id));
    }
}
?>