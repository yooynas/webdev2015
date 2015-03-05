<?php
class Modules extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_module');
        $this->load->model('M_question');
	}
    
    public function get_document_by_module() {
        $listmodules = $this->M_module->get();
        var_dump($listmodules);
        
    }
    
    public function get_theory_by_module() {
        
    }
        
    public function get_questions_by_module() {
        
        /*
        
        $this->db->select('*');    
        $this->db->from('modules');
        $this->db->join('questions', 'modules.id_module = questions.fk_module_question');
        $this->db->where('num_module', $name);
        $query = $this->db->get();
        
        foreach ($query->result() as $row)
        {
            echo $row->num_module;
            echo "<br>";
            echo $row->label_question;
            echo "<br>";
        }
        
        */
        
        $data['contenu'] = '/chapter/V_module';
        $data['module'] = $this->M_module->get();
		$data['questions'] = $this->M_question->get();
		$this->load->view('templates/base', $data);
		
        
        
       
    }
    
    public function add_module() {
        $data = array(
            'name_module'=> $_POST['name_module'],
            'num_module'=> $_POST['num_module'],
            'type_module'=> $_POST['type_module'],
            'fk_chapter_module'=> $_POST['fk_chapter_module']
        );
        $this->M_module->save($data);
    }
    
    public function edit_module($id) {
        $data = array(
            'name_module'=> $_POST['name_module'],
            'num_module'=> $_POST['num_module'],
            'type_module'=> $_POST['type_module'],
            'fk_chapter_module'=> $_POST['fk_chapter_module']
        );
        $this->M_module->save($data, $id);
    }
    
    public function delette_module() {
        
        $this->M_module->delete(array($nums));
    
    }
    
    
	public function index() {        
        $this->get_questions_by_module();  

	}
}

?>