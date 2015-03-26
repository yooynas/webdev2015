<?php
	class M_search extends MY_Model {
		function __construct() {
			parent::__construct();
	
			$this->table_name = 'lessons';
			$this->primary_key = 'id_lesson';
			$this->table_order = 'id_lesson ASC';
        
    	}
		function get_posts_by_search($words)
		{
			$this->db->like('LOWER(name_lesson)',strtolower($words));
			$this->db->or_like('LOWER(description_lesson)',strtolower($words));
			
			
			$this->db->order_by('begin_lesson','desc');
			$query = $this->db->get($this->table_name);
			return $query->result();
		}
	}
?>