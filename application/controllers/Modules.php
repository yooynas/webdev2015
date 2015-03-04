<?php
class Modules extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_module');
        //$this->load->model('M_question');
	}
    
    public function getmodules() {
        $listmodules = $this->M_module->get();
        var_dump($listmodules);
    }
    
    public function get_document_by_module() {
        $listmodules = $this->M_module->get();
        var_dump($listmodules);
        
    }
        
    public function get_questions_by_module() {
        $this->db->select('label_question');    
        $this->db->from('questions');
        $this->db->join('table2', 'table1.id = table2.id');
        $this->db->join('table3', 'table1.id = table3.id');
        $query = $this->db->get();
    }
    
	public function index() {        
        $this->getmodules();  

	}
}

?>