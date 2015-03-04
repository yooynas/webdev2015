<?php
class Modules extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_module');
	}
    
	public function index()
	{
		$get = $this->M_module->get();
        var_dump($get);
	}
}

?>