<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lessons extends CI_Model {

    protected $table = 'lessons';

    function get_all()
    {
        $query = $this->db->get('lessons');
        return $query->result();
    }


}

/* End of file lessons.php */
/* Location: ./application/models/lessons.php */