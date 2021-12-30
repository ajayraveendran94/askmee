<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notification_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function get_all_notification(){
        $this->db->reset_query();
        $query = $this->db->get('as_notifications')->result_array();
        return $query;
    }

    function get_unread_notification(){
        $this->db->reset_query();
        $this->db->where('not_is_read', 0);
        $query = $this->db->get('as_notifications')->result_array();
        return $query;
    }

    function save_notification($data){
        $result= $this->db->insert('as_notifications ',$data);
        $com_id = $this->db->insert_id();
        return $result;
    }

    function update_notification($id){
        $this->db->reset_query();
        $this->db->update('as_notifications', array('com_id' => $id, 'not_is_read' => 1));
    }
}
?>