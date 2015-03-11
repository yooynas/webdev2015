<?php
    class Courses extends CI_Controller {
        
        public function __construct (){
            parent::__construct();
            $this->load->model('M_courses');
            if (!$this->session->userdata('id')) { redirect('auth/login', 'refresh'); }

        }
        
        public function index(){
            
            $idStudent = $this->session->userdata('id');
            
            $data['heading'] = 'Mes leçons';
            $data['user'] = $this->M_courses->get_students($idStudent);
            $data['contenu'] = 'courses/mylesson';
            $data['myLesson'] = $this->M_courses->get_myLesson($idStudent);
            $data['compelte'] = $this->M_courses->get_my_compelte($idStudent);
            
            $this->load->view('templates/base.php', $data);
        }
    }