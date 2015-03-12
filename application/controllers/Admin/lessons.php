<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lessons extends CI_Controller {

	public function __construct() {
		parent::__construct();
		/*
			Chargement des modèles
		*/
			$this->load->library('encrypt');
		$this->load->model('admin/M_lessons');
		$this->load->model('admin/M_category');
        if ($this->session->userdata('admin') != 1) {
            // Test si la personne est loggée en tant qu'admin
            redirect('auth','refresh');
        }
	}

	public function index($cat=null)
	{
		if($cat==null)
		{
			$data['contenu'] = 'lessons/index';
			//$data['lessons'] = $this->M_lessons->get_all();
			$data['lessons'] = $this->M_lessons->get_info();
			//$data['infos'] = $this->M_lessons->get_info();
			$this->load->view('admin/base', $data);
		}
		else
		{
			$data['contenu'] = 'lessons/index';
			//$data['lessons'] = $this->M_lessons->get_all();
			$data['lessons'] = $this->M_lessons->get_info($cat);
			//$data['infos'] = $this->M_lessons->get_info();
			$this->load->view('admin/base', $data);
		}
	}


	public function add()
	{

			$this->form_validation->set_rules('titre_lesson', 'titre_lesson', 'required');
			$this->form_validation->set_rules('contenu_lesson', 'contenu_lesson', 'required');
			$this->form_validation->set_rules('begin_lesson', 'begin_lesson', 'required');
			$this->form_validation->set_rules('end_lesson', 'end_lesson', 'required');
			$this->form_validation->set_rules('cat_lesson', 'cat', 'required');
	        if ($this->form_validation->run() === FALSE)
	        {
				$data['contenu']    = 'lessons/add';
				$data['categories'] = $this->M_category->get();
				$this->load->view('admin/base', $data);
	        } 
	        else 
	        {
	            $data = array(
					'name_lesson'        => $this->input->post('titre_lesson'),
					'description_lesson' => $this->input->post('contenu_lesson'),
					'begin_lesson'       => $this->input->post('begin_lesson'),
					'end_lesson'         => $this->input->post('end_lesson'),
					'fk_category_lesson' => $this->input->post('cat_lesson'),
					'fk_holder_lesson'   => 1
	       		);
	  		    $this->M_lessons->save($data);
	  		    redirect('lessons');
	        } 

	}

	public function delete($id=null)
	{
		if($id==null)
		{
			redirect('lessons');
		}
		else
		{
			$this->M_lessons->delete($id);
			$data['flash'] = 'Leçon supprimé avec succès !';
			$data['contenu'] = 'lessons/index';
			$data['lessons'] = $this->M_lessons->get_info();
			$this->load->view('admin/base', $data);

		}
	}

	public function edit($id=null)
	{

			$this->form_validation->set_rules('id_lesson', 'titre_lesson', 'required');
			$this->form_validation->set_rules('titre_lesson', 'titre_lesson', 'required');
			$this->form_validation->set_rules('contenu_lesson', 'contenu_lesson', 'required');
			$this->form_validation->set_rules('begin_lesson', 'begin_lesson', 'required');
			$this->form_validation->set_rules('end_lesson', 'end_lesson', 'required');
			$this->form_validation->set_rules('cat_lesson', 'cat', 'required');
	        if ($this->form_validation->run() === FALSE)
	        {
		    if($id==null) {
				redirect('lessons');
			}
			$data['contenu']    = 'lessons/edit';
			$data['categories'] = $this->M_category->get();
			$data['content']    = $this->M_lessons->get([$id]);
			$this->load->view('admin/base', $data);
	        } 
	        else 
	        {
	            $data = array(
					'name_lesson'        => $this->input->post('titre_lesson'),
					'description_lesson' => $this->input->post('contenu_lesson'),
					'begin_lesson'       => $this->input->post('begin_lesson'),
					'end_lesson'         => $this->input->post('end_lesson'),
					'fk_category_lesson' => $this->input->post('cat_lesson'),
					'fk_holder_lesson'   => 1
	       		);
	  		    $this->M_lessons->save($data,$this->input->post('id_lesson'));
		  		redirect('lessons');
	        } 
	}

	public function get_by_cat($id)
	{

	}


}

/* End of file lessons.php */
/* Location: ./application/controllers/lessons.php */