<?php
    class M_Students extends MY_model {
        
        // Affichage des intutilé
        // Affichage des intitulé de l'utilisateru en ligne 
        
        
        public function __construct (){
            parent::__construct();
            $this->table_name = 'students';
            $this->primary_key = 'id_student';
            $this->table_order = 'id_student DESC';
        }
        
        public function get_all_students() {

		return $this->db
				->select('*')
				->from($this->table_name)
				->order_by('firstname_student', 'asc')
				->get()
				->result();
	        
        }
        
    }