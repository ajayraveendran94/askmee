<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productimage_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    
    function delete_image_data($id, $img)
    {
        $this->db->reset_query();
        $this->db->delete('as_product_images', array('product_id' => $id, 'image_url' => $img));
    }
}

?>