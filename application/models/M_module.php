<?php

class M_module extends MY_Model {
    function __construct() {
        parent::__construct();

        $this->table_name = 'modules';
        $this->primary_key = 'id_module';
        $this->table_order = 'name_module DESC';
        
    }
    
}


?>