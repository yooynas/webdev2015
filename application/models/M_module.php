<?php
/*
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

*/

class M_module extends MY_Model {
    function __construct() {
        parent::__construct();

        $this->table_name = 'modules';
        $this->primary_key = 'id_module';
        $this->table_order = 'name_module DESC';
        
        
    }
    
}


?>