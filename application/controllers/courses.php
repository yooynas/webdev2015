<?php
    class Courses extends CI_Controller {
        
        public function __construct (){
            parent::__construct();
            $this->load->model('M_courses');
            if (!$this->session->userdata('id')) { redirect('auth/login', 'refresh'); }

        }
        
        public function index(){
            /*
            $data['heading'] = 'Mes lecons';
            $data['rows'] = $this->M_courses->get_all();
            */
            $data['heading'] = 'Mes leçons';
            $data['rows'] = $this->M_courses->get_all();
            
            $data['fk_lesson'] = $this->M_courses->get_fk_lesson_courses();
            $data['fk_student'] = $this->M_courses->get_fk_student_courses();
            /*
            $query = $this->M_courses->session();
            
            if ($query){
                $sess = array (
                            'pseudo' => $this->input->post('username'),
                            'is_logged_in' => TRUE
                           );

                $this->session->set_userdata($sess);

            }else {
                
            }
*/
            $this->load->view('templates/contenu/courses/mylesson.php', $data);
            
            
        }
    }