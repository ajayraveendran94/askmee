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
        return $product_id;
    } 
    
    function save_order_details($data){
        $result= $this->db->insert("as_order_detail", $data);
        $quantity = $data['or_quantity'];
        $this->db->set("quantity", "quantity - $quantity", false);
        $this->db->where("p_id" , $data['or_product_id']);
        $this->db->update("as_products");
    }

    function get_orders(){
        $this->db->reset_query();
        $this->db->select('or_id, total_amount, order_from_admin, order_date, name, status_name, ors_id');
        $this->db->join('as_order_detail', 'or_id = order_id ');
        $this->db->join('as_order_status', 'ors_id = status_id ');
        $this->db->join('as_address', 'ad_id = address_id');
        $this->db->join('as_user', 'user_id = ad_user_id');
        $query = $this->db->get('as_orders')->result_array();
        return $query;
    }
    function get_all_status(){
        $this->db->reset_query();
        $query = $this->db->get('as_order_status')->result_array();
        return $query;
    }

    function get_user_orders($id){
        $this->db->reset_query();
        $this->db->select('order_id, or_detail_id, total_amount, order_from_admin, order_date, name, status_name, delivery_date, status_id, or_quantity, ors_id, p_id, or_product_id, master_product_id, product_name, total_price');
        $this->db->join('as_orders', 'or_id = order_id ');
        $this->db->join('as_order_status', 'ors_id = status_id ');
        $this->db->join('as_address', 'ad_id = address_id');
        $this->db->join('as_products', 'p_id = or_product_id ');
        $this->db->join('as_product_master', 'id = master_product_id ');
        //$this->db->join('as_product_images', 'or_product_id = or_product_id');
        $this->db->join('as_user', 'user_id = ad_user_id');
        $this->db->where('user_id', $id);
        $this->db->order_by('order_id', 'desc');
        $query = $this->db->get('as_order_detail')->result_array();
        foreach($query as $i=>$product) {
          $this->db->where('product_id', $product['p_id']);
          $images_query = $this->db->get('as_product_images')->result_array();
          $query[$i]['product_images'] = $images_query;
          $this->db->where('ur_order_detail_id', $product['or_detail_id']);
          $review_details = $this->db->get('as_user_reviews')->result_array();
          $query[$i]['review_data'] = $review_details;
        }
        return $query;
    }

    function get_order_details($data){
        $start_date = $data['from_date'];
        $end_date = $data['to_date'];
        $this->db->reset_query();
        $this->db->where("order_date BETWEEN '{$start_date}' AND '{$end_date}'");
        if($data['vendor_id'] != 0){
          $this->db->where('vendor_id', $data['vendor_id']);
        }
        $this->db->where('status_id', $data['status']);
        $this->db->select('order_id, or_detail_id, user_id, total_amount, order_from_admin, order_date, name, status_name, or_quantity, ors_id, p_id, or_product_id, master_product_id, product_name, total_price, line_1, line_2, line_3, post, pin, district, state, contact_number_1');
        $this->db->join('as_orders', 'or_id = order_id ');
        $this->db->join('as_order_status', 'ors_id = status_id ');
        $this->db->join('as_address', 'ad_id = address_id');
        $this->db->join('as_products', 'p_id = or_product_id ');
        $this->db->join('as_product_master', 'id = master_product_id ');
        //$this->db->join('as_product_images', 'or_product_id = or_product_id');
        $this->db->join('as_user', 'user_id = ad_user_id');
        //$this->db->where('user_id', $id);
        $query = $this->db->get('as_order_detail')->result_array();
        return $query;
    }

    function get_vendor_details($data){
        $start_date = $data['from_date'];
        $end_date = $data['to_date'];
        $this->db->reset_query();
        $this->db->where("order_date BETWEEN '{$start_date}' AND '{$end_date}'");
        if($data['vendor_id'] != 0){
          $this->db->where('vendor_id', $data['vendor_id']);
        }
        $this->db->where('status_id', $data['status']);
        $this->db->select('order_id, or_detail_id, user_id, total_amount, order_from_admin, order_date, name, status_name, or_quantity, ors_id, p_id, or_product_id, master_product_id, product_name, total_price');
        $this->db->join('as_orders', 'or_id = order_id ');
        $this->db->join('as_order_status', 'ors_id = status_id ');
        $this->db->join('as_products', 'p_id = or_product_id ');
        $this->db->join('as_product_master', 'id = master_product_id ');
        //$this->db->join('as_product_images', 'or_product_id = or_product_id');
        $this->db->join('as_user', 'user_id = vendor_id');
        //$this->db->where('user_id', $id);
        $query = $this->db->get('as_order_detail')->result_array();
        return $query;
    }
    

    public function get_order_data($id){
        $this->db->reset_query();
        $this->db->select('order_id, total_amount, order_from_admin, order_date, name, status_name, or_quantity, ors_id, p_id, or_product_id, master_product_id, product_name, total_price, line_1, line_2, line_3, post, pin, user_id, delivery_date, or_detail_id, or_id');
        $this->db->join('as_orders', 'or_id = order_id ');
        $this->db->join('as_order_status', 'ors_id = status_id ');
        $this->db->join('as_address', 'ad_id = address_id');
        $this->db->join('as_products', 'p_id = or_product_id ');
        $this->db->join('as_product_master', 'id = master_product_id ');
        //$this->db->join('as_product_images', 'or_product_id = or_product_id');
        $this->db->join('as_user', 'user_id = ad_user_id');
        $this->db->where('or_id', $id);
        $query = $this->db->get('as_order_detail')->result_array();
        // foreach($query as $i=>$product) {
        //   $this->db->where('product_id', $product['p_id']);
        //   $images_query = $this->db->get('as_product_images')->result_array();
        //   $query[$i]['product_images'] = $images_query;
        // }
        return $query;
    }

    public function get_all_address()
    {
        $this->db->from('as_address');
        $this->db->join('as_user', 'user_id = ad_user_id');
        $query =$this->db->get();
        return $query->result();
    }

    function update_order($data, $id)
    {
        $this->db->reset_query();
        $this->db->update('as_order_detail', $data, array('or_detail_id' => $id));
    }
}
?>