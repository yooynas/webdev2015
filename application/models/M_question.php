<?php

class M_question extends MY_Model {
    function __construct() {
        parent::__construct();

        $this->table_name = 'questions';
        $this->primary_key = 'id_question';
        $this->table_order = 'id_question random';
        
    }
    
}


?>