<?php
    class M_courses extends MY_model {
        
        // Affichage des intutilé
        // Affichage des intitulé de l'utilisateru en ligne 
        
        
        public function __construct (){
            parent::__construct();
            $this->table_name = 'students';
            $this->primary_key = 'id_student';
            $this->table_order = 'id_student DESC';
        }
        
        public function get_students ($id){
            return $this->db->select('*')->from('students')->where('id_student', $id)->get()->result();
        }
        
        public function get_myLesson ($id) {
            return $this->db->select('*')->from('lessons')->join('courses', 'FK_lesson_courses = id_lesson', 'inner')
            ->where('FK_student_courses ='.$id)->get()->result();
        
            //SELECT * FROM lessons INNER JOIN courses ON FK_lesson_courses = id_lesson WHERE FK_student_courses = session
        }
        
        
    }