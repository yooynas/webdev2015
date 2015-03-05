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


	public function add()
	{
		$this->form_validation->set_rules('titre_lesson', 'titre_lesson', 'required');
		$this->form_validation->set_rules('contenu_lesson', 'contenu_lesson', 'required');
		$this->form_validation->set_rules('cat_lesson', 'cat', 'required');
        if ($this->form_validation->run() === FALSE)
        {
        	$data['contenu'] = 'lessons/add';
        	$data['categories'] = $this->M_category->get();
            $this->load->view('templates/base', $data);
        } 
        else 
        {
        	echo $this->input->post('titre_lesson').' - '.$this->input->post('contenu_lesson').' - '.$this->input->post('cat_lesson');

            $data = array(
	            'name_lesson'=>$this->input->post('titre_lesson'),
	            'description_lesson'=>$this->input->post('contenu_lesson'),
	            'fk_category_lesson'=>$this->input->post('cat_lesson')
       		);
  		    $this->M_lessons->save($data);

        } 
	}


}

/* End of file lessons.php */
/* Location: ./application/controllers/lessons.php */