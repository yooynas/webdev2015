<?php
class Modules extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_module');
        $this->load->controller('chapter');
	}
    
    public function getmodules {
        $listmodules = $this->M_module->get();
        
    }
    
	public function index()
	{
        
        $this->  
		
        
	}
}

?>