<?php
    class M_module extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        public function getmodules() {
        
            $results = $this->db->get('modules')->result();

            foreach ($results as $result)
            {
             $result->id_module;
             $result->name_module;
             $result->fk_chapter_module;
             $result->num_module;
             $result->type_module;    
            }
            return $results;
        }
        
    }


?>