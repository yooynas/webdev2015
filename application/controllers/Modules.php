<?php
class Modules extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_module');
        $this->load->model('M_question');
	}
    
    public function getmodules() {
        $listmodules = $this->M_module->get();
        var_dump($listmodules);
    }
    
    public function getmodulesnum() {
        $listmodules = $this->M_module->get_key_value('id_module','num_module');
        var_dump($listmodules);
    }
    
    public function get_document_by_module() {
        $listmodules = $this->M_module->get();
        var_dump($listmodules);
        
    }
        
    public function get_questions_by_module() {
        
        $this->db->select('*');    
        $this->db->from('modules');
        $this->db->join('questions', 'modules.id_module = questions.fk_module_question');
        //$this->db->join('table3', 'table1.id = table3.id');
        $query = $this->db->get();
        
        
        /*
        $query = $this->db->query('SELECT num_module, label_question FROM modules INNER JOIN questions ON modules.id_module = questions.fk_module_question');
        */
        foreach ($query->result() as $row)
        {
            echo $row->num_module;
            echo "<br>";
            echo $row->label_question;
            echo "<br>";

        }
        
        echo "bonjour";
       
    }
    
	public function index() {        
        $this->get_questions_by_module();  

	}
}

?>