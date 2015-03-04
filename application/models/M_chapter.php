<?php
class M_chapter extends CI_Model 
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
	
}
?>