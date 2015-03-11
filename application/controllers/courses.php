<?php
    class Courses extends CI_Controller {
        
        public function __construct (){
            parent::__construct();
            $this->load->model('M_courses');
            if (!$this->session->userdata('id')) { redirect('auth/login', 'refresh'); }

        }
        
        public function index(){
            
            $idStudent = $this->session->userdata('id');
            /*
            $data['heading'] = 'Mes lecons';
            $data['rows'] = $this->M_courses->get_all();
            */
            $data['heading'] = 'Mes leçons';
            
            // a remplacer par la session
            //$data['student'] = $this->M_courses->get_students($idStudent);
            
            //$data['fk_lesson'] = $this->M_courses->get_fk_lesson_courses();
            
            $data['fk_lesson'] = $this->M_courses->get_fk_lesson_courses($idStudent);
            // clef etrangere de mes cours
            var_dump($data['fk_lesson']);
        
            $data['myLesson'] = $this->M_courses->get_by('id_lesson', $data['fk_lesson'], NULL, FALSE);
            

                //$data['myLesson'] = $this->M_courses->get_myLesson(intval($data['fk_lesson']));

            $this->load->view('templates/contenu/courses/mylesson.php', $data);
        }
    }