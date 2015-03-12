<?php
class Quizz extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_question');
        $this->load->model('M_choice');
        
	}
    
    function get_questions() {
        
        $data['contenu'] = 'modules/V_quizz';
		$data['choices'] = $this->M_choice->get();
        $id = $this->uri->segment(3);
        $data['nb_questions'] = $this->M_question->get_by('id_module', $id, NULL, FALSE);
        $data['questions'] = $this->M_question->get_by_bis('fk_module_question', $id, NULL, 0);
		$this->load->view('templates/base', $data);
    }
    
}