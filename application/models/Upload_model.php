
<?php
class Upload_model extends CI_Model{
 
    function save_upload($title,$image){
        $data = array(
                'category_name' => $title,
                'category_url' => $image
            );  
        $result= $this->db->insert('as_categories',$data);
        return $result;
    }     
}
?>