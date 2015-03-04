<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessons extends CI_Controller {

	public function __construct() {
		parent::__construct();
		/*
			Chargement des modèles
		*/
		$this->load->model('M_lessons');
		$this->load->model('M_category');
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
			$data['categories'] = $this->M_category->get();
			$this->load->view('templates/base', $data);
		}
		else
		{
			$data['contenu']    = 'lessons/ajouter';
			$data['content']    = $this->M_lessons->get_by('id_lesson', $id, NULL, TRUE);
			$data['categories'] = $this->M_category->get_by('id_category', $id, NULL, TRUE);
			$this->load->view('templates/base', $data);
		}
	}
}

/* End of file lessons.php */
/* Location: ./application/controllers/lessons.php */