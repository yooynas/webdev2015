<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lessons extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->table_name = 'lessons';
        $this->primary_key = 'id_lesson';
        $this->table_order = 'id_lesson ASC';
    }
    
    
    function get_info($id=null)
    {
        if($id==null)
            return $this->db
            ->select('*')
            ->from('lessons')
            ->join('teachers', 'lessons.fk_holder_lesson = teachers.id_teacher')
            ->join('category', 'lessons.fk_category_lesson = category.id_category')
            ->get()
            ->result();
        else
        {
            return $this->db
            ->select('*')
            ->from('lessons')
            ->join('teachers', 'lessons.fk_holder_lesson = teachers.id_teacher')
            ->join('category', 'lessons.fk_category_lesson = category.id_category')
            ->where('lessons.fk_category_lesson = '.$id)
            ->get()
            ->result();
        }
    }

}

/* End of file lessons.php */
/* Location: ./application/models/lessons.php */