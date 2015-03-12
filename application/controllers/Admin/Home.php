<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	
    function __construct() {
	    
        parent::__construct();

        $this->load->model('admin/M_courses');
        $this->load->library('table');

        if ($this->session->userdata('admin') != 1) {
            // Test si la personne est loggée en tant qu'admin
            redirect('auth','refresh');
        }
    }
    
    public function Index() {
	    
	    $data['contenu'] = 'home/index';
		$this->load->view('admin/base', $data);
	    
    }
}