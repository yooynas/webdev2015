<?php
class Modules extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_module');
	}
    
    public function get_document_by_module() {
        $listmodules = $this->M_module->get();
        var_dump($listmodules);
        
    }
    
    public function get_theory_by_module() {
        
        //$id_module = $this->uri->segment(3);
        $data['contenu'] = 'modules/template_theory';
        $data['id'] = $this->uri->segment(3);
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
    
}

?>