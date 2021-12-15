<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commission_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_all_commission(){
        $this->db->reset_query();
        $query = $this->db->get('as_commission')->result_array();
        return $query;
    }

    function save_commission($data){
        $result= $this->db->insert('as_commission ',$data);
        $com_id = $this->db->insert_id();
        return $result;
    }

    function update_commission($data, $id){
        $this->db->reset_query();
        $this->db->update('as_commission', $data, array('com_id' => $id));
    }
}
?>