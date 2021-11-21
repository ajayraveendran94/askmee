<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Address_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function save_address($data)
    {
        $result= $this->db->insert('as_address',$data);
        return $result;
    }
    public function get_user_address($data)
    {
    	
        $this->db->from('as_address');
        $this->db->order_by("ad_id", "desc");
    	$this->db->where('ad_user_id',$data);
        $query =$this->db->get();
   		return $query->result();
    }
    public function update_address($where, $data) {
        $this->db->update('as_address', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_by_address_id($ad_id) {
        $this->db->from('as_address');
        $this->db->where('ad_id ', $ad_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function address_detail_update($where, $data) {
        $this->db->update('as_address',$data,$where);
        return $this->db->affected_rows();
    }
    public function address_new($data){
        $this->db->insert('as_address',$data);
        return $this->db->insert_id();
    }
}