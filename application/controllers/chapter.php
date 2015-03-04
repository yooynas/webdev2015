<?php
class Chapter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_chapter');
		$this->load->model('M_module');
		$this->load->model('M_lessons');
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
		if (isset($_POST['add_chapter']))
		{
			$new_chapter = array
			(
		
			
			'name_chapter' => $_POST['name_chapter'],
			'begin_chapter' => $_POST['date_chapter'],
			'num_chapter' => $_POST['num_chapter'],
			'fk_lessons_chapter' => $_POST['lessons'],
			);
		}
		 var_dump($new_chapter);
		 $this->M_chapter->save($new_chapter);
	}
	

}
?>