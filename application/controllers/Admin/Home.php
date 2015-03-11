<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        /*
        if ($this->session->userdata('access') != 'admin') {
            // Test si la personne est loggée en tant qu'admin
            redirect('auth','refresh');
        }
        */
    }
    public function Index() {
        $this->Courses_list();
    }
    public function Courses_list() {
        $this->load->model('M_courses');
        $data["cours"] = $this->M_courses->get_all();
        $data["contenu"] = 'admin/home/index';
        $this->load->view('templates/base', $data);
    }
}