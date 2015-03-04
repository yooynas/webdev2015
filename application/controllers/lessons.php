<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessons extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->database();
		$this->load->model('M_lessons');
	}

	public function index()
	{
		$data['contenu'] = 'lessons/index';
		//$data['lessons'] = $this->M_lessons->get_all();
		$data['lessons'] = $this->M_lessons->get();
		$this->load->view('templates/base', $data);
	}

	public function ajouter($id = null)
	{
		if(!isset($id))
		{
			$data['contenu']    = 'lessons/ajouter';
			//$data['categories'] = $this->M_lessons->get_categories();
			$this->load->view('templates/base', $data);
		}
		else
		{
			$data['contenu']    = 'lessons/ajouter';
			//$data['categories'] = $this->M_lessons->get_lessons($id);
			$this->load->view('templates/base', $data);
		}
	}
}

/* End of file lessons.php */
/* Location: ./application/controllers/lessons.php */