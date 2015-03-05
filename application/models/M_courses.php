<?php
    class M_courses extends MY_model {
        
        // Affichage des intutilé
        // Affichage des intitulé de l'utilisateru en ligne 
        
        
        public function __construct (){
            parent::__construct();
        }
            
        public function get_all (){
            return $this->db->select('*')->from('lessons')->join('category', 'fk_category_lesson = id_category', 'inner')->get()->result();
        }
        
        public function session(){
            return $this->db->select('*')->from('students')->get()->result();
        
            $this->db->where('nickname_student', $this->input->post('username'));
            $this->db->where('pss_student', $this->input->post('password'));
            
            $query = $this->db->get('students');
            if ($query->num_rows == 1) {
                return true;
            }
            
        }
        
        
    }