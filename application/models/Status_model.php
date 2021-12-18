<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Status_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_all_status(){
        $this->db->reset_query();
        $query = $this->db->get('as_order_status')->result_array();
        return $query;
    }

    function save_status($data){
        $result= $this->db->insert('as_order_status ',$data);
        $product_id = $this->db->insert_id();
        return $result;
    }

    function update_status($data, $id){
        $this->db->reset_query();
        $this->db->update('as_order_status', $data, array('ors_id' => $id));
    }
}
?>