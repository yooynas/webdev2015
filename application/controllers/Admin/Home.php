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
        $this->load->model('admin/M_courses');
    }
    public function Index() {
        $data["cours"] = $this->M_courses->get();
        
        $data["contenu"] = 'admin/home/index';
        $this->load->view('templates/base', $data);
    }
}