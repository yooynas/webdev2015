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
        $id = $this->uri->segment(3);
        $nb_questions = $this->uri->segment(4);
        $data['questions'] = $this->M_question->get_by_bis('fk_module_question', $id, NULL, 0);
        $data['choices'] = $this->M_choice->get();
		$this->load->view('templates/base', $data);
    }
    
}