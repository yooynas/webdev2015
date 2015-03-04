<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_category extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->table_name = 'category';
        $this->primary_key = 'id_category';
        $this->table_order = 'id_category DESC';
    }
	

}

/* End of file M_category.php */
/* Location: ./application/models/M_category.php */