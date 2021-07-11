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

}