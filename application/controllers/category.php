<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_category');
		if (!$this->session->userdata('id')) 
		{
			redirect('auth/login', 'refresh'); 
		}
	}


	public function index()
	{
		$data['contenu'] = 'categories/index';
		$data['categories'] = $this->M_category->get();
		$this->load->view('templates/base', $data);		
	}

	public function editer($id)
	{
		
	}

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */