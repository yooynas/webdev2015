<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students extends CI_Controller
{
	
	public function __construct() {
		
		//	Obligatoire
		parent::__construct();
		$this->load->library('table');
		// J'inclus mon modèle, mes librairies, mes helpers, fichiers de langues etc...
		$this->load->database();
		$this->load->model('admin/M_Students', 'StudentsManager');
		$this->load->library(array('session','encrypt','form_validation'));
		$this->load->helper(array('url','form'));

        if ($this->session->userdata('admin') != 1) {
            // Test si la personne est loggée en tant qu'admin
            redirect('auth','refresh');
        }
		
	}

	public function index() {
		
		$data['students'] = $this->StudentsManager->get_all_students();
	    
	    $data['contenu'] = 'students/index';
		$this->load->view('admin/base', $data);
		
	}
		
}