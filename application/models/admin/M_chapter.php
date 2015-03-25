<?php

class M_chapter extends MY_Model {
    function __construct() {
        parent::__construct();

        $this->table_name = 'chapter';
        $this->primary_key = 'id_chapter';
        $this->table_order = 'id_chapter ASC';
        
    }
    public function get_Lesson () {
            
           
            
            return $this->db->select('*')->from('chapter')->join('lessons', 'fk_lessons_chapter = id_lesson')->get()->result();
        
            //SELECT * FROM lessons INNER JOIN courses ON FK_lesson_courses = id_lesson WHERE FK_student_courses = session
        }
    
}


?>