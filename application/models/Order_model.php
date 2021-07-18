<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_products(){  
        $this->db->reset_query();
        $this->db->select('id, p_id, product_name, offer_price, product_status, name, vendor_id');
        $this->db->join('as_product_master', 'id = master_product_id');
        $this->db->join('as_categories', 'c_id = category_id');
        $this->db->join('as_user', 'user_id = vendor_id');
        //$this->db->join('brands', 'brand_id = prod_brand');
        //print_r($query);
        $this->db->where('product_status', 1);
        $query = $this->db->get('as_products')->result_array();
        return $query;
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
        $this->db->select('id, product_name, category_id');
        $query = $this->db->get('as_product_master')->result();
        return $query;
    }

    function save_order($data){  
        $result= $this->db->insert('as_orders ',$data);
        $product_id = $this->db->insert_id();
        return $result;
    } 
    
    function save_order_details($data){
        $result= $this->db->insert('as_order_detail ',$data);
    }

    function get_orders(){
        $this->db->reset_query();
        $this->db->select('or_id, total_amount, order_from_admin, order_date');
        $this->db->join('as_order_status', 'ors_id = status_id ');
        $this->db->join('as_address', 'ad_id = address_id');
    }
    // function last_insert(){
    //     $next = $this->db->query("SHOW TABLE STATUS LIKE 'as_product_master'");
    //     $next = $next->row(0);
    //     return $next->Auto_increment;
    // }

    // function update_product($data, $id)
    // {
    //     $this->db->reset_query();
    //     $this->db->update('as_product_master', $data, array('id' => $id));
    // }
    public function get_all_address()
    {
        $this->db->from('as_address');
        $this->db->join('as_user', 'user_id = ad_user_id');
        $query =$this->db->get();
        return $query->result();
    }
}
?>