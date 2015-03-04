<?php
class M_chapter extends MY_Model {
    function __construct() {
        parent::__construct();

        $this->table_name = 'chapter';
        $this->primary_key = 'id_chapter';
        $this->table_order = 'id_chapter DESC';
    }
}
?>