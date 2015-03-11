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
    }