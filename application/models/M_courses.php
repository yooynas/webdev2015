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
            
            $options = array(
                             "FK_student_courses" => $id
                             );
            
            return $this->db->select('*')->from('lessons')->join('courses', 'FK_lesson_courses = id_lesson')
            ->where($options)->get()->result();
        
            //SELECT * FROM lessons INNER JOIN courses ON FK_lesson_courses = id_lesson WHERE FK_student_courses = session
        }
        
        public function get_my_compelte ($id){
            
            $options = array (
                             "fk_student_follow" => $id
                             );
            return $this->db->select('*')->from('follows')->join('modules', 'FK_module_follow = id_module')
            ->where($options)->get()->result();
            
            //SELECT * FROM follows INNER JOIN modules ON FK_module_follow = id_module WHERE fk_student_follow = session
        }
        
        public function avgFinish ($id){
            
            $options = array (
                              "fk_student_follow" => $id,
                              "count_follow" => 1
                              );
            
            $this->db->from('modules');
            $nbmodule = $this->db->count_all_results();
            
            $this->db->from('follows')->where($options);
            $complete = $this->db->count_all_results();

            return ($complete / $nbmodule)*100;
        
        //SELECT COUNT(count_follow) FROM follows WHERE fk_student_follow =6 AND count_follow = 1;
        }
        
        
    }