<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessons extends CI_Controller {

	public function __construct() {
		parent::__construct();
		/*
			Chargement des modèles
		*/
		$this->load->model('M_lessons');
		$this->load->model('M_category');
		if (!$this->session->userdata('id')) 
		{
			redirect('auth/login', 'refresh'); 
		}
	}

	public function index()
	{
		$data['contenu'] = 'lessons/index';
		//$data['lessons'] = $this->M_lessons->get_all();
		$data['lessons'] = $this->M_lessons->get();
		$this->load->view('templates/base', $data);
	}

	public function ajouter($id = null,$id_cat = null)
	{
		if ($this->form_validation->run() == FALSE)
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
				$data['catactuel'] = $this->M_category->get_by('id_category', $id_cat, NULL, TRUE);
				$data['categories'] = $this->M_category->get();
				$this->load->view('templates/base', $data);
			}
		}
		else
		{
			echo 'non';
		}
	}

	public function add($id = null,$id_cat = null)
	{
        if ($this->form_validation->run() == FALSE) {
        	$data['contenu'] = 'lessons/ajouter';
        	$data['categories'] = $this->M_category->get();
            $this->load->view('templates/base', $data);
        } else {
            echo 'ok envoyer';
        } 
	}


}

/* End of file lessons.php */
/* Location: ./application/controllers/lessons.php */