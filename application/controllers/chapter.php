<?php
class Chapter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_chapter');
	}
	public function index()
	{
		$data['contenu'] = '/chapter/V_chapter';
		$data['chapter'] = $this->M_chapter->get_chapter();
		$data['modules'] = $this->M_chapter->get_module();
		$this->load->view('templates/base', $data);
		

		
		
	}
}
?>