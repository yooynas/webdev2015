<?php
    class M_courses extends MY_model {
        
        // Affichage des intutilé
        // Affichage des intitulé de l'utilisateru en ligne 
        
        
        public function __construct (){
            parent::__construct();
            $this->table_name = 'lessons';
            $this->primary_key = 'id_courses';
            $this->table_order = 'id_courses DESC';
        }
            
        public function get_all (){
            return $this->db->select('*')->from('lessons')->join('category', 'fk_category_lesson = id_category', 'inner')->get()->result();
        }
        
        public function get_fk_lesson_courses ($id){
            return $this->db->select('fk_lesson_courses')->from('courses')->where('fk_student_courses', $id)->get()->result();
        }
        
        public function get_students ($id){
            return $this->db->select('*')->from('students')->where('id_student', $id)->get()->result();
        }

        
        public function get_myLesson ($idLesson) {
            
            //return $this->db->select('*')->from('lessons')->where('id_lesson', $idLesson)->get()->result();
        }
        
        
    }