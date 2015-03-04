<?php
class Chapter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_chapter');
		$this->load->model('M_module');
	}
	public function index()
	{
		$data['contenu'] = '/chapter/V_chapter';
		$data['chapter'] = $this->M_chapter->get();
		$data['modules'] = $this->M_module->get();
		$this->load->view('templates/base', $data);
		

		
		
	}
	public function module()
	{
		$data['modules'] = $this->M_chapter->get();
	}
}
?>