<?php
    class Courses extends CI_Controller {
        
        public function __construct (){
            parent::__construct();
            $this->load->model('M_courses');

        }
        
        public function index(){
            $data['heading'] = 'Mes lecons';
            $data['rows'] = $this->M_courses->get_all();
            
            $query = $this->M_courses->session();
            
            if ($query){
                $sess = array (
                            'pseudo' => $this->input->post('username'),
                            'is_logged_in' => TRUE
                           );

                $this->session->set_userdata($sess);

            }else {
                
            }

            $this->load->view('templates/contenu/courses/mylesson.php', $data);
            
            
        }
    }