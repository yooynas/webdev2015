<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lessons extends CI_Model {

    function get_all()
    {
        $query = $this->db->get('lessons');
        return $query->result();
    }

    function get_categories()
    {
        $query = $this->db->get('category');
        return $query->result();
    }

    function get_lessons($id)
    {
        $query = $this->db->get_where('lessons', ['id_lesson' => $id]);
        return $query->result();
    }

}

/* End of file lessons.php */
/* Location: ./application/models/lessons.php */