<?php
class Modules extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_module');
	}
    
    public function getmodules() {
        $listmodules = $this->M_module->get();
        var_dump($listmodules);
        
    }
        
	public function index() {        
        $this->getmodules();  

	}
}

?>