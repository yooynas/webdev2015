<?php

class M_choice extends MY_Model {
    function __construct() {
        parent::__construct();

        $this->table_name = 'choices';
        $this->primary_key = 'id_choice';
        $this->table_order = 'id_choice DESC';
        
    }
    
}


?>