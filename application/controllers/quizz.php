<?php
class Quizz extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_module');
		$this->load->model('M_question');
        $this->load->model('M_choice');
        
	}
    
    function get_questions() {
        
        $data['contenu'] = 'modules/V_quizz';
        $id = $this->uri->segment(3);
        $query = $this->M_module->get_by('id_module', $id, NULL, TRUE);
        $data['questions'] = $this->M_question->get_by('fk_module_question', $id, NULL, $query['nb_questions']);
        $data['choices'] = $this->M_choice->get();
		$this->load->view('templates/base', $data);
    }
    
    function quizz_verif() {
        $data['contenu'] = 'modules/V_reponses';
        
        $uris = $this->uri->segment(3);
        $parturis = explode("-", $uris);
       
        for($i = 0; $i < count($parturis)-1; $i++) {
        
            $data['questions'][] = $getby = $this->M_question->get_by('id_question', $parturis[$i], NULL, FALSE);
            
        }
        
        $data['choices'] = $this->M_choice->get();
        $this->load->view('templates/base', $data);
    }
    
}