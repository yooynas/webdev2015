<?php
    class M_courses extends MY_model {
        
        // Affichage des intutilé
        // Affichage des intitulé de l'utilisateru en ligne 
        
        
        public function __construct (){
            parent::__construct();
            $this->table_name = 'lessons';
            $this->primary_key = 'id_lessons';
            $this->table_order = 'id_lessons DESC';
        }
    }