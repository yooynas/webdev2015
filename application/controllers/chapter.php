<?php
class Chapter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_chapter');
		$this->load->model('M_module');
		$this->load->model('M_lessons');
        $this->load->controller('module');
		if (!$this->session->userdata('id')) 
		{
			redirect('auth/login', 'refresh'); 
		}
	}
	public function index()
	{
		
		$data['contenu'] = '/chapter/V_chapter';
        $data['chapter'] = $this->M_chapter->get();
		$data['modules'] = $this->M_module->get();
		$this->load->view('templates/base', $data);
		
		
		
	}
	public function add_new_chapter() {
		$data['contenu'] = 'chapter/V_chapter_add_new';
		$data['lessons'] = $this->M_lessons->get();
		$this->load->view('templates/base', $data);
	}
	public function add_chapter() {
		
		 $this->form_validation->set_rules('name_chapter','Nom chapitre', 'trim|required|min_length[4]');
         $this->form_validation->set_rules('date_chapter','Date du debut du chapitre', 'trim|required');
         $this->form_validation->set_rules('num_chapter','Numéro du chapitre', 'trim|required');

         $this->form_validation->set_rules('fk_lessons_chapter','cours associé', 'trim|required');

         if ($this->form_validation->run() == FALSE )
         {
            $this->add_new_chapter();
         } 
         else 
         {
           
         }
		
		 var_dump($new_chapter);
		 $this->M_chapter->save($new_chapter);
	}
	

}
?>