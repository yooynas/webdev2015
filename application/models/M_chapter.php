<?php

class M_chapter extends MY_Model 
{
	function get_chapter()
	{
		$results = $this->db->get('chapter')->result();
		return $results;
	}
	function get_module()
	{
		$results = $this->db->get('modules')->result();
		return $results;
	}
	

//class M_chapter extends CI_Model 
//{
//	function get_chapter()
//	{
//		$results = $this->db->get('chapter')->result();
//		return $results;
//	}
//	function get_module()
//	{
//		$results = $this->db->get('modules')->result();
//		return $results;
//	}
//	
//}
?>
<?php
class M_chapter extends MY_Model {
    function __construct() {
        parent::__construct();

        $this->table_name = 'chapter';
        $this->primary_key = 'id_chapter';
        $this->table_order = 'id_chapter DESC';
    }
}

