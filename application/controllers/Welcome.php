<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$data['contenu'] = 'modules/module_5';
		$this->load->view('templates/base', $data);
	}
    
    public function test() {
        $data['contenu'] = 'modules/test'; 
        $data['id'] = 2;
        $this->load->view('templates/base', $data);
    }
        
}
