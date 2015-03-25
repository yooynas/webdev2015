<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chapter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model('admin/M_chapter');
		$this->load->model('admin/M_module');
		$this->load->model('admin/M_lessons');
		if ($this->session->userdata('admin') != 1) 
        {
            // Test si la personne est loggée en tant qu'admin
            redirect('auth','refresh');
        }
	}
	public function index()
	{
        $this->load->library('table');
		
		$data['contenu'] = '/chapter/V_chapter';

        $data['myLessons'] = $this->M_chapter->get_Lesson();
        
        $this->load->view('admin/base', $data); 
     }
	public function add_new_chapter() {
		$data['contenu'] = '/chapter/V_chapter_add_new';
		$data['lessons'] = $this->M_lessons->get();
		$this->load->view('admin/base', $data);
	}
	
	public function add_chapter() {
		
		 $this->form_validation->set_rules('name_chapter','Nom chapitre', 'trim|required|min_length[4]');
         $this->form_validation->set_rules('date_chapter','Date du debut du chapitre', 'trim|required');
         $this->form_validation->set_rules('num_chapter','Numéro du chapitre', 'trim|required');

         $this->form_validation->set_rules('lessons','cours associé', 'trim|required');

         if ($this->form_validation->run() === FALSE )
         {
            redirect('admin/chapter/add_new_chapter');
            
         } 
         else 
         {
         	$data = array(
	            'name_chapter'=>$this->input->post('name_chapter'),
	            'begin_chapter'=>$this->input->post('date_chapter'),
	            'num_chapter'=>$this->input->post('num_chapter'),
	            'fk_lessons_chapter'=>$this->input->post('lessons')
       		);
       		
		 	$this->M_chapter->save($data);
         	
         	redirect('admin/chapter');
         	
         }
		
		 
	}
	public function edit($id=null)
	{
			
			$this->form_validation->set_rules('name_chapter','Nom chapitre', 'trim|required|min_length[4]');
         	$this->form_validation->set_rules('date_chapter','Date du debut du chapitre', 'trim|required');
         	$this->form_validation->set_rules('num_chapter','Numéro du chapitre', 'trim|required');

         	$this->form_validation->set_rules('lessons','cours associé', 'trim|required');

         	if ($this->form_validation->run() === FALSE )
         	{
            	$data['contenu']    = '/chapter/V_chapter_edit';
				$data['lessons'] = $this->M_lessons->get();
				$data['content']    = $this->M_chapter->get([$id]);
				$this->load->view('admin/base', $data);
            
         	} 
         	else 
         	{
         		
         		$data = array(
	            'name_chapter'=>$this->input->post('name_chapter'),
	            'begin_chapter'=>$this->input->post('date_chapter'),
	            'num_chapter'=>$this->input->post('num_chapter'),
	            'fk_lessons_chapter'=>$this->input->post('lessons')
       			);
       		$this->M_chapter->save($data,$this->input->post('id_chapter'));
			redirect('admin/chapter');
			
			}
	

	}
	public function delete($id=null)
	{
		if($id==null)
		{
			redirect('admin/chapter');
		}
		else
		{
			$this->M_chapter->delete($id);
			redirect('admin/chapter');

		}
	}
	
}
?>