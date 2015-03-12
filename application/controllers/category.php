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

	public function edit($id=null)
	{

			$this->form_validation->set_rules('id_category', 'ID', 'required');
			$this->form_validation->set_rules('titre_category', 'Titre', 'required');

	        if ($this->form_validation->run() === FALSE)
	        {
		    if($id==null) {
				redirect('category');
			}
			$data['contenu']    = 'categories/edit';
			$data['content'] = $this->M_category->get([$id]);
			$this->load->view('templates/base', $data);
	        } 
	        else 
	        {
	            $data = array(
					'name_category'  => $this->input->post('titre_category')
	       		);
	  		    $this->M_category->save($data,$this->input->post('id_category'));
		  		redirect('category');
	        } 
	}

	public function delete($id=null)
	{
		if($id==null)
		{
			redirect('category');
		}
		else
		{
			$this->M_category->delete($id);
			redirect('category');

		}
	}


}

/* End of file category.php */
/* Location: ./application/controllers/category.php */